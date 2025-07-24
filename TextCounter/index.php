<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글자수 카운터 | 빠르고 정확한 단어, 문자 수 계산기</title>
    <meta name="description" content="온라인 텍스트 글자수 계산기. 공백 포함/제외 글자수, 단어 수, 줄 수를 실시간으로 확인하세요. 텍스트 파일(.txt)을 업로드하여 바로 분석할 수 있습니다.">
    <meta name="keywords" content="글자수세기, 글자수계산기, 텍스트카운터, 단어수세기, 문자수계산, 온라인글자수, TextCounter">
    <meta name="author" content="pdnote">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://pdnote.com/TextCounter">
    <meta property="og:title" content="텍스트 글자수 카운터 | 빠르고 정확한 단어, 문자 수 계산기">
    <meta property="og:description" content="온라인 텍스트 글자수 계산기. 공백 포함/제외 글자수, 단어 수, 줄 수를 실시간으로 확인하세요.">
    <meta property="og:image" content="https://pdnote.com/wp-content/uploads/2025/07/simple_compose.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://pdnote.com/TextCounter">
    <meta property="twitter:title" content="텍스트 글자수 카운터 | 빠르고 정확한 단어, 문자 수 계산기">
    <meta property="twitter:description" content="온라인 텍스트 글자수 계산기. 공백 포함/제외 글자수, 단어 수, 줄 수를 실시간으로 확인하세요.">
    <meta property="twitter:image" content="https://pdnote.com/wp-content/uploads/2025/07/simple_compose.png">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #afb0b2ff 0%, #e5e4e7ff 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }
        
        .header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .header h1 {
            color: #2c3e50;
            font-size: 2.5rem;
            margin-bottom: 10px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .header p {
            color: #7f8c8d;
            font-size: 1.1rem;
        }
        
        .input-section {
            margin-bottom: 30px;
        }
        
        .file-upload {
            border: 3px dashed #bdc3c7;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            margin-bottom: 20px;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
        }
        
        .file-upload:hover, .file-upload.dragover {
            border-color: #3498db;
            background: #f8f9fa;
            transform: translateY(-2px);
        }
        
        .file-upload input[type="file"] {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }
        
        .file-upload-content {
            pointer-events: none;
        }
        
        .file-icon {
            font-size: 3rem;
            color: #3498db;
            margin-bottom: 15px;
        }
        
        .divider {
            text-align: center;
            margin: 30px 0;
            color: #95a5a6;
            font-weight: bold;
        }
        
        .divider::before,
        .divider::after {
            content: '';
            display: inline-block;
            width: 100px;
            height: 1px;
            background: #bdc3c7;
            vertical-align: middle;
        }
        
        .divider::before {
            margin-right: 20px;
        }
        
        .divider::after {
            margin-left: 20px;
        }
        
        .text-input {
            width: 100%;
            min-height: 200px;
            padding: 20px;
            border: 2px solid #4224eeff;
            border-radius: 15px;
            font-size: 16px;
            font-family: inherit;
            resize: vertical;
            transition: border-color 0.3s ease;
        }
        
        .text-input:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(9, 129, 208, 0.1);
        }
        
        .results {
            background: linear-gradient(135deg, #6e74ecff 0%, #4343dbff 100%);
            border-radius: 20px;
            padding: 30px;
            margin-top: 30px;
            color: white;
        }
        
        .results h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 1.8rem;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        
        .stat-card {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 10px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .stat-label {
            font-size: 1rem;
            opacity: 0.9;
        }
        
        .file-info {
            background: #e8f5e8;
            color: #27ae60;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            border-left: 4px solid #27ae60;
        }
        
        .clear-btn {
            background: linear-gradient(45deg, #4664fbff, #2438eeff);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
            box-shadow: 0 4px 15px rgba(67, 20, 3, 0.3);
        }
        
        .clear-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(73, 70, 240, 0.4);
        }
        
        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <!-- 구글 태그 (</head> 태그 전에) -->
    <?php include $_SERVER['DOCUMENT_ROOT'] .'/mytools/_template/google.php'; ?>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📊 글자수 빠르게 계산하기</h1>
            <p>텍스트를 입력하거나 파일을 업로드하여 글자수와 단어수를 확인하세요</p>
        </div>
        
        <div class="input-section">
            <div class="file-upload" onclick="document.getElementById('fileInput').click()">
                <input type="file" id="fileInput" accept=".txt,.doc,.docx" multiple>
                <div class="file-upload-content">
                    <div class="file-icon">📁</div>
                    <h3>파일 업로드</h3>
                    <p>텍스트 파일(.txt, .doc, .docx)을 드래그하거나 클릭하여 선택하세요</p>
                </div>
            </div>
            
            <div id="fileInfo" class="file-info" style="display: none;"></div>
            
            <div class="divider">또는</div>
            
            <textarea 
                id="textInput" 
                class="text-input" 
                placeholder="여기에 텍스트를 입력하세요..."></textarea>
            
            <button class="clear-btn" onclick="clearAll()">🗑️ 모두 지우기</button>
        </div>
        
        <div class="results">
            <h2>📈 분석 결과</h2>
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number" id="totalChars">0</div>
                    <div class="stat-label">전체 글자수<br>(공백 포함)</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" id="charsNoSpace">0</div>
                    <div class="stat-label">글자수<br>(공백 제외)</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" id="wordCount">0</div>
                    <div class="stat-label">단어수</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" id="lineCount">0</div>
                    <div class="stat-label">줄 수</div>
                </div>
            </div>
        </div> 
    </div>
    <br>
    <div class="container">
        <div style="margin: 0 auto;">
            <!-- 멀티플(수직) -->
            <ins class="adsbygoogle"
                style="display:block"
                data-ad-format="autorelaxed"
                data-ad-client="ca-pub-8111724804339155"
                data-ad-slot="1516609066"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    </div>

    <script>
        const textInput = document.getElementById('textInput');
        const fileInput = document.getElementById('fileInput');
        const fileInfo = document.getElementById('fileInfo');
        const fileUpload = document.querySelector('.file-upload');
        
        // 텍스트 입력 시 실시간 카운트
        textInput.addEventListener('input', updateCount);
        
        // 파일 업로드 처리
        fileInput.addEventListener('change', handleFileSelect);
        
        // 드래그 앤 드롭 처리
        fileUpload.addEventListener('dragover', (e) => {
            e.preventDefault();
            fileUpload.classList.add('dragover');
        });
        
        fileUpload.addEventListener('dragleave', () => {
            fileUpload.classList.remove('dragover');
        });
        
        fileUpload.addEventListener('drop', (e) => {
            e.preventDefault();
            fileUpload.classList.remove('dragover');
            const files = e.dataTransfer.files;
            handleFiles(files);
        });
        
        function handleFileSelect(e) {
            handleFiles(e.target.files);
        }
        
        async function handleFiles(files) {
            if (files.length === 0) return;
            
            let allText = '';
            let fileNames = [];
            
            for (let file of files) {
                fileNames.push(file.name);
                
                if (file.type === 'text/plain' || file.name.endsWith('.txt')) {
                    const text = await readTextFile(file);
                    allText += text + '\n\n';
                } else if (file.name.endsWith('.docx')) {
                    // DOCX 파일의 경우 사용자에게 안내
                    allText += `[${file.name} - DOCX 파일은 텍스트를 복사하여 붙여넣어 주세요]\n\n`;
                } else {
                    // 기타 파일도 텍스트로 읽기 시도
                    try {
                        const text = await readTextFile(file);
                        allText += text + '\n\n';
                    } catch (error) {
                        allText += `[${file.name} - 읽을 수 없는 파일 형식]\n\n`;
                    }
                }
            }
            
            // 파일 정보 표시
            fileInfo.style.display = 'block';
            fileInfo.innerHTML = `
                <strong>업로드된 파일:</strong> ${fileNames.join(', ')}<br>
                <small>파일 내용이 아래 텍스트 영역에 추가되었습니다.</small>
            `;
            
            // 기존 텍스트에 추가
            textInput.value = (textInput.value + '\n\n' + allText).trim();
            updateCount();
        }
        
        function readTextFile(file) {
            return new Promise((resolve, reject) => {
                const reader = new FileReader();
                reader.onload = (e) => resolve(e.target.result);
                reader.onerror = (e) => reject(e);
                reader.readAsText(file, 'UTF-8');
            });
        }
        
        function updateCount() {
            const text = textInput.value;
            
            // 전체 글자수 (공백 포함)
            const totalChars = text.length;
            
            // 글자수 (공백 제외)
            const charsNoSpace = text.replace(/\s/g, '').length;
            
            // 단어수 (한글, 영문 모두 고려)
            let wordCount = 0;
            if (text.trim()) {
                // 영문 단어
                const englishWords = text.match(/[a-zA-Z]+/g) || [];
                // 한글 단어 (연속된 한글 문자)
                const koreanWords = text.match(/[가-힣]+/g) || [];
                // 숫자
                const numbers = text.match(/\d+/g) || [];
                
                wordCount = englishWords.length + koreanWords.length + numbers.length;
            }
            
            // 줄 수
            const lineCount = text ? text.split('\n').length : 0;
            
            // 결과 업데이트
            document.getElementById('totalChars').textContent = totalChars.toLocaleString();
            document.getElementById('charsNoSpace').textContent = charsNoSpace.toLocaleString();
            document.getElementById('wordCount').textContent = wordCount.toLocaleString();
            document.getElementById('lineCount').textContent = lineCount.toLocaleString();
        }
        
        function clearAll() {
            textInput.value = '';
            fileInput.value = '';
            fileInfo.style.display = 'none';
            updateCount();
        }
        
        // 페이지 로드 시 초기 카운트
        updateCount();
    </script>
 

    <!-- Footer 태그 -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/mytools/_template/footer.php'; ?>
</body>
</html>