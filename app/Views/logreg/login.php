<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk ke Bansosku</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">
</head>
<body>

    <div class="login-card">
        <a href="<?= base_url()?>" class="back-link">
            <i class="fas fa-arrow-left"></i>
            Kembali ke Beranda
        </a>

        <div class="header">
            <div class="logo" style="background: linear-gradient(90deg,#6f8cff,#1aa64b)">B</div>
            <h2 id="form-title">Masuk Ke BansosKu</h2>
            <p>Akses dashboard pribadi Anda untuk memantau status bantuan sosial</p>
        </div>

        <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error'); ?>
        </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success'); ?>
        </div>
        <?php endif; ?>

        <form action="<?= base_url('/process'); ?>" method="post">
            <div class="input-group">
                <label for="email">Email atau NIK</label>
                <div class="input-field">
                    <i class="fas fa-user icon"></i>
                    <input type="text" id="email" name="email" placeholder="Masukkan email atau NIK Anda" required>
                </div>
            </div>

            
            
            <div class="input-group full-width">
                                <label for="password">Kata Sandi</label>
                                <div class="input-field">
                                    <i class="fas fa-lock icon"></i>
                                    <input type="password" id="password" name="password" placeholder="Masukkan Password">
                                    <i class="fas fa-eye-slash eye-icon" id="toggle-password"></i>
                                </div>
                            </div>

            <div class="form-options">
                <label class="remember-me">
                    <input type="checkbox" name="remember">
                    Ingat saya
                </label>
                <a href="#" class="forgot-password">Lupa kata sandi?</a>
            </div>

            <button type="submit" class="btn-login" style="background: linear-gradient(90deg,#6f8cff,#1aa64b)">Masuk</button>
        </form>

        <div class="separator">atau</div>

        <button type="button" class="btn-social">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" xmlns:xlink="http://www.w3.org/1999/xlink" style="enable-background:new 0 0 48 48;">
                <path fill="#EA4335" d="M24 9.5c3.54 0 6.43 1.25 8.61 3.23l6.53-6.53C35.37 2.78 30.07 0 24 0 14.63 0 6.79 5.86 2.8 13.91l7.85 6.06C12.33 13.06 17.73 9.5 24 9.5z"></path>
                <path fill="#4285F4" d="M46.18 24.7c0-1.56-.14-3.08-.4-4.55H24v8.6h12.44c-.54 2.79-2.1 5.17-4.65 6.8l7.66 5.9C43.3 36.6 46.18 31.13 46.18 24.7z"></path>
                <path fill="#FBBC05" d="M10.65 28.01c-.48-1.45-.75-3-.75-4.6s.27-3.15.75-4.6L2.8 13.91C1.03 17.36 0 21.5 0 26s1.03 8.64 2.8 12.09l7.85-6.08z"></path>
                <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.66-5.9c-2.15 1.45-4.9 2.3-7.9 2.3-6.27 0-11.66-4.22-13.56-9.9l-7.85 6.06C6.79 42.14 14.63 48 24 48z"></path>
                <path fill="none" d="M0 0h48v48H0z"></path>
            </svg>
            Masuk dengan Google
        </button>
        <button type="button" class="btn-social">
            <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.4 3-.405 1.02.005 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
            </svg>
            Masuk dengan GitHub
        </button>

        <p class="signup-link">
            Belum punya akun? <a href="<?= base_url('register') ?>">Daftar sekarang</a>
        </p>
        <p class="help-text">
            Butuh bantuan? Hubungi customer service kami di 0800-1234-5678
        </p>
    </div>

    <script>
        function togglePasswordVisibility(inputId, iconId) {
                const input = document.getElementById(inputId);
                const icon = document.getElementById(iconId);
                
                if (input && icon) {
                    icon.addEventListener('click', () => {
                        if (input.type === 'password') {
                            input.type = 'text';
                            icon.classList.remove('fa-eye-slash');
                            icon.classList.add('fa-eye');
                        } else {
                            input.type = 'password';
                            icon.classList.remove('fa-eye');
                            icon.classList.add('fa-eye-slash');
                        }
                    });
                }
            }

            // Terapkan toggle password
            togglePasswordVisibility('password', 'toggle-password');

           
    </script>
</body>
</html>