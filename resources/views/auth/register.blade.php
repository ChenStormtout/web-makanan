<x-guest-layout>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Daftar SeblakMania</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <style>
        :root {
            --primary-color: #FF7043; /* Oranye Kemerahan yang lebih lembut */
            --secondary-color: #FFA726; /* Oranye Cerah */
            --accent-color: #FFD54F; /* Kuning Keemasan */
            --text-dark: #2A363B; /* Abu-abu gelap elegan */
            --text-light: #5B6F7B; /* Abu-abu sedang */
            --white:rgb(0, 0, 0);
            --bg-gradient: linear-gradient(135deg,rgb(255, 115, 0) 0%,rgb(255, 255, 255) 100%); /* Gradien ungu-biru yang lebih menenangkan */
            --shadow-light: 0 6px 20px rgba(0, 0, 0, 0.08);
            --shadow-medium: 0 10px 30px rgba(0, 0, 0, 0.12);
            --shadow-heavy: 0 16px 48px rgba(0, 0, 0, 0.2);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--bg-gradient); /* Gunakan gradien yang sama */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            overflow-x: hidden;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="0.8" fill="rgba(255,255,255,0.05)"/><circle cx="80" cy="40" r="0.6" fill="rgba(255,255,255,0.04)"/><circle cx="40" cy="80" r="1" fill="rgba(255,255,255,0.03)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            pointer-events: none;
            opacity: 0.7;
            z-index: 0;
        }

        .register-container { /* Nama kelas baru untuk container utama */
            width: 100%;
            max-width: 480px; /* Lebar maksimum disesuaikan agar lebih proporsional */
            z-index: 1;
            position: relative;
        }

        .header-section {
            text-align: center;
            margin-bottom: 40px; /* Margin lebih besar */
        }

        .header-image {
            display: block;
            margin: 0 auto 25px; /* Margin bawah lebih besar */
            width: 120px; /* Ukuran gambar konsisten dengan login */
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            box-shadow: var(--shadow-medium);
            border: 4px solid var(--primary-color);
            filter: grayscale(0.1) brightness(0.98);
            transition: filter 0.3s ease, transform 0.3s ease;
            animation: bounce 2s infinite ease-in-out;
        }

        .header-image:hover {
            filter: grayscale(0) brightness(1);
            transform: scale(1.03); /* Efek hover scale */
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        .header-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 4vw, 2.8rem); /* Ukuran font responsif */
            font-weight: 700;
            color: var(--white); /* Warna judul putih */
            margin-bottom: 15px;
            line-height: 1.2;
            text-shadow: 2px 3px 6px rgba(0, 0, 0, 0.4);
        }

        .header-subtitle {
            font-size: 1.1rem; /* Ukuran subtitle sedikit lebih besar */
            color: rgba(0, 0, 0, 0.9); /* Warna subtitle putih transparan */
            font-weight: 300;
            max-width: 400px;
            margin: 0 auto;
        }

        .register-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(25px);
            box-shadow: var(--shadow-heavy);
            border-radius: 28px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 50px 40px;
            position: relative;
            z-index: 1;
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .input-group {
            margin-bottom: 25px;
            width: 100%;
            text-align: left;
        }

        .input-group label {
            font-size: 0.95rem;
            color: var(--text-light);
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
        }

        .form-input {
            background: rgba(255, 255, 255, 0.7);
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-bottom: 2px solid var(--primary-color);
            border-radius: 8px;
            padding: 12px 18px;
            width: 100%;
            font-size: 1rem;
            color: var(--text-dark);
            transition: all 0.3s ease;
            outline: none;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .form-input:focus {
            border-color: var(--secondary-color);
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1), 0 0 0 3px rgba(var(--primary-color), 0.2);
        }

        .error-message {
            font-size: 0.85rem;
            color: #EF4444; /* Merah Tailwind */
            margin-top: 8px;
        }

        .checkbox-container {
            display: flex;
            align-items: flex-start; /* Mengatur item di awal (atas) */
            margin-bottom: 25px;
        }

        .checkbox-container input[type="checkbox"] {
            appearance: none;
            width: 20px;
            height: 20px;
            border: 2px solid var(--text-light);
            border-radius: 6px;
            background-color: rgba(255, 255, 255, 0.7);
            cursor: pointer;
            position: relative;
            flex-shrink: 0; /* Mencegah checkbox mengecil */
            margin-top: 2px; /* Sesuaikan agar centang lebih pas dengan teks */
            margin-right: 12px;
            transition: all 0.2s ease;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
        }

        .checkbox-container input[type="checkbox"]:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.2), 0 0 0 3px rgba(var(--primary-color), 0.3);
        }

        .checkbox-container input[type="checkbox"]:checked::after {
            content: '✔';
            font-size: 14px;
            color: var(--white);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .checkbox-container label {
            font-size: 0.95rem;
            color: var(--text-light);
            cursor: pointer;
            line-height: 1.5; /* Spasi baris untuk teks panjang */
        }

        .checkbox-container label a {
            color: var(--primary-color);
            text-decoration: none;
            transition: color 0.3s ease, text-decoration 0.3s ease;
        }

        .checkbox-container label a:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }

        .form-button {
            display: inline-flex;
            align-items: center;
            justify-content: center; /* Untuk teks tombol di tengah */
            padding: 15px 30px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            font-size: 1rem;
            letter-spacing: 0.5px;
            box-shadow: var(--shadow-light);
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--white);
            border: none;
            cursor: pointer;
            text-transform: uppercase;
            width: 100%; /* Lebar penuh */
        }

        .form-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.25), transparent);
            transition: left 0.5s ease-out;
        }

        .form-button:hover::before {
            left: 100%;
        }

        .form-button:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-medium);
            filter: brightness(1.05);
        }

        .login-link-container {
            text-align: center;
            margin-top: 30px; /* Margin atas lebih besar */
            font-size: 0.95rem;
            color: var(--text-light);
        }

        .login-link-container a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease, text-decoration 0.3s ease;
        }

        .login-link-container a:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }

        /* Responsive adjustments */
        @media (max-width: 600px) {
            .register-container {
                max-width: 100%; /* Maksimalkan lebar di mobile */
            }
            .header-section {
                margin-bottom: 30px;
            }
            .header-image {
                width: 100px;
                height: 100px;
                margin-bottom: 20px;
            }
            .header-title {
                font-size: 2rem;
            }
            .header-subtitle {
                font-size: 1rem;
            }
            .register-card {
                padding: 30px 25px;
            }
            .input-group {
                margin-bottom: 20px;
            }
            .form-input {
                padding: 10px 15px;
            }
            .form-button {
                padding: 12px 20px;
                font-size: 0.95rem;
            }
            .checkbox-container label {
                font-size: 0.9rem;
            }
            .login-link-container {
                margin-top: 25px;
            }
        }
    </style>

    <div class="register-container">
        <div class="header-section">
            <img src="https://thegorbalsla.com/wp-content/uploads/2018/10/gambar-karikatur-jokowi.jpg" 
                 alt="SeblakMania Register Icon"
                 class="header-image">

            <h1 class="header-title">
                Gabung Sekarang!
            </h1>

            <p class="header-subtitle">
                Daftar untuk menikmati pengalaman seblak terbaik dan pengiriman super cepat.
            </p>
        </div>

        <div class="register-card">
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <div class="input-group">
                    <x-input-label for="name" class="text-gray-700 font-medium">Nama Lengkap</x-input-label>
                    <x-text-input 
                        id="name" 
                        class="form-input" 
                        type="text" 
                        name="name" 
                        :value="old('name')" 
                        required 
                        autofocus 
                        placeholder="Masukkan nama lengkap Anda" />
                    <x-input-error :messages="$errors->get('name')" class="error-message" />
                </div>

                <div class="input-group">
                    <x-input-label for="email" class="text-gray-700 font-medium">Alamat Email</x-input-label>
                    <x-text-input 
                        id="email" 
                        class="form-input" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        placeholder="contoh@email.com" />
                    <x-input-error :messages="$errors->get('email')" class="error-message" />
                </div>

                <div class="input-group">
                    <x-input-label for="password" class="text-gray-700 font-medium">Kata Sandi</x-input-label>
                    <x-text-input 
                        id="password" 
                        class="form-input" 
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="new-password" 
                        placeholder="Minimal 8 karakter" />
                    <x-input-error :messages="$errors->get('password')" class="error-message" />
                </div>

                <div class="input-group">
                    <x-input-label for="password_confirmation" class="text-gray-700 font-medium">Konfirmasi Kata Sandi</x-input-label>
                    <x-text-input 
                        id="password_confirmation" 
                        class="form-input" 
                        type="password" 
                        name="password_confirmation" 
                        required 
                        placeholder="Ulangi kata sandi Anda" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="error-message" />
                </div>

                <div class="checkbox-container">
                    <input type="checkbox" id="terms" required>
                    <label for="terms">
                        Saya menyetujui 
                        <a href="#" class="text-purple-600 hover:underline">Syarat & Ketentuan</a> dan 
                        <a href="#" class="text-purple-600 hover:underline">Kebijakan Privasi</a>
                    </label>
                </div>

                <div class="pt-2">
                    <button type="submit" class="form-button">
                        Daftar Sekarang
                    </button>
                </div>
            </form>
        </div>

        <div class="login-link-container">
            Sudah punya akun?
            <a href="{{ route('login') }}">Masuk di sini</a>
        </div>
    </div>
</x-guest-layout>