<x-guest-layout>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login SeblakMania</title>
        <!-- Google Fonts: Poppins (Utama) -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <!-- Tailwind CSS via CDN - Keep if you still use any Tailwind classes directly -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <style>
        /* --- Variabel CSS Global (Palet Warna Profesional Baru) --- */
        :root {
            --bg-start-color: #ffe3c7; /* rgb(255, 227, 199) - Warm cream */
            --bg-end-color: #ededed;   /* rgb(237, 237, 237) - Light grey */

            --primary-accent-color: #A36A00; /* Darker, sophisticated orange-brown for highlights */
            --secondary-accent-color: #6a00a3; /* Deep purple, for contrasting elements */
            
            --text-main: #333333;       /* Very dark grey for main text */
            --text-secondary: #666666;  /* Medium grey for secondary text */
            --text-light: #999999;      /* Light grey for less prominent text */
            --white: #FFFFFF;
            
            --border-light: #e0e0e0;    /* Light grey for borders */
            --card-bg: #FFFFFF;         /* White for cards/containers */
            
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.08);
            --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.15);

            --success-bg: #e6ffe6;      /* Latar belakang sukses */
            --success-border: #c3e6cb;  /* Border sukses */
            --success-text: #28a745;    /* Teks sukses */

            --error-bg: #ffebe6;        /* Latar belakang error */
            --error-border: #ffccb3;    /* Border error */
            --error-text: #dc3545;      /* Teks error */
        }

        /* --- Base Body Styling --- */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--bg-start-color) 0%, var(--bg-end-color) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            overflow-x: hidden;
            position: relative;
            color: var(--text-main); /* Menggunakan warna teks utama yang baru */
        }

        /* Menghilangkan efek grain */
        body::before {
            content: none; 
        }

        /* --- Login Card --- */
        .login-card {
            background: var(--card-bg); /* Menggunakan putih solid */
            backdrop-filter: none; /* Menghilangkan blur */
            border-radius: 1rem; /* Sudut lebih lembut */
            box-shadow: var(--shadow-md); /* Bayangan sedang yang halus */
            border: 1px solid var(--border-light); /* Border tipis */
            padding: 40px; /* Padding disesuaikan */
            max-width: 420px; /* Lebar maksimum kartu */
            width: 90%; /* Responsif */
            margin: auto;
            position: relative;
            z-index: 1; 
            animation: fadeIn 0.8s ease-out; /* Animasi fadeIn lebih cepat */
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* --- Login Title --- */
        .login-title {
            font-family: 'Poppins', sans-serif; /* Menggunakan Poppins untuk konsistensi */
            font-size: 2rem; /* Ukuran font lebih proporsional */
            font-weight: 700;
            color: var(--text-main); /* Warna teks utama */
            text-align: center;
            margin-bottom: 25px; 
            text-shadow: none; /* Menghilangkan text-shadow */
        }

        /* --- Login Image (Jokowi) --- */
        .login-img {
            display: block;
            margin: 0 auto 25px; /* Margin bawah lebih kecil */
            width: 100px; /* Ukuran gambar sedikit lebih kecil */
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            box-shadow: var(--shadow-sm); /* Bayangan lebih lembut */
            border: 3px solid var(--primary-accent-color); /* Border dengan warna accent baru */
            filter: grayscale(0) brightness(1); /* Pastikan warna asli dan cerah */
            transition: all 0.3s ease; /* Transisi untuk hover */
            animation: bounce 2s infinite ease-in-out; 
        }

        .login-img:hover {
            transform: translateY(-5px) scale(1.03); /* Efek bounce dan scale lebih terasa */
            box-shadow: var(--shadow-md);
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); } /* Gerakan bounce lebih halus */
        }

        /* --- Input Group --- */
        .input-group {
            margin-bottom: 20px; /* Jarak antar input group */
            width: 100%;
            text-align: left;
        }

        .input-group label {
            font-size: 0.9rem; /* Ukuran font label lebih kecil */
            color: var(--text-secondary); /* Warna label */
            font-weight: 500;
            margin-bottom: 6px; /* Jarak antara label dan input */
            display: block; 
        }

        /* --- Form Input --- */
        .form-input {
            background: var(--card-bg); /* Putih solid */
            border: 1px solid var(--border-light); /* Border tipis */
            border-radius: 0.5rem; /* Sudut lebih lembut */
            padding: 10px 15px; /* Padding input */
            width: 100%;
            font-size: 0.95rem;
            color: var(--text-main);
            transition: all 0.2s ease;
            outline: none; 
            box-shadow: none; /* Menghilangkan inset shadow */
        }

        .form-input:focus {
            border-color: var(--primary-accent-color); /* Warna border saat focus */
            box-shadow: 0 0 0 2px rgba(var(--primary-accent-color), 0.2); /* Shadow focus yang bersih */
        }

        /* --- Checkbox Container --- */
        .checkbox-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .checkbox-container input[type="checkbox"] {
            appearance: none;
            width: 18px; /* Ukuran checkbox lebih kecil */
            height: 18px;
            border: 1px solid var(--border-light); /* Border tipis */
            border-radius: 0.3rem; /* Sudut sedikit lebih kotak */
            background-color: var(--card-bg);
            cursor: pointer;
            position: relative;
            margin-right: 8px;
            transition: all 0.2s ease;
            box-shadow: none; /* Menghilangkan shadow inset */
        }

        .checkbox-container input[type="checkbox"]:checked {
            background-color: var(--primary-accent-color); /* Warna accent saat dicentang */
            border-color: var(--primary-accent-color);
            box-shadow: none; 
        }

        .checkbox-container input[type="checkbox"]:checked::after {
            content: '✔';
            font-size: 12px;
            color: var(--white);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .checkbox-container label {
            font-size: 0.85rem; /* Ukuran font label lebih kecil */
            color: var(--text-secondary); /* Warna teks sekunder */
            cursor: pointer;
        }

        /* --- Form Buttons --- */
        .form-buttons {
            display: flex;
            justify-content: space-between; 
            align-items: center;
            width: 100%;
            margin-top: 25px; /* Jarak dari bawah form */
        }

        /* --- Form Link (Lupa password) --- */
        .form-link { 
            font-size: 0.85rem; /* Ukuran font lebih kecil */
            color: var(--text-secondary); 
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .form-link:hover {
            color: var(--primary-accent-color); /* Warna hover sesuai accent */
            text-decoration: underline;
        }

        /* --- Form Button (Masuk) --- */
        .form-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 25px; /* Padding disesuaikan */
            border-radius: 0.5rem; /* Sudut lebih kotak */
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
            position: relative;
            overflow: hidden;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
            box-shadow: var(--shadow-sm); /* Bayangan lembut */
            background-color: var(--primary-accent-color); /* Warna solid accent */
            color: var(--white);
            border: none;
            cursor: pointer;
            text-transform: uppercase;
        }

        /* Menghilangkan efek before shimmer */
        .form-button::before {
            content: none;
        }

        .form-button:hover {
            transform: translateY(-2px); /* Efek angkat lebih halus */
            box-shadow: var(--shadow-md);
            background-color: #8C5C00; /* Sedikit lebih gelap saat hover */
        }

        /* --- Session Status / Error Messages --- */
        .auth-session-status, .input-error-message {
            font-size: 0.85rem; /* Ukuran font lebih kecil */
            text-align: center;
            margin-bottom: 1rem;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            border: 1px solid;
            background-color: var(--error-bg); /* Default ke error */
            color: var(--error-text);
        }

        .auth-session-status.success {
            background-color: var(--success-bg);
            border-color: var(--success-border);
            color: var(--success-text);
        }
        
        .input-error-message {
             background-color: transparent; /* Error di bawah input tidak pakai background card */
             border: none;
             padding: 0;
             margin-top: 0.5rem;
             text-align: left;
        }


        /* --- Responsive adjustments --- */
        @media (max-width: 600px) {
            .login-card {
                padding: 30px 25px;
            }
            .login-title {
                font-size: 1.8rem;
                margin-bottom: 20px;
            }
            .login-img {
                width: 90px;
                height: 90px;
                margin-bottom: 20px;
            }
            .input-group {
                margin-bottom: 15px;
            }
            .form-input {
                padding: 10px 12px;
                font-size: 0.9rem;
            }
            .checkbox-container {
                margin-bottom: 15px;
            }
            .checkbox-container label {
                font-size: 0.8rem;
            }
            .form-buttons {
                flex-direction: column;
                gap: 12px;
                margin-top: 20px;
            }
            .form-button {
                width: 100%;
                padding: 10px 20px;
                font-size: 0.9rem;
            }
            .form-link {
                margin-bottom: 0; 
                font-size: 0.8rem;
            }
        }
    </style>

    <div class="login-card">
        <img src="https://thegorbalsla.com/wp-content/uploads/2018/10/gambar-karikatur-jokowi.jpg" alt="SeblakMania Login Icon" class="login-img">
        <div class="login-title">Masuk ke SeblakMania</div>

        <!-- Session Status -->
        <x-auth-session-status class="auth-session-status {{ session('status') ? 'success' : '' }}" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" style="width: 100%;">
            @csrf

            <!-- Email -->
            <div class="input-group">
                <x-input-label for="email" :value="__('Alamat Email')" />
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="form-input">
                <x-input-error :messages="$errors->get('email')" class="input-error-message" />
            </div>

            <!-- Password -->
            <div class="input-group">
                <x-input-label for="password" :value="__('Kata Sandi')" />
                <input id="password" type="password" name="password" required autocomplete="current-password" class="form-input">
                <x-input-error :messages="$errors->get('password')" class="input-error-message" />
            </div>

            <!-- Remember Me -->
            <div class="checkbox-container">
                <label for="remember_me">
                    <input id="remember_me" type="checkbox" name="remember">
                    {{ __('Ingat saya') }}
                </label>
            </div>

            <!-- Buttons -->
            <div class="form-buttons">
                @if (Route::has('password.request'))
                    <a class="form-link" href="{{ route('password.request') }}">
                        {{ __('Lupa kata sandi?') }}
                    </a>
                @endif

                <button type="submit" class="form-button">
                    {{ __('Masuk') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>