<aside id="sidebar-aside" style="display: none; position: fixed; top: 20px; right: 5px; width: 250px; max-height: calc(100vh - 10px); overflow-y: auto; background-color: #f8fafc; padding: 1.5rem; border-left: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); border-radius: 8px; z-index: 1000;">
    <p></p>
    <a href="https://pdnote.com/mytools/nicetools.html" 
        target="_blank" 
        rel="noopener noreferrer"
        style="display: block; width: 95%; background-color: #0c4a6e; color: #ffffff; text-align: center; font-weight: 600; padding-top: 0.75rem; padding-bottom: 0.75rem; padding-left: 1rem; padding-right: 1rem; border-radius: 0.5rem; transition-property: background-color; transition-duration: 150ms; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); margin-bottom: 1.5rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); text-decoration: none; box-sizing: border-box;">
        재밌는 TOOL 더보기
    </a>
    <p style="color: #475569; margin-bottom: 1rem;">호기심을 자극할 기발하고 유용한 도구들이 여기 다 모였어요!</p>
    
    <div style="display: flex; align-items: center; justify-content: center; color: #94a3b8; flex-grow: 1;"> 
        <p>여기에 사이드바 내용이 추가될 수 있습니다.</p>
    </div>
</aside>

<script>
    // Handle sidebar visibility based on screen width
    function toggleSidebarVisibility() {
        const sidebar = document.getElementById('sidebar-aside');
        // Ensure sidebar exists before trying to access its style
        if (sidebar) { 
            // PC 화면 (800px 이상)
            if (window.innerWidth >= 1024) { 
                sidebar.style.display = 'block';
            } else { // 모바일 화면
                sidebar.style.display = 'none';
            }
        }
    }

    // Run the function on page load and whenever the window is resized
    window.addEventListener('load', toggleSidebarVisibility);
    window.addEventListener('resize', toggleSidebarVisibility);
</script>
