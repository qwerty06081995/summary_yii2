
<div class="summary-default-index">
    <style>
        :root {
            /* Base styles (Open Tasks layout) */
            --primary-color: #6343e9;
            --primary-hover: #5235c3;
            --black-color: #0d0d0d;
            --text-gray: #6c757d;
            --bg-color: #f7f7f8;
            --border-color: #e5e5e5;
            --paper-width: 1100px;
            --font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;

            /* Form-specific styling (Unified) */
            --form-primary: var(--primary-color);
            --form-primary-hover: var(--primary-hover);
            --form-surface: #ffffff;
            --form-text: var(--black-color);
            --form-text-secondary: var(--text-gray);
        }

        /** {*/
        /*    box-sizing: border-box;*/
        /*    margin: 0;*/
        /*    padding: 0;*/
        /*}*/

        /*body {*/
        /*    font-family: var(--font-family);*/
        /*    background-color: var(--bg-color);*/
        /*    color: var(--black-color);*/
        /*    display: flex;*/
        /*    justify-content: center;*/
        /*    padding: 40px 20px;*/
        /*    min-height: 100vh;*/
        /*}*/

        .main-wrapper {
            width: 100%;
            max-width: var(--paper-width);
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        /* --- Стили Формы (Open Tasks Style) --- */
        .input-card {
            background-color: var(--form-surface);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: none;
            /* Open tasks uses plain border */
        }

        .header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 20px;
            cursor: pointer;
            background-color: transparent;
            border-bottom: 1px solid var(--border-color);
            transition: background-color 0.2s;
            border-radius: 0;
        }

        .input-card.collapsed .header-row {
            border-bottom-color: transparent;
        }

        .header-row:hover {
            background-color: #fcfcfc;
        }

        .header-row h2 {
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--form-text);
            margin: 0;
        }

        .toggle-icon {
            transition: transform 0.3s ease;
            color: var(--form-text-secondary);
        }

        .input-card.collapsed .toggle-icon {
            transform: rotate(-180deg);
        }

        .card-content {
            padding: 0;
            /* Removing padding from transitioning element */
            display: flex;
            flex-direction: column;
            max-height: 1200px;
            /* More realistic max-height for smoother timing */
            transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.3s ease;
            opacity: 1;
            overflow: hidden;
        }

        .card-inner {
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .input-card.collapsed .card-content {
            max-height: 0;
            opacity: 0;
            pointer-events: none;
        }

        /* Header Area inside content */
        .editor-title-area {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .editor-title h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--form-text);
            margin: 0;
        }

        .editor-title p {
            color: var(--form-text-secondary);
            margin-top: 4px;
            font-size: 1rem;
        }

        .sample-btn {
            background: none;
            border: none;
            color: var(--form-primary);
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.95rem;
            padding: 0;
        }

        .sample-btn:hover {
            opacity: 0.8;
        }

        /* Grid & Groups */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 16px;
        }

        .form-grid-2 {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 16px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group label {
            font-weight: 500;
            font-size: 0.9rem;
            color: var(--form-text);
        }

        /* Inputs Style */
        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            background-color: var(--form-surface);
            color: var(--form-text);
            font-size: 0.95rem;
            font-family: inherit;
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
        }

        input:focus,
        input[type="number"]:focus,
        select:focus,
        textarea:focus {
            border-color: var(--form-primary);
            box-shadow: 0 0 0 2px rgba(99, 67, 233, 0.2);
        }

        .textarea-wrapper {
            position: relative;
        }


        textarea {
            min-height: 120px;
            padding-bottom: 44px;
        }

        .input-icons {
            position: absolute;
            bottom: 12px;
            left: 12px;
            display: flex;
            gap: 16px;
        }

        .icon-action {
            color: var(--form-text-secondary);
            cursor: pointer;
            transition: color 0.2s;
        }

        .icon-action:hover {
            color: var(--form-primary);
        }

        .generate-btn {
            padding: 14px;
            border: none;
            border-radius: 8px;
            background-color: var(--form-primary);
            color: white;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-top: 8px;
            width: 100%;
        }

        .generate-btn:hover {
            background-color: var(--form-primary-hover);
        }

        /* --- Стили Слайдов (Slide Player) --- */
        .slider-container {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            display: none;
            flex-direction: column;
            animation: fadeIn 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
            width: 100%;
            /* For fullscreen black bars */
        }

        /* Fullscreen state helper */
        .slider-container:fullscreen {
            border-radius: 0;
            border: none;
        }

        .slide-content {
            position: relative;
            width: 100%;
            aspect-ratio: 16 / 9;
            background: #1a1a1a;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .slide-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            /* Hidden by default for fade-in */
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.4s ease;
        }

        .slide-image.loaded {
            opacity: 0.85;
        }

        .slide-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 32px 40px;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
            color: white;
        }

        .slide-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin: 0;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        /* Slide Text Panel */
        .slide-text-panel {
            position: absolute;
            top: 0;
            right: -350px;
            width: 320px;
            height: 100%;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(15px);
            z-index: 21;
            /* Above title overlay */
            transition: right 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            flex-direction: column;
            box-shadow: -5px 0 30px rgba(0, 0, 0, 0.15);
            color: var(--black-color);
        }

        .slide-text-panel.open {
            right: 0;
        }

        .slide-text-header {
            padding: 24px 24px 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #eee;
        }

        .slide-text-title {
            font-size: 1rem;
            font-weight: 700;
            color: var(--primary-color);
            margin: 0;
        }

        .close-text-btn {
            background: none;
            border: none;
            color: var(--text-gray);
            cursor: pointer;
            padding: 4px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .close-text-btn:hover {
            background: #f0f0f5;
            color: var(--black-color);
        }

        .slide-text-content {
            padding: 24px;
            font-size: 0.95rem;
            line-height: 1.7;
            color: #3f3f3f;
            overflow-y: auto;
            flex: 1;
        }

        /* Scrollbar Styling for Long Text */
        .slide-text-content::-webkit-scrollbar {
            width: 6px;
        }

        .slide-text-content::-webkit-scrollbar-track {
            background: transparent;
        }

        .slide-text-content::-webkit-scrollbar-thumb {
            background: #ddd;
            border-radius: 3px;
        }

        .slide-text-content::-webkit-scrollbar-thumb:hover {
            background: #ccc;
        }

        /* Progress Bar */
        .progress-wrapper {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: rgba(255, 255, 255, 0.2);
            z-index: 10;
        }

        .progress-bar {
            height: 100%;
            background: var(--primary-color);
            width: 0%;
            transition: width 0.3s ease;
        }

        /* Audio Player Section */
        .audio-controls {
            background: #ffffff;
            padding: 24px 32px;
            display: flex;
            align-items: center;
            gap: 24px;
            border-top: 1px solid var(--border-color);
        }

        .play-btn {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: var(--primary-color);
            color: white;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            flex-shrink: 0;
        }

        .play-btn:hover {
            transform: scale(1.05);
            background: var(--primary-hover);
        }

        .audio-timeline {
            flex: 1;
            height: 4px;
            background: #f0f0f0;
            border-radius: 2px;
            position: relative;
            cursor: pointer;
        }

        .audio-progress {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            background: var(--primary-color);
            border-radius: 2px;
            width: 0%;
            transition: width 0.1s linear;
        }

        .nav-buttons {
            display: flex;
            gap: 12px;
        }

        .nav-btn {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            border: 1px solid var(--border-color);
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
            color: var(--text-gray);
        }

        .nav-btn:hover:not(:disabled) {
            background: #f8f9fa;
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .nav-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .slide-counter {
            font-size: 0.85rem;
            font-weight: 500;
            color: var(--text-gray);
            min-width: 50px;
            text-align: center;
            user-select: none;
        }

        /* Tool Buttons (Fullscreen, Text) */
        .tool-buttons {
            display: flex;
            gap: 8px;
            margin-left: 8px;
        }

        .tool-btn {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            border: none;
            background: #f5f5f7;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
            color: var(--text-gray);
        }

        .tool-btn:hover {
            background: #eef;
            color: var(--primary-color);
        }

        .tool-btn.active {
            background: var(--primary-color);
            color: white;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Loader */
        .spinner {
            animation: rot 1s linear infinite;
        }

        .spinner circle {
            stroke-dasharray: 90, 150;
            stroke-dashoffset: 0;
            stroke-linecap: round;
        }

        @keyframes rot {
            100% {
                transform: rotate(360deg);
            }
        }

        /* --- Media Queries (Mobile Optimization) --- */
        @media (max-width: 768px) {
            body {
                padding: 20px 12px;
            }

            .main-wrapper {
                gap: 16px;
            }

            .card-inner {
                padding: 20px 16px;
                gap: 16px;
            }

            /* Form mobile */
            .form-grid {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .editor-title-area {
                flex-direction: column;
                gap: 12px;
                align-items: flex-start;
            }

            .editor-title h1 {
                font-size: 1.3rem;
            }

            /* Slider mobile */
            .slider-container {
                border-radius: 8px;
            }

            .slide-content {
                aspect-ratio: 4 / 3;
                /* Better for vertical-ish mobile usage */
            }

            .slide-overlay {
                padding: 20px;
            }

            .slide-title {
                font-size: 1.1rem;
            }

            .audio-controls {
                padding: 16px;
                gap: 12px;
                flex-wrap: wrap;
                /* Allow wrapping for small screens */
                justify-content: center;
            }

            .play-btn {
                width: 38px;
                height: 38px;
            }

            .audio-timeline {
                order: -1;
                /* Move timeline above controls on very small screens */
                flex-basis: 100%;
                margin-bottom: 4px;
            }

            .slide-counter {
                font-size: 0.8rem;
                min-width: 40px;
                order: 1;
            }

            .tool-buttons {
                gap: 6px;
                order: 2;
            }

            .nav-buttons {
                gap: 6px;
                order: 3;
                flex: 1;
                justify-content: flex-end;
            }

            .tool-btn,
            .nav-btn {
                width: 34px;
                height: 34px;
            }

            /* Text panel mobile */
            .slide-text-panel {
                width: 100%;
                right: -100%;
            }

            .slide-text-panel.open {
                right: 0;
            }
        }
    </style>
    <div class="main-wrapper">
        <!-- ФОРМА ВВОДА -->
        <div class="input-card" id="form-section">
            <div class="header-row" onclick="toggleForm()">
                <h2>Параметры задания</h2>
                <i data-lucide="chevron-up" class="toggle-icon"></i>
            </div>

            <div class="card-content" id="form-content">
                <div class="card-inner">
                    <div class="editor-title-area">
                        <div class="editor-title">
                            <h1>Генератор аудио-слайдов</h1>
                            <p>Создание визуального и звукового сопровождения к уроку.</p>
                        </div>
                        <button class="sample-btn" onclick="fillSample()">
                            <i data-lucide="Undo" size="18"></i>
                            <span>Образец</span>
                        </button>
                    </div>

                    <!-- Сетка 3 колонки -->
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Предмет</label>
                            <select id="subject">
                                <option value="" disabled selected>Выбрать</option>
                                <option value="География">География</option>
                                <option value="История">История</option>
                                <option value="Биология">Биология</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Язык</label>
                            <select id="language">
                                <option value="Русский">Русский</option>
                                <option value="Казахский">Қазақша</option>
                                <option value="Английский">English</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Класс</label>
                            <select id="grade">
                                <option value="8">8 класс</option>
                                <option value="9">9 класс</option>
                                <option value="10">10 класс</option>
                            </select>
                        </div>
                    </div>

                    <!-- Тема + Количество слайдов -->
                    <div class="form-grid-2">
                        <div class="form-group">
                            <label>Тема урока</label>
                            <input type="text" id="topic" placeholder="Например: Древний Египет" />
                        </div>
                        <div class="form-group">
                            <label>Количество слайдов</label>
                            <input type="number" id="slide-count" value="5" min="1" max="8" />
                        </div>
                    </div>

                    <!-- Доп. информация -->
                    <div class="form-group">
                        <label>Дополнительная информация</label>
                        <div class="textarea-wrapper">
                            <textarea id="extra" placeholder="Контекст урока, цели обучения..."></textarea>
                            <div class="input-icons">
                                <div class="icon-action" title="Голосовой ввод"><i data-lucide="mic" size="20"></i></div>
                                <div class="icon-action" title="Прикретить файл"><i data-lucide="paperclip" size="20"></i></div>
                            </div>
                        </div>
                    </div>

                    <button class="generate-btn" id="genBtn" onclick="generate()">
                        <i data-lucide="wand-2" size="20"></i>
                        <span id="btnText">Сгенерировать слайды</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- РЕЗУЛЬТАТ (Слайд-плеер) -->
        <div class="slider-container" id="doc-result">
            <div class="progress-wrapper">
                <div class="progress-bar" id="global-progress"></div>
            </div>

            <div class="slide-content" onclick="closeText()">
                <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b" class="slide-image" id="slide-img"
                     alt="Slide Image">
                <div class="slide-overlay">
                    <div class="slide-title" id="slide-title">Загрузка...</div>
                </div>
            </div>

            <div class="audio-controls">
                <audio id="slide-audio" preload="metadata"></audio>
                <button class="play-btn" id="play-pause" onclick="togglePlay()">
                    <i data-lucide="play" fill="white"></i>
                </button>

                <div class="audio-timeline" onclick="seek(event)">
                    <div class="audio-progress" id="audio-progress"></div>
                </div>

                <div class="slide-counter" id="slide-counter">1 / 5</div>

                <div class="tool-buttons">
                    <button class="tool-btn" id="text-toggle" onclick="toggleText()" title="Текст слайда">
                        <i data-lucide="file-text" size="18"></i>
                    </button>
                    <button class="tool-btn" onclick="toggleFullscreen()" title="На весь экран">
                        <i data-lucide="maximize" size="18"></i>
                    </button>
                </div>

                <div class="nav-buttons">
                    <button class="nav-btn" id="prev-btn" onclick="prevSlide()" disabled>
                        <i data-lucide="chevron-left"></i>
                    </button>
                    <button class="nav-btn" id="next-btn" onclick="nextSlide()">
                        <i data-lucide="chevron-right"></i>
                    </button>
                </div>
            </div>

            <!-- Боковая панель текста -->
            <div class="slide-text-panel" id="text-panel">
                <div class="slide-text-header">
                    <h3 class="slide-text-title">Содержание слайда</h3>
                    <button class="close-text-btn" onclick="closeText()">
                        <i data-lucide="x" size="18"></i>
                    </button>
                </div>
                <div class="slide-text-content" id="slide-text">
                    Текст слайда появится здесь...
                </div>
            </div>
        </div>
    </div>
    <script>
        lucide.createIcons();

        // Данные для слайдов
        let slideData = [];
        let currentSlideIndex = 0;
        let isPlaying = false;

        function fillSample() {
            document.getElementById("subject").value = "География";
            document.getElementById("language").value = "Русский";
            document.getElementById("grade").value = "8";
            document.getElementById("slide-count").value = "5";
            document.getElementById("topic").value = "Атмосфера Земли";
            document.getElementById("extra").value =
                "Создать серию слайдов о строении атмосферы, составе воздуха и озоновом слое.";
        }

        function toggleForm() {
            const card = document.getElementById("form-section");
            card.classList.toggle("collapsed");
        }

        function generate() {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const topic = document.getElementById("topic").value;
            if (!topic) {
                alert("Введите тему");
                return;
            }

            const btn = document.getElementById("genBtn");
            const btnText = document.getElementById("btnText");
            const result = document.getElementById("doc-result");
            const slideCountRaw = document.getElementById("slide-count").value;
            const slideCount = Math.max(1, Math.min(parseInt(slideCountRaw, 10) || 5, 20));

            btn.disabled = true;
            btnText.innerText = "Генерация...";

            btn.innerHTML = `
                <svg class="spinner" width="20" height="20" viewBox="0 0 50 50" style="margin-right: 10px; animation: rot 1s linear infinite;">
                  <circle cx="25" cy="25" r="20" fill="none" stroke="currentColor" stroke-width="5" stroke-dasharray="90, 150"></circle>
                </svg>
                <span>Генерируем слайды...</span>
                `;

            setTimeout(() => {
                // Имитация данных со звуковым текстом

                let payload = {
                    subject: document.getElementById("subject").value,
                    language: document.getElementById("language").value,
                    grade: document.getElementById("grade").value,
                    slide_count: document.getElementById("slide-count").value,
                    topic: document.getElementById("topic").value,
                    extra: document.getElementById("extra").value
                };

                // slideData = [
                //     {
                //         title: "Введение: Что такое атмосфера?",
                //         img: "https://avatars.mds.yandex.net/i?id=9dbdcf7506d7d4aaca4d358ad2049a75_l-8281157-images-thumbs&n=13",
                //         audio: "https://github.com/rafaelreis-hotmart/Audio-Sample-files/raw/master/sample.mp3",
                //         text: "Атмосфера — это газовая оболочка Земли, которая вращается вместе с ней как единое целое. Она состоит из сложной смеси различных газов, мельчайших твердых частиц (пыли) и водяного пара в различных состояниях. <br><br>Без атмосферы жизнь на нашей планете была бы абсолютно невозможна. Она выполняет ряд критически важных функций: защищает поверхность Земли от жесткого космического излучения (ультрафиолетового и рентгеновского), сжигает большинство метеоритов до того, как они достигнут поверхности, и создает парниковый эффект, благодаря которому средняя температура на планете пригодна для жизни. <br><br>Состав атмосферы менялся на протяжении миллиардов лет. Первичная атмосфера Земли состояла в основном из водорода и гелия. Затем, в результате вулканической активности, она насытилась углекислым газом и водяным паром. Появление первых фотосинтезирующих организмов привело к накоплению кислорода, что стало поворотным моментом в истории жизни.<br><br>Современная атмосфера — это результат тонкого баланса между биологическими, геологическими и химическими процессами. Она не имеет четко выраженной верхней границы и постепенно переходит в безвоздушное межпланетное пространство. Изучение атмосферы позволяет нам лучше понимать климатические изменения и прогнозировать погоду, что жизненно важно для авиации, сельского хозяйства и повседневной деятельности человека."
                //     },
                //     {
                //         title: "Химический состав воздуха",
                //         img: "https://avatars.mds.yandex.net/i?id=f96a920a449dd1b84593ef3dbef3153ee55b4a69-10021306-images-thumbs&n=13",
                //         audio: "https://download.samplelib.com/mp3/sample-6s.mp3",
                //         text: "Воздух — это не одно вещество, а смесь газов. Основную часть составляют Азот (78%) и Кислород (21%). Оставшийся 1% приходится на аргон, углекислый газ и другие газы. Кислород жизненно необходим для дыхания, а азот регулирует процессы горения."
                //     },
                //     {
                //         title: "Тропосфера и Стратосфера",
                //         img: "https://i.insider.com/609d4ce5070a690018af512b?width=1200&format=jpeg",
                //         audio: "https://download.samplelib.com/mp3/sample-9s.mp3",
                //         text: "Тропосфера — самый нижний слой, где сосредоточено 80% массы воздуха и формируется погода. Выше находится стратосфера, где воздух разрежен. Именно в стратосфере на высоте 20-25 км находится озоновый слой, поглощающий ультрафиолет."
                //     },
                //     {
                //         title: "Озоновый слой: Наша защита",
                //         img: "https://avatars.mds.yandex.net/i?id=66aac675209fce1db1e2e24d2be39729_l-4897119-images-thumbs&n=13",
                //         audio: "audio/slide-4.mp3",
                //         text: "Озоновый слой действует как невидимый щит. Он поглощает до 99% вредного солнечного излучения. Если бы этот слой исчез, жизнь на суше стала бы невозможной. Сегодня важно следить за сохранностью этого слоя и избегать выбросов разрушающих его веществ."
                //     },
                //     {
                //         title: "Глобальное потепление",
                //         img: "https://avatars.mds.yandex.net/i?id=c74237c22d2df6cac0fb7b0eec12b2c0_l-4591921-images-thumbs&n=13",
                //         audio: "audio/slide-5.mp3",
                //         text: "Из-за промышленной деятельности в атмосфере увеличивается концентрация парниковых газов, таких как CO2. Это приводит к задержке тепла и постепенному повышению средней температуры планеты. Защита атмосферы — задача планетарного масштаба."
                //     }
                // ];
                fetch("/summary/summary/generate", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-Token": csrfToken
                    },
                    body: JSON.stringify(payload)
                })
                    .then(r => r.json())
                    .then(data => {
                        //console.log(data);
                        slideData = data.slides;
                        console.log(slideData);
                        return;
                        slideData = slideData.slice(0, slideCount);

                        currentSlideIndex = 0;
                        preloadImages(slideData); // Предзагрузка всех картинок
                        updateSlide(0);

                        result.style.display = "flex";

                        // Сначала сворачиваем форму, чтобы освободить место
                        document.getElementById("form-section").classList.add("collapsed");

                        // Небольшой таймаут, чтобы дождаться начала анимации сворачивания
                        setTimeout(() => {
                            result.scrollIntoView({ behavior: "smooth", block: "start" });
                        }, 300);

                        btn.innerHTML = `<i data-lucide="rotate-ccw" size="20"></i> <span id="btnText">Сгенерировать заново</span>`;
                        lucide.createIcons();
                        btn.disabled = false;
                    });
            }, 1500);
        }

        function updateSlide(index) {
            const slide = slideData[index];
            const imgElement = document.getElementById("slide-img");
            const audioElement = document.getElementById("slide-audio");

            // Сначала скрываем старую картинку
            imgElement.classList.remove("loaded");

            // Меняем источник
            imgElement.src = slide.img;

            // Показываем, как только загрузится (или сразу, если уже в кеше)
            if (imgElement.complete) {
                imgElement.classList.add("loaded");
            } else {
                imgElement.onload = () => imgElement.classList.add("loaded");
            }

            document.getElementById("slide-title").innerText = slide.title;
            audioElement.src = slide.audio || "";
            audioElement.currentTime = 0;
            audioElement.pause();

            const textContainer = document.getElementById("slide-text");
            textContainer.innerHTML = slide.text;
            textContainer.scrollTop = 0; // Сброс прокрутки при смене слайда

            document.getElementById("slide-counter").innerText = `${index + 1} / ${slideData.length}`;

            // Общий прогресс
            const globalProgress = ((index + 1) / slideData.length) * 100;
            document.getElementById("global-progress").style.width = `${globalProgress}%`;

            // Навигация
            document.getElementById("prev-btn").disabled = (index === 0);
            document.getElementById("next-btn").disabled = (index === slideData.length - 1);

            // Сброс аудио-прогресса
            resetAudio();
        }

        function nextSlide() {
            if (currentSlideIndex < slideData.length - 1) {
                currentSlideIndex++;
                updateSlide(currentSlideIndex);
            }
        }

        function prevSlide() {
            if (currentSlideIndex > 0) {
                currentSlideIndex--;
                updateSlide(currentSlideIndex);
            }
        }

        function togglePlay() {
            const audioElement = document.getElementById("slide-audio");
            isPlaying = !isPlaying;
            const playBtn = document.getElementById("play-pause");
            playBtn.innerHTML = isPlaying
                ? `<i data-lucide="pause" fill="white"></i>`
                : `<i data-lucide="play" fill="white"></i>`;
            lucide.createIcons();

            if (isPlaying) {
                audioElement.play().catch(() => {
                    isPlaying = false;
                    playBtn.innerHTML = `<i data-lucide="play" fill="white"></i>`;
                    lucide.createIcons();
                });
            } else {
                audioElement.pause();
            }
        }

        function resetAudio() {
            isPlaying = false;
            document.getElementById("play-pause").innerHTML = `<i data-lucide="play" fill="white"></i>`;
            document.getElementById("audio-progress").style.width = "0%";
            lucide.createIcons();
        }

        function seek(e) {
            const timeline = e.currentTarget;
            const rect = timeline.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const percentage = (x / rect.width) * 100;
            const audioElement = document.getElementById("slide-audio");
            if (audioElement.duration && isFinite(audioElement.duration)) {
                audioElement.currentTime = (percentage / 100) * audioElement.duration;
            }
        }

        // Дополнительные функции
        function toggleFullscreen() {
            const container = document.getElementById("doc-result");
            if (!document.fullscreenElement) {
                container.requestFullscreen().catch(err => {
                    alert(`Ошибка при переходе в полноэкранный режим: ${err.message}`);
                });
            } else {
                document.exitFullscreen();
            }
        }

        function toggleText() {
            const panel = document.getElementById("text-panel");
            const btn = document.getElementById("text-toggle");
            panel.classList.toggle("open");
            btn.classList.toggle("active");
        }

        function closeText() {
            const panel = document.getElementById("text-panel");
            const btn = document.getElementById("text-toggle");
            if (panel.classList.contains("open")) {
                panel.classList.remove("open");
                btn.classList.remove("active");
            }
        }

        function preloadImages(data) {
            data.forEach(item => {
                const img = new Image();
                img.src = item.img;
            });
        }

        // Привязка прогресса и автоперехода к реальному аудио
        (function bindAudioEvents() {
            const audioElement = document.getElementById("slide-audio");
            audioElement.addEventListener("timeupdate", () => {
                if (!audioElement.duration || !isFinite(audioElement.duration)) {
                    document.getElementById("audio-progress").style.width = "0%";
                    return;
                }
                const percent = (audioElement.currentTime / audioElement.duration) * 100;
                document.getElementById("audio-progress").style.width = `${percent}%`;
            });
            audioElement.addEventListener("ended", () => {
                isPlaying = false;
                document.getElementById("play-pause").innerHTML = `<i data-lucide="play" fill="white"></i>`;
                lucide.createIcons();
                nextSlide();
            });
        })();
    </script>
</div>
