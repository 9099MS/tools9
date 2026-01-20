import tkinter as tk
from tkinter import ttk, scrolledtext, messagebox, filedialog
import threading
from datetime import datetime, timedelta
import sys
import os
import csv

# youtube.py가 같은 디렉토리에 있다고 가정
try:
    from youtube import YouTubeAnalytics
except ImportError:
    messagebox.showerror("오류", "youtube.py 파일을 찾을 수 없습니다.")
    sys.exit(1)

class YouTubeAnalyticsGUI:
    def __init__(self, root):
        self.root = root
        self.root.title("YouTube 채널 분석 도구")
        self.root.geometry("800x600")
        
        # 스타일 설정
        style = ttk.Style()
        style.configure("TLabel", font=("Malgun Gothic", 10))
        style.configure("TButton", font=("Malgun Gothic", 10))
        
        # 메인 프레임
        main_frame = ttk.Frame(root, padding="20")
        main_frame.pack(fill=tk.BOTH, expand=True)
        
        # 타이틀
        title_label = ttk.Label(main_frame, text="YouTube 채널 영상 통계 분석", font=("Malgun Gothic", 16, "bold"))
        title_label.pack(pady=(0, 20))
        
        # 입력 프레임
        input_frame = ttk.LabelFrame(main_frame, text="분석 기간 설정", padding="15")
        input_frame.pack(fill=tk.X, pady=(0, 20))
        
        # 날짜 기본값
        yesterday = datetime.now() - timedelta(days=1)
        day_before_yesterday = datetime.now() - timedelta(days=2)
        
        # 시작일
        date_frame = ttk.Frame(input_frame)
        date_frame.pack(fill=tk.X, pady=(0, 5))
        
        ttk.Label(date_frame, text="시작일 (YYYY-MM-DD 또는 YYYYMMDD):").pack(side=tk.LEFT, padx=(0, 10))
        self.start_date_var = tk.StringVar(value=day_before_yesterday.strftime("%Y-%m-%d"))
        self.start_entry = ttk.Entry(date_frame, textvariable=self.start_date_var, width=15)
        self.start_entry.pack(side=tk.LEFT, padx=(0, 20))
        
        # 종료일
        ttk.Label(date_frame, text="종료일:").pack(side=tk.LEFT, padx=(0, 10))
        self.end_date_var = tk.StringVar(value=yesterday.strftime("%Y-%m-%d"))
        self.end_entry = ttk.Entry(date_frame, textvariable=self.end_date_var, width=15)
        self.end_entry.pack(side=tk.LEFT)
        
        # 채널 URL
        url_frame = ttk.Frame(input_frame)
        url_frame.pack(fill=tk.X, pady=(5, 5))
        
        ttk.Label(url_frame, text="채널 URL (선택, 비워두면 내 채널):").pack(side=tk.LEFT, padx=(0, 10))
        self.url_var = tk.StringVar()
        self.url_entry = ttk.Entry(url_frame, textvariable=self.url_var, width=50)
        self.url_entry.pack(side=tk.LEFT, fill=tk.X, expand=True)

        # 실행 버튼
        self.run_button = ttk.Button(input_frame, text="분석 시작", command=self.start_analysis)
        self.run_button.pack(pady=(15, 0), anchor=tk.E)
        
        # 결과 탭 (로그/테이블)
        self.notebook = ttk.Notebook(main_frame)
        self.notebook.pack(fill=tk.BOTH, expand=True, pady=(10, 0))
        
        # 탭 1: 테이블
        table_frame = ttk.Frame(self.notebook)
        self.notebook.add(table_frame, text="분석 결과 (표)")
        
        # 하단 버튼 프레임
        btn_frame = ttk.Frame(table_frame, padding=5)
        btn_frame.pack(side=tk.BOTTOM, fill=tk.X)
        
        ttk.Button(btn_frame, text="CSV로 저장", command=self.save_to_file).pack(side=tk.RIGHT)
        ttk.Label(btn_frame, text="* 항목 선택 후 Ctrl+C 로 복사 가능").pack(side=tk.LEFT)
        
        # Treeview 컨테이너
        tree_frame = ttk.Frame(table_frame)
        tree_frame.pack(side=tk.TOP, fill=tk.BOTH, expand=True)
        
        # Treeview
        columns = ('rank', 'title', 'date', 'views', 'watch_time', 'avg_view_dur', 'avg_view_pct')
        self.tree = ttk.Treeview(tree_frame, columns=columns, show='headings')
        
        self.tree.heading('rank', text='순번')
        self.tree.heading('title', text='영상 제목')
        self.tree.heading('date', text='게시일')
        self.tree.heading('views', text='조회수')
        self.tree.heading('watch_time', text='시청시간(분)')
        self.tree.heading('avg_view_dur', text='평균시청지속시간')
        self.tree.heading('avg_view_pct', text='평균시청율(%)')
        
        self.tree.column('rank', width=40, anchor='center')
        self.tree.column('title', width=300)
        self.tree.column('date', width=90, anchor='center')
        self.tree.column('views', width=70, anchor='e')
        self.tree.column('watch_time', width=90, anchor='e')
        self.tree.column('avg_view_dur', width=80, anchor='e')
        self.tree.column('avg_view_pct', width=80, anchor='e')
        
        scrollbar = ttk.Scrollbar(tree_frame, orient=tk.VERTICAL, command=self.tree.yview)
        self.tree.configure(yscroll=scrollbar.set)
        
        self.tree.pack(side=tk.LEFT, fill=tk.BOTH, expand=True)
        scrollbar.pack(side=tk.RIGHT, fill=tk.Y)
        
        # 이벤트 바인딩 (복사)
        self.tree.bind('<Control-c>', self.copy_selection)
        
        # 탭 2: 로그
        log_frame = ttk.Frame(self.notebook)
        self.notebook.add(log_frame, text="실행 로그")
        
        self.log_area = scrolledtext.ScrolledText(log_frame, state='disabled', font=("Consolas", 10))
        self.log_area.pack(fill=tk.BOTH, expand=True)
        
        # 하단 상태바
        self.status_var = tk.StringVar(value="준비됨")
        self.status_bar = ttk.Label(root, textvariable=self.status_var, relief=tk.SUNKEN, anchor=tk.W, padding=(5, 2))
        self.status_bar.pack(side=tk.BOTTOM, fill=tk.X)
        
        # 분석기 인스턴스
        self.analytics = None

    def log(self, message):
        """로그 영역에 메시지 출력"""
        def _append():
            self.log_area.configure(state='normal')
            self.log_area.insert(tk.END, message + "\n")
            self.log_area.see(tk.END)
            self.log_area.configure(state='disabled')
        
        self.root.after(0, _append)

    def parse_date(self, date_str):
        """다양한 날짜 형식 처리"""
        formats = ['%Y-%m-%d', '%Y%m%d', '%Y/%m/%d', '%Y.%m.%d']
        for fmt in formats:
            try:
                return datetime.strptime(date_str, fmt)
            except ValueError:
                continue
        raise ValueError("Unknown date format")

    def start_analysis(self):
        """분석 시작"""
        start_str = self.start_date_var.get().strip()
        end_str = self.end_date_var.get().strip()
        channel_url = self.url_var.get().strip()
        
        try:
            start_date = self.parse_date(start_str)
            end_date = self.parse_date(end_str)
            
            if end_date < start_date:
                messagebox.showerror("오류", "종료일은 시작일보다 늦어야 합니다.")
                return
            
            self.toggle_inputs(False)
            self.status_var.set("분석 중...")
            
            # 로그 초기화
            self.log_area.configure(state='normal')
            self.log_area.delete(1.0, tk.END)
            self.log_area.configure(state='disabled')
            
            # 테이블 초기화
            for item in self.tree.get_children():
                self.tree.delete(item)
            
            # 탭 전환 (로그 탭으로 먼저 보여줌)
            self.notebook.select(1)
            
            # 스레딩으로 실행
            thread = threading.Thread(target=self.run_analysis_thread, args=(start_date, end_date, channel_url))
            thread.daemon = True
            thread.start()
            
        except ValueError:
            messagebox.showerror("오류", "날짜 형식이 올바르지 않습니다.\n예: 2025-01-01 또는 20250101")

    def run_analysis_thread(self, start_date, end_date, channel_url):
        try:
            if not self.analytics:
                self.log("인증을 시작합니다...")
                self.analytics = YouTubeAnalytics(logger=self.log)
                self.analytics.authenticate()
            
            results = self.analytics.analyze_period(start_date, end_date, channel_url)
            self.results = results  # 결과 저장
            
            # 결과 테이블에 추가 (메인 스레드에서 실행)
            self.root.after(0, lambda: self.update_table(results))
            
            self.status_var.set("분석 완료")
            messagebox.showinfo("완료", "분석이 완료되었습니다.")
            
        except Exception as e:
            self.log(f"\n[오류 발생] {str(e)}")
            self.status_var.set("오류 발생")
            messagebox.showerror("오류", f"실행 중 오류가 발생했습니다:\n{str(e)}")
            
        finally:
            self.root.after(0, lambda: self.toggle_inputs(True))
            
    def update_table(self, results):
        """결과를 테이블에 표시"""
        if not results:
            return
            
        for idx, video in enumerate(results, 1):
            # 초를 분:초로 변환
            dur = int(video.get('avg_view_duration', 0))
            dur_str = f"{dur//60}:{dur%60:02d}"
            
            self.tree.insert('', 'end', values=(
                idx,
                video['title'],
                video['published_at'][:10],
                f"{video['views']:,}",
                f"{video['watch_time_minutes']:,.1f}",
                dur_str,
                f"{video['avg_view_percentage']:.1f}%"
            ))
        
        # 테이블 탭으로 전환
        self.notebook.select(0)

    def toggle_inputs(self, enable):
        state = 'normal' if enable else 'disabled'
        self.start_entry.configure(state=state)
        self.end_entry.configure(state=state)
        self.url_entry.configure(state=state)
        self.run_button.configure(state=state)

    def copy_selection(self, event=None):
        """선택한 항목 클립보드 복사"""
        selected_items = self.tree.selection()
        if not selected_items:
            return
            
        data = []
        for item in selected_items:
            values = self.tree.item(item)['values']
            data.append("\t".join(map(str, values)))
            
        text = "\n".join(data)
        self.root.clipboard_clear()
        self.root.clipboard_append(text)
        self.status_var.set(f"{len(selected_items)}개 항목 복사됨")

    def save_to_file(self):
        """CSV 파일로 저장"""
        if not hasattr(self, 'results') or not self.results:
             messagebox.showwarning("알림", "저장할 결과가 없습니다.")
             return
             
        filename = filedialog.asksaveasfilename(
            defaultextension=".csv",
            filetypes=[("CSV file", "*.csv"), ("All files", "*.*")]
        )
        if not filename:
            return
            
        try:
            with open(filename, 'w', newline='', encoding='utf-8-sig') as f:
                writer = csv.writer(f)
                # 헤더
                headers = ['순번', '영상 제목', '게시일', '조회수', '시청시간(분)', '평균시청시간', '평균시청률(%)']
                writer.writerow(headers)
                
                # 데이터
                for idx, video in enumerate(self.results, 1):
                    dur = int(video.get('avg_view_duration', 0))
                    dur_str = f"{dur//60}:{dur%60:02d}"
                    writer.writerow([
                        idx,
                        video['title'],
                        video['published_at'][:10],
                        video['views'],
                        video['watch_time_minutes'],
                        dur_str,
                        video['avg_view_percentage']
                    ])
            
            messagebox.showinfo("완료", "파일이 저장되었습니다.")
        except Exception as e:
            messagebox.showerror("오류", f"저장 중 오류가 발생했습니다: {str(e)}")

def main():
    root = tk.Tk()
    app = YouTubeAnalyticsGUI(root)
    root.mainloop()

if __name__ == "__main__":
    main()
