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
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3640401342059096"
    crossorigin="anonymous"></script>
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-H8KNR85G9X"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
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
            <input id="birthdate" type="text" maxlength="8" pattern="\d{8}" placeholder="YYYYMMDD (예: 20010131)"
              required />
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

  <!-- Government Benefits Modal -->
  <div id="benefitsModal" class="modal" aria-hidden="true" style="display: none;">
    <div class="modal-content">
      <div class="modal-header">
        <h2>📅 나이별 정부 혜택 및 의무 (만 나이)</h2>
        <span class="close-btn">&times;</span>
      </div>
      <div class="modal-body">
        <div class="notice-box">
          <strong>⚠️ 주의:</strong> 2024-2025년 기준 정보입니다. 만 나이 통일법 시행에도 불구하고 <strong>술/담배 구매(청소년보호법), 병역 의무(병역법), 초등학교
            입학(교육기본법)</strong>은 기존대로 '연 나이' 기준이 적용될 수 있습니다.
        </div>

        <div class="benefit-group">
          <h3>👶 영유아기 (만 0세 ~ 5세)</h3>
          <ul class="benefit-list">
            <li><strong>만 0세:</strong> <span class="benefit-highlight">부모급여 월 100만원</span>, 첫만남이용권 200만원(바우처)</li>
            <li><strong>만 1세:</strong> <span class="benefit-highlight">부모급여 월 50만원</span></li>
            <li><strong>만 0~7세:</strong> 아동수당 월 10만원 (만 8세 생일 전월까지)</li>
          </ul>
        </div>

        <div class="benefit-group">
          <h3>🎒 아동·청소년기 (만 6세 ~ 18세)</h3>
          <ul class="benefit-list">
            <li><strong>만 6세:</strong> 초등학교 입학 (보통 연 나이 기준 적용)</li>
            <li><strong>만 12세:</strong> 촉법소년 상한 기준 (만 10세 이상 ~ 14세 미만)</li>
            <li><strong>만 17세:</strong> <span class="benefit-highlight">주민등록증 발급</span> 신청 기간 시작</li>
            <li><strong>만 18세:</strong>
              <ul>
                <li>선거권 취득 (투표 가능)</li>
                <li>운전면허 취득 가능 (1,2종 보통) *연 나이 X</li>
                <li>군 입영 지원 가능</li>
                <li>아르바이트 및 단독 근로계약 체결 가능</li>
              </ul>
            </li>
          </ul>
        </div>

        <div class="benefit-group">
          <h3>🧑 청년기 (만 19세 ~ 34/39세)</h3>
          <ul class="benefit-list">
            <li><strong>만 19세 (성년):</strong>
              <ul>
                <li>민법상 성인 (모든 법률 행위 단독 가능)</li>
                <li>술·담배 구매 가능 (단, <span class="benefit-highlight">연 나이 19세</span>부터)</li>
              </ul>
            </li>
            <li><strong>만 19~34세:</strong> 청년 월세 특별지원, K-패스(교통비) 청년 혜택</li>
            <li><strong>만 19~39세:</strong> 청년도약계좌 등 금융 지원 대상</li>
          </ul>
        </div>

        <div class="benefit-group">
          <h3>👵 노년기 (만 60세/65세 이상)</h3>
          <ul class="benefit-list">
            <li><strong>만 60세:</strong> 국민연금 임의가입 가능 (수령 개시 연령은 출생연도별 상이, 63~65세)</li>
            <li><strong>만 65세:</strong>
              <ul>
                <li><span class="benefit-highlight">기초연금</span> 수급 대상 (소득하위 70%)</li>
                <li>지하철 무임승차 (경로우대)</li>
                <li>노인 장기요양보험 혜택</li>
                <li>무료 건강검진 및 독감 예방접종</li>
                <li>KTX/SRT 및 항공권(일부) 할인</li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.getElementById("currentYear").textContent = new Date().getFullYear();
  </script>
  <script src="https://9099ms.github.io/tools9/AgeCounter/script.js"></script>
</body>

</html>