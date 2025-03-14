<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>未来的なWelcomeスクリーン</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #0c0c1e;
            color: #fff;
            overflow: hidden;
            height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            perspective: 1000px;
        }

        .container {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1;
        }

        .welcome-card {
            position: relative;
            width: 80%;
            max-width: 800px;
            background: rgba(16, 18, 42, 0.7);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(66, 130, 255, 0.5);
            box-shadow: 0 0 30px rgba(66, 130, 255, 0.3);
            padding: 40px;
            text-align: center;
            transform-style: preserve-3d;
            animation: float 6s ease-in-out infinite;
            z-index: 2;
        }

        .welcome-title {
            font-size: 3.5rem;
            margin-bottom: 20px;
            color: #fff;
            text-shadow: 0 0 10px rgba(66, 130, 255, 0.8);
            position: relative;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1.5s forwards 0.5s;
        }

        .welcome-text {
            font-size: 1.3rem;
            line-height: 1.6;
            color: #ccd6f6;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1.5s forwards 2s;
            margin-top: 40px;
        }

        .btn-enter {
            width: 220px;
            height: 220px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1.5s forwards 1.5s, float 6s ease-in-out infinite 2s;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 0 0 30px rgba(66, 130, 255, 0.6);
            margin: 20px auto;
        }

        .btn-enter img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .btn-enter:hover {
            transform: scale(1.1);
            box-shadow: 0 0 30px rgba(66, 130, 255, 0.8);
        }

        .btn-enter:after {
            content: 'ENTER';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 15px 0;
            background: rgba(16, 18, 42, 0.7);
            color: white;
            text-align: center;
            font-weight: 500;
            font-size: 1.1rem;
            letter-spacing: 2px;
        }

        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .grid-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                linear-gradient(rgba(66, 130, 255, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(66, 130, 255, 0.1) 1px, transparent 1px);
            background-size: 40px 40px;
            animation: gridMove 20s linear infinite;
            z-index: 1;
        }

        .circle {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(66, 130, 255, 0.5), rgba(66, 130, 255, 0));
            animation: pulse 4s ease-in-out infinite;
            z-index: 0;
            opacity: 0.5;
        }

        .circle:nth-child(1) {
            width: 400px;
            height: 400px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .circle:nth-child(2) {
            width: 300px;
            height: 300px;
            bottom: 10%;
            right: 20%;
            animation-delay: 1s;
        }

        .circle:nth-child(3) {
            width: 200px;
            height: 200px;
            top: 40%;
            right: 10%;
            animation-delay: 2s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotateX(2deg) rotateY(2deg);
            }
            50% {
                transform: translateY(-20px) rotateX(-2deg) rotateY(-2deg);
            }
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
                opacity: 0.5;
            }
            50% {
                transform: scale(1.2);
                opacity: 0.8;
            }
        }

        @keyframes shine {
            0% {
                left: -100%;
                top: -100%;
            }
            20%, 100% {
                left: 100%;
                top: 100%;
            }
        }

        @keyframes glow {
            0%, 100% {
                box-shadow: 0 0 20px rgba(66, 130, 255, 0.8);
            }
            50% {
                box-shadow: 0 0 30px rgba(110, 66, 255, 0.9);
            }
        }

        @keyframes gridMove {
            0% {
                background-position: 0 0;
            }
            100% {
                background-position: 40px 40px;
            }
        }

        .loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #0c0c1e;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10;
            transition: opacity 0.8s ease, visibility 0.8s;
        }

        .loader-content {
            position: relative;
            width: 150px;
            height: 150px;
        }

        .loader-spinner {
            position: absolute;
            width: 100%;
            height: 100%;
            border: 5px solid transparent;
            border-top-color: #4282ff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        .loader-spinner:nth-child(2) {
            width: 80%;
            height: 80%;
            top: 10%;
            left: 10%;
            border-top-color: #6e42ff;
            animation-duration: 0.8s;
            animation-direction: reverse;
        }

        .loader-spinner:nth-child(3) {
            width: 60%;
            height: 60%;
            top: 20%;
            left: 20%;
            border-top-color: #42b4ff;
            animation-duration: 0.6s;
        }

        .loader-text {
            position: absolute;
            top: 120%;
            width: 100%;
            text-align: center;
            color: #4282ff;
            font-size: 1.2rem;
            letter-spacing: 3px;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        .hidden {
            opacity: 0;
            visibility: hidden;
        }

        .flying-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .flying-element {
            position: absolute;
            background: rgba(66, 130, 255, 0.2);
            border-radius: 5px;
            pointer-events: none;
            animation: fly 15s linear infinite;
            z-index: 0;
        }

        @keyframes fly {
            0% {
                transform: translateX(-100vw) translateY(random(100)vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 0.5;
            }
            90% {
                opacity: 0.5;
            }
            100% {
                transform: translateX(100vw) translateY(random(100)vh) rotate(360deg);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <div class="loader" id="loader">
        <div class="loader-content">
            <div class="loader-spinner"></div>
            <div class="loader-spinner"></div>
            <div class="loader-spinner"></div>
            <div class="loader-text">LOADING...</div>
        </div>
    </div>

    <div class="grid-background"></div>

    <div class="circles">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>

    <div class="flying-elements" id="flyingElements"></div>

    <div class="particles" id="particles"></div>

    <div class="container">
        <div class="welcome-card">
            <h1 class="welcome-title">WELCOME</h1>
            <div class="btn-enter" id="enterButton">
            <img src="{{ asset('img/ninjack.png') }}" alt="Enter" />
            </div>
            <p class="welcome-text">Laravelのゲートウェイへようこそ。<br>最先端のデジタル体験の世界への扉が今、開かれます。</p>
        </div>
    </div>

    <script>
        // ローディング画面の制御
        window.addEventListener('load', () => {
            setTimeout(() => {
                document.getElementById('loader').classList.add('hidden');
            }, 2000);
        });

        // 動く背景要素の作成
        function createFlyingElements() {
            const container = document.getElementById('flyingElements');
            const count = 15;

            for (let i = 0; i < count; i++) {
                const element = document.createElement('div');
                element.classList.add('flying-element');

                // ランダムなサイズと形
                const size = Math.random() * 30 + 10;
                element.style.width = `${size}px`;
                element.style.height = `${size}px`;

                // ランダムな位置と角度
                const yPos = Math.random() * 100;
                const delay = Math.random() * 15;
                const duration = Math.random() * 10 + 10;
                const rotation = Math.random() * 360;

                element.style.top = `${yPos}%`;
                element.style.animationDelay = `${delay}s`;
                element.style.animationDuration = `${duration}s`;
                element.style.transform = `rotate(${rotation}deg)`;

                container.appendChild(element);
            }
        }

        // パーティクルの作成
        function createParticles() {
            const canvas = document.createElement('canvas');
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            document.getElementById('particles').appendChild(canvas);

            const ctx = canvas.getContext('2d');
            const particles = [];
            const particleCount = 100;

            // パーティクルクラス
            class Particle {
                constructor() {
                    this.x = Math.random() * canvas.width;
                    this.y = Math.random() * canvas.height;
                    this.size = Math.random() * 3 + 1;
                    this.speedX = Math.random() * 2 - 1;
                    this.speedY = Math.random() * 2 - 1;
                    this.color = `rgba(${Math.random() * 100 + 100}, ${Math.random() * 100 + 100}, 255, ${Math.random() * 0.5 + 0.2})`;
                }

                update() {
                    this.x += this.speedX;
                    this.y += this.speedY;

                    if (this.x > canvas.width || this.x < 0) {
                        this.speedX = -this.speedX;
                    }

                    if (this.y > canvas.height || this.y < 0) {
                        this.speedY = -this.speedY;
                    }
                }

                draw() {
                    ctx.fillStyle = this.color;
                    ctx.beginPath();
                    ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                    ctx.fill();
                }
            }

            // パーティクルを初期化
            for (let i = 0; i < particleCount; i++) {
                particles.push(new Particle());
            }

            function animate() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);

                for (let i = 0; i < particles.length; i++) {
                    particles[i].update();
                    particles[i].draw();

                    // パーティクル間の線を描画
                    for (let j = i + 1; j < particles.length; j++) {
                        const dx = particles[i].x - particles[j].x;
                        const dy = particles[i].y - particles[j].y;
                        const distance = Math.sqrt(dx * dx + dy * dy);

                        if (distance < 100) {
                            ctx.beginPath();
                            ctx.strokeStyle = `rgba(66, 130, 255, ${0.2 - distance/500})`;
                            ctx.lineWidth = 0.5;
                            ctx.moveTo(particles[i].x, particles[i].y);
                            ctx.lineTo(particles[j].x, particles[j].y);
                            ctx.stroke();
                        }
                    }
                }

                requestAnimationFrame(animate);
            }

            animate();

            // ウィンドウリサイズ時にキャンバスサイズを調整
            window.addEventListener('resize', () => {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
            });
        }

        // カードの3D効果
        function initCard3DEffect() {
            const card = document.querySelector('.welcome-card');
            const container = document.querySelector('.container');

            container.addEventListener('mousemove', (e) => {
                const xAxis = (window.innerWidth / 2 - e.pageX) / 25;
                const yAxis = (window.innerHeight / 2 - e.pageY) / 25;
                card.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
            });

            container.addEventListener('mouseenter', () => {
                card.style.transition = 'none';
            });

            container.addEventListener('mouseleave', () => {
                card.style.transition = 'all 0.5s ease';
                card.style.transform = 'rotateY(0deg) rotateX(0deg)';
            });
        }

        // Enter 画像ボタンのイベント
        document.getElementById('enterButton').addEventListener('click', () => {
            // クリック時にボタン自体の効果
            const button = document.getElementById('enterButton');
            button.style.transform = 'scale(0.9)';
            button.style.boxShadow = '0 0 50px rgba(110, 66, 255, 0.9)';

            setTimeout(() => {
                button.style.transform = 'scale(1.2)';

                // カードの効果
                const card = document.querySelector('.welcome-card');
                card.style.transform = 'translateZ(100px) scale(1.1)';
                card.style.boxShadow = '0 0 50px rgba(66, 130, 255, 0.8)';

                setTimeout(() => {
                    card.style.opacity = '0';
                    card.style.transform = 'translateZ(500px) scale(0.2)';

                    setTimeout(() => {
                        // ここに遷移先のコードを入れます
                        alert('Welcome to the future experience!');
                        location.reload();
                    }, 1000);
                }, 500);
            }, 200);
        });

        // 初期化
        window.onload = function() {
            createFlyingElements();
            createParticles();
            initCard3DEffect();
        };
    </script>
</body>
</html>
