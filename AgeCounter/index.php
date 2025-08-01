<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>나이 계산기 - 만 나이, 연 나이, 세는 나이 계산</title>
  <meta name="description" content="생년월일을 입력하여 만 나이, 연 나이, 그리고 한국식 세는 나이를 정확하게 계산해주는 온라인 나이 계산기입니다.">
  <meta name="keywords" content="나이 계산기, 만 나이, 연 나이, 세는 나이, 한국식 나이, 나이 계산, 생년월일">
  <meta property="og:title" content="나이 계산기 - 만 나이, 연 나이, 세는 나이 계산">
  <meta property="og:description" content="생년월일을 입력하여 만 나이, 연 나이, 그리고 한국식 세는 나이를 정확하게 계산해주는 온라인 나이 계산기입니다.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://pdnote.com/AgeCounter">
  <meta property="og:image" content="https://pdnote.com/wp-content/uploads/2025/06/나이계산기.png">
  <link rel="canonical" href="https://pdnote.com/AgeCounter">

  <link rel="stylesheet" href="https://9099ms.github.io/tools9/AgeCounter/style.css">

  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8111724804339155" crossorigin="anonymous"></script>
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-H8KNR85G9X"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-H8KNR85G9X');
  </script>
</head>

<body>
  <div class="page-wrapper">

    <div class="layout-row">

        <div class="main-content">
        <div class="container">
          <h1>나이 계산기</h1>
          <form id="ageCalculator">
            <label for="birthdate">생년월일을 입력하세요</label>
            <input id="birthdate" type="text" maxlength="8" pattern="\d{8}" placeholder="YYYYMMDD (예: 20010131)" required />
          </form>
          <button type="button" id="calculateBtn">나이 계산하기</button>
          <div id="result" role="region" aria-live="polite"></div>
        </div>
        <p class="usage-text">
          📜 생년월일을 'YYYYMMDD' 형식으로 입력 후 '나이 계산하기' 버튼을 클릭하세요.<br>
          만 나이, 연 나이, 한국식 세는 나이와 함께 당신의 띠 정보를 바로 확인하실 수 있습니다.
          <br><br>
          <em>* 2023년 6월 28일부터 우리나라에서는 법적으로 '만 나이' 사용이 원칙입니다.</em>
        </p>
      </div>

      
    </div>
 
     <!-- Footer 태그 -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/mytools/_template/footer.php'; ?>
  </div>

  <script>
    document.getElementById("currentYear").textContent = new Date().getFullYear();
  </script>
  <script src="https://9099ms.github.io/tools9/AgeCounter/script.js"></script>
</body>
</html>