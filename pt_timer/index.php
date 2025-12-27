<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- 애드센스 코드 --------------------------->
  <!-- Google AdSense Anchor Ad Placeholder -->
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3640401342059096"
    crossorigin="anonymous"></script>

  <!-- SEO Meta Tags -->
  <title>발표 시간 계산기 | 스크립트 기반 예상 시간 측정</title>
  <meta name="description" content="스크립트 길이와 평균 말하기 속도를 기반으로 예상 발표 시간을 계산합니다. 개인의 말하기 속도에 맞춰 시간을 보정하는 기능도 포함되어 있습니다.">
  <meta name="keywords" content="발표 시간, 프레젠테이션 시간, 스피치 시간 계산기, 대본 시간 측정, 말하기 속도, 발표 준비, 시간 관리, 스크립트 분석">
  <meta name="author" content="발표 시간 계산기">
  <meta name="robots" content="index, follow">
  <link rel="canonical" href="https://pdnote.com/pt_timer/">
  <!-- Open Graph Meta Tags (for social sharing) -->
  <meta property="og:title" content="발표 시간 계산기 | 정확한 예상 시간 측정">
  <meta property="og:description" content="발표 대본을 입력하고 예상 발표 시간을 확인하세요. 개인별 말하기 속도 측정으로 더 정확한 시간 예측이 가능합니다.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="hhttps://pdnote.com/pt_timer/">
  <meta property="og:image"
    content="https://pdnote.com/wp-content/uploads/2025/06/20250622_1837_발표시간-썸네일_simple_compose_01jybfxwmyfd29g1hs51thexke.png">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:site_name" content="발표 시간 계산기">
  <meta property="og:locale" content="ko_KR">

  <!-- Twitter Card Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="발표 시간 계산기 | 스크립트 기반 예상 시간 측정">
  <meta name="twitter:description" content="발표 대본을 입력하고 예상 발표 시간을 확인하세요. 개인별 말하기 속도 측정으로 더 정확한 시간 예측이 가능합니다.">
  <meta name="twitter:image"
    content="https://pdnote.com/wp-content/uploads/2025/06/20250622_1837_발표시간-썸네일_simple_compose_01jybfxwmyfd29g1hs51thexke.png">
  <!-- <meta name="twitter:site" content="@yourtwitterhandle"> --> <!-- 트위터 핸들이 있다면 추가하세요 -->

  <!-- Favicon -->

  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://9099ms.github.io/tools9/pt_timer/style.css">

  <!--구글 애널리스틱 태그 -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-H8KNR85G9X"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());
    gtag('config', 'G-H8KNR85G9X');
  </script>

  <!--구글 애널리스틱 태그 end------------------------>

</head>

<body class="bg-slate-100">
  <div class="flex flex-col lg:flex-row min-h-screen">
    <!-- Main Content Area -->
    <div class="flex-grow lg:w-3/4 py-8 px-4 flex flex-col items-center">
      <div class="w-full max-w-3xl">

        <header class="mb-10 text-center">
          <h1 class="text-4xl font-bold text-sky-700">🗣 발표 시간 계산기</h1>
          <p class="text-slate-600 mt-2">발표 대본을 입력하고 예상 발표시간을 확인하세요. 실제 말하는 속도를 측정하여 계산해 볼 수도 있어요</p>
        </header>

        <main class="space-y-8">
          <section class="bg-white p-6 sm:p-8 rounded-xl shadow-lg">
            <h2 class="text-2xl font-semibold text-slate-800 mb-4">발표 대본 입력</h2>
            <textarea id="mainScriptTextarea" rows="10"
              class="w-full p-4 border border-slate-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition-shadow resize-y"
              placeholder="여기에 발표 대본을 붙여넣으세요..." aria-label="발표 대본 입력창"></textarea>
            <div class="mt-4 bg-slate-50 p-4 rounded-lg">
              <div class="flex flex-col sm:flex-row sm:justify-around space-y-1 sm:space-y-0 text-sm text-slate-600">
                <div class="text-center sm:text-left sm:flex-1 py-1">
                  <span>단어 수: <span id="wordCount" class="font-semibold text-slate-800">0</span></span>
                </div>
                <hr class="sm:hidden border-slate-200 my-1 mx-4" />
                <div class="text-center sm:text-left sm:flex-1 py-1 sm:pl-4 sm:border-l sm:border-slate-300">
                  <span>총 글자 수 (공백 포함): <span id="charCount" class="font-semibold text-slate-800">0</span></span>
                </div>
                <hr class="sm:hidden border-slate-200 my-1 mx-4" />
                <div class="text-center sm:text-left sm:flex-1 py-1 sm:pl-4 sm:border-l sm:border-slate-300">
                  <span>글자 수 (공백 제외): <span id="charCountNoSpace" class="font-semibold text-slate-800">0</span></span>
                </div>
              </div>
            </div>
          </section>

          <section class="bg-white p-6 sm:p-8 rounded-xl shadow-lg">
            <h2 class="text-2xl font-semibold text-slate-800 mb-1">예상 발표 시간</h2>
            <p id="defaultCpmInfo" class="text-sm text-slate-500 mb-4"></p>
            <div class="text-center bg-sky-50 p-6 rounded-lg mb-6">
              <p id="estimatedTimeNormal" class="text-5xl font-bold text-sky-600 tracking-tight">00분 00.0초</p>
            </div>

            <div id="personalizedTimeSection" class="hidden mt-6 border-t pt-6 border-slate-200">
              <div class="flex justify-between items-center mb-1">
                <h3 class="text-xl font-semibold text-slate-700">내 속도로 계산된 시간</h3>
                <span id="userCpmBadge"
                  class="text-xs bg-green-100 text-green-700 font-medium px-2 py-1 rounded-full"></span>
              </div>
              <p class="text-sm text-slate-500 mb-4">(측정된 개인 맞춤 속도 기준)</p>
              <div class="text-center bg-green-50 p-6 rounded-lg">
                <p id="estimatedTimePersonalized" class="text-5xl font-bold text-green-600 tracking-tight">00분 00.0초</p>
              </div>
            </div>

            <button id="openModalButton"
              class="mt-8 w-full bg-teal-500 hover:bg-teal-600 text-white font-semibold py-3 px-6 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 flex items-center justify-center space-x-2"
              aria-label="내 말하기 속도로 발표 시간 계산하기 기능 열기">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                stroke="currentColor" class="w-5 h-5" aria-hidden="true">
                <path strokeLinecap="round" strokeLinejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span>내 말하기 속도로 발표 시간 계산하기</span>
            </button>

            <button id="openTipsModalButton"
              class="mt-4 w-full bg-slate-500 hover:bg-slate-600 text-white font-semibold py-3 px-6 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 flex items-center justify-center space-x-2"
              aria-label="발표 팁 보기">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                stroke="currentColor" class="w-5 h-5" aria-hidden="true">
                <path strokeLinecap="round" strokeLinejoin="round"
                  d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
              </svg>
              <span>발표 팁(말하기 속도 조절 방법)</span>
            </button>
          </section>
        </main>

        <!-- Footer 태그 -->
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/mytools/_template/footer.php'; ?>

      </div>
    </div>
    <!-- Ad Sidebar -->
    <aside
      class="hidden lg:block lg:w-1/4 bg-slate-50 p-6 sticky top-0 h-screen overflow-y-auto border-l border-slate-200">
      <p> </p>
      <a href="https://pdnote.com/mytools/nicetools.html" target="_blank" rel="noopener noreferrer"
        class="block w-full bg-sky-800 hover:bg-sky-500 text-white text-center font-semibold py-3 px-4 rounded-lg transition-colors mb-6 shadow-md">
        재밌는 TOOL 더보기
      </a>
      <p class="text-slate-600 mb-4">발표 시간 계산기와 함께 사용할 수 있는 유용한 도구들입니다.</p>
      <div class="ad-placeholder h-full flex items-center justify-center text-slate-400">
        <!-- 세로형 광고 (예: AdSense) 영역 -->
        <p></p>
        <!-- 디스플(수직) 
        <ins class="adsbygoogle"
            style="display:block"
            data-ad-client="ca-pub-8111724804339155"
            data-ad-slot="8603943352"
            data-ad-format="auto"
            data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({}); 
        </script>
        <p></p>
       -->
      </div>
    </aside>
  </div>

  <!-- Modal -->
  <div id="rateCalculatorModal"
    class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 p-4 hidden" role="dialog"
    aria-modal="true" aria-labelledby="modalTitle">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-lg max-h-[90vh] flex flex-col overflow-hidden">
      <div class="flex justify-between items-center p-6 border-b border-slate-200">
        <h2 id="modalTitle" class="text-2xl font-semibold text-slate-800">내 말하기 속도 측정</h2>
        <button id="closeModalButton"
          class="text-slate-500 hover:text-slate-700 transition-colors p-1 rounded-full hover:bg-slate-100"
          aria-label="모달 닫기">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
            stroke="currentColor" class="w-7 h-7" aria-hidden="true">
            <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="p-6 overflow-y-auto">
        <div class="space-y-6">
          <p class="text-slate-600">
            아래 대본을 실제 발표하듯이 읽어보세요.<br>시작(start) 클릭 후 읽기 시작, 완료 후 종료 버튼 클릭
          </p>

          <textarea id="sampleScriptTextarea" rows="5"
            class="w-full p-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition-shadow resize-y"
            placeholder="측정용 대본을 입력하세요..." aria-label="말하기 속도 측정을 위한 샘플 대본 입력창"></textarea>

          <div
            class="flex flex-col space-y-1 sm:flex-row sm:space-y-0 sm:justify-between items-start sm:items-center text-sm text-slate-500 bg-slate-50 p-3 rounded-md">
            <span>단어 수: <span id="sampleWordCount" class="font-semibold text-slate-700">0</span></span>
            <span>글자 수 (공백포함): <span id="sampleCharCount" class="font-semibold text-slate-700">0</span></span>
            <span>글자 수 (공백제외): <span id="sampleCharCountNoSpace" class="font-semibold text-slate-700">0</span></span>
          </div>

          <div class="text-center my-4 p-4 bg-sky-50 rounded-lg">
            <p class="text-sm text-sky-700">측정 시간</p>
            <p id="timerDisplay" class="text-5xl font-bold text-sky-600 tracking-tight" aria-live="polite">00분 00.0초</p>
          </div>

          <div class="flex space-x-4">
            <button id="startButton"
              class="flex-1 bg-sky-500 hover:bg-sky-600 text-white font-semibold py-3 px-6 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed">
              시작 (Start)
            </button>
            <button id="endButton"
              class="flex-1 bg-red-500 hover:bg-red-600 text-white font-semibold py-3 px-6 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 hidden">
              종료 (End)
            </button>
          </div>
          <p class="text-xs text-slate-500 text-center">종료 버튼을 누르면 이 창이 닫히고, 측정된 속도로 발표 시간이 재계산됩니다.</p>
        </div>
      </div>
    </div>
  </div>


  <!-- Tips Modal -->
  <div id="tipsModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 p-4 hidden"
    role="dialog" aria-modal="true" aria-labelledby="tipsModalTitle">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl max-h-[90vh] flex flex-col overflow-hidden">
      <div class="flex justify-between items-center p-6 border-b border-slate-200">
        <h2 id="tipsModalTitle" class="text-2xl font-semibold text-slate-800">💡 발표 팁 & 말하기 속도 조절 가이드</h2>
        <button id="closeTipsModalButton"
          class="text-slate-500 hover:text-slate-700 transition-colors p-1 rounded-full hover:bg-slate-100"
          aria-label="팁 모달 닫기">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
            stroke="currentColor" class="w-7 h-7" aria-hidden="true">
            <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="p-8 overflow-y-auto text-slate-700 leading-relaxed space-y-4">
        <p class="font-medium text-lg">성공적인 발표를 위한 말하기 속도와 리듬</p>
        <p>
          청중에게 신뢰감을 주고 내용을 명확히 전달하기 위해서는 적절한 말하기 속도가 필수적입니다.
          일반적으로 뉴스 아나운서의 속도인 <strong>분당 330~350자(공백 제외)</strong> 정도가 가장 듣기 편안하다고 알려져 있습니다.
        </p>

        <h3 class="text-lg font-bold text-slate-800 mt-4">1. 속도 조절이 필요한 이유</h3>
        <p>
          말이 너무 빠르면 청중이 정보를 처리할 시간을 놓치게 되고, 너무 느르면 지루함을 느껴 집중력이 떨어집니다.
          자신의 평소 말하기 속도를 인지하고, 상황에 맞게 조절하는 능력이 필요합니다.
        </p>

        <h3 class="text-lg font-bold text-slate-800 mt-4">2. 실전 속도 조절 테크닉</h3>
        <ul class="list-disc pl-5 space-y-2">
          <li><strong>'휴지(Pause)'의 미학:</strong> 문장이 끝날 때, 혹은 중요한 핵심 단어를 말하기 직전에 잠깐 멈추세요. 이 짧은 침묵은 청중의 주의를 집중시키는 강력한 무기가
            됩니다.</li>
          <li><strong>완급 조절 (Modulation):</strong> 모든 문장을 똑같은 속도로 말하면 단조롭습니다. 핵심 메시지는 <em>천천히 그리고 강하게</em>, 부연 설명이나 예시는
            <em>조금 가볍고 빠르게</em> 말하여 리듬감을 만드세요.</li>
          <li><strong>호흡 조절:</strong> 긴장하면 호흡이 얕아지고 말이 빨라집니다. 발표 전 복식 호흡을 통해 마음을 가라앉히고, 문장 사이사이 충분히 숨을 쉬세요.</li>
        </ul>

        <h3 class="text-lg font-bold text-slate-800 mt-4">3. 연습 방법</h3>
        <p>
          가장 좋은 방법은 자신의 목소리를 <strong>녹음해서 듣는 것</strong>입니다.
          내가 생각하는 속도와 실제 들리는 속도는 차이가 큽니다. 녹음된 내용을 들으며 발음이 뭉개지는 구간이나 너무 빠른 구간을 체크해보세요.
          대본에 '/' 표시를 하여 끊어 읽을 곳을 미리 시각시각화해두는 것도 큰 도움이 됩니다.
        </p>

        <div class="bg-amber-50 border-l-4 border-amber-400 p-4 mt-6">
          <p class="text-sm text-amber-800">
            <strong>Tip:</strong> 발표는 혼잣말이 아닌 '대화'입니다. 청중 한 명 한 명과 눈을 맞추며 이야기한다고 상상해보세요. 자연스럽게 상대방이 이해할 수 있는 속도로 맞춰지게 될
            것입니다.
          </p>
        </div>
      </div>
      <div class="p-6 border-t border-slate-200 bg-slate-50 text-right">
        <button id="closeTipsModalFooterButton"
          class="bg-slate-600 hover:bg-slate-700 text-white font-semibold py-2 px-6 rounded-lg transition-colors">
          닫기
        </button>
      </div>
    </div>
  </div>

  <script src="https://9099ms.github.io/tools9/pt_timer/script.js"></script>

</body>

</html>