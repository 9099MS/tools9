<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3640401342059096"
     crossorigin="anonymous"></script>
     
    <title>MBTI 유형 알아보기 (문항 선택)</title>
    <!-- SEO & 소셜 미디어 공유 태그 -->
    <meta name="description" content="원하는 검사 길이를 선택하여 당신의 MBTI 유형을 알아보세요! 지금 바로 시작해보세요.">
    <meta name="keywords" content="MBTI, MBTI 테스트, 성격유형검사, 심리테스트, MBTI 정식, MBTI 약식검사">
    <meta property="og:title" content="MBTI 유형 알아보기 (문항 선택)">
    <meta property="og:description" content="원하는 검사 길이를 선택하여 당신의 MBTI 유형을 알아보세요!">
    <meta property="og:image" content="https://pdnote.com/wp-content/uploads/2025/10/ChatGPT-Image-2025년-10월-26일-오후-11_14_43.png"> <!-- 예시 이미지 URL -->
    <meta name="twitter:card" content="summary_large_image">
    
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #5a67d8;
            --secondary-color: #f6ad55;
            --bg-color: #f7fafc;
            --text-color: #2d3748;
            --light-gray: #e2e8f0;
            --white: #ffffff;
            --card-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        
        /* [수정] body 스타일에서 레이아웃 관련 속성을 모두 제거하고 기본 스타일만 남깁니다. */
        body { 
            font-family: 'Noto Sans KR', sans-serif; 
            background-color: var(--bg-color); 
            color: var(--text-color); 
            margin: 0; 
        }

        /* [추가] 새로 만든 wrapper에 중앙 정렬 스타일을 적용합니다. */
        #app-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            box-sizing: border-box;
        }

        /* [수정] .container에 width: 100%를 추가하여 wrapper 내부에서 꽉 차도록 하고, max-width로 크기를 제한합니다. */
        .container {
            width: 100%;
            max-width: 500px; 
            background-color: var(--white); 
            border-radius: 16px; 
            box-shadow: var(--card-shadow); 
            overflow: hidden; 
            position: relative; 
        }

        .screen { display: none; padding: 30px; box-sizing: border-box; animation: fadeIn 0.5s ease-in-out; }
        .screen.active { display: block; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        .header { text-align: center; margin-bottom: 25px; }
        .header h1 { font-size: 28px; color: var(--primary-color); margin: 0 0 10px; }
        .header .subtitle { font-size: 16px; color: #718096; }
        .start-btn, .option-btn, .action-buttons button, .details-btn { width: 100%; padding: 15px; font-size: 18px; font-weight: 500; border-radius: 12px; border: none; cursor: pointer; transition: all 0.2s ease-in-out; display: flex; justify-content: center; align-items: center; gap: 10px; text-decoration: none; box-sizing: border-box; }
        .start-btn { background-color: var(--primary-color); color: var(--white); margin-top: 30px; }
        .start-btn:hover { background-color: #4c51bf; transform: translateY(-2px); }
        .intro-content { text-align: center; }
        .emoji { font-size: 60px; }
        .intro-image {    margin-bottom: 25px;    text-align: center; }
        .intro-image img {    max-width: 100%;    height: auto;   border-radius: 12px; display: block;margin: 0 auto; }
        .selector-title { font-size: 18px; font-weight: 500; color: #4a5568; margin: 30px 0 15px; }
        .question-count-selector { display: flex; justify-content: center; gap: 10px; }
        .question-count-selector input[type="radio"] { display: none; }
        .question-count-selector label {
            padding: 10px 20px;
            border: 2px solid var(--light-gray);
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.2s;
            font-weight: 500;
        }
        .question-count-selector input[type="radio"]:checked + label {
            background-color: var(--primary-color);
            color: var(--white);
            border-color: var(--primary-color);
        }
        .question-count-selector label:hover {
            border-color: #a0aec0;
        }
        .progress-container { margin-bottom: 30px; }
        .progress-bar { background-color: var(--light-gray); border-radius: 10px; height: 10px; overflow: hidden; }
        .progress-fill { width: 0%; height: 100%; background: linear-gradient(90deg, var(--primary-color), #63b3ed); transition: width 0.3s ease; }
        .progress-text { text-align: center; margin-top: 8px; font-size: 14px; color: #718096; }
        .question-container { text-align: center; }
        .question-number { font-size: 20px; font-weight: 700; color: var(--primary-color); }
        .question-text { font-size: 22px; min-height: 60px; margin: 15px 0 30px; }
        .options-container { display: flex; flex-direction: column; gap: 15px; }
        .option-btn { background-color: #f7fafc; color: var(--text-color); border: 2px solid var(--light-gray); }
        .option-btn:hover { background-color: #edf2f7; transform: translateY(-2px); }
        .result-container { text-align: center; }
        .result-emoji { font-size: 60px; margin-bottom: 15px; }
        .result-title { font-size: 26px; color: var(--primary-color); margin: 0; }
        .result-subtitle { font-size: 18px; color: #4a5568; margin: 5px 0 20px; }
        .result-description { background: #f7fafc; padding: 20px; border-radius: 12px; text-align: left; line-height: 1.8; margin-bottom: 30px; }
        .action-buttons { display: flex; flex-direction: column; gap: 10px; }
        
        /* [추가] 스타일이 없던 '더 자세히보기' 버튼 스타일을 추가합니다. */
        .details-btn { background-color: #2b6cb0; color: var(--white); }
        .details-btn:hover { background-color: #2c5282; }

        .retry-btn { background-color: var(--primary-color); color: var(--white); }
        .share-btn { background-color: var(--secondary-color); color: var(--white); }
        .retry-btn:hover { background-color: #4c51bf; }
        .share-btn:hover { background-color: #dd6b20; }
    </style>
    <!-- 구글 태그는 head에 있어도 괜찮습니다. -->
    <?php include $_SERVER['DOCUMENT_ROOT'] .'/mytools/_template/google.php'; ?>
</head>
<body>
    <div id="app-wrapper"> 
        <div class="container">
            <!-- 메인 화면 -->
            <div id="main-screen" class="screen active">
                <header class="header">
                    <h1><i class="fas fa-brain"></i> 빠른 MBTI 유형 검사</h1>
                    <p class="subtitle"> 나의 MBTI 성격 유형을 빠르게 찾아보세요!</p>
                </header>
                
                <div class="intro-content">
                     <div class="intro-image">
                         <img src="https://pdnote.com/wp-content/uploads/2025/10/ChatGPT-Image-2025년-10월-26일-오후-11_14_43.png" alt="빠른 MBTI 유형 검사 대표 이미지">
                    </div>
                    <div class="selector-title">
                        <i class="fas fa-list-ol"></i> 문항 수 선택
                    </div>
                    <div class="question-count-selector">
                        <input type="radio" id="count8" name="questionCount" value="8">
                        <label for="count8">8문항</label>

                        <input type="radio" id="count16" name="questionCount" value="16" checked>
                        <label for="count16">16문항</label>

                        <input type="radio" id="count32" name="questionCount" value="32">
                        <label for="count32">32문항</label>
                    </div>
                    
                    <button class="start-btn" onclick="startTest()">
                        <i class="fas fa-play"></i>
                        테스트 시작하기
                    </button>
                </div>
            </div>

            <!-- 테스트 화면 -->
            <div id="test-screen" class="screen">
                <div class="progress-container">
                    <div class="progress-bar">
                        <div class="progress-fill" id="progress-fill"></div>
                    </div>
                    <span class="progress-text" id="progress-text">1/16</span>
                </div>

                <div class="question-container">
                    <div class="question-number" id="question-number">Q1.</div>
                    <h2 class="question-text" id="question-text"></h2>
                    
                    <div class="options-container" id="options-container"></div>
                </div>
            </div>

            <!-- 결과 화면 -->
            <div id="result-screen" class="screen">
                <div class="result-container">
                    <div class="result-emoji" id="result-emoji"></div>
                    <h2 class="result-title" id="result-title"></h2>
                    <p class="result-subtitle" id="result-subtitle"></p>
                    <div class="result-description" id="result-description"></div>

                    <div class="action-buttons">
                        <a href="#" id="details-btn" class="details-btn" target="_blank" rel="noopener noreferrer">
                            <i class="fas fa-book-open"></i> 더 자세히보기
                        </a>
                        <!-- 불필요한 빈 <p> 태그 제거 -->
                        <button class="retry-btn" onclick="restartTest()">
                            <i class="fas fa-redo"></i> 다시 테스트하기
                        </button>
                        <button class="share-btn" onclick="shareResult()">
                            <i class="fas fa-share"></i> 결과 공유하기
                        </button>
                    </div>
                </div>
            </div>
            <!-- Footer 태그 -->
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/mytools/_template/footer.php'; ?>
        </div>
   </div>
   
    <script>
        // 자바스크립트는 수정할 필요가 없습니다.
        const questions = [
            { question: "큰 파티에 참석한 후 당신은?", options: [{ text: "활력이 넘치고 더 많은 사람들과 교류하고 싶다.", type: "E" }, { text: "피곤함을 느끼고 혼자만의 휴식이 필요하다.", type: "I" }] },
            { question: "팀 회의에서 당신은 주로?", options: [{ text: "적극적으로 의견을 내며 토론을 이끈다.", type: "E" }, { text: "다른 사람의 의견을 듣고 신중하게 내 생각을 말한다.", type: "I" }] },
            { question: "새로운 사람을 만나는 자리는?", options: [{ text: "즐겁고 흥미로운 경험이다.", type: "E" }, { text: "다소 어색하고 에너지가 소모된다.", type: "I" }] },
            { question: "생각을 정리할 때 더 편한 방식은?", options: [{ text: "다른 사람과 대화하며 생각을 발전시킨다.", type: "E" }, { text: "조용히 혼자 고찰하며 생각을 명확히 한다.", type: "I" }] },
            { question: "주목받는 상황에서 당신은?", options: [{ text: "자연스럽고 편안하게 즐긴다.", type: "E" }, { text: "불편하고 가능한 피하고 싶다.", type: "I" }] },
            { question: "당신의 전화 습관은?", options: [{ text: "용건이 없어도 친구에게 전화해 수다를 떤다.", type: "E" }, { text: "문자나 메시지를 선호하며, 전화는 용건만 간단히 한다.", type: "I" }] },
            { question: "당신의 친구 그룹은?", options: [{ text: "폭넓고 다양한 그룹의 사람들과 어울린다.", type: "E" }, { text: "소수의 깊고 진실한 친구 관계를 유지한다.", type: "I" }] },
            { question: "일을 할 때 선호하는 환경은?", options: [{ text: "활기차고 여러 사람과 협업하는 개방된 공간.", type: "E" }, { text: "방해받지 않는 조용한 개인 공간.", type: "I" }] },
            { question: "새로운 프로젝트를 시작할 때 먼저 하는 것은?", options: [{ text: "구체적이고 현실적인 데이터를 수집하고 분석한다.", type: "S" }, { text: "전체적인 비전과 가능성을 상상하며 아이디어를 구상한다.", type: "N" }] },
            { question: "영화를 보고 난 후 친구에게 설명할 때 당신은?", options: [{ text: "인상 깊었던 장면과 대사를 구체적으로 묘사한다.", type: "S" }, { text: "영화가 담고 있는 상징이나 숨은 의미에 대해 말한다.", type: "N" }] },
            { question: "당신이 더 신뢰하는 정보는?", options: [{ text: "직접 경험하고 확인한 사실.", type: "S" }, { text: "직관적으로 떠오르는 영감이나 통찰.", type: "N" }] },
            { question: "새로운 기기를 사용할 때 당신은?", options: [{ text: "사용 설명서를 차근차근 읽고 따라한다.", type: "S" }, { text: "일단 이것저것 눌러보며 스스로 기능을 파악한다.", type: "N" }] },
            { question: "대화할 때 당신의 스타일은?", options: [{ text: "현실적이고 실용적인 주제를 선호한다.", type: "S" }, { text: "추상적이고 철학적인 주제에 대해 이야기하는 것을 즐긴다.", type: "N" }] },
            { question: "미래를 생각할 때 당신은?", options: [{ text: "현재의 경험을 바탕으로 현실적인 계획을 세운다.", type: "S" }, { text: "다양한 가능성을 상상하며 이상적인 미래를 그린다.", type: "N" }] },
            { question: "일을 배울 때 선호하는 방식은?", options: [{ text: "이미 검증된 명확한 절차와 방법을 따른다.", type: "S" }, { text: "기본 원리를 이해하고 나만의 새로운 방식을 시도한다.", type: "N" }] },
            { question: "나무와 숲 중 더 먼저 보이는 것은?", options: [{ text: "개별적인 나무들의 모양과 색깔.", type: "S" }, { text: "전체적인 숲의 모습과 분위기.", type: "N" }] },
            { question: "친구가 고민을 털어놓을 때 당신의 반응은?", options: [{ text: "문제의 원인을 분석하고 해결책을 제시해준다.", type: "T" }, { text: "친구의 감정에 공감하며 위로의 말을 건넨다.", type: "F" }] },
            { question: "결정을 내릴 때 더 중요하게 생각하는 것은?", options: [{ text: "객관적인 진실과 논리적인 일관성.", type: "T" }, { text: "그 결정이 사람들에게 미칠 영향과 관계의 조화.", type: "F" }] },
            { question: "다른 사람을 비판해야 할 때 당신은?", options: [{ text: "사실에 근거하여 솔직하고 직접적으로 말한다.", type: "T" }, { text: "상대방의 감정을 고려하여 조심스럽고 우회적으로 표현한다.", type: "F" }] },
            { question: "당신이 동의하는 말은?", options: [{ text: "'감정보다 이성이 앞서야 한다.'", type: "T" }, { text: "'사람 사이에는 따뜻한 정이 먼저다.'", type: "F" }] },
            { question: "팀 프로젝트에서 갈등이 생겼을 때 당신은?", options: [{ text: "가장 효율적이고 공정한 해결책을 찾는 데 집중한다.", type: "T" }, { text: "팀원들의 감정을 살피고 관계가 상하지 않도록 중재한다.", type:- "F" }] },
            { question: "칭찬을 들었을 때 당신의 반응은?", options: [{ text: "내가 한 일의 성과와 능력을 인정받았다고 생각한다.", type: "T" }, { text: "상대방의 따뜻한 마음에 감사함을 느낀다.", type: "F" }] },
            { question: "더 불편한 상황은?", options: [{ text: "비논리적이고 말도 안 되는 주장을 듣는 것.", type: "T" }, { text: "내 주변 사람들이 서로 다투고 불편해하는 것.", type: "F" }] },
            { question: "당신이 추구하는 가치는?", options: [{ text: "공정함과 정의로움.", type: "T" }, { text: "이해와 공감, 그리고 조화.", type: "F" }] },
            { question: "주말여행을 떠나기 전 당신은?", options: [{ text: "숙소, 교통, 방문할 곳까지 세부 일정을 모두 짜놓는다.", type: "J" }, { text: "대략적인 목적지만 정하고 상황에 따라 자유롭게 움직인다.", type: "P" }] },
            { question: "업무를 처리하는 당신의 스타일은?", options: [{ text: "마감 기한을 엄수하고 일을 미리 끝내는 것을 선호한다.", type: "J" }, { text: "마감 기한에 임박했을 때 창의력과 집중력이 발휘된다.", type: "P" }] },
            { question: "당신의 방은 보통 어떤 상태인가?", options: [{ text: "항상 잘 정돈되어 있고 물건은 제자리에 있다.", type: "J" }, { text: "자유분방하지만 나름의 질서가 있다.", type: "P" }] },
            { question: "갑작스러운 계획 변경은 당신에게?", options: [{ text: "스트레스를 주며, 원래 계획을 고수하고 싶다.", type: "J" }, { text: "새로운 가능성을 열어주는 흥미로운 일이다.", type: "P" }] },
            { question: "목표를 달성하는 과정에서 당신은?", options: [{ text: "명확한 계획을 세우고 단계적으로 실행하는 것이 중요하다.", type: "J" }, { text: "상황에 따라 유연하게 대처하며 나아가는 것이 효과적이다.", type: "P" }] },
            { question: "식당에 갔을 때 메뉴를 고르는 당신은?", options: [{ text: "미리 리뷰를 보고 먹을 메뉴를 결정해놓는다.", type: "J" }, { text: "그날의 기분이나 느낌에 따라 즉흥적으로 고른다.", type: "P" }] },
            { question: "일상생활에서 당신은?", options: [{ text: "예측 가능하고 규칙적인 생활을 선호한다.", type: "J" }, { text: "새롭고 즉흥적인 경험을 즐긴다.", type: "P" }] },
            { question: "결정을 내릴 때 당신은?", options: [{ text: "충분한 정보를 바탕으로 신속하게 결론을 내린다.", type: "J" }, { text: "가능한 모든 선택지를 열어두고 마지막까지 고민한다.", type: "P" }] },
        ];
        const results = { "ISTJ":{emoji:"🧐",title:"현실주의자",subtitle:"책임감이 강하고 현실적인",description:"한번 시작한 일은 끝까지 해내는 책임감이 강한 유형입니다. 현실적이고 실용적인 것을 중요하게 생각하며, 체계적으로 일을 처리하는 것을 선호합니다."},"ISFJ":{emoji:"🤗",title:"수호자",subtitle:"따뜻하고 헌신적인",description:"겸손하고 성실하며, 다른 사람을 돕는 것에서 큰 기쁨을 느낍니다. 안정과 조화를 중시하며, 주변 사람들을 세심하게 챙기는 따뜻한 마음을 가졌습니다."},"INFJ":{emoji:"🤔",title:"예언자",subtitle:"통찰력 있고 이상적인",description:"깊은 통찰력과 직관으로 사람과 세상을 이해합니다. 자신의 신념을 실현하고자 하는 강한 의지를 가졌으며, 더 나은 세상을 만드는 데 기여하고 싶어합니다."},"INTJ":{emoji:"🧑‍🔬",title:"전략가",subtitle:"논리적이고 독립적인",description:"모든 일에 계획을 세우고 상상력이 풍부한 전략가입니다. 지식을 탐구하는 것을 즐기며, 복잡한 문제를 해결하는 데 뛰어난 능력을 보입니다."},"ISTP":{emoji:"😎",title:"장인",subtitle:"논리적이고 실용적인",description:"도구와 기계를 다루는 데 능숙하며, 상황을 빠르게 파악하고 문제를 해결하는 능력이 뛰어납니다. 과묵하지만 필요할 땐 논리적으로 의견을 제시합니다."},"ISFP":{emoji:"🎨",title:"예술가",subtitle:"온화하고 호기심 많은",description:"겸손하고 따뜻한 마음을 가진 예술가 유형입니다. 현재의 삶을 즐기며, 새로운 것을 시도하고 경험하는 것을 좋아합니다. 타인에게 친절하고 관용적입니다."},"INFP":{emoji:"🤷",title:"중재자",subtitle:"이상적이고 낭만적인",description:"따뜻하고 상상력이 풍부하며, 자신의 가치관과 이상을 매우 중요하게 생각합니다. 다른 사람의 감정에 깊이 공감하며, 진실된 관계를 추구합니다."},"INTP":{emoji:"💡",title:"논리술사",subtitle:"지적 호기심이 왕성한",description:"끊임없이 새로운 아이디어를 탐구하는 논리적인 사색가입니다. 복잡한 이론이나 개념을 이해하는 것을 즐기며, 비판적이고 분석적인 사고를 합니다."},"ESTP":{emoji:"🚀",title:"모험가",subtitle:"에너지가 넘치고 유머러스한",description:"스릴과 모험을 즐기는 활동적인 유형입니다. 뛰어난 관찰력으로 상황을 빠르게 파악하고, 문제 해결에 직접 뛰어드는 것을 두려워하지 않습니다."},"ESFP":{emoji:"🌟",title:"엔터테이너",subtitle:"사교적이고 즉흥적인",description:"타고난 스타성을 가진 사교적인 유형입니다. 사람들의 주목을 받는 것을 즐기며, 현재의 즐거움을 만끽합니다. 주변에 긍정적인 에너지를 전파합니다."},"ENFP":{emoji:"🌈",title:"활동가",subtitle:"열정적이고 창의적인",description:"상상력이 풍부하고 열정적인 스파크를 가진 유형입니다. 새로운 사람과 아이디어를 만나는 것을 좋아하며, 긍정적이고 활기찬 에너지로 주변에 영감을 줍니다."},"ENTP":{emoji:"🗣️",title:"토론가",subtitle:"재치 있고 지적인",description:"지적인 도전을 즐기는 뜨거운 논쟁가입니다. 고정관념에 얽매이지 않고, 다양한 가능성을 탐색하며 논쟁을 통해 아이디어를 발전시키는 것을 즐깁니다."},"ESTJ":{emoji:"📈",title:"경영자",subtitle:"체계적이고 단호한",description:"현실적이고 실용적인 사고를 바탕으로 일을 체계적으로 관리하는 데 뛰어난 능력을 보입니다. 명확한 규칙과 절차를 선호하며, 책임감이 강합니다."},"ESFJ":{emoji:"💖",title:"조력자",subtitle:"사교적이고 인정 많은",description:"타인에게 관심이 많고 다른 사람을 돕는 것을 좋아합니다. 주변 사람들과의 조화를 중요하게 생각하며, 공동체의 발전을 위해 헌신합니다."},"ENFJ":{emoji:"👨‍🏫",title:"선도자",subtitle:"카리스마 있고 영감을 주는",description:"사람들에게 긍정적인 영향을 미치는 것을 목표로 하는 카리스마 넘치는 리더입니다. 타인의 잠재력을 발견하고 성장을 돕는 데서 큰 보람을 느낍니다."},"ENTJ":{emoji:"👑",title:"지도자",subtitle:"대담하고 결단력 있는",description:"타고난 통솔력과 비전을 가진 지도자 유형입니다. 도전을 두려워하지 않으며, 목표 달성을 위해 사람들을 이끌고 전략을 세우는 데 능숙합니다."} };
        let currentQuestionIndex = 0;
        let userAnswers = [];
        let activeQuestions = [];
        let selectedQuestionCount = 16;
        const mainScreen = document.getElementById('main-screen');
        const testScreen = document.getElementById('test-screen');
        const resultScreen = document.getElementById('result-screen');
        const progressFill = document.getElementById('progress-fill');
        const progressText = document.getElementById('progress-text');
        const questionNumber = document.getElementById('question-number');
        const questionText = document.getElementById('question-text');
        const optionsContainer = document.getElementById('options-container');
        function startTest() {
            selectedQuestionCount = parseInt(document.querySelector('input[name="questionCount"]:checked').value);
            activeQuestions = [];
            const questionsPerDichotomy = selectedQuestionCount / 4;
            const totalDichotomies = 4;
            const baseQuestionsPerDichotomy = questions.length / totalDichotomies;
            for (let i = 0; i < totalDichotomies; i++) {
                const start = i * baseQuestionsPerDichotomy;
                const end = start + questionsPerDichotomy;
                activeQuestions.push(...questions.slice(start, end));
            }
            currentQuestionIndex = 0;
            userAnswers = [];
            mainScreen.classList.remove('active');
            testScreen.classList.add('active');
            displayQuestion();
        }
        function displayQuestion() {
            const currentQuestion = activeQuestions[currentQuestionIndex];
            const progress = ((currentQuestionIndex + 1) / selectedQuestionCount) * 100;
            progressFill.style.width = `${progress}%`;
            progressText.innerText = `${currentQuestionIndex + 1}/${selectedQuestionCount}`;
            questionNumber.innerText = `Q${currentQuestionIndex + 1}.`;
            questionText.innerText = currentQuestion.question;
            optionsContainer.innerHTML = '';
            currentQuestion.options.forEach(option => {
                const button = document.createElement('button');
                button.classList.add('option-btn');
                button.innerText = option.text;
                button.onclick = () => selectAnswer(option.type);
                optionsContainer.appendChild(button);
            });
        }
        function selectAnswer(type) {
            userAnswers.push(type);
            currentQuestionIndex++;
            if (currentQuestionIndex < selectedQuestionCount) { displayQuestion(); } else { showResult(); }
        }
        function calculateResult() {
            let mbti = '';
            const questionsPerDichotomy = selectedQuestionCount / 4;
            const getDominantType = (answers, type1, type2) => {
                const count1 = answers.filter(a => a === type1).length;
                return count1 >= questionsPerDichotomy / 2 ? type1 : type2;
            };
            mbti += getDominantType(userAnswers.slice(0, questionsPerDichotomy), 'E', 'I');
            mbti += getDominantType(userAnswers.slice(questionsPerDichotomy, questionsPerDichotomy * 2), 'S', 'N');
            mbti += getDominantType(userAnswers.slice(questionsPerDichotomy * 2, questionsPerDichotomy * 3), 'T', 'F');
            mbti += getDominantType(userAnswers.slice(questionsPerDichotomy * 3), 'J', 'P');
            return mbti;
        }
        function showResult() {
            const mbtiType = calculateResult();
            const resultData = results[mbtiType];
            document.getElementById('result-emoji').innerText = resultData.emoji;
            document.getElementById('result-title').innerText = `${mbtiType} - ${resultData.title}`;
            document.getElementById('result-subtitle').innerText = resultData.subtitle;
            document.getElementById('result-description').innerHTML = resultData.description;
            const detailsButton = document.getElementById('details-btn');
            const detailsUrl = `https://www.16personalities.com/ko/성격유형-${mbtiType.toLowerCase()}`;
            detailsButton.href = detailsUrl;
            testScreen.classList.remove('active');
            resultScreen.classList.add('active');
        }
        function restartTest() {
            resultScreen.classList.remove('active');
            mainScreen.classList.add('active');
        }
        function showToast(message) {
            const toast = document.createElement('div');
            toast.className = 'toast-popup';
            toast.textContent = message;
            document.body.appendChild(toast);
            setTimeout(() => { toast.classList.add('show'); }, 100);
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => { document.body.removeChild(toast); }, 300);
            }, 2500);
        }
        function shareResult() {
            const resultTitle = document.getElementById('result-title').textContent;
            const resultEmoji = document.getElementById('result-emoji').textContent;
            const resultSubtitle = document.getElementById('result-subtitle').textContent;
            const shareText = `나의 MBTI 결과는?\n${resultEmoji} ${resultTitle} (${resultSubtitle})\n\n당신의 유형도 알아보세요! 👉`;
            const shareUrl = window.location.href;
            if (navigator.share) {
                navigator.share({ title: 'MBTI 유형 알아보기 결과', text: shareText, url: shareUrl }).catch(console.error);
            } else if (navigator.clipboard) {
                navigator.clipboard.writeText(shareText + ' ' + shareUrl).then(() => { showToast('결과가 클립보드에 복사되었습니다! 📋'); });
            } else {
                const textArea = document.createElement('textarea');
                textArea.value = shareText + ' ' + shareUrl;
                textArea.style.position = 'fixed'; textArea.style.left = '-9999px';
                document.body.appendChild(textArea);
                textArea.focus(); textArea.select();
                try { document.execCommand('copy'); showToast('결과가 클립보드에 복사되었습니다! 📋'); } catch (err) { showToast('복사에 실패했습니다. 😥'); }
                document.body.removeChild(textArea);
            }
        }
    </script>
</body>
</html>