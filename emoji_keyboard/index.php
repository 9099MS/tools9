<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3640401342059096"
     crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 1. 기본 SEO 메타태그 -->
    <title>다국어 이모지 키보드 (Emoji Keyboard) - 간편 복사</title>
    <meta name="description" content="쉽고 빠른 온라인 이모지 키보드. 사람, 자연, 음식 등 카테고리별로 원하는 이모지를 찾아 클릭 한 번으로 복사하세요. 한국어, 영어, 일본어 등 다국어를 지원합니다.">
    <meta name="keywords" content="이모지 키보드, 이모티콘 복사, emoji keyboard, emoji copy, 이모지 모음, 그림 이모티콘, 특수문자, online emoji, PDNOTE">
    <link rel="canonical" href="https://pdnote.com/emoji_keyboard">

    <!-- 2. 오픈 그래프(Open Graph) 메타태그 - 페이스북, 카카오톡, 라인 등 -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="다국어 이모지 키보드 (Emoji Keyboard)">
    <meta property="og:description" content="원하는 이모지를 클릭 한 번으로 간편하게 복사하세요! 다국어 지원 온라인 이모지 키보드.">
    <meta property="og:url" content="https://pdnote.com/emoji_keyboard">
    <meta property="og:image" content="https://pdnote.com/wp-content/uploads/2025/07/emoji-key.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="PDNOTE">
    <meta property="og:locale" content="ko_KR">

    <!-- 3. 트위터 카드(Twitter Cards) 메타태그 -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="다국어 이모지 키보드 (Emoji Keyboard)">
    <meta name="twitter:description" content="원하는 이모지를 클릭 한 번으로 간편하게 복사하세요! 다국어 지원 온라인 이모지 키보드.">
    <meta name="twitter:image" content="https://pdnote.com/wp-content/uploads/2025/07/emoji-key.png">
    <meta name="twitter:url" content="https://pdnote.com/emoji_keyboard">

    <!-- ========== SEO & 소셜 미디어 공유 메타태그 끝 ========== -->
    <!-- CSS 가져오기 -->
    <link rel="stylesheet" href="https://9099ms.github.io/tools9/emoji_keyboard/style.css">
    <!-- 구글 태그 (</head> 태그 전에 삽입) -->
    <?php include $_SERVER['DOCUMENT_ROOT'] .'/mytools/_template/google.php'; ?>

</head>
<body>
    <div class="container">
        <div class="header-container">
            <h1 data-i18n-key="title">이모지 키보드</h1>
            <div class="lang-selector-wrapper">
                <select id="lang-selector">
                    <option value="ko">한국어</option>
                    <option value="en">English</option>
                    <option value="ja">日本語</option>
                    <option value="zh">中文</option>
                    <option value="es">Español</option>
                </select>
            </div>
        </div>

        <div class="input-container">
            <input type="text" id="emoji-input" data-i18n-key="placeholder">
            <button id="copy-button" data-i18n-key="copy">Copy</button>
        </div>
        <div class="emoji-category">
            <button class="category-btn" data-category="people" data-i18n-key="category_people">사람</button>
            <button class="category-btn" data-category="nature" data-i18n-key="category_nature">자연</button>
            <button class="category-btn" data-category="food" data-i18n-key="category_food">식품</button>
            <button class="category-btn" data-category="act" data-i18n-key="category_act">활동</button>
            <button class="category-btn" data-category="place" data-i18n-key="category_place">장소</button>
            <button class="category-btn" data-category="object" data-i18n-key="category_object">개체</button>
        </div>
        <div id="emoji-keyboard">
            <!-- Emojis will be dynamically added here -->
        </div> 
        <div>
           <!-- Footer 태그 -->
           <?php include $_SERVER['DOCUMENT_ROOT'] . '/mytools/_template/footer.php'; ?>
        </div>
        
    </div>
   
   
    <!-- JavaScript 가져오기 -->
    <script src="https://9099ms.github.io/tools9/emoji_keyboard/script.js"></script> 

</body>
</html>