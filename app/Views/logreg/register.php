<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Bansosku</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/register.css') ?>">
</head>
<body>

    <div class="register-card">
        <div class="card-header">
            <a href="<?= base_url()?>" class="back-link">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Beranda
            </a>
        </div>
        
        <div class="card-body">
            <div class="stepper">
                <div class="stepper-item active" data-step="1">
                    <div class="step-number">1</div>
                    <div>Data Pribadi <div class="step-info">Informasi dasar</div></div>
                </div>
                <div class="stepper-line" data-step-line="1"></div>
                <div class="stepper-item" data-step="2">
                    <div class="step-number">2</div>
                    <div>Alamat <div class="step-info">Domisili tempat tinggal</div></div>
                </div>
                <div class="stepper-line" data-step-line="2"></div>
                <div class="stepper-item" data-step="3">
                    <div class="step-number">3</div>
                    <div>Akun <div class="step-info">Kata sandi & verifikasi</div></div>
                </div>
            </div>

            <div class="form-content">
                <div class="logo" style="background: linear-gradient(90deg,#6f8cff,#1aa64b)">B</div>
                <h2 id="form-title">Daftar BansosKu</h2>
                <p id="form-subtitle">Langkah 1 dari 3: Data Pribadi</p>
                
                <form id="register-form" action="<?= base_url('/register/save') ?>" method="post">
                    <div class="form-step active" id="step-1">
                        <div class="form-grid">
                            <div class="input-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" id="nama" name="nama" placeholder="Nama Lengkap" required>
                            </div>
                            <div class="input-group">
                                <label for="nik">NIK</label>
                                <input type="text" id="nik" name="nik" placeholder="NIK"required>
                            </div>
                            <div class="input-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="Email"required>
                            </div>
                            <div class="input-group">
                                <label for="hp">Nomor Hp</label>
                                <input type="tel" id="no_hp" name="no_hp" placeholder="Nomor HP" required>
                            </div>
                        </div>
                        <p class="login-link">Sudah punya akun? <a href="<?= base_url('login') ?>">Masuk sekarang</a></p>
                    </div>

                    <div class="form-step" id="step-2">
                        <div class="form-grid">
                            <div class="input-group">
                                <label for="provinsi">Provinsi</label>
                                <select name="provinsi" id="provinsi" required>
                                    <?php foreach ($provinsi as $p): ?>
                                        <option value="<?= $p['nama_provinsi']; ?>" data-id="<?= $p['id']; ?>">
                                            <?= $p['nama_provinsi']; ?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>         
                            </div>

                            <div class="input-group">
                                <label for="kota">Kota/Kabupaten</label>
                                <select id="kota" name="kota" class="form-control" required>
                                    <option value="">Pilih kota/kabupaten</option>
                                </select>
                            </div>

                           <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    const provinsiSelect = document.getElementById('provinsi');
                                    const kabSelect = document.getElementById('kota');

                                    provinsiSelect.addEventListener('change', function () {

                                        const selectedOption = this.options[this.selectedIndex];
                                        const provinsiID = selectedOption.dataset.id; 
                                        kabSelect.innerHTML = '<option value="">Loading...</option>';
                                        kabSelect.disabled = true;

                                        if (!provinsiID) {
                                            kabSelect.innerHTML = '<option value="">Pilih kota/kabupaten</option>';
                                            return;
                                        }

                                        fetch("<?= base_url('wilayah/kabupaten') ?>/" + provinsiID)
                                            .then(res => res.json())
                                            .then(data => {
                                                kabSelect.innerHTML = '<option value="">Pilih kota/kabupaten</option>';
                                                kabSelect.disabled = false;

                                                data.forEach(item => {
                                                    let opt = document.createElement('option');
                                                    opt.value = item.nama;     
                                                    opt.textContent = item.nama;
                                                    kabSelect.appendChild(opt);
                                                });
                                            })
                                            .catch(() => {
                                                kabSelect.innerHTML = '<option value="">Gagal memuat data</option>';
                                            });
                                    });
                                });
                                </script>



                            <div class="input-group">
                                <label for="kecamatan">Kecamatan</label>
                                <select id="kecamatan" name="kecamatan" required>
                                    <option value="">Pilih Desa</option>
                                    <option value="Cilacap Selatan">Cilacap Selatan</option>
                                    <option value="Coblong">Coblong</option>
                                </select>
                            </div>

                            
                            <div class="input-group">
                                <label for="kelurahan">Kelurahan</label>
                                <select id="kelurahan" name="kelurahan" required>
                                    <option value="">Pilih dusun</option>
                                    <option value="Sidanegara">Sidanegara</option>
                                    <option value="Antapani~">Antapani</option>
                                </select>
                            </div>
                            <div class="input-group full-width">
                                <label for="alamat">Alamat Lengkap</label>
                                <input type="text" id="alamat" name="alamat" placeholder="Jalan, RT/RW, No. rumah" required>
                            </div>
                            <div class="input-group full-width">
                                <label for="kodepos">Kode Pos</label>
                                <input type="text" id="kode_pos" name="kode_pos" placeholder="12345" required>
                            </div>
                        </div>
                        <p class="login-link">Sudah punya akun? <a href="<?= base_url('login') ?>">Masuk sekarang</a></p>
                    </div>

                    <div class="form-step" id="step-3">
                        <div class="form-grid">
                            <div class="input-group full-width">
                                <label for="password">Kata Sandi</label>
                                <div class="input-field">
                                    <input type="password" id="password" name="password" placeholder="Masukkan Pasword" required>
                                    <i class="fas fa-eye-slash icon" id="toggle-password"></i>
                                </div>
                            </div>
                            <div class="input-group full-width">
                                <label for="confirm-password">Konfirmasi Kata Sandi</label>
                                <div class="input-field">
                                    <input type="password" id="confirm-password" name="confirm-password"  placeholder="Ulangi kata sandi" required>
                                    <i class="fas fa-eye-slash icon" id="toggle-confirm-password"></i>
                                </div>
                            </div>
                        </div>
                        <div class="terms">
                            Saya menyetujui <a href="#">Syarat & Ketentuan</a> dan <a href="#">KebijakanPrivasi Bansosku</a>, serta memberikan persetujuan untuk pengolahan data pribadi sesuai ketentuan yang berlaku.
                        </div>
                        <p class="login-link">Sudah punya akun? <a href="<?= base_url('login') ?>">Masuk sekarang</a></p>
                    </div>

                    <div class="form-navigation">
                        <button type="button" class="btn btn-secondary" id="prev-btn" style="display: none;">Kembali</button>
                        <button type="button" class="btn btn-primary" id="next-btn">Selanjutnya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil semua elemen yang dibutuhkan
            const formSteps = document.querySelectorAll('.form-step');
            const stepperItems = document.querySelectorAll('.stepper-item');
            const stepperLines = document.querySelectorAll('.stepper-line');
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');
            
            const formTitle = document.getElementById('form-title');
            const formSubtitle = document.getElementById('form-subtitle');

            // Data untuk judul dan subjudul
            const titles = ["Daftar BansosKu", "Daftar BansosKu", "Daftar BansosKu"];
            const subtitles = [
                "Langkah 1 dari 3: Data Pribadi",
                "Langkah 2 dari 3: Alamat",
                "Langkah 3 dari 3: Akun"
            ];

            let currentStep = 1;
            const totalSteps = formSteps.length;

            // Fungsi untuk update tampilan form
            function updateForm() {
                // Update Judul
                formTitle.textContent = titles[currentStep - 1];
                formSubtitle.textContent = subtitles[currentStep - 1];
                
                // Tampilkan/sembunyikan langkah form
                formSteps.forEach((step, index) => {
                    step.classList.toggle('active', index + 1 === currentStep);
                });

                // Update Stepper
                stepperItems.forEach((item, index) => {
                    const stepNum = index + 1;
                    const stepNumberEl = item.querySelector('.step-number');
                    
                    if (stepNum < currentStep) {
                        item.classList.add('completed');
                        item.classList.remove('active');
                        stepNumberEl.innerHTML = '<i class="fas fa-check"></i>';
                    } else if (stepNum === currentStep) {
                        item.classList.add('active');
                        item.classList.remove('completed');
                        stepNumberEl.innerHTML = stepNum;
                    } else {
                        item.classList.remove('active', 'completed');
                        stepNumberEl.innerHTML = stepNum;
                    }
                });
                
                // Update Garis Stepper
                stepperLines.forEach((line, index) => {
                    line.classList.toggle('completed', index < currentStep - 1);
                });

                // Update Tombol
                prevBtn.style.display = (currentStep === 1) ? 'none' : 'inline-block';
                nextBtn.textContent = (currentStep === totalSteps) ? 'Selesai' : 'Selanjutnya';
            }

            function validateCurrentStep() {
            const currentFormStep = document.querySelector('.form-step.active');
            const requiredFields = currentFormStep.querySelectorAll('input[required], select[required]');

            for (let field of requiredFields) {
                if (!field.value || field.value.trim() === "") {
                    field.focus();
                    alert('Mohon lengkapi semua data terlebih dahulu.');
                    return false;
                }
            }
            
           if (currentStep === 3) {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm-password').value;

        if (password !== confirmPassword) {
            alert('Mohon Konfirmasi kata sandi dengan benar!');
            document.getElementById('confirm-password').focus();
            return false;
        }

        if (password.length < 8) {
            alert('Kata sandi minimal 8 karakter');
            document.getElementById('password').focus();
            return false;
        }
    }

    return true;
        }

        nextBtn.addEventListener('click', () => {
            if (!validateCurrentStep()) return;

            if (currentStep < totalSteps) {
                currentStep++;
                updateForm();
            } else {
                alert('Pendaftaran Selesai!');
                document.getElementById('register-form').submit();
            }
        });


            // // Event Listener untuk Tombol "Selanjutnya"
            // nextBtn.addEventListener('click', () => {
            //     if (currentStep < totalSteps) {
            //         currentStep++;
            //         updateForm();
            //     } else {
            //         alert('Pendaftaran Selesai!');
            //         document.getElementById('register-form').submit();
            //     }
            // });

            prevBtn.addEventListener('click', () => {
                if (currentStep > 1) {
                    currentStep--;
                    updateForm();
                }
            });

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
            togglePasswordVisibility('confirm-password', 'toggle-confirm-password');

            // Inisialisasi tampilan awal
            updateForm();
        });
    </script>
</body>
</html>