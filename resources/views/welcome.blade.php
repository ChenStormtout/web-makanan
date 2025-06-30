<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeblakMania - Delivery Seblak Terbaik</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #FF7043; /* Oranye Kemerahan yang lebih lembut */
            --secondary-color: #FFA726; /* Oranye Cerah */
            --accent-color: #FFD54F; /* Kuning Keemasan */
            --text-dark: #2A363B; /* Abu-abu gelap elegan */
            --text-light: #5B6F7B; /* Abu-abu sedang */
            --white: #FFFFFF;
            --bg-gradient: linear-gradient(135deg,rgb(230, 31, 31) 0%,rgb(255, 255, 255) 100%); /* Gradien ungu-biru yang lebih menenangkan */
            --shadow-light: 0 6px 20px rgba(0, 0, 0, 0.08);
            --shadow-medium: 0 10px 30px rgba(0, 0, 0, 0.12);
            --shadow-heavy: 0 16px 48px rgba(0, 0, 0, 0.2);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif; /* Mengganti Inter dengan Poppins untuk kesan yang lebih modern */
            background: var(--bg-gradient);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px; /* Padding lebih besar */
            position: relative;
            overflow-x: hidden;
            color: var(--text-dark); /* Warna teks default */
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            /* Pola grain yang lebih halus dan transparan */
            background: url('data:image/svg+xml,<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="0.8" fill="rgba(255,255,255,0.05)"/><circle cx="80" cy="40" r="0.6" fill="rgba(255,255,255,0.04)"/><circle cx="40" cy="80" r="1" fill="rgba(255,255,255,0.03)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            pointer-events: none;
            opacity: 0.7; /* Sedikit lebih terlihat */
        }

        .container {
            max-width: 1200px;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px; /* Jarak antar kolom lebih besar */
            align-items: center;
            z-index: 10; /* Pastikan container di atas floating elements */
            position: relative;
        }

        .hero-content {
            z-index: 2;
            position: relative;
            text-align: left; /* Teks rata kiri untuk kesan modern */
        }

        .hero-content h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.8rem, 5.5vw, 4.5rem); /* Ukuran font sedikit lebih besar */
            font-weight: 700;
            color: var(--white);
            margin-bottom: 25px; /* Margin lebih besar */
            line-height: 1.15;
            text-shadow: 2px 3px 6px rgba(0, 0, 0, 0.4); /* Bayangan teks yang lebih lembut */
        }

        .hero-content .highlight {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: inline-block;
            animation: shimmer 3.5s ease-in-out infinite alternate; /* Animasi shimmer lebih halus */
        }

        @keyframes shimmer {
            0%, 100% { filter: brightness(1); }
            50% { filter: brightness(1.2); }
        }

        .hero-content p {
            font-size: 1.3rem; /* Ukuran font deskripsi lebih besar */
            color: rgba(255, 255, 255, 0.95); /* Warna teks yang lebih kontras */
            margin-bottom: 45px; /* Margin lebih besar */
            line-height: 1.7;
            font-weight: 300;
            max-width: 550px; /* Batasi lebar paragraf */
        }

        .cta-buttons {
            display: flex;
            gap: 25px; /* Jarak antar tombol lebih besar */
            flex-wrap: wrap;
            justify-content: flex-start; /* Tombol rata kiri */
        }

        .btn {
            display: inline-flex;
            align-items: center;
            padding: 18px 36px; /* Padding tombol lebih besar */
            border-radius: 60px; /* Radius lebih bulat */
            font-weight: 600;
            text-decoration: none;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            font-size: 1.05rem; /* Ukuran font tombol sedikit lebih besar */
            letter-spacing: 0.7px;
            box-shadow: var(--shadow-light);
            text-transform: uppercase; /* Teks tombol kapital */
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.25), transparent);
            transition: left 0.5s ease-out;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--white);
            border: none; /* Hilangkan border */
        }

        .btn-primary:hover {
            transform: translateY(-3px); /* Efek hover lebih kentara */
            box-shadow: var(--shadow-medium);
            filter: brightness(1.05);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.15); /* Background sedikit lebih solid */
            color: var(--white);
            border: 2px solid rgba(255, 255, 255, 0.4); /* Border sedikit lebih jelas */
            backdrop-filter: blur(12px); /* Blur sedikit lebih kuat */
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.6);
            transform: translateY(-3px);
            box-shadow: var(--shadow-medium);
        }

        .card-container {
            position: relative;
            z-index: 2;
            perspective: 1000px; /* Untuk efek 3D yang lebih baik */
        }

        .main-card {
            background: rgba(255, 255, 255, 0.98); /* Lebih solid putih */
            backdrop-filter: blur(25px); /* Blur lebih kuat */
            border-radius: 28px; /* Radius lebih besar */
            padding: 60px; /* Padding lebih besar */
            text-align: center;
            box-shadow: var(--shadow-heavy);
            border: 1px solid rgba(255, 255, 255, 0.3); /* Border sedikit lebih tebal */
            position: relative;
            overflow: hidden;
            animation: cardFloat 7s ease-in-out infinite alternate; /* Animasi float lebih panjang dan alternate */
            transform-style: preserve-3d; /* Penting untuk efek 3D */
        }

        @keyframes cardFloat {
            0%, 100% { transform: translateY(0px) rotateX(0deg) rotateY(0deg); }
            50% { transform: translateY(-15px) rotateX(1deg) rotateY(-1deg); } /* Efek floating yang lebih dinamis */
        }

        .main-card::before {
            content: '';
            position: absolute;
            top: -70%;
            left: -70%;
            width: 240%;
            height: 240%;
            background: conic-gradient(from 0deg, transparent, rgba(var(--accent-color), 0.15) 30%, transparent 70%); /* Gradien yang lebih lembut */
            animation: rotate 15s linear infinite; /* Animasi rotasi lebih lambat */
            opacity: 0.08; /* Opasitas lebih rendah */
            transform-origin: center center;
        }

        @keyframes rotate {
            100% { transform: rotate(360deg); }
        }

        .seblak-icon {
            width: 140px; /* Ukuran ikon lebih besar */
            height: 140px;
            margin: 0 auto 35px;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: var(--shadow-medium); /* Bayangan ikon lebih kuat */
            position: relative;
            z-index: 1;
            animation: iconPulse 4.5s ease-in-out infinite;
            border: 5px solid var(--primary-color); /* Border ikon lebih tebal */
            display: flex; /* Untuk memposisikan gambar di tengah jika perlu */
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0; /* Warna background jika gambar tidak ada */
        }

        .seblak-icon img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Pastikan gambar mengisi area tanpa terdistorsi */
            filter: grayscale(0.2) brightness(0.95); /* Sedikit efek abu-abu dan kecerahan untuk kesan profesional */
            transition: filter 0.3s ease;
        }

        .seblak-icon img:hover {
            filter: grayscale(0) brightness(1); /* Kembali normal saat hover */
        }

        @keyframes iconPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.03); } /* Efek pulse lebih halus */
        }

        .card-title {
            font-family: 'Playfair Display', serif;
            font-size: 3rem; /* Ukuran judul lebih besar */
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .card-subtitle {
            font-size: 1.2rem; /* Ukuran subtitle lebih besar */
            color: var(--text-light);
            margin-bottom: 40px;
            line-height: 1.7;
            position: relative;
            z-index: 1;
            max-width: 450px; /* Batasi lebar subtitle */
            margin-left: auto;
            margin-right: auto;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); /* Ukuran kolom fitur lebih besar */
            gap: 25px; /* Jarak antar fitur lebih besar */
            margin: 45px 0 0; /* Margin atas fitur */
            position: relative;
            z-index: 1;
        }

        .feature {
            padding: 25px; /* Padding fitur lebih besar */
            background: rgba(var(--primary-color), 0.08); /* Background fitur lebih transparan */
            border-radius: 18px; /* Radius fitur lebih besar */
            border: 1px solid rgba(var(--primary-color), 0.15); /* Border fitur lebih lembut */
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05); /* Bayangan fitur */
        }

        .feature:hover {
            background: rgba(var(--primary-color), 0.12);
            transform: translateY(-8px) scale(1.02); /* Efek hover lebih terasa */
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .feature-icon {
            font-size: 2.2rem; /* Ukuran ikon fitur lebih besar */
            margin-bottom: 12px;
            color: var(--primary-color); /* Warna ikon fitur */
        }

        .feature-text {
            font-size: 1rem; /* Ukuran teks fitur sedikit lebih besar */
            color: var(--text-dark); /* Warna teks fitur lebih gelap */
            font-weight: 500;
            text-align: center;
        }

        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
            z-index: 1; /* Pastikan di bawah container */
        }

        .floating-element {
            position: absolute;
            font-size: 2.5rem; /* Ukuran elemen floating lebih besar */
            opacity: 0.08; /* Opasitas elemen floating lebih rendah */
            animation: float 10s ease-in-out infinite alternate; /* Animasi float lebih panjang dan alternate */
            color: var(--accent-color); /* Warna elemen floating */
        }

        .floating-element:nth-child(1) {
            top: 15%;
            left: 8%;
            animation-delay: 0s;
            transform: rotate(20deg);
        }

        .floating-element:nth-child(2) {
            top: 65%;
            right: 12%;
            animation-delay: 3s;
            transform: rotate(-30deg);
        }

        .floating-element:nth-child(3) {
            bottom: 10%;
            left: 25%;
            animation-delay: 6s;
            transform: rotate(45deg);
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-25px) rotate(30deg); } /* Efek float yang lebih dinamis */
        }

        /* Responsif */
        @media (max-width: 992px) {
            .container {
                grid-template-columns: 1fr;
                gap: 50px;
                padding: 0 20px; /* Tambahkan padding horizontal */
            }
            .hero-content {
                text-align: center;
                order: 2; /* Pindahkan konten hero ke bawah di mobile */
            }
            .card-container {
                order: 1; /* Pindahkan kartu ke atas di mobile */
            }
            .cta-buttons {
                justify-content: center;
            }
            .hero-content h1 {
                font-size: clamp(2.2rem, 8vw, 3.5rem);
            }
            .hero-content p {
                font-size: 1.1rem;
            }
            .main-card {
                padding: 40px;
            }
            .card-title {
                font-size: 2.2rem;
            }
            .card-subtitle {
                font-size: 1rem;
            }
            .seblak-icon {
                width: 100px;
                height: 100px;
                margin-bottom: 25px;
            }
            .features {
                grid-template-columns: 1fr; /* Satu kolom untuk fitur di mobile */
            }
        }

        @media (max-width: 576px) {
            body {
                padding: 15px;
            }
            .main-card {
                padding: 30px;
            }
            .btn {
                padding: 14px 25px;
                font-size: 0.95rem;
            }
            .seblak-icon {
                width: 90px;
                height: 90px;
            }
        }
    </style>
</head>
<body>
    <div class="floating-elements">
        <div class="floating-element">🌶️</div>
        <div class="floating-element">🍜</div>
        <div class="floating-element">🔥</div>
    </div>

    <div class="container">
        <div class="hero-content">
            <h1>Selamat Datang di <span class="highlight">SeblakMania</span></h1>
            <p>Nikmati kelezatan seblak autentik dengan cita rasa yang tak terlupakan, siap diantar ke pintu Anda. Pesan sekarang dan rasakan sensasi pedas yang menggugah selera!</p>
            <div class="cta-buttons">
                <a href="{{ route('login') }}" class="btn btn-primary">Masuk Sekarang</a>
                <a href="{{ route('register') }}" class="btn btn-secondary">Daftar Gratis</a>
            </div>
        </div>

        <div class="card-container">
            <div class="main-card">
                <div class="seblak-icon">
                    <img src="https://thegorbalsla.com/wp-content/uploads/2018/10/gambar-karikatur-jokowi.jpg" alt="Logo SeblakMania">
                </div>
                <h2 class="card-title">SeblakMania</h2>
                <p class="card-subtitle">
                    SeblakMania adalah platform terdepan yang hadir untuk menghadirkan pengalaman kuliner seblak terbaik. Kami mengutamakan rasa autentik, kualitas premium, dan layanan pengiriman super cepat untuk kepuasan Anda.
                </p>
                
                <div class="features">
                    <div class="feature">
                        <div class="feature-icon">⚡</div>
                        <div class="feature-text">Pengiriman Cepat</div>
                    </div>
                    <div class="feature">
                        <div class="feature-icon">🏆</div>
                        <div class="feature-text">Kualitas Premium</div>
                    </div>
                    <div class="feature">
                        <div class="feature-icon">💯</div>
                        <div class="feature-text">Rasa Autentik</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
