import tkinter as tk
from tkinter import ttk, messagebox, filedialog
import yt_dlp
import os
import threading
import subprocess
import sys
from datetime import datetime

class YouTubeDownloader:
    def __init__(self, root):
        self.root = root
        self.root.title("YouTube 다운로더")
        self.root.geometry("650x600")
        self.root.resizable(False, False)
        
        # 다운로드 경로 기본값
        self.download_path = os.path.join(os.path.expanduser("~"), "Downloads")
        
        # FFmpeg 확인
        self.has_ffmpeg = self.check_ffmpeg()
        
        # 스타일 설정
        self.setup_styles()
        
        # UI 구성
        self.create_widgets()
        
        # FFmpeg 경고
        if not self.has_ffmpeg:
            self.show_ffmpeg_warning()
        
    def check_ffmpeg(self):
        """FFmpeg 설치 여부 확인"""
        try:
            subprocess.run(['ffmpeg', '-version'], 
                         stdout=subprocess.PIPE, 
                         stderr=subprocess.PIPE,
                         check=True)
            return True
        except:
            return False
            
    def show_ffmpeg_warning(self):
        """FFmpeg 미설치 경고 표시"""
        warning = """FFmpeg가 설치되지 않았습니다.

• 영상 다운로드는 정상 작동합니다.
• MP3 음원 변환은 FFmpeg가 필요합니다.

지금은 음원도 원본 형식(webm, m4a)으로 다운로드됩니다.
MP3로 변환하려면 FFmpeg를 설치해주세요.

설치 방법: https://www.gyan.dev/ffmpeg/builds/"""
        
        messagebox.showinfo("알림", warning)
        
    def setup_styles(self):
        style = ttk.Style()
        style.theme_use('clam')
        
        # 버튼 스타일
        style.configure('Video.TButton', 
                       background='#ef4444',
                       foreground='white',
                       font=('맑은 고딕', 10, 'bold'),
                       padding=10)
        style.map('Video.TButton',
                 background=[('active', '#dc2626')])
        
        style.configure('Audio.TButton',
                       background='#3b82f6',
                       foreground='white',
                       font=('맑은 고딕', 10, 'bold'),
                       padding=10)
        style.map('Audio.TButton',
                 background=[('active', '#2563eb')])
        
    def create_widgets(self):
        # 메인 프레임
        main_frame = tk.Frame(self.root, bg='#f8fafc', padx=20, pady=20)
        main_frame.pack(fill='both', expand=True)
        
        # 헤더
        header_frame = tk.Frame(main_frame, bg='#f8fafc')
        header_frame.pack(fill='x', pady=(0, 20))
        
        title_label = tk.Label(header_frame, 
                              text="🎬 YouTube 다운로더",
                              font=('맑은 고딕', 20, 'bold'),
                              bg='#f8fafc',
                              fg='#1e293b')
        title_label.pack()
        
        subtitle_label = tk.Label(header_frame,
                                 text="영상 또는 음원을 간편하게 다운로드하세요",
                                 font=('맑은 고딕', 10),
                                 bg='#f8fafc',
                                 fg='#64748b')
        subtitle_label.pack()
        
        # URL 입력 섹션
        url_frame = tk.LabelFrame(main_frame, 
                                 text="YouTube URL",
                                 font=('맑은 고딕', 10, 'bold'),
                                 bg='#ffffff',
                                 fg='#334155',
                                 padx=15,
                                 pady=15)
        url_frame.pack(fill='x', pady=(0, 15))
        
        # URL 입력과 저장경로 버튼을 가로로 배치
        url_container = tk.Frame(url_frame, bg='#ffffff')
        url_container.pack(fill='x')
        
        self.url_entry = tk.Entry(url_container,
                                  font=('맑은 고딕', 11),
                                  relief='solid',
                                  bd=1)
        self.url_entry.pack(side='left', fill='x', expand=True, ipady=8)
        self.url_entry.insert(0, "https://www.youtube.com/watch?v=...")
        self.url_entry.bind('<FocusIn>', self.clear_placeholder)
        self.url_entry.bind('<FocusOut>', self.restore_placeholder)
        self.url_entry.bind('<KeyRelease>', self.validate_url)
        self.url_entry.config(fg='#94a3b8')
        
        # 저장 경로 버튼 (작게, 2줄)
        self.path_button = tk.Button(url_container,
                               text="📁 저장경로\n(다운로드)",
                               font=('맑은 고딕', 8),
                               bg='#e2e8f0',
                               fg='#334155',
                               relief='flat',
                               padx=10,
                               pady=5,
                               cursor='hand2',
                               command=self.select_path)
        self.path_button.pack(side='right', padx=(10, 0))
        
        # 다운로드 버튼 (초기에는 비활성화)
        button_frame = tk.Frame(main_frame, bg='#f8fafc')
        button_frame.pack(fill='x', pady=(0, 15))
        
        self.video_button = tk.Button(button_frame,
                                     text="🎥 영상 다운로드",
                                     font=('맑은 고딕', 11, 'bold'),
                                     bg='#ef4444',
                                     fg='white',
                                     activebackground='#dc2626',
                                     activeforeground='white',
                                     relief='flat',
                                     cursor='hand2',
                                     padx=20,
                                     pady=15,
                                     state='disabled',
                                     command=lambda: self.start_download('video'))
        self.video_button.pack(side='left', fill='x', expand=True, padx=(0, 5))
        
        audio_text = "🎵 음원 다운로드" if self.has_ffmpeg else "🎵 음원 다운로드 (원본)"
        self.audio_button = tk.Button(button_frame,
                                     text=audio_text,
                                     font=('맑은 고딕', 11, 'bold'),
                                     bg='#3b82f6',
                                     fg='white',
                                     activebackground='#2563eb',
                                     activeforeground='white',
                                     relief='flat',
                                     cursor='hand2',
                                     padx=20,
                                     pady=15,
                                     state='disabled',
                                     command=lambda: self.start_download('audio'))
        self.audio_button.pack(side='right', fill='x', expand=True, padx=(5, 0))
        
        # 진행 상황 표시 (애니메이션)
        progress_frame = tk.LabelFrame(main_frame,
                                      text="다운로드 진행 상황",
                                      font=('맑은 고딕', 10, 'bold'),
                                      bg='#ffffff',
                                      fg='#334155',
                                      padx=15,
                                      pady=15)
        progress_frame.pack(fill='x', pady=(0, 15))
        self.progress_frame = progress_frame
        
        # 상태 표시 프레임
        status_container = tk.Frame(progress_frame, bg='#ffffff')
        status_container.pack(fill='both', expand=True)
        
        # 애니메이션 라벨
        self.animation_label = tk.Label(status_container,
                                       text="",
                                       font=('맑은 고딕', 24),
                                       bg='#ffffff',
                                       fg='#3b82f6')
        self.animation_label.pack(side='left', padx=(0, 10))
        
        # 상태 텍스트
        self.status_label = tk.Label(status_container,
                                     text="대기 중...",
                                     font=('맑은 고딕', 11),
                                     bg='#ffffff',
                                     fg='#64748b',
                                     anchor='w')
        self.status_label.pack(side='left', fill='x', expand=True)
        
        # 애니메이션 관련 변수
        self.animation_running = False
        self.animation_frame = 0
        
        # 안내 사항
        info_frame = tk.LabelFrame(main_frame,
                                  text="사용 방법",
                                  font=('맑은 고딕', 9, 'bold'),
                                  bg='#f1f5f9',
                                  fg='#334155',
                                  padx=15,
                                  pady=15)
        info_frame.pack(fill='both', expand=True)
        
        info_text = """1. 다운로드할 YouTube 영상의 URL을 복사합니다

2. 위 입력창에 URL을 붙여넣습니다

3. 원하는 형식의 버튼을 클릭합니다
   • 영상 다운로드: 음성이 포함된 MP4 영상
   • 음원 다운로드: MP3 음악 파일 (FFmpeg 필요)

※ 저작권이 있는 콘텐츠는 개인적인 용도로만 사용해주세요"""
        
        info_label = tk.Label(info_frame,
                             text=info_text,
                             font=('맑은 고딕', 9),
                             bg='#f1f5f9',
                             fg='#475569',
                             justify='left',
                             anchor='nw')
        info_label.pack(fill='both', expand=True)
        
    def clear_placeholder(self, event):
        if self.url_entry.get() == "https://www.youtube.com/watch?v=...":
            self.url_entry.delete(0, tk.END)
            self.url_entry.config(fg='#1e293b')
            
    def restore_placeholder(self, event):
        if not self.url_entry.get():
            self.url_entry.insert(0, "https://www.youtube.com/watch?v=...")
            self.url_entry.config(fg='#94a3b8')
            
    def select_path(self):
        folder = filedialog.askdirectory(initialdir=self.download_path)
        if folder:
            self.download_path = folder
            # 버튼 텍스트 업데이트 (폴더명만)
            folder_name = os.path.basename(folder) if folder else "다운로드"
            self.path_button.config(text=f"📁 저장경로\n({folder_name})")
    
    def validate_url(self, event=None):
        """URL 유효성 검사 및 버튼 활성화"""
        url = self.url_entry.get()
        
        # 플레이스홀더가 아니고 youtube URL이면 버튼 활성화
        if (url and 
            url != "https://www.youtube.com/watch?v=..." and
            ('youtube.com' in url or 'youtu.be' in url)):
            self.video_button.config(state='normal')
            self.audio_button.config(state='normal')
        else:
            self.video_button.config(state='disabled')
            self.audio_button.config(state='disabled')
    
    def start_animation(self):
        """다운로드 애니메이션 시작"""
        self.animation_running = True
        self.animate()
    
    def stop_animation(self):
        """다운로드 애니메이션 중지"""
        self.animation_running = False
        self.animation_label.config(text="")
    
    def animate(self):
        """회전하는 로딩 애니메이션"""
        if not self.animation_running:
            return
        
        # 회전하는 이모지들
        frames = ["⏳", "⌛"]
        self.animation_label.config(text=frames[self.animation_frame % len(frames)])
        self.animation_frame += 1
        
        # 500ms 후 다음 프레임
        self.root.after(500, self.animate)
            
    def progress_hook(self, d):
        if d['status'] == 'downloading':
            try:
                speed = d.get('_speed_str', '')
                percent_str = d.get('_percent_str', '').strip()
                
                # UI 업데이트를 메인 스레드에서 실행
                self.root.after(0, self.update_progress, speed, percent_str)
            except:
                pass
        elif d['status'] == 'finished':
            self.root.after(0, lambda: self.status_label.config(text="파일 처리 중..."))
    
    def update_progress(self, speed, percent_str):
        """진행률 업데이트 (메인 스레드에서 실행)"""
        self.status_label.config(
            text=f"다운로드 중... {speed} | {percent_str}",
            fg='#3b82f6'
        )
            
    def get_unique_filename(self, filepath):
        """파일명이 중복되면 현재 시간을 추가하여 고유한 파일명 생성"""
        if not os.path.exists(filepath):
            return filepath
        
        # 파일명과 확장자 분리
        directory = os.path.dirname(filepath)
        filename = os.path.basename(filepath)
        name, ext = os.path.splitext(filename)
        
        # 현재 시간 (시분초)
        timestamp = datetime.now().strftime("%H%M%S")
        
        # 새 파일명 생성
        new_filename = f"{name}-{timestamp}{ext}"
        new_filepath = os.path.join(directory, new_filename)
        
        return new_filepath
    
    def download_thread(self, url, download_type):
        error_message = None
        
        try:
            # 임시 파일명으로 다운로드
            temp_template = os.path.join(self.download_path, '%(title)s.%(ext)s')
            
            # yt-dlp 옵션 설정
            ydl_opts = {
                'outtmpl': temp_template,
                'progress_hooks': [self.progress_hook],
            }
            
            if download_type == 'audio':
                if self.has_ffmpeg:
                    # FFmpeg가 있으면 MP3로 변환
                    ydl_opts.update({
                        'format': 'bestaudio/best',
                        'postprocessors': [{
                            'key': 'FFmpegExtractAudio',
                            'preferredcodec': 'mp3',
                            'preferredquality': '192',
                        }],
                    })
                else:
                    # FFmpeg가 없으면 원본 오디오만 다운로드
                    ydl_opts['format'] = 'bestaudio/best'
            else:
                # 영상 다운로드 - 음성 포함된 최고 화질
                ydl_opts['format'] = 'bestvideo[ext=mp4]+bestaudio[ext=m4a]/best[ext=mp4]/best'
            
            # 다운로드 실행 및 파일명 가져오기
            with yt_dlp.YoutubeDL(ydl_opts) as ydl:
                info = ydl.extract_info(url, download=True)
                downloaded_file = ydl.prepare_filename(info)
                
                # MP3 변환 시 확장자 변경
                if download_type == 'audio' and self.has_ffmpeg:
                    downloaded_file = os.path.splitext(downloaded_file)[0] + '.mp3'
            
            # 다운로드된 파일이 실제로 존재하는지 확인
            if os.path.exists(downloaded_file):
                # 파일명 중복 체크 및 처리
                original_file = downloaded_file
                unique_file = self.get_unique_filename(downloaded_file)
                
                # 파일명이 변경되었으면 rename
                if original_file != unique_file:
                    os.rename(original_file, unique_file)
                    downloaded_file = unique_file
            
            self.root.after(0, self.download_complete)
            
        except Exception as e:
            error_message = str(e)
            self.root.after(0, lambda msg=error_message: self.download_error(msg))
            
    def download_complete(self):
        self.stop_animation()
        self.video_button.config(state='normal')
        self.audio_button.config(state='normal')
        self.animation_label.config(text="✅")
        self.status_label.config(text="다운로드 완료!", fg='#10b981')
        
        # msg = f"다운로드가 완료되었습니다!\n\n저장 위치:\n{self.download_path}"
        # if not self.has_ffmpeg:
        #     msg += "\n\n※ MP3 변환을 원하시면 FFmpeg를 설치해주세요."
        
        # messagebox.showinfo("완료", msg)
        
        # 상태 초기화
        self.root.after(3000, self.reset_status)
        
    def download_error(self, error_msg):
        self.stop_animation()
        self.video_button.config(state='normal')
        self.audio_button.config(state='normal')
        self.animation_label.config(text="❌")
        self.status_label.config(text="다운로드 실패", fg='#ef4444')
        messagebox.showerror("오류", f"다운로드 중 오류가 발생했습니다:\n\n{error_msg}")
        
        # 상태 초기화
        self.root.after(3000, self.reset_status)
    
    def reset_status(self):
        """상태를 초기화"""
        self.animation_label.config(text="")
        self.status_label.config(text="대기 중...", fg='#64748b')
        
    def start_download(self, download_type):
        url = self.url_entry.get()
        
        # URL 검증
        if not url or url == "https://www.youtube.com/watch?v=...":
            messagebox.showwarning("경고", "YouTube URL을 입력해주세요.")
            return
            
        if 'youtube.com' not in url and 'youtu.be' not in url:
            messagebox.showwarning("경고", "올바른 YouTube URL을 입력해주세요.")
            return
        
        # UI 업데이트
        self.video_button.config(state='disabled')
        self.audio_button.config(state='disabled')
        self.status_label.config(text="다운로드 준비 중...", fg='#475569')
        self.start_animation()
        
        # 다운로드 스레드 시작
        thread = threading.Thread(target=self.download_thread, args=(url, download_type))
        thread.daemon = True
        thread.start()

if __name__ == '__main__':
    root = tk.Tk()
    app = YouTubeDownloader(root)
    root.mainloop()