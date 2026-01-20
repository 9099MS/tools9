"""
YouTube 채널 영상 통계 조회 프로그램
게시 후 24시간 동안의 주요 지표를 분석합니다.
"""

import os
import json
from datetime import datetime, timedelta
from google.oauth2.credentials import Credentials
from google_auth_oauthlib.flow import InstalledAppFlow
from google.auth.transport.requests import Request
from googleapiclient.discovery import build
import pickle

# API 스코프 설정
SCOPES = [
    'https://www.googleapis.com/auth/youtube.readonly',
    'https://www.googleapis.com/auth/yt-analytics.readonly'
]

class YouTubeAnalytics:
    def __init__(self, logger=None):
        self.youtube = None
        self.youtube_analytics = None
        self.logger = logger if logger else print
        
    def log(self, message):
        """로그 메시지 출력"""
        if self.logger:
            self.logger(message)

    def authenticate(self):
        """YouTube API 인증"""
        creds = None
        
        # 저장된 토큰 확인
        if os.path.exists('token.pickle'):
            with open('token.pickle', 'rb') as token:
                creds = pickle.load(token)
        
        # 유효한 인증 정보가 없으면 로그인
        if not creds or not creds.valid:
            if creds and creds.expired and creds.refresh_token:
                creds.refresh(Request())
            else:
                flow = InstalledAppFlow.from_client_secrets_file(
                    'client_secrets.json', SCOPES)
                self.log("\n=== 인증 안내 ===")
                self.log("잠시 후 브라우저가 열립니다.")
                self.log("구글 계정으로 로그인 후 'Google에서 확인하지 않은 앱' 화면이 나오면:")
                self.log("1. 좌측 하단 '고급' 클릭")
                self.log("2. 하단 '...로 이동(안전하지 않음)' 클릭")
                self.log("3. '계속' 또는 '허용' 클릭")
                self.log("==================\n")
                creds = flow.run_local_server(port=0)
            
            # 토큰 저장
            with open('token.pickle', 'wb') as token:
                pickle.dump(creds, token)
        
        # YouTube API 클라이언트 생성
        self.youtube = build('youtube', 'v3', credentials=creds)
        self.youtube_analytics = build('youtubeAnalytics', 'v2', credentials=creds)
        self.log("✓ 인증 완료")
    
    def resolve_channel_id(self, url_or_handle):
        """URL이나 핸들에서 채널 ID 추출"""
        if not url_or_handle:
            return None
            
        # URL에서 핸들/ID 추출
        if 'youtube.com/channel/' in url_or_handle:
            return url_or_handle.split('youtube.com/channel/')[-1].split('/')[0]
        
        handle = url_or_handle
        if 'youtube.com/@' in url_or_handle:
            handle = url_or_handle.split('youtube.com/@')[-1].split('/')[0]
        elif 'youtube.com/c/' in url_or_handle:
            # 커스텀 URL은 API로 조회 필요
            handle = url_or_handle.split('youtube.com/c/')[-1].split('/')[0]
        
        # @가 없으면 붙여서 검색 (핸들인 경우)
        if not handle.startswith('UC'): 
            if not handle.startswith('@'):
                handle = '@' + handle
                
            try:
                request = self.youtube.search().list(
                    part='id',
                    q=handle,
                    type='channel',
                    maxResults=1
                )
                response = request.execute()
                if response['items']:
                    return response['items'][0]['id']['channelId']
            except:
                pass
                
        return handle # ID라고 가정

    def get_channel_id(self, target_url=None):
        """채널 ID 가져오기 (URL 입력 시 해당 ID 반환, 없으면 내 채널)"""
        if target_url:
            resolved_id = self.resolve_channel_id(target_url)
            if resolved_id:
                return resolved_id

        request = self.youtube.channels().list(
            part='id',
            mine=True
        )
        response = request.execute()
        return response['items'][0]['id']
    
    def get_videos_in_period(self, channel_id, start_date, end_date):
        """특정 기간 동안 업로드된 영상 목록 가져오기"""
        videos = []
        next_page_token = None
        
        while True:
            request = self.youtube.search().list(
                part='snippet',
                channelId=channel_id,
                type='video',
                publishedAfter=start_date.isoformat() + 'Z',
                publishedBefore=end_date.isoformat() + 'Z',
                maxResults=50,
                pageToken=next_page_token,
                order='date'
            )
            response = request.execute()
            
            for item in response['items']:
                video_info = {
                    'video_id': item['id']['videoId'],
                    'title': item['snippet']['title'],
                    'published_at': item['snippet']['publishedAt']
                }
                videos.append(video_info)
            
            next_page_token = response.get('nextPageToken')
            if not next_page_token:
                break
        
        self.log(f"✓ {len(videos)}개의 영상을 찾았습니다.")
        return videos
    
    def get_video_analytics_24h(self, channel_id, video_id, published_at):
        """영상의 게시 후 24시간 통계 가져오기"""
        # 게시 시간 파싱
        pub_time = datetime.fromisoformat(published_at.replace('Z', '+00:00'))
        start_date = pub_time.date()
        end_date = (pub_time + timedelta(days=1)).date()
        
        try:
            # Analytics API 쿼리
            # target channel_id가 있으면 해당 채널 쿼리 (권한 필요)
            # 보통은 channel==MINE 또는 channel==CHANNEL_ID (Content Owner인 경우)
            ids_param = f'channel=={channel_id}'
            
            request = self.youtube_analytics.reports().query(
                ids=ids_param,
                startDate=start_date.isoformat(),
                endDate=end_date.isoformat(),
                metrics='views,estimatedMinutesWatched,averageViewPercentage,averageViewDuration',
                dimensions='video',
                filters=f'video=={video_id}'
            )
            response = request.execute()
            
            if 'rows' in response and len(response['rows']) > 0:
                row = response['rows'][0]
                return {
                    'views': row[1],
                    'watch_time_minutes': row[2],
                    'avg_view_percentage': row[3],
                    'avg_view_duration': row[4]
                }
            else:
                return None
                
        except Exception as e:
            # 권한 오류 등의 경우 자세히 출력
            if '403' in str(e):
                self.log(f"  ⚠ 권한 오류: 본인 채널이 아니거나 권한이 부족합니다.")
            else:
                self.log(f"  경고: {video_id} 통계 조회 실패 - {str(e)}")
            return None
    
    def analyze_period(self, start_date, end_date, channel_url=None):
        """특정 기간의 영상들을 분석"""
        self.log(f"\n📊 분석 기간: {start_date.date()} ~ {end_date.date()}")
        
        # 채널 ID 확인
        target_channel_id = self.get_channel_id(channel_url)
        self.log(f"채널 ID: {target_channel_id}")
        self.log("=" * 80)
        
        # 영상 목록 가져오기
        videos = self.get_videos_in_period(target_channel_id, start_date, end_date)
        
        if not videos:
            self.log("해당 기간에 업로드된 영상이 없습니다.")
            return []
        
        # 각 영상의 24시간 통계 수집
        results = []
        for idx, video in enumerate(videos, 1):
            self.log(f"\n[{idx}/{len(videos)}] {video['title'][:50]}...")
            analytics = self.get_video_analytics_24h(
                target_channel_id,
                video['video_id'], 
                video['published_at']
            )
            
            if analytics:
                results.append({
                    **video,
                    **analytics
                })
                self.log(f"  ✓ 조회수: {analytics['views']:,}")
            else:
                self.log(f"  ⚠ 통계 없음")
        
        # 결과 출력
        self.print_results(results)
        
        # 결과를 JSON 파일로 저장 (사용자 요청으로 비활성화)
        # self.save_results(results, start_date, end_date)
        
        return results
    
    def print_results(self, results):
        """결과를 보기 좋게 출력"""
        self.log("\n" + "=" * 80)
        self.log("📈 분석 결과 요약")
        self.log("=" * 80)
        
        for idx, video in enumerate(results, 1):
            self.log(f"\n{idx}. {video['title']}")
            self.log(f"   게시일: {video['published_at'][:10]}")
            self.log(f"   조회수: {video['views']:,}")
            self.log(f"   시청 시간: {video['watch_time_minutes']:,.1f}분")
            self.log(f"   평균 시청률: {video['avg_view_percentage']:.1f}%")
            dur = int(video.get('avg_view_duration', 0))
            self.log(f"   평균 시청 시간: {dur//60}:{dur%60:02d}")
            self.log(f"   영상 URL: https://youtube.com/watch?v={video['video_id']}")
    
    def save_results(self, results, start_date, end_date):
        """결과를 JSON 파일로 저장"""
        filename = f"youtube_analytics_{start_date.date()}_{end_date.date()}.json"
        
        with open(filename, 'w', encoding='utf-8') as f:
            json.dump(results, f, ensure_ascii=False, indent=2)
        
        self.log(f"\n💾 결과가 '{filename}' 파일로 저장되었습니다.")


def main():
    print("🎬 YouTube 채널 영상 통계 분석 프로그램")
    print("=" * 80)
    
    # 분석 도구 초기화
    analytics = YouTubeAnalytics()
    
    # 인증
    analytics.authenticate()
    
    # 분석 기간 입력
    print("\n분석할 기간을 입력하세요:")
    start_input = input("시작일 (YYYY-MM-DD): ")
    end_input = input("종료일 (YYYY-MM-DD): ")
    
    try:
        start_date = datetime.strptime(start_input, '%Y-%m-%d')
        end_date = datetime.strptime(end_input, '%Y-%m-%d')
        
        if end_date < start_date:
            print("❌ 종료일은 시작일보다 늦어야 합니다.")
            return
        
        # 분석 실행
        analytics.analyze_period(start_date, end_date)
        
    except ValueError:
        print("❌ 날짜 형식이 올바르지 않습니다. YYYY-MM-DD 형식으로 입력해주세요.")
        return


if __name__ == '__main__':
    main()