document.addEventListener('DOMContentLoaded', () => {
    // 모든 emoji-card 요소를 선택합니다.
    const emojiCards = document.querySelectorAll('.emoji-card');
    // 알림 메시지를 띄울 toast 요소를 선택합니다.
    const toast = document.getElementById('toast');

    // 각 카드에 클릭 이벤트를 추가합니다.
    emojiCards.forEach(card => {
        card.addEventListener('click', () => {
            // 카드의 data-emoji 속성에 저장된 이모지를 가져옵니다.
            const emojiToCopy = card.dataset.emoji;

            // navigator.clipboard API를 사용해 텍스트를 클립보드에 복사합니다.
            navigator.clipboard.writeText(emojiToCopy).then(() => {
                // 복사 성공 시
                // 1. 토스트 메시지 내용 설정
                toast.innerHTML = `✅ <strong>${emojiToCopy}</strong> 복사 완료!`;
                
                // 2. 'show' 클래스를 추가하여 토스트 메시지를 화면에 표시
                toast.classList.add('show');

                // 3. 2초 후에 'show' 클래스를 제거하여 토스트 메시지를 숨김
                setTimeout(() => {
                    toast.classList.remove('show');
                }, 2000);

            }).catch(err => {
                // 복사 실패 시 (예: http 환경)
                console.error('클립보드 복사 실패:', err);
                toast.textContent = '❌ 복사에 실패했어요.';
                toast.classList.add('show');
                setTimeout(() => {
                    toast.classList.remove('show');
                }, 2000);
            });
        });

        // 키보드 사용자를 위해 Enter 키로도 복사 가능하게 합니다.
        card.addEventListener('keydown', (event) => {
            if (event.key === 'Enter') {
                card.click();
            }
        });
    });
});