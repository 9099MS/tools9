<!DOCTYPE html>
<html lang="ko">
<head>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3640401342059096"
     crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>내로남불 테스트 - 나의 이중잣대 성향은?</title>
    <!-- SEO (검색엔진 최적화)를 위한 기본 메타 태그 -->
    <meta name="description" content="나는 얼마나 이중잣대를 가지고 있을까? 7개의 재치있는 질문으로 당신의 내로남불 지수를 확인해보세요! 내가 하면 로맨스, 남이 하면 불륜? 지금 바로 나의 성향을 알아보세요.">
    <meta name="keywords" content="내로남불 테스트, 이중잣대 테스트, 심리테스트, 성향테스트, 재미있는 테스트, 인성테스트, MBTI">
    <meta name="author" content="pdnote.com">
    <link rel="canonical" href="https://pdnote.com/mytools/%EB%82%B4%EB%A1%9C%EB%82%A8%EB%B6%88/">

    <!-- Open Graph (페이스북, 카카오톡 등 소셜 미디어 공유) 메타 태그 -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="내로남불 테스트 - 나의 이중잣대 성향은?">
    <meta property="og:description" content="나는 얼마나 이중잣대를 가지고 있을까? 7개의 재치있는 질문으로 당신의 내로남불 지수를 확인해보세요!">
    <meta property="og:image" content="https://pdnote.com/wp-content/uploads/2025/08/check1.png">
    <meta property="og:url" content="https://pdnote.com/mytools/%EB%82%B4%EB%A1%9C%EB%82%A8%EB%B6%88/">
    <meta property="og:site_name" content="내로남불 테스트">

    <!-- Twitter 카드 메타 태그 -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="내로남불 테스트 - 나의 이중잣대 성향은?">
    <meta name="twitter:description" content="나는 얼마나 이중잣대를 가지고 있을까? 7개의 재치있는 질문으로 당신의 내로남불 지수를 확인해보세요!">
    <meta name="twitter:image" content="https://pdnote.com/wp-content/uploads/2025/08/check1.png">
    
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://pdnote.com/mytools/내로남불/css/style.css">
    
</head>
<body>
    <div class="container">
        <!-- 메인 화면 -->
        <div id="main-screen" class="screen active">
            <header class="header">
                <h1><i class="fas fa-balance-scale"></i> 내로남불 테스트</h1>
                <p class="subtitle">나는 얼마나 이중잣대를 가지고 있을까?</p>
                
            </header>
            
            <div class="intro-content">
                <div class="emoji">🤔</div>                
                <h2>내로남불이란?</h2>
                <p>
                    <strong>'내가 하면 로맨스, 남이 하면 불륜'</strong>의 줄임말로,<br>
                    같은 행동이라도 자신이 할 때와 남이 할 때 다른 잣대로 판단하는 성향을 말합니다.
                </p>
                
                <div class="test-info">
                    <div class="info-item">
                        <i class="fas fa-question-circle"></i>
                        <span>총 7개의 재치있는 질문</span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-clock"></i>
                        <span>약 2-3분 소요</span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-chart-pie"></i>
                        <span>6가지 결과 타입</span>
                    </div>
                </div>
                
                <button class="start-btn" onclick="startTest()">
                    <i class="fas fa-play"></i>
                    테스트 시작하기
                </button>
            </div>
            <p></p>
            <div class="intro-image">
                         <img src="https://pdnote.com/wp-content/uploads/2025/08/check1.png" alt="내로남불">
                </div>
        </div>

        <!-- 테스트 화면 -->
        <div id="test-screen" class="screen">
            <div class="progress-container">
                <div class="progress-bar">
                    <div class="progress-fill" id="progress-fill"></div>
                </div>
                <span class="progress-text" id="progress-text">1/7</span>
            </div>

            <div class="question-container">
                <div class="question-number" id="question-number">Q1.</div>
                <h2 class="question-text" id="question-text"></h2>
                
                <div class="scenario-container" id="scenario-container">
                    <div class="scenario">
                        <h3>상황 A: 내가 할 때</h3>
                        <p id="scenario-a"></p>
                        <div class="options" id="options-a">
                            <button class="option-btn" onclick="selectOption('a', 1)">전혀 문제없다</button>
                            <button class="option-btn" onclick="selectOption('a', 2)">괜찮다</button>
                            <button class="option-btn" onclick="selectOption('a', 3)">약간 문제가 있다</button>
                            <button class="option-btn" onclick="selectOption('a', 4)">매우 문제가 있다</button>
                        </div>
                    </div>
                    
                    <div class="scenario">
                        <h3>상황 B: 남이 할 때</h3>
                        <p id="scenario-b"></p>
                        <div class="options" id="options-b">
                            <button class="option-btn" onclick="selectOption('b', 1)">전혀 문제없다</button>
                            <button class="option-btn" onclick="selectOption('b', 2)">괜찮다</button>
                            <button class="option-btn" onclick="selectOption('b', 3)">약간 문제가 있다</button>
                            <button class="option-btn" onclick="selectOption('b', 4)">매우 문제가 있다</button>
                        </div>
                    </div>
                </div>

                <button class="next-btn" id="next-btn" onclick="nextQuestion()" disabled>
                    다음 질문 <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>

        <!-- 결과 화면 -->
        <div id="result-screen" class="screen">
            <div class="result-container">
                <div class="result-header">
                    <div class="result-emoji" id="result-emoji"></div>
                    <h2 class="result-title" id="result-title"></h2>
                    <div class="result-score">
                        내로남불 지수: <span id="result-score"></span>%
                    </div>
                </div>

                <div class="result-description" id="result-description"></div>

                <div class="result-details">
                    <h3><i class="fas fa-chart-bar"></i> 상세 분석</h3>
                    <div class="detail-item">
                        <span>이중잣대 성향:</span>
                        <div class="bar">
                            <div class="bar-fill" id="hypocrisy-bar"></div>
                        </div>
                        <span id="hypocrisy-score"></span>
                    </div>
                    <div class="detail-item">
                        <span>자기합리화 정도:</span>
                        <div class="bar">
                            <div class="bar-fill" id="rationalization-bar"></div>
                        </div>
                        <span id="rationalization-score"></span>
                    </div>
                    <div class="detail-item">
                        <span>타인 관대성:</span>
                        <div class="bar">
                            <div class="bar-fill" id="tolerance-bar"></div>
                        </div>
                        <span id="tolerance-score"></span>
                    </div>
                </div>

                <div class="action-buttons">
                    <button class="retry-btn" onclick="restartTest()">
                        <i class="fas fa-redo"></i>
                        다시 테스트하기
                    </button>
                    <button class="share-btn" onclick="shareResult()">
                        <i class="fas fa-share"></i>
                        결과 공유하기
                    </button>
                    <button class="share-btn" onclick="showAllTypes()">
                        <i class="fas fa-list-ul"></i>
                        모든 유형 보기
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- 모든 유형 보기 모달 -->
    <div id="all-types-modal" class="modal-container">
        <div class="modal-content">
            <span class="modal-close" onclick="closeModal()">&times;</span>
            <h2><i class="fas fa-users"></i> 모든 결과 유형</h2>
            <div id="all-types-list"></div>
        </div>
    </div>

    <!-- Footer 태그 -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/mytools/_template/footer.php'; ?>

    <script src="https://pdnote.com/mytools/내로남불/js/questions.js"></script>
    <script src="https://pdnote.com/mytools/내로남불/js/main.js"></script>
</body>
</html>