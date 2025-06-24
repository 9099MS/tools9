// calculateAge 함수를 전역으로 선언하여 HTML의 onclick에서도 접근 가능하게 합니다.
function calculateAge() {
    console.log("calculateAge 함수가 호출되었습니다.");

    const birthdateInput = document.getElementById('birthdate');
    const resultDiv = document.getElementById('result');
    let errorMessageDiv = birthdateInput.parentNode.querySelector('.error-message');
    if (!errorMessageDiv) {
        errorMessageDiv = document.createElement('div');
        errorMessageDiv.className = 'error-message';
        // Insert it after the input but before the button for better visual flow
        birthdateInput.parentNode.insertBefore(errorMessageDiv, document.getElementById('calculateBtn'));
    }

    const showError = (message) => {
        errorMessageDiv.textContent = message;
        errorMessageDiv.style.color = '#dc3545';
        errorMessageDiv.style.fontSize = '0.9rem';
        errorMessageDiv.style.marginTop = '10px'; /* Adjusted for better spacing */
        errorMessageDiv.style.marginBottom = '20px';
    };

    const clearError = () => {
        errorMessageDiv.textContent = '';
        errorMessageDiv.style.marginTop = '0';
        errorMessageDiv.style.marginBottom = '0';
    };

    clearError(); // 새 계산 시 오류 메시지 초기화

    const birthdate = birthdateInput.value;

    if (!birthdate || birthdate.length !== 8 || !/^\d{8}$/.test(birthdate)) {
        showError("생년월일을 YYYYMMDD 형식으로 정확히 입력하세요! (예: 20010131)");
        return;
    }

    const year = parseInt(birthdate.substring(0, 4));
    const month = parseInt(birthdate.substring(4, 6));
    const day = parseInt(birthdate.substring(6, 8));

    // 날짜 유효성 검사 강화
    const birthDate = new Date(year, month - 1, day);
    if (
        birthDate.getFullYear() !== year ||
        birthDate.getMonth() !== month - 1 ||
        birthDate.getDate() !== day ||
        month < 1 || month > 12 || day < 1 || day > 31
    ) {
        showError("유효하지 않은 날짜입니다. 정확한 생년월일을 입력하세요!");
        return;
    }

    const today = new Date();
    const currentYear = today.getFullYear();
    const birthYear = birthDate.getFullYear();
    const birthMonth = birthDate.getMonth();
    const birthDay = birthDate.getDate();

    let fullAge = currentYear - birthYear;
    if (
        today.getMonth() < birthMonth ||
        (today.getMonth() === birthMonth && today.getDate() < birthDay)
    ) {
        fullAge--;
    }

    const countingAge = currentYear - birthYear + 1;
    const yearAge = currentYear - birthYear;

    // 띠 계산
    const animalSigns = ["원숭이", "닭", "개", "돼지", "쥐", "소", "호랑이", "토끼", "용", "뱀", "말", "양"];
    const zodiacAnimal = animalSigns[birthYear % 12];

    // 다음 생일까지 남은 일수 계산
    let nextBirthday = new Date(currentYear, birthMonth, birthDay);
    if (nextBirthday < today) {
        nextBirthday = new Date(currentYear + 1, birthMonth, birthDay);
    }
    const diffTime = nextBirthday.getTime() - today.getTime();
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    resultDiv.innerHTML = `
  <div class="result-header">
      <h3>오늘 날짜: ${today.getFullYear()}년 ${today.getMonth() + 1}월 ${today.getDate()}일</h3>
  </div>
  <div class="age-result-box">
    <table class="age-result-table">
        <tr>
            <th>세는 나이 (한국식) <span class="info-icon" data-info="한국에서 전통적으로 사용되던 나이 계산법으로, 태어난 해부터 1살로 시작하여 새해(양력 1월 1일)가 될 때마다 1살씩 추가됩니다.">?</span></th>
            <td>${countingAge}살</td>
        </tr>
        <tr>
            <th>만 나이 <span class="info-icon" data-info="국제적으로 통용되는 나이 계산법으로, 태어난 날부터 0살로 시작하여 생일이 지날 때마다 1살씩 추가됩니다. 2023년 6월 28일부터 대한민국에서도 법적으로 만 나이 사용이 원칙이 되었습니다.">?</span></th>
            <td>${fullAge}살</td>
        </tr>
        <tr>
            <th>연 나이 <span class="info-icon" data-info="현재 연도에서 출생 연도를 뺀 나이입니다. 생일과 관계없이 연도가 바뀌면 1살씩 추가됩니다. (예: 병역법, 청소년보호법 등에서 사용)">?</span></th>
            <td>${yearAge}살</td>
        </tr>
        <tr>
            <th>당신의 띠</th>
            <td>${zodiacAnimal}띠</td>
        </tr>
        ${diffDays > 0 ? `
        <tr>
            <th>다음 생일까지</th>
            <td>${diffDays}일 남았습니다!</td>
        </tr>` : ''}
    </table>
  </div>
`;


    // 툴팁 이벤트 리스너 추가
    document.querySelectorAll('.info-icon').forEach(icon => {
        icon.addEventListener('click', function() {
            alert(this.dataset.info);
        });
    });

    resultDiv.style.animation = 'fadeIn 0.5s ease-out';
    resultDiv.addEventListener('animationend', () => {
        resultDiv.style.animation = '';
    }, { once: true });
}

document.addEventListener('DOMContentLoaded', () => {
    console.log("DOMContentLoaded 이벤트 발생, 스크립트 초기화 시작.");

    const birthdateInput = document.getElementById('birthdate');
    const calculateButton = document.getElementById('calculateBtn'); 
    
    if (birthdateInput) {
        // Ensure error message div exists before attaching listeners
        let errorMessageDiv = birthdateInput.parentNode.querySelector('.error-message');
        if (!errorMessageDiv) {
            errorMessageDiv = document.createElement('div');
            errorMessageDiv.className = 'error-message';
            birthdateInput.parentNode.insertBefore(errorMessageDiv, document.getElementById('calculateBtn'));
        }

        const showError = (message) => {
            errorMessageDiv.textContent = message;
            errorMessageDiv.style.color = '#dc3545';
            errorMessageDiv.style.fontSize = '0.9rem';
            errorMessageDiv.style.marginTop = '10px';
            errorMessageDiv.style.marginBottom = '20px';
        };
        const clearError = () => {
            errorMessageDiv.textContent = '';
            errorMessageDiv.style.marginTop = '0';
            errorMessageDiv.style.marginBottom = '0';
        };

        birthdateInput.addEventListener('input', () => {
            const value = birthdateInput.value;
            if (value.length > 0 && !/^\d*$/.test(value)) {
                showError("숫자만 입력해 주세요.");
            } else if (value.length > 8) {
                showError("8자리를 초과할 수 없습니다.");
            } else {
                clearError();
            }
        });

        birthdateInput.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                calculateAge();
            }
        });
    } else {
        console.error("오류: 'birthdate' ID를 가진 입력 필드를 찾을 수 없습니다.");
    }

    if (calculateButton) {
        calculateButton.addEventListener('click', calculateAge);
        console.log("버튼 클릭 이벤트 리스너가 추가되었습니다.");
    } else {
        console.error("오류: 'calculateBtn' ID를 가진 버튼을 찾을 수 없습니다.");
    }
});