
// Constants
const DEFAULT_AVERAGE_CPM_NO_SPACES = 330;
const DEFAULT_SAMPLE_SCRIPT_FOR_RATE_CALCULATION =
  "안녕하세요. 지금부터 발표자 말하기 속도 측정을 시작하겠습니다. 편안한 목소리로 화면에 보이는 글을 자연스럽게 읽어주세요. 다 읽으신 후에는 종료 버튼을 눌러주시면 됩니다. 이 과정을 통해 보다 정확한 예상 발표 시간을 계산할 수 있습니다.";

// Global state variables
let mainScript = '';
let userCPM = null;
let sampleScript = DEFAULT_SAMPLE_SCRIPT_FOR_RATE_CALCULATION;
let elapsedMs = 0;
let isTiming = false;
let timerIntervalId = null;
let timerStartTime = null;

// DOM Elements
const mainScriptTextarea = document.getElementById('mainScriptTextarea');
const wordCountEl = document.getElementById('wordCount');
const charCountEl = document.getElementById('charCount');
const charCountNoSpaceEl = document.getElementById('charCountNoSpace');
const defaultCpmInfoEl = document.getElementById('defaultCpmInfo');
const estimatedTimeNormalEl = document.getElementById('estimatedTimeNormal');
const personalizedTimeSectionEl = document.getElementById('personalizedTimeSection');
const userCpmBadgeEl = document.getElementById('userCpmBadge');
const estimatedTimePersonalizedEl = document.getElementById('estimatedTimePersonalized');
const openModalButton = document.getElementById('openModalButton');
const currentYearEl = document.getElementById('currentYear');

// Modal DOM Elements
const rateCalculatorModal = document.getElementById('rateCalculatorModal');
const closeModalButton = document.getElementById('closeModalButton');
const sampleScriptTextarea = document.getElementById('sampleScriptTextarea');
const sampleWordCountEl = document.getElementById('sampleWordCount');
const sampleCharCountEl = document.getElementById('sampleCharCount');
const sampleCharCountNoSpaceEl = document.getElementById('sampleCharCountNoSpace');
const timerDisplayEl = document.getElementById('timerDisplay');
const startButton = document.getElementById('startButton');
const endButton = document.getElementById('endButton');

// Utility Functions
const analyzeScriptContent = (scriptText) => {
  const trimmedScript = scriptText.trim();
  const words = trimmedScript.split(/\s+/).filter(word => word.length > 0);
  const charCount = scriptText.length;
  const charCountNoSpace = scriptText.replace(/\s/g, '').length;

  return {
    wordCount: trimmedScript.length > 0 ? words.length : 0,
    charCount,
    charCountNoSpace,
  };
};

const formatTime = (totalSeconds) => {
  if (isNaN(totalSeconds) || totalSeconds < 0) {
    return "00분 00.0초";
  }
  const minutes = Math.floor(totalSeconds / 60);
  const seconds = totalSeconds % 60;
  return `${String(minutes).padStart(2, '0')}분 ${seconds.toFixed(1).padStart(4, '0')}초`;
};

const calculatePresentationTime = (charsNoSpace, cpm) => {
  if (cpm === 0 || charsNoSpace === 0) {
    return formatTime(0);
  }
  const totalSeconds = (charsNoSpace / cpm) * 60;
  return formatTime(totalSeconds);
};

// UI Update Functions
const updateMainScriptAnalysisUI = () => {
  const analysis = analyzeScriptContent(mainScript);
  wordCountEl.textContent = analysis.wordCount;
  charCountEl.textContent = analysis.charCount;
  charCountNoSpaceEl.textContent = analysis.charCountNoSpace;

  estimatedTimeNormalEl.textContent = calculatePresentationTime(analysis.charCountNoSpace, DEFAULT_AVERAGE_CPM_NO_SPACES);

  if (userCPM !== null) {
    estimatedTimePersonalizedEl.textContent = calculatePresentationTime(analysis.charCountNoSpace, userCPM);
    userCpmBadgeEl.textContent = `맞춤 속도 적용됨 (${userCPM}자/분)`;
    personalizedTimeSectionEl.classList.remove('hidden');
  } else {
    personalizedTimeSectionEl.classList.add('hidden');
  }
};

const updateSampleScriptAnalysisUI = () => {
  const analysis = analyzeScriptContent(sampleScript);
  sampleWordCountEl.textContent = analysis.wordCount;
  sampleCharCountEl.textContent = analysis.charCount;
  sampleCharCountNoSpaceEl.textContent = analysis.charCountNoSpace;
  startButton.disabled = analysis.charCountNoSpace === 0;
};

const updateTimerDisplay = () => {
  timerDisplayEl.textContent = formatTime(elapsedMs / 1000);
};

// Modal Logic
const openModal = () => {
  sampleScript = DEFAULT_SAMPLE_SCRIPT_FOR_RATE_CALCULATION;
  sampleScriptTextarea.value = sampleScript;
  updateSampleScriptAnalysisUI();
  elapsedMs = 0;
  isTiming = false;
  updateTimerDisplay();
  startButton.classList.remove('hidden');
  endButton.classList.add('hidden');
  sampleScriptTextarea.disabled = false;
  startButton.disabled = analyzeScriptContent(sampleScript).charCountNoSpace === 0;
  rateCalculatorModal.classList.remove('hidden');
};

const closeModal = () => {
  if (isTiming) { // Stop timer if modal is closed abruptly
    clearInterval(timerIntervalId);
    isTiming = false;
  }
  rateCalculatorModal.classList.add('hidden');
};

// Timer Logic
const startTimer = () => {
  const currentSampleAnalysis = analyzeScriptContent(sampleScript);
  if (currentSampleAnalysis.charCountNoSpace === 0) {
    alert("대본 내용이 없습니다. 대본을 입력하거나 기본 대본을 사용해주세요.");
    return;
  }
  isTiming = true;
  timerStartTime = Date.now();
  elapsedMs = 0;
  updateTimerDisplay();
  
  sampleScriptTextarea.disabled = true;
  startButton.classList.add('hidden');
  endButton.classList.remove('hidden');

  timerIntervalId = setInterval(() => {
    if (timerStartTime) {
      elapsedMs = Date.now() - timerStartTime;
      updateTimerDisplay();
    }
  }, 100);
};

const stopTimerAndCalculate = () => {
  isTiming = false;
  sampleScriptTextarea.disabled = false;
  startButton.classList.remove('hidden');
  endButton.classList.add('hidden');

  if (timerIntervalId) {
    clearInterval(timerIntervalId);
    timerIntervalId = null;
  }

  const finalElapsedSeconds = elapsedMs / 1000;
  const currentSampleAnalysis = analyzeScriptContent(sampleScript);

  if (finalElapsedSeconds > 0 && currentSampleAnalysis.charCountNoSpace > 0) {
    const cpm = Math.round((currentSampleAnalysis.charCountNoSpace / finalElapsedSeconds) * 60);
    if (cpm > 0) {
        userCPM = cpm;
        updateMainScriptAnalysisUI(); // Recalculate main script time with new CPM
        closeModal();
    } else {
        alert("유효한 말하기 속도를 측정하지 못했습니다. (CPM이 0 이하) 다시 시도해주세요.");
    }
  } else if (currentSampleAnalysis.charCountNoSpace === 0) {
    alert("측정할 대본 내용이 없습니다.");
  } else {
    alert("측정 시간이 너무 짧거나 대본이 없습니다. 다시 시도해주세요.");
  }
};


// Event Listeners
mainScriptTextarea.addEventListener('input', (e) => {
  mainScript = e.target.value;
  updateMainScriptAnalysisUI();
});

openModalButton.addEventListener('click', openModal);
closeModalButton.addEventListener('click', closeModal);
rateCalculatorModal.addEventListener('click', (e) => { // Close modal on backdrop click
  if (e.target === rateCalculatorModal) {
    closeModal();
  }
});


sampleScriptTextarea.addEventListener('input', (e) => {
  sampleScript = e.target.value;
  updateSampleScriptAnalysisUI();
});

startButton.addEventListener('click', startTimer);
endButton.addEventListener('click', stopTimerAndCalculate);

// Initial Setup
document.addEventListener('DOMContentLoaded', () => {
  currentYearEl.textContent = new Date().getFullYear();
  defaultCpmInfoEl.textContent = `(일반적인 속도: 분당 ${DEFAULT_AVERAGE_CPM_NO_SPACES}자(공백제외) 기준)`;
  sampleScriptTextarea.value = DEFAULT_SAMPLE_SCRIPT_FOR_RATE_CALCULATION;
  updateMainScriptAnalysisUI();
  updateSampleScriptAnalysisUI();
  updateTimerDisplay(); // Initialize timer display
});
