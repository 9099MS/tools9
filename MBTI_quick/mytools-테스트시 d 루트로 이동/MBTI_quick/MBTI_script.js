const questions = [
    /* ---------------------- E / I (1~20) ---------------------- */
    { question: "큰 파티에 참석한 후 당신은?", options: [{ text: "활력이 넘치고 더 이야기하고 싶다.", type: "E" }, { text: "지치고 혼자만의 시간이 필요하다.", type: "I" }] },
    { question: "직장에서 회식이 잡혔을 때 당신은?", options: [{ text: "사람들과 어울릴 생각에 즐겁다.", type: "E" }, { text: "가능하면 빠지고 조용히 쉬고 싶다.", type: "I" }] },
    { question: "새로운 동료를 만나게 되었을 때?", options: [{ text: "먼저 말을 걸며 분위기를 띄운다.", type: "E" }, { text: "상대가 먼저 다가올 때까지 지켜본다.", type: "I" }] },
    { question: "주말을 보내는 당신의 방식은?", options: [{ text: "밖에서 사람을 만나며 시간을 보낸다.", type: "E" }, { text: "집에서 편하게 혼자 보내는 편이다.", type: "I" }] },
    { question: "직장 또는 모임에서 처음 보는 사람과 대화할 때?", options: [{ text: "부담 없이 자연스럽게 대화를 시작한다.", type: "E" }, { text: "어색함을 느끼며 조심스레 말한다.", type: "I" }] },
    { question: "전화 연락에 대해 당신은?", options: [{ text: "전화가 더 편하고 자주 건다.", type: "E" }, { text: "가능하면 문자나 메신저를 선호한다.", type: "I" }] },
    { question: "사람이 많은 장소(축제, 마트 등)에 갔을 때?", options: [{ text: "흥미롭고 기분이 좋아진다.", type: "E" }, { text: "피곤하고 빨리 나오고 싶다.", type: "I" }] },
    { question: "팀 회의에서 당신은?", options: [{ text: "적극적으로 의견을 내며 주도한다.", type: "E" }, { text: "주로 듣고, 필요할 때만 말한다.", type: "I" }] },
    { question: "새로운 취미를 시작할 때?", options: [{ text: "사람들과 함께 배우는 것이 좋다.", type: "E" }, { text: "혼자 조용히 배우는 것이 편하다.", type: "I" }] },
    { question: "휴가를 떠날 때 선호하는 사람 수는?", options: [{ text: "여럿이 함께 가는 여행이 즐겁다.", type: "E" }, { text: "소수 또는 혼자 가는 여행이 편하다.", type: "I" }] },
    { question: "모르는 번호로 전화가 올 때?", options: [{ text: "대체로 부담 없이 받는다.", type: "E" }, { text: "스트레스 받고 피하고 싶다.", type: "I" }] },
    { question: "단체 활동을 할 때 당신은?", options: [{ text: "분위기를 살리고 사람들을 연결한다.", type: "E" }, { text: "정해진 역할을 조용히 수행한다.", type: "I" }] },
    { question: "처음 가는 모임에서 당신은?", options: [{ text: "금방 적응하고 사람들과 친해진다.", type: "E" }, { text: "적응하는 데 시간이 걸린다.", type: "I" }] },
    { question: "연말 모임들이 많을 때 당신은?", options: [{ text: "설렌다. 다양한 사람을 만날 기회다.", type: "E" }, { text: "부담스럽다. 너무 많은 일정은 피한다.", type: "I" }] },
    { question: "친구가 갑자기 만나자고 할 때?", options: [{ text: "좋다! 바로 나갈 준비를 한다.", type: "E" }, { text: "심리적으로 준비가 필요해 망설인다.", type: "I" }] },
    { question: "일상에서 에너지는 어디서 얻는가?", options: [{ text: "사람들과의 교류에서 얻는다.", type: "E" }, { text: "혼자 있는 시간에서 충전된다.", type: "I" }] },
    { question: "회사에서 점심시간은 어떻게 보내고 싶은가?", options: [{ text: "여러 사람과 함께 떠들며 먹는다.", type: "E" }, { text: "혼자 또는 소수 인원과 조용히 먹는다.", type: "I" }] },
    { question: "화상회의나 발표 상황에서 당신은?", options: [{ text: "부담 없고 자연스럽다.", type: "E" }, { text: "긴장되고 피하고 싶다.", type: "I" }] },
    { question: "SNS 사용 스타일은?", options: [{ text: "활발히 글·사진·댓글을 남긴다.", type: "E" }, { text: "필요할 때만 조용히 본다.", type: "I" }] },
    { question: "집들이나 모임을 열라고 하면?", options: [{ text: "기꺼이 계획하고 사람들을 초대한다.", type: "E" }, { text: "부담스럽고 준비가 꺼려진다.", type: "I" }] },

    /* ---------------------- S / N (21~40) ---------------------- */
    { question: "새로운 프로젝트를 맡았을 때?", options: [{ text: "현재 상황과 필요한 자료부터 분석한다.", type: "S" }, { text: "전체 방향과 가능성을 먼저 떠올린다.", type: "N" }] },
    { question: "영화를 설명할 때 당신은?", options: [{ text: "구체적인 장면과 대사를 중심으로 말한다.", type: "S" }, { text: "감정, 상징 등 숨은 의미를 이야기한다.", type: "N" }] },
    { question: "요리 레시피를 볼 때?", options: [{ text: "정확한 계량과 절차를 따른다.", type: "S" }, { text: "대충 보고 창의적으로 변형한다.", type: "N" }] },
    { question: "문제를 해결할 때?", options: [{ text: "현실적인 방법부터 찾는다.", type: "S" }, { text: "새롭고 독창적인 접근을 고려한다.", type: "N" }] },
    { question: "여행 계획을 세울 때?", options: [{ text: "실제 이동 시간·거리 등을 꼼꼼히 확인한다.", type: "S" }, { text: "전체 분위기와 감성을 더 중시한다.", type: "N" }] },
    { question: "책을 읽을 때?", options: [{ text: "사실적인 내용과 구조를 파악한다.", type: "S" }, { text: "다른 의미나 메시지를 해석한다.", type: "N" }] },
    { question: "일을 배울 때?", options: [{ text: "정해진 매뉴얼을 따라 한다.", type: "S" }, { text: "원리를 이해하고 응용한다.", type: "N" }] },
    { question: "일상의 문제를 볼 때?", options: [{ text: "있는 그대로 현실을 본다.", type: "S" }, { text: "앞으로의 가능성을 상상한다.", type: "N" }] },
    { question: "대화를 할 때?", options: [{ text: "실용적이고 현실적인 이야기를 한다.", type: "S" }, { text: "미래, 아이디어 등 추상적 이야기를 즐긴다.", type: "N" }] },
    { question: "쇼핑할 때?", options: [{ text: "평소 쓰던 제품을 신뢰한다.", type: "S" }, { text: "새로운 브랜드나 컨셉에 끌린다.", type: "N" }] },
    { question: "직장에서 새로운 변화가 생겼을 때?", options: [{ text: "이유와 현재 영향부터 확인한다.", type: "S" }, { text: "그 변화가 가져올 미래를 먼저 생각한다.", type: "N" }] },
    { question: "문서를 작성할 때?", options: [{ text: "구체적 사실과 근거 중심으로 작성한다.", type: "S" }, { text: "전체 흐름과 메시지를 먼저 설계한다.", type: "N" }] },
    { question: "집을 꾸밀 때?", options: [{ text: "필요한 물건과 기능을 기준으로 선택한다.", type: "S" }, { text: "분위기, 감성, 콘셉트를 더 중시한다.", type: "N" }] },
    { question: "미래를 생각할 때?", options: [{ text: "현재 기반으로 가능한 계획을 세운다.", type: "S" }, { text: "이상적인 방향을 자유롭게 상상한다.", type: "N" }] },
    { question: "직장에서 새 툴을 배울 때?", options: [{ text: "설명서나 튜토리얼을 먼저 본다.", type: "S" }, { text: "직접 만져보며 이해한다.", type: "N" }] },
    { question: "주변 사람의 말에서 먼저 잡히는 것은?", options: [{ text: "핵심 사실과 정보.", type: "S" }, { text: "의도와 숨은 의미.", type: "N" }] },
    { question: "사진을 볼 때?", options: [{ text: "구체적인 디테일이 먼저 보인다.", type: "S" }, { text: "전체적인 분위기가 먼저 느껴진다.", type: "N" }] },
    { question: "문제를 바라보는 관점은?", options: [{ text: "현실적인 제약을 먼저 본다.", type: "S" }, { text: "가능한 해결 방향을 상상한다.", type: "N" }] },
    { question: "새로운 정보를 접했을 때?", options: [{ text: "사실 여부와 근거부터 확인한다.", type: "S" }, { text: "패턴과 의미를 먼저 찾는다.", type: "N" }] },
    { question: "일을 맡을 때 선호하는 방식은?", options: [{ text: "명확한 기준과 예시가 있는 것이 좋다.", type: "S" }, { text: "자유로운 방식으로 해보는 게 좋다.", type: "N" }] },

    /* ---------------------- T / F (41~60) ---------------------- */
    { question: "갈등 상황에서 당신은?", options: [{ text: "논리적으로 문제를 분석한다.", type: "T" }, { text: "상대 감정을 먼저 살핀다.", type: "F" }] },
    { question: "친구가 고민을 털어놓을 때?", options: [{ text: "해결책부터 떠올린다.", type: "T" }, { text: "공감하며 마음을 먼저 들어준다.", type: "F" }] },
    { question: "직장에서 의견 충돌이 있을 때?", options: [{ text: "옳고 그름, 효율성을 따진다.", type: "T" }, { text: "분위기와 감정적 상처를 걱정한다.", type: "F" }] },
    { question: "칭찬을 받았을 때?", options: [{ text: "성과를 인정받았다고 생각한다.", type: "T" }, { text: "상대의 마음이 고맙다.", type: "F" }] },
    { question: "어떤 사람에게 더 스트레스를 받는가?", options: [{ text: "말이 비논리적인 사람.", type: "T" }, { text: "감정 기복이 심한 사람.", type: "F" }] },
    { question: "중요한 결정을 할 때?", options: [{ text: "객관성과 합리성을 중시한다.", type: "T" }, { text: "사람에게 미칠 영향을 고려한다.", type: "F" }] },
    { question: "논쟁이 생겼을 때?", options: [{ text: "사실 근거로 조목조목 반박한다.", type: "T" }, { text: "상대 기분이 상하지 않게 말한다.", type: "F" }] },
    { question: "회사에서 평가를 받을 때?", options: [{ text: "성과 수치와 기준이 중요하다.", type: "T" }, { text: "동료와의 관계·협력이 더 중요하다.", type: "F" }] },
    { question: "상대가 무례했을 때 당신의 반응은?", options: [{ text: "문제가 된 행동을 명확히 지적한다.", type: "T" }, { text: "불편하지만 직접 말하기 어렵다.", type: "F" }] },
    { question: "타인의 실수를 보았을 때?", options: [{ text: "개선할 점을 바로 말한다.", type: "T" }, { text: "상대가 상처받지 않도록 조심한다.", type: "F" }] },
    { question: "중요한 메시지를 전달할 때?", options: [{ text: "명료함과 정확성이 최우선이다.", type: "T" }, { text: "말투와 감정이 상하지 않도록 신경 쓴다.", type: "F" }] },
    { question: "팀워크에서 가장 중요한 것은?", options: [{ text: "역할 분담과 효율성.", type: "T" }, { text: "화합과 서로에 대한 배려.", type: "F" }] },
    { question: "상대 문제에 조언할 때?", options: [{ text: "논리적인 해결법을 제시한다.", type: "T" }, { text: "마음에 공감해주는 것이 우선이다.", type: "F" }] },
    { question: "실수를 했을 때 스스로에게?", options: [{ text: "왜 그랬는지 원인을 분석한다.", type: "T" }, { text: "기분이 상하고 위로가 필요하다.", type: "F" }] },
    { question: "정의 vs 조화 중 무엇이 중요?", options: [{ text: "정확하고 공정한 판단.", type: "T" }, { text: "사람들 간의 관계와 화합.", type: "F" }] },
    { question: "의사 결정이 어려운 이유는?", options: [{ text: "정보가 명확하지 않을 때 어렵다.", type: "T" }, { text: "누군가 상처받을까 걱정된다.", type: "F" }] },
    { question: "조언을 들을 때 어떤 방식이 좋은가?", options: [{ text: "직설적이고 솔직한 조언.", type: "T" }, { text: "부드럽고 배려 있는 조언.", type: "F" }] },
    { question: "문제를 해결할 때 중요한 기준은?", options: [{ text: "효율·정확성.", type: "T" }, { text: "인간적인 면·감정.", type: "F" }] },
    { question: "일할 때 더 중요한 것은?", options: [{ text: "업무 성과와 결과.", type: "T" }, { text: "동료들과의 관계.", type: "F" }] },
    { question: "상대방이 힘들다고 할 때 당신은?", options: [{ text: "무엇이 문제인지 먼저 분석한다.", type: "T" }, { text: "힘들었겠다고 공감해준다.", type: "F" }] },

    /* ---------------------- J / P (61~80) ---------------------- */
    { question: "주말 여행을 계획할 때?", options: [{ text: "세부 일정까지 미리 정한다.", type: "J" }, { text: "대략만 정하고 즉흥적으로 움직인다.", type: "P" }] },
    { question: "업무 마감 기한이 있을 때?", options: [{ text: "미리미리 끝내는 편이다.", type: "J" }, { text: "마감 직전 집중력이 오른다.", type: "P" }] },
    { question: "방의 정리 상태는 대개?", options: [{ text: "정돈되어 있다.", type: "J" }, { text: "조금 어질러져 있어도 괜찮다.", type: "P" }] },
    { question: "갑작스러운 일정 변경은?", options: [{ text: "스트레스 받는다.", type: "J" }, { text: "재미있고 새로운 느낌이다.", type: "P" }] },
    { question: "결정을 내릴 때 당신은?", options: [{ text: "빠르게 결론을 내린다.", type: "J" }, { text: "가능한 선택지를 오래 두고 본다.", type: "P" }] },
    { question: "쇼핑할 때?", options: [{ text: "리뷰를 보고 계획적으로 산다.", type: "J" }, { text: "그때 기분에 따라 고른다.", type: "P" }] },
    { question: "업무 스타일은?", options: [{ text: "체계적으로 계획 후 실행.", type: "J" }, { text: "그때그때 유연하게 대응.", type: "P" }] },
    { question: "하루 일정을 운영할 때?", options: [{ text: "할 일을 리스트로 관리한다.", type: "J" }, { text: "필요한 것만 대략 머릿속으로 정한다.", type: "P" }] },
    { question: "여행 사진을 찍을 때?", options: [{ text: "필수 포인트를 미리 알아본다.", type: "J" }, { text: "즉흥적으로 눈에 보이는 대로 찍는다.", type: "P" }] },
    { question: "회의 준비를 할 때?", options: [{ text: "자료를 미리 정리해둔다.", type: "J" }, { text: "당일 즉석에서 아이디어를 정리한다.", type: "P" }] },
    { question: "정해진 규칙이 많으면?", options: [{ text: "안정감이 든다.", type: "J" }, { text: "답답하고 자유롭고 싶다.", type: "P" }] },
    { question: "프로젝트를 마무리할 때?", options: [{ text: "계획대로 완성해 만족한다.", type: "J" }, { text: "아이디어가 더 떠오르면 수정한다.", type: "P" }] },
    { question: "하루 중 가장 집중되는 시간은?", options: [{ text: "일찍부터 움직여야 집중된다.", type: "J" }, { text: "늦게라도 몰입되면 한다.", type: "P" }] },
    { question: "정해진 약속 시간은?", options: [{ text: "일찍 도착해서 기다린다.", type: "J" }, { text: "딱 맞거나 약간 늦는 편이다.", type: "P" }] },
    { question: "촉박한 일정이 생겼을 때?", options: [{ text: "빠르게 계획을 재정비한다.", type: "J" }, { text: "일단 시작하며 조율한다.", type: "P" }] },
    { question: "집안일을 할 때?", options: [{ text: "일정 루틴대로 처리한다.", type: "J" }, { text: "필요할 때만 한다.", type: "P" }] },
    { question: "새로운 업무 요청이 들어오면?", options: [{ text: "먼저 계획부터 세운다.", type: "J" }, { text: "일단 시작하며 방법을 찾는다.", type: "P" }] },
    { question: "여행 가방을 챙길 때?", options: [{ text: "체크리스트를 만들어 챙긴다.", type: "J" }, { text: "떠나는 날 되는 대로 챙긴다.", type: "P" }] },
    { question: "어떤 환경이 더 편한가?", options: [{ text: "예측 가능한 일정.", type: "J" }, { text: "그때그때 달라지는 환경.", type: "P" }] },
    { question: "일정을 마친 후 만족감은?", options: [{ text: "계획대로 실행했을 때 크다.", type: "J" }, { text: "즉흥적으로도 잘 해냈을 때 크다.", type: "P" }] }
];

const results = {
    "ISTJ": { image: "/mytools/MBTI_quick/istj.png", title: "현실주의자", subtitle: "책임감이 강하고 현실적인", description: "한번 시작한 일은 끝까지 해내는 책임감이 강한 유형입니다. 현실적이고 실용적인 것을 중요하게 생각하며, 체계적으로 일을 처리하는 것을 선호합니다." },
    "ISFJ": { image: "/mytools/MBTI_quick/isfj.png", title: "수호자", subtitle: "따뜻하고 헌신적인", description: "겸손하고 성실하며, 다른 사람을 돕는 것에서 큰 기쁨을 느낍니다. 안정과 조화를 중시하며, 주변 사람들을 세심하게 챙기는 따뜻한 마음을 가졌습니다." },
    "INFJ": { image: "/mytools/MBTI_quick/infj.png", title: "예언자", subtitle: "통찰력 있고 이상적인", description: "깊은 통찰력과 직관으로 사람과 세상을 이해합니다. 자신의 신념을 실현하고자 하는 강한 의지를 가졌으며, 더 나은 세상을 만드는 데 기여하고 싶어합니다." },
    "INTJ": { image: "/mytools/MBTI_quick/intj.png", title: "전략가", subtitle: "논리적이고 독립적인", description: "모든 일에 계획을 세우고 상상력이 풍부한 전략가입니다. 지식을 탐구하는 것을 즐기며, 복잡한 문제를 해결하는 데 뛰어난 능력을 보입니다." },
    "ISTP": { image: "/mytools/MBTI_quick/istp.png", title: "장인", subtitle: "논리적이고 실용적인", description: "도구와 기계를 다루는 데 능숙하며, 상황을 빠르게 파악하고 문제를 해결하는 능력이 뛰어납니다. 과묵하지만 필요할 땐 논리적으로 의견을 제시합니다." },
    "ISFP": { image: "/mytools/MBTI_quick/isfp.png", title: "예술가", subtitle: "온화하고 호기심 많은", description: "겸손하고 따뜻한 마음을 가진 예술가 유형입니다. 현재의 삶을 즐기며, 새로운 것을 시도하고 경험하는 것을 좋아합니다. 타인에게 친절하고 관용적입니다." },
    "INFP": { image: "/mytools/MBTI_quick/infp.png", title: "중재자", subtitle: "이상적이고 낭만적인", description: "따뜻하고 상상력이 풍부하며, 자신의 가치관과 이상을 매우 중요하게 생각합니다. 다른 사람의 감정에 깊이 공감하며, 진실된 관계를 추구합니다." },
    "INTP": { image: "/mytools/MBTI_quick/intp.png", title: "논리술사", subtitle: "지적 호기심이 왕성한", description: "끊임없이 새로운 아이디어를 탐구하는 논리적인 사색가입니다. 복잡한 이론이나 개념을 이해하는 것을 즐기며, 비판적이고 분석적인 사고를 합니다." },
    "ESTP": { image: "/mytools/MBTI_quick/estp.png", title: "모험가", subtitle: "에너지가 넘치고 유머러스한", description: "스릴과 모험을 즐기는 활동적인 유형입니다. 뛰어난 관찰력으로 상황을 빠르게 파악하고, 문제 해결에 직접 뛰어드는 것을 두려워하지 않습니다." },
    "ESFP": { image: "/mytools/MBTI_quick/esfp.png", title: "엔터테이너", subtitle: "사교적이고 즉흥적인", description: "타고난 스타성을 가진 사교적인 유형입니다. 사람들의 주목을 받는 것을 즐기며, 현재의 즐거움을 만끽합니다. 주변에 긍정적인 에너지를 전파합니다." },
    "ENFP": { image: "/mytools/MBTI_quick/enfp.png", title: "활동가", subtitle: "열정적이고 창의적인", description: "상상력이 풍부하고 열정적인 스파크를 가진 유형입니다. 새로운 사람과 아이디어를 만나는 것을 좋아하며, 긍정적이고 활기찬 에너지로 주변에 영감을 줍니다." },
    "ENTP": { image: "/mytools/MBTI_quick/entp.png", title: "토론가", subtitle: "재치 있고 지적인", description: "지적인 도전을 즐기는 뜨거운 논쟁가입니다. 고정관념에 얽매이지 않고, 다양한 가능성을 탐색하며 논쟁을 통해 아이디어를 발전시키는 것을 즐깁니다." },
    "ESTJ": { image: "/mytools/MBTI_quick/estj.png", title: "경영자", subtitle: "체계적이고 단호한", description: "현실적이고 실용적인 사고를 바탕으로 일을 체계적으로 관리하는 데 뛰어난 능력을 보입니다. 명확한 규칙과 절차를 선호하며, 책임감이 강합니다." },
    "ESFJ": { image: "/mytools/MBTI_quick/esfj.png", title: "조력자", subtitle: "사교적이고 인정 많은", description: "타인에게 관심이 많고 다른 사람을 돕는 것을 좋아합니다. 주변 사람들과의 조화를 중요하게 생각하며, 공동체의 발전을 위해 헌신합니다." },
    "ENFJ": { image: "/mytools/MBTI_quick/enfj.png", title: "선도자", subtitle: "카리스마 있고 영감을 주는", description: "사람들에게 긍정적인 영향을 미치는 것을 목표로 하는 카리스마 넘치는 리더입니다. 타인의 잠재력을 발견하고 성장을 돕는 데서 큰 보람을 느낍니다." },
    "ENTJ": { image: "/mytools/MBTI_quick/entj.png", title: "지도자", subtitle: "대담하고 결단력 있는", description: "타고난 통솔력과 비전을 가진 지도자 유형입니다. 도전을 두려워하지 않으며, 목표 달성을 위해 사람들을 이끌고 전략을 세우는 데 능숙합니다." }
};

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

function startFullTest() {
    document.querySelector('input[name="questionCount"][value="80"]').checked = true;
    startTest();
}

function startTest() {
    selectedQuestionCount = parseInt(document.querySelector('input[name="questionCount"]:checked').value);
    activeQuestions = [];

    // 1. Split questions by category
    const categories = {
        EI: questions.slice(0, 20),
        SN: questions.slice(20, 40),
        TF: questions.slice(40, 60),
        JP: questions.slice(60, 80)
    };

    // 2. Randomly select questions from each category
    const countPerCategory = selectedQuestionCount / 4;

    const getRandomItems = (array, count) => {
        const shuffled = [...array].sort(() => 0.5 - Math.random());
        return shuffled.slice(0, count);
    };

    const selectedEI = getRandomItems(categories.EI, countPerCategory);
    const selectedSN = getRandomItems(categories.SN, countPerCategory);
    const selectedTF = getRandomItems(categories.TF, countPerCategory);
    const selectedJP = getRandomItems(categories.JP, countPerCategory);

    // 3. Combine and shuffle final list
    activeQuestions = [
        ...selectedEI,
        ...selectedSN,
        ...selectedTF,
        ...selectedJP
    ];

    // Shuffle the final order so categories are mixed
    activeQuestions.sort(() => 0.5 - Math.random());

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

    if (currentQuestionIndex < selectedQuestionCount) {
        displayQuestion();
    } else {
        showResult();
    }
}

function calculateResult() {
    let mbti = '';

    // Count occurrences of each type
    const counts = userAnswers.reduce((acc, type) => {
        acc[type] = (acc[type] || 0) + 1;
        return acc;
    }, {});

    // Determine dominant type for each pair
    mbti += (counts['E'] || 0) >= (counts['I'] || 0) ? 'E' : 'I';
    mbti += (counts['S'] || 0) >= (counts['N'] || 0) ? 'S' : 'N';
    mbti += (counts['T'] || 0) >= (counts['F'] || 0) ? 'T' : 'F';
    mbti += (counts['J'] || 0) >= (counts['P'] || 0) ? 'J' : 'P';

    return mbti;
}

function showResult() {
    const mbtiType = calculateResult();
    const resultData = results[mbtiType];

    const resultEmojiContainer = document.getElementById('result-emoji');
    resultEmojiContainer.innerHTML = `<img src="${resultData.image}" alt="${mbtiType}" class="result-image">`;
    document.getElementById('result-title').innerText = `${mbtiType} - ${resultData.title}`;
    document.getElementById('result-subtitle').innerText = resultData.subtitle;
    document.getElementById('result-description').innerHTML = resultData.description;

    // Calculate Breakdown
    const counts = userAnswers.reduce((acc, type) => {
        acc[type] = (acc[type] || 0) + 1;
        return acc;
    }, {});

    const totalPerDichotomy = selectedQuestionCount / 4;

    const calcPercent = (type) => {
        const count = counts[type] || 0;
        return Math.round((count / totalPerDichotomy) * 100);
    };

    const pairs = [
        { left: 'E', right: 'I', labelLeft: '외향형 (E)', labelRight: '내향형 (I)' },
        { left: 'S', right: 'N', labelLeft: '감각형 (S)', labelRight: '직관형 (N)' },
        { left: 'T', right: 'F', labelLeft: '사고형 (T)', labelRight: '감정형 (F)' },
        { left: 'J', right: 'P', labelLeft: '판단형 (J)', labelRight: '인식형 (P)' }
    ];

    const breakdownContainer = document.getElementById('result-breakdown');
    breakdownContainer.innerHTML = '';

    pairs.forEach(pair => {
        const leftPercent = calcPercent(pair.left);
        const rightPercent = 100 - leftPercent; // Assuming binary choice, or calculate right explicitly if needed

        const item = document.createElement('div');
        item.className = 'breakdown-item';
        item.innerHTML = `
            <div class="breakdown-label">
                <span>${pair.labelLeft} ${leftPercent}%</span>
                <span>${pair.labelRight} ${rightPercent}%</span>
            </div>
            <div class="breakdown-bar-bg">
                <div class="breakdown-bar-fill bar-left" style="width: ${leftPercent}%"></div>
                <div class="breakdown-bar-fill bar-right" style="width: ${rightPercent}%; background-color: #ddd;"></div> 
            </div>
        `;
        // Note: Using #ddd for the right side to show contrast, or we can use a different color scheme.
        // Let's make it a single bar split.
        // Actually, let's use two distinct colors for left/right or just fill left.
        // Let's refine the bar HTML for better visual:
        item.innerHTML = `
            <div class="breakdown-label">
                <span>${pair.left} ${leftPercent}%</span>
                <span>${pair.right} ${rightPercent}%</span>
            </div>
            <div class="breakdown-bar-bg">
                <div class="breakdown-bar-fill" style="width: ${leftPercent}%; background-color: #4facfe;"></div>
                <div class="breakdown-bar-fill" style="width: ${rightPercent}%; background-color: #ff9a9e;"></div>
            </div>
        `;
        breakdownContainer.appendChild(item);
    });

    // Reset toggle state
    document.getElementById('result-breakdown').style.display = 'none';
    document.getElementById('toggle-breakdown-btn').innerHTML = '<i class="fas fa-chart-bar"></i> 성향 강도 보기';

    const detailsButton = document.getElementById('details-btn');
    const detailsUrl = `/mytools/MBTI_quick/${mbtiType.toLowerCase()}.html`;
    detailsButton.href = detailsUrl;

    testScreen.classList.remove('active');
    resultScreen.classList.add('active');
}

function toggleBreakdown() {
    const container = document.getElementById('result-breakdown');
    const btn = document.getElementById('toggle-breakdown-btn');

    if (container.style.display === 'none') {
        container.style.display = 'block';
        btn.innerHTML = '<i class="fas fa-chevron-up"></i> 성향 강도 접기';
    } else {
        container.style.display = 'none';
        btn.innerHTML = '<i class="fas fa-chart-bar"></i> 성향 강도 보기';
    }
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

    setTimeout(() => {
        toast.classList.add('show');
    }, 100);

    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => {
            document.body.removeChild(toast);
        }, 300);
    }, 2500);
}

function shareResult() {
    const resultTitle = document.getElementById('result-title').textContent;
    // const resultEmoji = document.getElementById('result-emoji').textContent; // Image now, so skip emoji in text share or use a default
    const resultEmoji = "✨";
    const resultSubtitle = document.getElementById('result-subtitle').textContent;
    const shareText = `나의 MBTI 결과는?\n${resultEmoji} ${resultTitle} (${resultSubtitle})\n\n당신의 유형도 알아보세요! 👉`;
    const shareUrl = window.location.href;

    if (navigator.share) {
        navigator.share({
            title: 'MBTI 유형 알아보기 결과',
            text: shareText,
            url: shareUrl
        }).catch(console.error);
    } else if (navigator.clipboard) {
        navigator.clipboard.writeText(shareText + ' ' + shareUrl).then(() => {
            showToast('결과가 클립보드에 복사되었습니다! 📋');
        });
    } else {
        const textArea = document.createElement('textarea');
        textArea.value = shareText + ' ' + shareUrl;
        textArea.style.position = 'fixed';
        textArea.style.left = '-9999px';
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();

        try {
            document.execCommand('copy');
            showToast('결과가 클립보드에 복사되었습니다! 📋');
        } catch (err) {
            showToast('복사에 실패했습니다. 😥');
        }

        document.body.removeChild(textArea);
    }
}
