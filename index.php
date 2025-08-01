<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 애드센스 코드 -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8111724804339155"  crossorigin="anonymous"></script>

    <!-- SEO 기본 메타태그 -->
    <title>유용한 도구 모음 (Nice Tools Collection) - 계산기, 이모지, 텍스트 도구까지 한 번에!</title>
    <meta name="description" content="계산기, 이모지, 텍스트 및 개발 도구까지 다양한 유용한 기능을 한 곳에서 제공하는 도구 모음 사이트입니다. 필요한 기능을 빠르게 찾아보세요!">
    <meta name="keywords" content="도구 모음, 온라인 계산기, 이모지 복사, 특수문자, 텍스트 도구, 개발툴, 유용한 웹사이트, 무료 웹도구">
    <meta name="author" content="pdnote.com">

    <!-- Open Graph (SNS 공유용) -->
    <meta property="og:title" content="유용한 도구 모음 (Nice Tools Collection)" />
    <meta property="og:description" content="필요한 계산기부터 텍스트, 개발 도구까지 모두 모인 실용적인 웹도구 사이트. 지금 바로 이용해보세요!" />
    <meta property="og:image" content="https://pdnote.com/wp-content/uploads/2025/06/20250626_0028_흥미로운-도구-모음_simple_compose_01jykv5dtbf4qvn1693mwrn1ww.png" />
    <meta property="og:url" content="https://pdnote.com/mytools/nicetools.html" />
    <meta property="og:type" content="website" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="유용한 도구 모음 - 다양한 웹 도구 한 번에!" />
    <meta name="twitter:description" content="텍스트 도구, 계산기, 이모지 모음, 개발 툴까지 모두 한 곳에!" />
    <meta name="twitter:image" content="https://pdnote.com/wp-content/uploads/2025/06/20250626_0028_흥미로운-도구-모음_simple_compose_01jykv5dtbf4qvn1693mwrn1ww.png" />

 
    <style>
        /* 기본 스타일 초기화 및 설정 */
        :root {
            --bg-color: #f4f7f9;
            --card-bg-color: #ffffff;
            --text-color: #333333;
            --title-color: #1a237e;
            --border-color: #e0e0e0;
            --shadow-color: rgba(0, 0, 0, 0.08);
            --hover-shadow-color: rgba(0, 0, 0, 0.15);
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            margin: 0;
            padding: 20px;
        }

        /* 전체 레이아웃 */
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* 헤더 (사이트 제목) */
        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header h1 {
            font-size: 2.5rem;
            color: var(--title-color);
            margin-bottom: 8px;
        }
        .header h1 {
            font-size: 3rem; /* 더 크게 */
            margin-bottom: 10px;
            text-align: center;
            
            /* 텍스트에 그라디언트 적용 */
            background: linear-gradient(90deg, #964ce6 0%, #06193a 100%); /* 왼쪽에서 오른쪽으로 보라색에서 파란색 그라디언트 */
            -webkit-background-clip: text; /* 텍스트 내부에만 배경이 보이도록 */
            background-clip: text;
            color: transparent; /* 텍스트 색상을 투명하게 하여 배경이 보이도록 */
            
            /* 선택 사항: 텍스트에 부드러운 그림자 */
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* 카테고리 섹션 */
        .category-section {
            margin-bottom: 40px;
        }

        .category-section h2 {
            font-size: 1.8rem;
            text-align: left; 
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        /* 도구 카드 그리드 */
        .tool-grid {
            display: grid;
            /* 화면 크기에 맞춰 자동으로 컬럼 수 조절 */
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        /* 개별 도구 카드 */
        .tool-card {
            background-color: var(--card-bg-color);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            padding: 20px;
            text-decoration: none;
            color: inherit;
            display: block;
            box-shadow: 0 4px 6px var(--shadow-color);
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .tool-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px var(--hover-shadow-color);
        }

        .tool-card-header {
            display: flex;
            align-items: center; /* 아이콘과 제목을 세로 중앙 정렬 */
            gap: 12px; /* 아이콘과 제목 사이의 간격 */
            margin-bottom: 15px; /* 헤더와 설명(p) 사이의 간격 */
        }
        
        .tool-card .tool-icon {
            font-size: 2.2rem;
            margin-bottom: 0; /* 기존 여백 제거 */
        }

        .tool-card h3 {
            font-size: 1.2rem;
            margin: 0; /* 기존 여백 제거 */
            color: var(--title-color);
        }
      
        .tool-card p {
            font-size: 0.95rem;
            line-height: 1.5;
            margin: 0;
        }
    </style>
     <!--구글 애널리스틱 태그 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-H8KNR85G9X"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());      
        gtag('config', 'G-H8KNR85G9X');
    </script>

</head>
<body>

    <div class="container">
        <header>       </header>
        <div  class="header">
          <h1 style="text-align: center;"> 유용한 도구 모음 ⚖️</h1> 
          <p> 〰️〰️〰️ </p>
        <div>
        <main>
            <!---------------------------------------------------------------------------------->    
            <section class="category-section">
                <h2>🧮 계산기 모음</h2>
                <div class="tool-grid">
                      <a href="https://pdnote.com/pt_timer" class="tool-card" target="_blank" rel="noopener noreferrer">
                        <div  class="tool-card-header">
                            <div class="tool-icon">🗣️</div>
                            <h3>발표 시간 계산기</h3>
                        </div>
                        <p>대본에 따른 발표 예상시간을 계산<br> (본인의 말하는 속도로 측정 가능)</p>
                    </a>
                    <a href="https://pdnote.com/AgeCounter" class="tool-card" target="_blank" rel="noopener noreferrer">
                        <div class="tool-card-header">
                            <div class="tool-icon">🔄</div>
                            <h3>만 나이 계산기</h3>
                        </div>
                        <p>3가지 나이(만, 연, 세는)를 계산할 수 있는 심플한 나이계산기</p>
                    </a>
                    <a href="https://pdnote.com/TextCounter" class="tool-card" target="_blank" rel="noopener noreferrer">
                        <div class="tool-card-header">
                            <div class="tool-icon">🔢</div>
                            <h3>글자수 세기</h3>
                        </div>
                        <p>공백 포함/제외 글자 수를 실시간으로 계산합니다.</p>
                    </a>
                    <a href="#" class="tool-card" target="_blank" rel="noopener noreferrer">
                        <div class="tool-card-header">
                            <div class="tool-icon">📋</div>
                            <h3>랜덤 텍스트 생성기(준비중)</h3>
                        </div>
                        <p>디자인 목업을 위한 의미 없는 텍스트를 생성합니다.</p>
                    </a>
                    </div>
            </section>
            <!---------------------------------------------------------------------------------->   
            <section class="category-section">
                <h2>📝 텍스트 도구</h2>
                <div class="tool-grid">
                      <a href="https://pdnote.com/emoji" class="tool-card" target="_blank" rel="noopener noreferrer">
                        <div  class="tool-card-header">
                            <div class="tool-icon">⌨️</div>
                            <h3>이모지 키보드</h3>
                        </div>
                        <p>모든 이모지와 특수문자들를 한눈에 확인하고 선택할 수 있습니다.</p>
                      </a>
                      <a href="https://pdnote.com/emoji" class="tool-card" target="_blank" rel="noopener noreferrer">
                        <div  class="tool-card-header">
                            <div class="tool-icon">😊</div>
                            <h3>한눈에 보는 <br>이모지 & 특수문자</h3>
                        </div>
                        <p>모든 이모지와 특수문자들를 한눈에 확인하고 선택할 수 있습니다.</p>
                    </a>
                    <a href="https://pdnote.com/emoji_sense" class="tool-card" target="_blank" rel="noopener noreferrer">
                        <div  class="tool-card-header">
                            <div class="tool-icon">🕺</div>
                            <h3>상황별 이모지 보기</h3>
                        </div>
                        <p>모든 이모지와 특수문자들를 한눈에 확인하고 선택할 수 있습니다.</p>
                    </a>
                    <a href="#" class="tool-card" target="_blank" rel="noopener noreferrer">
                        <div class="tool-card-header">
                            <div class="tool-icon">🔄</div>
                            <h3>맞춤법 검사기(준비중)</h3>
                        </div>
                        <p>글의 맞춤법과 문법 오류를 찾아 수정합니다.</p>
                    </a>
                    <a href="https://pdnote.com/TextCounter" class="tool-card" target="_blank" rel="noopener noreferrer">
                        <div class="tool-card-header">
                            <div class="tool-icon">🔢</div>
                            <h3>글자수 세기</h3>
                        </div>
                        <p>공백 포함/제외 글자 수를 실시간으로 계산합니다.</p>
                    </a>
                    <a href="#" class="tool-card" target="_blank" rel="noopener noreferrer">
                        <div class="tool-card-header">
                            <div class="tool-icon">📋</div>
                            <h3>랜덤 텍스트 생성기(준비중)</h3>
                        </div>
                        <p>디자인 목업을 위한 의미 없는 텍스트를 생성합니다.</p>
                    </a>
                    </div>
            </section>
            <!---------------------------------------------------------------------------------->               
            <section class="category-section">
                <h2>💻 개발 도구</h2>
                <div class="tool-grid">
                    
                    <a href="#" class="tool-card" target="_blank" rel="noopener noreferrer">
                        <div class="tool-card-header">
                            <div class="tool-icon">🎨</div>
                            <h3>컬러 피커(준비중)</h3>
                        </div>
                        <p>원하는 색상의 HEX, RGB 코드를 쉽게 찾습니다.</p>
                    </a>
                    <a href="#" class="tool-card" target="_blank" rel="noopener noreferrer">
                        <div class="tool-card-header">
                            <div class="tool-icon">📦</div>
                            <h3>JSON 포맷터(준비중)</h3>
                        </div>
                        <p>복잡한 JSON 데이터를 보기 좋게 정렬하고 검증합니다.</p>
                    </a>
                    </div>
            </section>
            <!---------------------------------------------------------------------------------->   
            </main>
    </div>
    <!-- Footer 태그 -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/mytools/_template/footer.php'; ?>

    <script> document.getElementById('currentYear').textContent = new Date().getFullYear(); </script>
</body>
</html> 