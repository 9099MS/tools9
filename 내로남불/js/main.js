// 전역 변수
let currentQuestionIndex = 0;
let answers = [];
let selectedAnswers = { a: null, b: null };

// 화면 전환 함수
function showScreen(screenId) {
    document.querySelectorAll('.screen').forEach(screen => {
        screen.classList.remove('active');
    });
    document.getElementById(screenId).classList.add('active');
}

// 테스트 시작
function startTest() {
    currentQuestionIndex = 0;
    answers = [];
    selectedAnswers = { a: null, b: null };
    
    showScreen('test-screen');
    loadQuestion();
    updateProgress();
}

// 질문 로드
function loadQuestion() {
    const question = questions[currentQuestionIndex];
    
    document.getElementById('question-number').textContent = `Q${currentQuestionIndex + 1}.`;
    document.getElementById('question-text').textContent = question.title;
    document.getElementById('scenario-a').textContent = question.scenarioA;
    document.getElementById('scenario-b').textContent = question.scenarioB;
    
    // 선택 초기화
    selectedAnswers = { a: null, b: null };
    document.querySelectorAll('.option-btn').forEach(btn => {
        btn.classList.remove('selected');
    });
    document.getElementById('next-btn').disabled = true;
    
    // 애니메이션 효과
    const questionContainer = document.querySelector('.question-container');
    questionContainer.style.opacity = '0';
    questionContainer.style.transform = 'translateY(20px)';
    
    setTimeout(() => {
        questionContainer.style.opacity = '1';
        questionContainer.style.transform = 'translateY(0)';
    }, 100);
}

// 옵션 선택
function selectOption(scenario, value) {
    selectedAnswers[scenario] = value;
    
    // 시각적 피드백
    const optionsContainer = document.getElementById(`options-${scenario}`);
    optionsContainer.querySelectorAll('.option-btn').forEach(btn => {
        btn.classList.remove('selected');
    });
    
    event.target.classList.add('selected');
    
    // 두 상황 모두 선택했는지 확인
    if (selectedAnswers.a !== null && selectedAnswers.b !== null) {
        document.getElementById('next-btn').disabled = false;
        
        // 미묘한 애니메이션 효과
        const nextBtn = document.getElementById('next-btn');
        nextBtn.style.transform = 'scale(1.05)';
        setTimeout(() => {
            nextBtn.style.transform = 'scale(1)';
        }, 200);
    }
    
    // 버튼 클릭 애니메이션
    event.target.style.transform = 'scale(0.95)';
    setTimeout(() => {
        event.target.style.transform = 'scale(1)';
    }, 150);
}

// 다음 질문으로
function nextQuestion() {
    // 답변 저장
    answers.push({
        questionId: currentQuestionIndex + 1,
        scoreA: selectedAnswers.a,
        scoreB: selectedAnswers.b
    });
    
    currentQuestionIndex++;
    
    if (currentQuestionIndex < questions.length) {
        loadQuestion();
        updateProgress();
    } else {
        showResults();
    }
}

// 진행률 업데이트
function updateProgress() {
    const progress = ((currentQuestionIndex + 1) / questions.length) * 100;
    document.getElementById('progress-fill').style.width = `${progress}%`;
    document.getElementById('progress-text').textContent = `${currentQuestionIndex + 1}/${questions.length}`;
}

// 결과 보여주기
function showResults() {
    const analysis = analyzeResults(answers);
    const resultType = getResultType(analysis.overallScore);
    
    // 결과 화면 업데이트
    document.getElementById('result-emoji').textContent = resultType.emoji;
    document.getElementById('result-title').textContent = resultType.title;
    document.getElementById('result-score').textContent = analysis.overallScore;
    document.getElementById('result-description').textContent = resultType.description;
    
    // 상세 분석 업데이트
    updateDetailBar('hypocrisy', analysis.hypocrisyScore);
    updateDetailBar('rationalization', analysis.rationalizationScore);
    updateDetailBar('tolerance', analysis.toleranceScore);
    
    // 화면 전환
    showScreen('result-screen');
    
    // 결과 애니메이션
    setTimeout(() => {
        const resultContainer = document.querySelector('.result-container');
        resultContainer.style.opacity = '0';
        resultContainer.style.transform = 'translateY(30px)';
        
        setTimeout(() => {
            resultContainer.style.opacity = '1';
            resultContainer.style.transform = 'translateY(0)';
        }, 100);
    }, 100);
}

// 상세 바 업데이트
function updateDetailBar(type, score) {
    const bar = document.getElementById(`${type}-bar`);
    const scoreElement = document.getElementById(`${type}-score`);
    
    // 애니메이션 효과
    setTimeout(() => {
        bar.style.width = `${score}%`;
        scoreElement.textContent = `${score}%`;
        
        // 색상 설정
        if (score >= 70) {
            bar.style.backgroundColor = '#ff6b6b';
        } else if (score >= 40) {
            bar.style.backgroundColor = '#feca57';
        } else {
            bar.style.backgroundColor = '#48dbfb';
        }
    }, 500);
}

// 테스트 다시하기
function restartTest() {
    showScreen('main-screen');
    
    // 초기화
    currentQuestionIndex = 0;
    answers = [];
    selectedAnswers = { a: null, b: null };
    
    // 진행률 바 초기화
    document.getElementById('progress-fill').style.width = '0%';
    document.getElementById('progress-text').textContent = '1/7';
    
    // 상세 바 초기화
    ['hypocrisy', 'rationalization', 'tolerance'].forEach(type => {
        document.getElementById(`${type}-bar`).style.width = '0%';
        document.getElementById(`${type}-score`).textContent = '0%';
    });
}

// 결과 공유하기
function shareResult() {
    const resultTitle = document.getElementById('result-title').textContent;
    const resultScore = document.getElementById('result-score').textContent;
    const resultEmoji = document.getElementById('result-emoji').textContent;
    
    const shareText = `내로남불 테스트 결과: ${resultEmoji} ${resultTitle}\n내로남불 지수: ${resultScore}%\n\n나도 테스트해보기 👉`;
    
    if (navigator.share) {
        navigator.share({
            title: '내로남불 테스트 결과',
            text: shareText,
            url: window.location.href
        });
    } else if (navigator.clipboard) {
        navigator.clipboard.writeText(shareText + ' ' + window.location.href).then(() => {
            showToast('결과가 클립보드에 복사되었습니다! 📋');
        });
    } else {
        // fallback
        const textArea = document.createElement('textarea');
        textArea.value = shareText + ' ' + window.location.href;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);
        showToast('결과가 클립보드에 복사되었습니다! 📋');
    }
}

// 토스트 메시지 표시
function showToast(message) {
    const toast = document.createElement('div');
    toast.className = 'toast';
    toast.textContent = message;
    
    // 스타일
    toast.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: #333;
        color: white;
        padding: 12px 24px;
        border-radius: 8px;
        font-size: 14px;
        z-index: 10000;
        opacity: 0;
        transform: translateX(100px);
        transition: all 0.3s ease;
    `;
    
    document.body.appendChild(toast);
    
    // 애니메이션
    setTimeout(() => {
        toast.style.opacity = '1';
        toast.style.transform = 'translateX(0)';
    }, 100);
    
    // 제거
    setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transform = 'translateX(100px)';
        setTimeout(() => {
            document.body.removeChild(toast);
        }, 300);
    }, 3000);
}

// 모든 유형 보기 모달 표시
function showAllTypes() {
    const modal = document.getElementById('all-types-modal');
    const allTypesList = document.getElementById('all-types-list');
    allTypesList.innerHTML = ''; // Clear previous content

    for (const key in resultTypes) {
        if (resultTypes.hasOwnProperty(key)) {
            const type = resultTypes[key]; // <--- 이렇게 수정해주세요.
            const typeItem = document.createElement('div');
            typeItem.className = 'type-item';
            typeItem.innerHTML = `
                <h3><span class="emoji">${type.emoji}</span> ${type.title}</h3>
                <p>${type.description}</p>
            `;
            allTypesList.appendChild(typeItem);
        }
    }
    modal.classList.add('active');
}

// 모달 닫기
function closeModal() {
    const modal = document.getElementById('all-types-modal');
    modal.classList.remove('active');
}

// 키보드 단축키 지원
document.addEventListener('keydown', function(e) {
    const currentScreen = document.querySelector('.screen.active').id;
    
    if (currentScreen === 'test-screen') {
        // 1-4 키로 옵션 선택 (첫 번째 상황)
        if (e.key >= '1' && e.key <= '4' && !e.shiftKey) {
            const optionBtns = document.querySelectorAll('#options-a .option-btn');
            if (optionBtns[e.key - 1]) {
                optionBtns[e.key - 1].click();
            }
        }
        // Shift + 1-4 키로 옵션 선택 (두 번째 상황)
        else if (e.key >= '1' && e.key <= '4' && e.shiftKey) {
            const optionBtns = document.querySelectorAll('#options-b .option-btn');
            if (optionBtns[e.key - 1]) {
                optionBtns[e.key - 1].click();
            }
        }
        // Enter 키로 다음 질문
        else if (e.key === 'Enter') {
            const nextBtn = document.getElementById('next-btn');
            if (!nextBtn.disabled) {
                nextBtn.click();
            }
        }
    }
    
    // Escape 키로 메인 화면으로 또는 모달 닫기
    if (e.key === 'Escape') {
        const modal = document.getElementById('all-types-modal');
        if (modal.classList.contains('active')) {
            closeModal();
        } else if (currentScreen !== 'main-screen') {
            if (confirm('테스트를 중단하고 처음으로 돌아가시겠습니까?')) {
                restartTest();
            }
        }
    }
});

// 페이지 로드 완료 시 초기화
document.addEventListener('DOMContentLoaded', function() {
    // 부드러운 전환 효과를 위한 CSS 추가
    const style = document.createElement('style');
    style.textContent = `
        .question-container {
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
        .result-container {
            transition: opacity 0.5s ease, transform 0.5s ease;
        }
        .option-btn {
            transition: all 0.2s ease;
        }
        .next-btn {
            transition: all 0.2s ease;
        }
        .bar-fill {
            transition: width 1s ease, background-color 0.5s ease;
        }
    `;
    document.head.appendChild(style);
    
    console.log('내로남불 테스트가 준비되었습니다! 🎯');
});
