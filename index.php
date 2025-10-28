<!DOCTYPE html>
<html lang="ms">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartSuite ADTEC - Selamat Datang</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', 'Helvetica Neue', sans-serif;
            overflow-x: hidden;
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 50%, #3b82f6 100%);
        }

        /* Preloader */
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 50%, #3b82f6 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }

        .loader {
            width: 50px;
            height: 50px;
            border: 3px solid rgba(37, 99, 235, 0.2);
            border-top: 3px solid #2563eb;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Particles Container */
        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 1;
            opacity: 1;
        }

        /* Main Content */
        .content-wrapper {
            position: relative;
            z-index: 2;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .welcome-card {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 2px;
            padding: 80px 60px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
            text-align: center;
            max-width: 700px;
            width: 100%;
            backdrop-filter: blur(10px);
            opacity: 0;
            transform: translateY(30px);
        }

        .logo-container {
            margin-bottom: 50px;
        }

        .logo-img {
            width: 120px;
            height: 120px;
            object-fit: contain;
            filter: brightness(1.1);
        }

        .welcome-title {
            font-size: 2.8rem;
            font-weight: 300;
            color: #1e3a8a;
            margin-bottom: 20px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .brand-name {
            font-weight: 600;
            color: #2563eb;
        }

        .welcome-subtitle {
            font-size: 1.1rem;
            color: #475569;
            margin-bottom: 50px;
            line-height: 1.8;
            font-weight: 300;
            letter-spacing: 0.5px;
        }

        .divider {
            width: 60px;
            height: 2px;
            background: #2563eb;
            margin: 30px auto;
        }

        .login-btn {
            background: #2563eb;
            border: 2px solid #2563eb;
            color: white;
            padding: 16px 60px;
            font-size: 1rem;
            font-weight: 500;
            border-radius: 2px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            opacity: 1 !important;
        }

        .login-btn:hover {
            background: transparent;
            color: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.3);
        }

        .login-btn i {
            margin-left: 12px;
            transition: transform 0.3s ease;
        }

        .login-btn:hover i {
            transform: translateX(5px);
        }

        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
            margin-top: 60px;
            padding-top: 50px;
            border-top: 1px solid rgba(37, 99, 235, 0.2);
        }

        .feature-item {
            opacity: 0;
            transform: translateY(20px);
        }

        .feature-item i {
            font-size: 1.8rem;
            color: #2563eb;
            margin-bottom: 15px;
        }

        .feature-text {
            font-size: 0.85rem;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;
        }

        .footer-text {
            margin-top: 50px;
            font-size: 0.75rem;
            color: #94a3b8;
            letter-spacing: 0.5px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .welcome-card {
                padding: 60px 40px;
            }

            .welcome-title {
                font-size: 2rem;
            }

            .welcome-subtitle {
                font-size: 1rem;
            }

            .logo-img {
                width: 100px;
                height: 100px;
            }

            .features {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .login-btn {
                padding: 14px 50px;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 576px) {
            .welcome-card {
                padding: 40px 25px;
            }

            .welcome-title {
                font-size: 1.6rem;
            }

            .welcome-subtitle {
                font-size: 0.95rem;
            }

            .login-btn {
                padding: 12px 40px;
                font-size: 0.85rem;
                letter-spacing: 1px;
            }
        }
    </style>
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>

    <!-- Particles Background -->
    <div id="particles-js"></div>

    <!-- Main Content -->
    <div class="content-wrapper">
        <div class="welcome-card">
            <div class="logo-container">
                <img src="https://via.placeholder.com/120/2563eb/ffffff?text=ADTEC" alt="SmartSuite ADTEC Logo" class="logo-img">
            </div>

            <h1 class="welcome-title">Selamat Datang</h1>
            <div class="divider"></div>
            <p class="welcome-subtitle">
                Sistem Pengurusan Bersepadu <span class="brand-name">SmartSuite ADTEC</span><br>
                Platform Digital untuk Kecemerlangan Organisasi
            </p>

            <a href="auth/login.php" class="login-btn">
                Log Masuk
                <i class="fas fa-arrow-right"></i>
            </a>

            <div class="features">
                <div class="feature-item">
                    <i class="fas fa-shield-alt"></i>
                    <div class="feature-text">Keselamatan Terjamin</div>
                </div>
                <div class="feature-item">
                    <i class="fas fa-chart-line"></i>
                    <div class="feature-text">Prestasi Optimum</div>
                </div>
                <div class="feature-item">
                    <i class="fas fa-headset"></i>
                    <div class="feature-text">Sokongan 24/7</div>
                </div>
            </div>

            <div class="footer-text">
                © 2025 ADTEC. Hak Cipta Terpelihara.
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

    <!-- Particles.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>

    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

    <script>
        // Particles.js Configuration - Corporate style
        particlesJS('particles-js', {
            particles: {
                number: {
                    value: 60,
                    density: {
                        enable: true,
                        value_area: 1000
                    }
                },
                color: {
                    value: '#ffffff'
                },
                shape: {
                    type: 'circle'
                },
                opacity: {
                    value: 0.6,
                    random: true
                },
                size: {
                    value: 3,
                    random: true
                },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: '#ffffff',
                    opacity: 0.4,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 1.5,
                    direction: 'none',
                    random: true,
                    straight: false,
                    out_mode: 'out',
                    bounce: false
                }
            },
            interactivity: {
                detect_on: 'canvas',
                events: {
                    onhover: {
                        enable: true,
                        mode: 'grab'
                    },
                    onclick: {
                        enable: false
                    },
                    resize: true
                },
                modes: {
                    grab: {
                        distance: 140,
                        line_linked: {
                            opacity: 0.6
                        }
                    }
                }
            },
            retina_detect: true
        });

        // Preloader
        window.addEventListener('load', function() {
            setTimeout(function() {
                gsap.to('#preloader', {
                    opacity: 0,
                    duration: 0.6,
                    ease: 'power2.inOut',
                    onComplete: function() {
                        document.getElementById('preloader').style.display = 'none';
                        animateContent();
                    }
                });
            }, 800);
        });

        // GSAP Animations - Professional style
        function animateContent() {
            gsap.to('.welcome-card', {
                opacity: 1,
                y: 0,
                duration: 1.2,
                ease: 'power3.out'
            });

            gsap.from('.logo-img', {
                opacity: 0,
                scale: 0.8,
                duration: 1,
                ease: 'power2.out',
                delay: 0.3
            });

            gsap.from('.welcome-title', {
                opacity: 0,
                y: 30,
                duration: 0.8,
                delay: 0.5,
                ease: 'power2.out'
            });

            gsap.from('.divider', {
                width: 0,
                duration: 0.6,
                delay: 0.7,
                ease: 'power2.out'
            });

            gsap.from('.welcome-subtitle', {
                opacity: 0,
                y: 20,
                duration: 0.8,
                delay: 0.9,
                ease: 'power2.out'
            });

            gsap.from('.login-btn', {
                opacity: 0,
                y: 20,
                duration: 0.8,
                delay: 1.1,
                ease: 'power2.out'
            });

            gsap.to('.feature-item', {
                opacity: 1,
                y: 0,
                duration: 0.6,
                stagger: 0.15,
                delay: 1.3,
                ease: 'power2.out'
            });

            gsap.from('.footer-text', {
                opacity: 0,
                duration: 0.8,
                delay: 1.6,
                ease: 'power2.out'
            });
        }
    </script>
</body>

</html>