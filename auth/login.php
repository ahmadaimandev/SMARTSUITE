<!DOCTYPE html>
<html lang="ms">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSO Login - Single Sign-On</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

    <!-- SweetAlert2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.32/sweetalert2.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f5f7fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            color: #2c3e50;
            position: relative;
            overflow-x: hidden;
        }

        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 0;
        }

        .login-wrapper {
            width: 100%;
            max-width: 1200px;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 60px;
            position: relative;
            z-index: 1;
        }

        .brand-section {
            flex: 1;
            max-width: 500px;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            margin-bottom: 40px;
        }

        .brand-logo i {
            font-size: 48px;
            color: #2c3e50;
            margin-right: 15px;
        }

        .brand-logo h1 {
            font-size: 32px;
            font-weight: 700;
            color: #2c3e50;
            margin: 0;
            letter-spacing: -0.5px;
        }

        .brand-description {
            margin-bottom: 30px;
        }

        .brand-description h2 {
            font-size: 28px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .brand-description p {
            font-size: 16px;
            color: #5a6c7d;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .brand-features {
            list-style: none;
            padding: 0;
        }

        .brand-features li {
            font-size: 15px;
            color: #5a6c7d;
            margin-bottom: 12px;
            padding-left: 28px;
            position: relative;
        }

        .brand-features li i {
            position: absolute;
            left: 0;
            top: 3px;
            color: #3498db;
            font-size: 16px;
        }

        .login-container {
            width: 100%;
            max-width: 450px;
        }

        .login-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            border: 1px solid #e8ecef;
        }

        .login-header {
            padding: 40px 40px 30px 40px;
            border-bottom: 1px solid #e8ecef;
        }

        .login-header h3 {
            font-size: 24px;
            font-weight: 600;
            color: #2c3e50;
            margin: 0 0 8px 0;
        }

        .login-header p {
            font-size: 14px;
            color: #7f8c8d;
            margin: 0;
        }

        .login-body {
            padding: 40px;
        }

        .form-label {
            font-weight: 500;
            color: #2c3e50;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-control {
            border: 1px solid #d1d8dd;
            padding: 12px 16px;
            font-size: 15px;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
            outline: none;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #95a5a6;
            font-size: 16px;
            z-index: 10;
        }

        .input-group .form-control {
            padding-left: 45px;
        }

        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #95a5a6;
            transition: color 0.2s;
            z-index: 10;
        }

        .password-toggle:hover {
            color: #3498db;
        }

        .form-check {
            margin: 20px 0;
        }

        .form-check-input {
            border: 1px solid #d1d8dd;
            width: 18px;
            height: 18px;
            margin-top: 2px;
        }

        .form-check-input:checked {
            background-color: #3498db;
            border-color: #3498db;
        }

        .form-check-input:focus {
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        .form-check-label {
            font-size: 14px;
            color: #5a6c7d;
            margin-left: 8px;
        }

        .btn-login {
            background: #3498db;
            border: none;
            padding: 13px;
            font-size: 15px;
            font-weight: 600;
            border-radius: 6px;
            transition: all 0.2s ease;
            width: 100%;
            color: white;
            letter-spacing: 0.3px;
        }

        .btn-login:hover {
            background: #2980b9;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .links-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e8ecef;
        }

        .link-text {
            color: #3498db;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.2s;
            font-weight: 500;
        }

        .link-text:hover {
            color: #2980b9;
        }

        .login-footer {
            text-align: center;
            padding: 20px;
            background: #f8f9fa;
            color: #7f8c8d;
            font-size: 13px;
            border-radius: 0 0 8px 8px;
        }

        .login-footer i {
            color: #3498db;
            margin-right: 5px;
        }

        @media (max-width: 992px) {
            .login-wrapper {
                flex-direction: column;
                gap: 40px;
            }

            .brand-section {
                text-align: center;
                max-width: 100%;
            }

            .brand-logo {
                justify-content: center;
            }

            .brand-features {
                display: inline-block;
                text-align: left;
            }
        }

        @media (max-width: 576px) {
            .login-body {
                padding: 30px 25px;
            }

            .login-header {
                padding: 30px 25px 20px 25px;
            }

            .brand-section {
                display: none;
            }
        }
    </style>
</head>

<body>
    <!-- Particles Background -->
    <div id="particles-js"></div>

    <div class="login-wrapper">
        <!-- Brand Section -->
        <div class="brand-section">
            <div class="brand-logo">
                <i class="fas fa-shield-alt"></i>
                <h1>SSO Portal</h1>
            </div>
            <div class="brand-description">
                <h2>Selamat datang ke<br>Single Sign-On System</h2>
                <p>Akses selamat dan mudah ke semua aplikasi korporat dengan satu akaun sahaja.</p>
            </div>
            <ul class="brand-features">
                <li><i class="fas fa-check-circle"></i> Akses kepada semua sistem dengan satu login</li>
                <li><i class="fas fa-check-circle"></i> Keselamatan data yang terjamin</li>
                <li><i class="fas fa-check-circle"></i> Pengurusan akaun yang mudah</li>
                <li><i class="fas fa-check-circle"></i> Sokongan 24/7 untuk pengguna</li>
            </ul>
        </div>

        <!-- Login Form Section -->
        <div class="login-container">
            <div class="login-card">
                <div class="login-header">
                    <h3>Log Masuk</h3>
                    <p>Sila masukkan kelayakan anda untuk meneruskan</p>
                </div>

                <div class="login-body">
                    <form id="loginForm">
                        <div class="mb-3">
                            <label for="icNumber" class="form-label">Nombor Kad Pengenalan</label>
                            <div class="input-group">
                                <i class="fas fa-id-card input-icon"></i>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="icNumber"
                                    placeholder="XXXXXX-XX-XXXX"
                                    maxlength="14"
                                    required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Laluan</label>
                            <div class="input-group">
                                <i class="fas fa-lock input-icon"></i>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    placeholder="Masukkan kata laluan"
                                    required>
                                <i class="fas fa-eye password-toggle" id="toggleIcon" onclick="togglePassword()"></i>
                            </div>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">
                                Ingat saya
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-login">
                            LOG MASUK
                        </button>

                        <div class="links-row">
                            <a href="#" onclick="forgotPassword(event)" class="link-text">
                                Lupa kata laluan?
                            </a>
                            <a href="#" onclick="registerAccount(event)" class="link-text">
                                Daftar akaun
                            </a>
                        </div>
                    </form>
                </div>

                <div class="login-footer">
                    <i class="fas fa-shield-alt"></i>
                    Dilindungi dengan enkripsi SSL 256-bit
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.32/sweetalert2.all.min.js"></script>

    <!-- Particles.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>

    <script>
        // Initialize Particles.js
        particlesJS('particles-js', {
            particles: {
                number: {
                    value: 80,
                    density: {
                        enable: true,
                        value_area: 800
                    }
                },
                color: {
                    value: '#3498db'
                },
                shape: {
                    type: 'circle',
                    stroke: {
                        width: 0,
                        color: '#000000'
                    }
                },
                opacity: {
                    value: 0.5,
                    random: false,
                    anim: {
                        enable: false,
                        speed: 1,
                        opacity_min: 0.1,
                        sync: false
                    }
                },
                size: {
                    value: 3,
                    random: true,
                    anim: {
                        enable: false,
                        speed: 40,
                        size_min: 0.1,
                        sync: false
                    }
                },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: '#3498db',
                    opacity: 0.4,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 2,
                    direction: 'none',
                    random: false,
                    straight: false,
                    out_mode: 'out',
                    bounce: false,
                    attract: {
                        enable: false,
                        rotateX: 600,
                        rotateY: 1200
                    }
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
                        enable: true,
                        mode: 'push'
                    },
                    resize: true
                },
                modes: {
                    grab: {
                        distance: 140,
                        line_linked: {
                            opacity: 1
                        }
                    },
                    push: {
                        particles_nb: 4
                    }
                }
            },
            retina_detect: true
        });

        // Format IC number with dashes
        document.getElementById('icNumber').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');

            if (value.length > 6) {
                value = value.slice(0, 6) + '-' + value.slice(6);
            }
            if (value.length > 9) {
                value = value.slice(0, 9) + '-' + value.slice(9);
            }

            e.target.value = value.slice(0, 14);
        });

        // Toggle password visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Handle login form submission
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const icNumber = document.getElementById('icNumber').value;
            const password = document.getElementById('password').value;
            const rememberMe = document.getElementById('rememberMe').checked;

            // Validate IC format
            const icPattern = /^\d{6}-\d{2}-\d{4}$/;
            if (!icPattern.test(icNumber)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Format Tidak Sah',
                    text: 'Sila masukkan nombor IC dalam format yang betul: XXXXXX-XX-XXXX',
                    confirmButtonColor: '#3498db'
                });
                return;
            }

            // Validate password
            if (password.length < 6) {
                Swal.fire({
                    icon: 'error',
                    title: 'Kata Laluan Terlalu Pendek',
                    text: 'Kata laluan mestilah sekurang-kurangnya 6 aksara',
                    confirmButtonColor: '#3498db'
                });
                return;
            }

            // Show loading
            Swal.fire({
                title: 'Sedang log masuk...',
                html: 'Sila tunggu sebentar',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Simulate login process
            setTimeout(() => {
                // Demo: Success login
                Swal.fire({
                    icon: 'success',
                    title: 'Berjaya',
                    text: 'Anda berjaya log masuk ke sistem',
                    confirmButtonColor: '#3498db',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    console.log('Login successful');
                    console.log('IC:', icNumber);
                    console.log('Remember me:', rememberMe);
                });
            }, 1500);
        });

        // Handle forgot password
        function forgotPassword(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Reset Kata Laluan',
                html: '<p style="margin-bottom: 15px; color: #5a6c7d;">Masukkan alamat email anda untuk menerima pautan reset kata laluan</p>' +
                    '<input type="email" id="resetEmail" class="swal2-input" placeholder="contoh@email.com" style="width: 85%; font-size: 15px;">',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3498db',
                cancelButtonColor: '#95a5a6',
                confirmButtonText: 'Hantar',
                cancelButtonText: 'Batal',
                preConfirm: () => {
                    const email = document.getElementById('resetEmail').value;

                    if (!email) {
                        Swal.showValidationMessage('Sila masukkan alamat email');
                        return false;
                    }

                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailPattern.test(email)) {
                        Swal.showValidationMessage('Format email tidak sah');
                        return false;
                    }

                    return email;
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Menghantar email...',
                        html: 'Sila tunggu sebentar',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    setTimeout(() => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Email Berjaya Dihantar',
                            html: 'Pautan reset kata laluan telah dihantar ke <strong>' + result.value + '</strong><br><br>' +
                                'Sila semak inbox atau folder spam anda.',
                            confirmButtonColor: '#3498db',
                            confirmButtonText: 'OK'
                        });
                    }, 2000);
                }
            });
        }

        // Handle register account
        function registerAccount(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Daftar Akaun Baharu',
                html: '<div style="text-align: left;">' +
                    '<div style="margin-bottom: 15px;">' +
                    '<label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px; color: #2c3e50;">Nama Penuh</label>' +
                    '<input type="text" id="regName" class="swal2-input" placeholder="Nama penuh anda" style="width: 92%; margin: 0; font-size: 15px;">' +
                    '</div>' +
                    '<div style="margin-bottom: 15px;">' +
                    '<label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px; color: #2c3e50;">No. Kad Pengenalan</label>' +
                    '<input type="text" id="regIC" class="swal2-input" placeholder="XXXXXX-XX-XXXX" maxlength="14" style="width: 92%; margin: 0; font-size: 15px;">' +
                    '</div>' +
                    '<div style="margin-bottom: 15px;">' +
                    '<label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px; color: #2c3e50;">Email</label>' +
                    '<input type="email" id="regEmail" class="swal2-input" placeholder="contoh@email.com" style="width: 92%; margin: 0; font-size: 15px;">' +
                    '</div>' +
                    '<div style="margin-bottom: 15px;">' +
                    '<label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px; color: #2c3e50;">Kata Laluan</label>' +
                    '<input type="password" id="regPassword" class="swal2-input" placeholder="Minimum 6 aksara" style="width: 92%; margin: 0; font-size: 15px;">' +
                    '</div>' +
                    '<div style="margin-bottom: 15px;">' +
                    '<label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px; color: #2c3e50;">Sahkan Kata Laluan</label>' +
                    '<input type="password" id="regConfirmPassword" class="swal2-input" placeholder="Masukkan semula kata laluan" style="width: 92%; margin: 0; font-size: 15px;">' +
                    '</div>' +
                    '</div>',
                icon: 'info',
                width: '600px',
                showCancelButton: true,
                confirmButtonColor: '#3498db',
                cancelButtonColor: '#95a5a6',
                confirmButtonText: 'Daftar',
                cancelButtonText: 'Batal',
                preConfirm: () => {
                    const name = document.getElementById('regName').value.trim();
                    const ic = document.getElementById('regIC').value.trim();
                    const email = document.getElementById('regEmail').value.trim();
                    const password = document.getElementById('regPassword').value;
                    const confirmPassword = document.getElementById('regConfirmPassword').value;

                    if (!name) {
                        Swal.showValidationMessage('Sila masukkan nama penuh');
                        return false;
                    }

                    const icPattern = /^\d{6}-\d{2}-\d{4}$/;
                    if (!ic) {
                        Swal.showValidationMessage('Sila masukkan nombor kad pengenalan');
                        return false;
                    }
                    if (!icPattern.test(ic)) {
                        Swal.showValidationMessage('Format IC tidak sah. Gunakan format: XXXXXX-XX-XXXX');
                        return false;
                    }

                    if (!email) {
                        Swal.showValidationMessage('Sila masukkan alamat email');
                        return false;
                    }
                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailPattern.test(email)) {
                        Swal.showValidationMessage('Format email tidak sah');
                        return false;
                    }

                    if (!password) {
                        Swal.showValidationMessage('Sila masukkan kata laluan');
                        return false;
                    }
                    if (password.length < 6) {
                        Swal.showValidationMessage('Kata laluan mestilah sekurang-kurangnya 6 aksara');
                        return false;
                    }

                    if (password !== confirmPassword) {
                        Swal.showValidationMessage('Kata laluan tidak sepadan');
                        return false;
                    }

                    return {
                        name,
                        ic,
                        email,
                        password
                    };
                },
                didOpen: () => {
                    document.getElementById('regIC').addEventListener('input', function(e) {
                        let value = e.target.value.replace(/\D/g, '');

                        if (value.length > 6) {
                            value = value.slice(0, 6) + '-' + value.slice(6);
                        }
                        if (value.length > 9) {
                            value = value.slice(0, 9) + '-' + value.slice(9);
                        }

                        e.target.value = value.slice(0, 14);
                    });
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Mendaftar akaun...',
                        html: 'Sila tunggu sebentar',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    setTimeout(() => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Pendaftaran Berjaya',
                            html: 'Akaun anda telah berjaya didaftarkan.<br><br>' +
                                '<strong>Nama:</strong> ' + result.value.name + '<br>' +
                                '<strong>Email:</strong> ' + result.value.email + '<br><br>' +
                                'Email pengesahan telah dihantar ke alamat email anda.',
                            confirmButtonColor: '#3498db',
                            confirmButtonText: 'OK'
                        });
                    }, 2000);
                }
            });
        }
    </script>
</body>

</html>