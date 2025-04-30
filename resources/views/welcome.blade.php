<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nina ❤️ Lana</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #8B5A2B; /* Warna coklat elegan */
            --secondary-color: #F8EDE3;
            --accent-color: #D4A373;
            --text-color: #5C3D2E;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            color: var(--text-color);
            overflow-x: hidden;
            background-color: #FFF9F0;
        }
        
        h1, h2, h3, h4 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
        }
        
        .hero-section {
            height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('https://images.unsplash.com/photo-1519225421980-715cb0215aed?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            cursor: pointer;
        }
        
        .hero-content {
            animation: fadeIn 2s ease-in-out;
            width: 90%;
            max-width: 800px;
            margin: 0 auto;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Tambahan style untuk bagian penerima */
        .recipient-card {
            background-color: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            text-align: left;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .recipient-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            padding-bottom: 5px;
        }
        
        .recipient-name {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .recipient-address {
            font-size: 1rem;
            line-height: 1.5;
        }
        
        .couple-names {
            font-size: 3.5rem;
            margin-bottom: 1rem;
        }
        
        .date-place {
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .open-invitation {
            background-color: rgba(255, 255, 255, 0.2);
            border: 2px solid white;
            color: white;
            padding: 10px 30px;
            border-radius: 50px;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }
        
        .open-invitation:hover {
            background-color: rgba(255, 255, 255, 0.3);
            transform: scale(1.05);
        }
        
        .main-content {
            display: none;
            padding-top: 80px;
        }
        
        .section {
            padding: 80px 0;
        }
        
        .section-title {
            position: relative;
            margin-bottom: 50px;
            color: var(--primary-color);
        }
        
        .section-title:after {
            content: "";
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: var(--accent-color);
        }
        
        .couple-img {
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        
        .couple-img:hover {
            transform: scale(1.03);
        }
        
        .event-card {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            height: 100%;
            transition: transform 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }
        
        .event-card:hover {
            transform: translateY(-10px);
        }
        
        .event-icon {
            font-size: 2.5rem;
            color: var(--accent-color);
            margin-bottom: 20px;
        }
        
        .gallery-img {
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        
        .gallery-img img {
            transition: transform 0.5s ease;
        }
        
        .gallery-img:hover img {
            transform: scale(1.1);
        }
        
        .rsvp-form {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .form-control {
            border: 1px solid rgba(0, 0, 0, 0.1);
            padding: 12px 15px;
            margin-bottom: 20px;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 12px 30px;
            font-weight: 600;
        }
        
        .btn-primary:hover {
            background-color: #6F4A24;
            border-color: #6F4A24;
        }
        
        .footer {
            background-color: var(--primary-color);
            color: white;
            padding: 30px 0;
        }
        
        .music-control {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            background-color: rgba(255, 255, 255, 0.8);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .nav-menu {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: white;
            box-shadow: 0 -5px 15px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: none;
        }
        
        .nav-item {
            padding: 15px 0;
            text-align: center;
        }
        
        .nav-link {
            color: var(--text-color);
            font-weight: 600;
        }
        
        .nav-link.active {
            color: var(--primary-color);
        }
        
        .nav-link i {
            display: block;
            font-size: 1.5rem;
            margin-bottom: 5px;
        }
        
        .countdown-item {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .countdown-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }
        
        .countdown-label {
            font-size: 0.9rem;
            color: var(--text-color);
            text-transform: uppercase;
        }
        
        @media (max-width: 768px) {
            .couple-names {
                font-size: 2.5rem;
            }
            
            .date-place {
                font-size: 1.2rem;
            }
            
            .section {
                padding: 50px 0;
            }
            
            .rsvp-form {
                padding: 20px;
            }
            
            .recipient-card {
                padding: 15px;
            }
            
            .recipient-name {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Audio Element -->
    <audio id="weddingMusic" loop>
        <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg">
    </audio>
    
    <!-- Music Control -->
    <div class="music-control" id="musicControl">
        <i class="fas fa-music"></i>
    </div>
    
    <!-- Hero Section -->
    <section class="hero-section" id="heroSection">
        <div class="hero-content">
            <!-- Bagian Penerima Undangan -->
            <div class="recipient-card">
                <div class="recipient-title">Kepada Yang Terhormat</div>
                <div class="recipient-name">Bapak/Ibu/Saudara/i</div>
                <div class="recipient-name" id="guestName">Nama Tamu Undangan</div>
                <div class="recipient-address" id="guestAddress">Alamat Tamu Undangan</div>
            </div>
            
            <h3 class="text-uppercase mb-4">The Wedding Of</h3>
            <h1 class="couple-names">Nina & Lana </h1>
            <p class="date-place">12 Desember 2023 • Grand Ballroom, Jakarta</p>
            <button class="open-invitation btn">Buka Undangan</button>
        </div>
    </section>
    
    <!-- Main Content (Hidden Initially) -->
    <div class="main-content" id="mainContent">
        <!-- Navigation Menu -->
        <nav class="nav-menu">
            <div class="container">
                <div class="row">
                    <div class="col nav-item">
                        <a class="nav-link active" href="#home">
                            <i class="fas fa-home"></i>
                            <span>Home</span>
                        </a>
                    </div>
                    <div class="col nav-item">
                        <a class="nav-link" href="#couple">
                            <i class="fas fa-heart"></i>
                            <span>Pasangan</span>
                        </a>
                    </div>
                    <div class="col nav-item">
                        <a class="nav-link" href="#events">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Acara</span>
                        </a>
                    </div>
                    <div class="col nav-item">
                        <a class="nav-link" href="#gallery">
                            <i class="fas fa-images"></i>
                            <span>Galeri</span>
                        </a>
                    </div>
                    <div class="col nav-item">
                        <a class="nav-link" href="#rsvp">
                            <i class="fas fa-envelope"></i>
                            <span>RSVP</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        
        <!-- Home Section -->
        <section class="section" id="home">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <h2 class="section-title">Selamat Datang</h2>
                        <p class="lead">Dengan memohon rahmat dan ridho Allah SWT, kami bermaksud menyelenggarakan pernikahan putra-putri kami:</p>
                        <h3 class="text-center my-4">Dgita <span class="mx-3">&</span> Persona</h3>
                        <p>Kami mengundang Bapak/Ibu/Saudara/i untuk hadir dan memberikan doa restu pada acara pernikahan kami.</p>
                        
                        <div class="text-center mt-5">
                            <h4 class="mb-4">Hitungan Mundur</h4>
                            <div class="row">
                                <div class="col-3">
                                    <div class="countdown-item">
                                        <div class="countdown-number" id="days">00</div>
                                        <div class="countdown-label">Hari</div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="countdown-item">
                                        <div class="countdown-number" id="hours">00</div>
                                        <div class="countdown-label">Jam</div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="countdown-item">
                                        <div class="countdown-number" id="minutes">00</div>
                                        <div class="countdown-label">Menit</div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="countdown-item">
                                        <div class="countdown-number" id="seconds">00</div>
                                        <div class="countdown-label">Detik</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="https://images.unsplash.com/photo-1583939003579-730e3918a45a?ixlib=rb-4.0.3&auto=format&fit=crop&w=634&q=80" alt="Couple" class="img-fluid couple-img">
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Couple Section -->
        <section class="section bg-light" id="couple">
            <div class="container">
                <h2 class="section-title text-center">Pasangan Pengantin</h2>
                <div class="row justify-content-center mb-5">
                    <div class="col-md-8 text-center">
                        <p>"Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu isteri-isteri dari jenismu sendiri, supaya kamu cenderung dan merasa tenteram kepadanya, dan dijadikan-Nya di antaramu rasa kasih dan sayang. Sesungguhnya pada yang demikian itu benar-benar terdapat tanda-tanda bagi kaum yang berpikir."</p>
                        <p class="fst-italic">(QS. Ar-Rum: 21)</p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-5 text-center mb-5 mb-md-0">
                        <img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?ixlib=rb-4.0.3&auto=format&fit=crop&w=634&q=80" alt="Bride" class="img-fluid rounded-circle mb-4" style="width: 200px; height: 200px; object-fit: cover;">
                        <h3>Dgita Anindita</h3>
                        <p>Putri pertama dari<br>Bapak Ahmad & Ibu Siti</p>
                        <div class="social-icons mt-3">
                            <a href="#" class="text-decoration-none mx-2"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="text-decoration-none mx-2"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="text-decoration-none mx-2"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                    
                    <div class="col-md-2 text-center d-flex align-items-center justify-content-center">
                        <div class="heart-icon">
                            <i class="fas fa-heart fa-2x" style="color: var(--accent-color);"></i>
                        </div>
                    </div>
                    
                    <div class="col-md-5 text-center">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=634&q=80" alt="Groom" class="img-fluid rounded-circle mb-4" style="width: 200px; height: 200px; object-fit: cover;">
                        <h3>Persona Wijaya</h3>
                        <p>Putra pertama dari<br>Bapak Budi & Ibu Ani</p>
                        <div class="social-icons mt-3">
                            <a href="#" class="text-decoration-none mx-2"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="text-decoration-none mx-2"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="text-decoration-none mx-2"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Events Section -->
        <section class="section" id="events">
            <div class="container">
                <h2 class="section-title text-center">Acara Pernikahan</h2>
                <div class="row justify-content-center mb-5">
                    <div class="col-md-8 text-center">
                        <p>Kami dengan hormat mengundang Bapak/Ibu/Saudara/i untuk hadir memberikan doa restu pada acara pernikahan kami.</p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="event-card">
                            <div class="event-icon">
                                <i class="fas fa-mosque"></i>
                            </div>
                            <h3>Akad Nikah</h3>
                            <p class="text-muted">Minggu, 12 Desember 2023</p>
                            <p>08:00 - 10:00 WIB</p>
                            <p><i class="fas fa-map-marker-alt me-2"></i> Masjid Agung Al-Azhar, Jakarta Selatan</p>
                            <a href="https://maps.google.com" target="_blank" class="btn btn-outline-primary mt-3">Lihat Lokasi</a>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-4">
                        <div class="event-card">
                            <div class="event-icon">
                                <i class="fas fa-glass-cheers"></i>
                            </div>
                            <h3>Resepsi</h3>
                            <p class="text-muted">Minggu, 12 Desember 2023</p>
                            <p>11:00 - 15:00 WIB</p>
                            <p><i class="fas fa-map-marker-alt me-2"></i> Grand Ballroom Hotel Indonesia, Jakarta Pusat</p>
                            <a href="https://maps.google.com" target="_blank" class="btn btn-outline-primary mt-3">Lihat Lokasi</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Gallery Section -->
        <section class="section bg-light" id="gallery">
            <div class="container">
                <h2 class="section-title text-center">Galeri Kami</h2>
                <div class="row justify-content-center mb-5">
                    <div class="col-md-8 text-center">
                        <p>Beberapa momen indah yang telah kami lewati bersama selama perjalanan cinta kami.</p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="gallery-img">
                            <img src="https://images.unsplash.com/photo-1518895949257-7621c3c786d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=634&q=80" alt="Gallery 1" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="gallery-img">
                            <img src="https://images.unsplash.com/photo-1518621736915-f3b1c41bfd00?ixlib=rb-4.0.3&auto=format&fit=crop&w=634&q=80" alt="Gallery 2" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="gallery-img">
                            <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?ixlib=rb-4.0.3&auto=format&fit=crop&w=634&q=80" alt="Gallery 3" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="gallery-img">
                            <img src="https://images.unsplash.com/photo-1494774157365-9e04c6720e47?ixlib=rb-4.0.3&auto=format&fit=crop&w=634&q=80" alt="Gallery 4" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="gallery-img">
                            <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-4.0.3&auto=format&fit=crop&w=634&q=80" alt="Gallery 5" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="gallery-img">
                            <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?ixlib=rb-4.0.3&auto=format&fit=crop&w=634&q=80" alt="Gallery 6" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- RSVP Section -->
        <section class="section" id="rsvp">
            <div class="container">
                <h2 class="section-title text-center">Konfirmasi Kehadiran</h2>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="rsvp-form">
                            <form id="rsvpForm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nama Lengkap" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Jumlah Orang yang Hadir" required>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" required>
                                        <option value="" disabled selected>Konfirmasi Kehadiran</option>
                                        <option value="yes">Ya, saya akan hadir</option>
                                        <option value="no">Maaf, saya tidak bisa hadir</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" placeholder="Pesan/Ucapan (Opsional)"></textarea>
                                </div>
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary">Kirim Konfirmasi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Footer -->
        <footer class="footer text-center">
            <div class="container">
                <h3 class="mb-4">Terima Kasih Atas Doa & Restunya</h3>
                <p>Dgita & Persona</p>
                <div class="mt-4">
                    <p>Keluarga Besar</p>
                    <p>Bapak Ahmad & Ibu Siti</p>
                    <p class="mb-0">Bapak Budi & Ibu Ani</p>
                </div>
            </div>
        </footer>
    </div>
    
    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set nama dan alamat tamu dari URL parameter
            const urlParams = new URLSearchParams(window.location.search);
            const guestName = urlParams.get('nama') || 'Bapak/Ibu/Saudara/i';
            const guestAddress = urlParams.get('alamat') || 'Di Tempat';
            
            document.getElementById('guestName').textContent = guestName;
            document.getElementById('guestAddress').textContent = guestAddress;
            
            // Music Control
            const music = document.getElementById('weddingMusic');
            const musicControl = document.getElementById('musicControl');
            let isPlaying = false;
            
            musicControl.addEventListener('click', function() {
                if (isPlaying) {
                    music.pause();
                    musicControl.innerHTML = '<i class="fas fa-music"></i>';
                } else {
                    music.play();
                    musicControl.innerHTML = '<i class="fas fa-pause"></i>';
                }
                isPlaying = !isPlaying;
            });
            
            // Open Invitation
            const heroSection = document.getElementById('heroSection');
            const mainContent = document.getElementById('mainContent');
            const navMenu = document.querySelector('.nav-menu');
            
            heroSection.addEventListener('click', function() {
                heroSection.style.display = 'none';
                mainContent.style.display = 'block';
                navMenu.style.display = 'block';
                
                // Auto play music after click
                music.play();
                musicControl.innerHTML = '<i class="fas fa-pause"></i>';
                isPlaying = true;
                
                // Scroll to top
                window.scrollTo(0, 0);
            });
            
            // Smooth scrolling for navigation
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Remove active class from all links
                    document.querySelectorAll('.nav-link').forEach(el => {
                        el.classList.remove('active');
                    });
                    
                    // Add active class to clicked link
                    this.classList.add('active');
                    
                    // Scroll to section
                    const targetId = this.getAttribute('href');
                    const targetSection = document.querySelector(targetId);
                    targetSection.scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
            
            // Countdown Timer
            const weddingDate = new Date('December 12, 2023 08:00:00').getTime();
            
            const countdown = setInterval(function() {
                const now = new Date().getTime();
                const distance = weddingDate - now;
                
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
                document.getElementById('days').innerHTML = days.toString().padStart(2, '0');
                document.getElementById('hours').innerHTML = hours.toString().padStart(2, '0');
                document.getElementById('minutes').innerHTML = minutes.toString().padStart(2, '0');
                document.getElementById('seconds').innerHTML = seconds.toString().padStart(2, '0');
                
                if (distance < 0) {
                    clearInterval(countdown);
                    document.getElementById('days').innerHTML = '00';
                    document.getElementById('hours').innerHTML = '00';
                    document.getElementById('minutes').innerHTML = '00';
                    document.getElementById('seconds').innerHTML = '00';
                }
            }, 1000);
            
            // Form submission
            const rsvpForm = document.getElementById('rsvpForm');
            if (rsvpForm) {
                rsvpForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    alert('Terima kasih atas konfirmasi kehadiran Anda!');
                    this.reset();
                });
            }
            
            // Detect scroll to change active nav link
            window.addEventListener('scroll', function() {
                const sections = document.querySelectorAll('section');
                const scrollPosition = window.scrollY + 100;
                
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.offsetHeight;
                    const sectionId = section.getAttribute('id');
                    
                    if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                        document.querySelectorAll('.nav-link').forEach(link => {
                            link.classList.remove('active');
                            if (link.getAttribute('href') === '#' + sectionId) {
                                link.classList.add('active');
                            }
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>