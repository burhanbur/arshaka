<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WW6ZT62V');</script>
    <!-- End Google Tag Manager -->

    {{-- Primary Meta Tags --}}
    <title>@yield('title', 'PT Arshaka Logistik Indonesia – Empowering Business, Connecting Indonesia')</title>
    <meta name="description" content="@yield('meta_description', 'PT Arshaka Logistik Indonesia menyediakan jasa penyewaan truck dan pengiriman barang ke seluruh Indonesia dengan armada modern dan driver bersertifikasi.')">
    <meta name="keywords"   content="@yield('meta_keywords', 'logistik, transportasi, truck, pengiriman, ekspedisi, Bogor, Indonesia, Arshaka')">
    <meta name="author"     content="PT Arshaka Logistik Indonesia">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type"        content="website">
    <meta property="og:url"         content="{{ url()->current() }}">
    <meta property="og:title"       content="@yield('title', 'PT Arshaka Logistik Indonesia')">
    <meta property="og:description" content="@yield('meta_description', 'Jasa transportasi logistik profesional ke seluruh Indonesia.')">
    <meta property="og:image"       content="@yield('og_image', asset('assets/images/og-default.jpg'))">

    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome 6 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    {{-- AOS – Animate on Scroll --}}
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --primary:      #3D1F0C;
            --primary-light:#5C3018;
            --accent:       #C4842A;
            --accent-dark:  #A06820;
            --light-bg:     #FDF8F2;
            --text-dark:    #2D1A0E;
            --text-muted:   #7A6055;
            --border-color: #EBE0D6;
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text-dark);
            background: #fff;
            line-height: 1.7;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
        }

        /* ===== NAVBAR ===== */
        #mainNav {
            background: var(--primary);
            transition: background .3s, box-shadow .3s;
            padding: 0;
        }
        #mainNav.scrolled {
            box-shadow: 0 4px 24px rgba(0,0,0,.18);
        }
        #mainNav .navbar-brand {
            font-family: 'Poppins', sans-serif;
            font-size: 1.25rem;
            font-weight: 800;
            color: #fff !important;
            letter-spacing: -.3px;
        }
        #mainNav .navbar-brand span { color: #fff; }
        #mainNav .nav-link {
            color: rgba(255,255,255,.85) !important;
            font-weight: 500;
            font-size: .92rem;
            padding: 1.4rem .9rem !important;
            transition: color .2s;
            text-transform: uppercase;
            letter-spacing: .04em;
        }
        #mainNav .nav-link:hover,
        #mainNav .nav-link.active {
            color: #fff !important;
        }
        #mainNav .nav-link.active {
            border-bottom: 3px solid var(--accent);
        }
        .btn-nav-cta {
            background: var(--accent);
            color: #fff !important;
            border-radius: 4px;
            padding: .45rem 1.3rem !important;
            font-size: .88rem !important;
            font-weight: 600 !important;
            margin-left: .5rem;
            transition: background .2s;
            text-transform: none !important;
            letter-spacing: 0 !important;
            border-bottom: none !important;
        }
        .btn-nav-cta:hover { background: var(--accent-dark) !important; color: #fff !important; }

        /* ===== SECTION HELPERS ===== */
        .section { padding: 80px 0; }
        .section-light { background: var(--light-bg); }
        .section-dark  { background: var(--primary); color: #fff; }

        .section-title { font-size: 2rem; color: var(--primary); margin-bottom: .5rem; }
        .section-subtitle { color: var(--text-muted); font-size: 1.05rem; margin-bottom: 3rem; }
        .divider-accent {
            display: block; width: 50px; height: 4px;
            background: var(--accent); margin: .75rem auto 1.5rem;
            border-radius: 2px;
        }

        /* ===== BUTTONS ===== */
        .btn-primary-custom {
            background: var(--accent);
            color: #fff;
            border: 2px solid var(--accent);
            border-radius: 4px;
            padding: .7rem 2rem;
            font-weight: 600;
            font-size: .95rem;
            transition: background .2s, color .2s;
        }
        .btn-primary-custom:hover {
            background: var(--accent-dark);
            border-color: var(--accent-dark);
            color: #fff;
        }
        .btn-outline-custom {
            background: transparent;
            color: #fff;
            border: 2px solid rgba(255,255,255,.7);
            border-radius: 4px;
            padding: .7rem 2rem;
            font-weight: 600;
            font-size: .95rem;
            transition: background .2s, border-color .2s;
        }
        .btn-outline-custom:hover {
            background: rgba(255,255,255,.12);
            border-color: #fff;
            color: #fff;
        }

        /* ===== SERVICE CARDS ===== */
        .service-card {
            border: 1px solid var(--border-color);
            border-radius: 10px;
            padding: 2.2rem 1.8rem;
            background: #fff;
            transition: transform .25s, box-shadow .25s;
            height: 100%;
        }
        .service-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 40px rgba(0,0,0,.10);
        }
        .service-card .icon-wrap {
            width: 64px; height: 64px;
            background: rgba(192,57,43,.1);
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 1.25rem;
            font-size: 1.7rem;
            color: var(--accent);
        }

        /* ===== STAT CARDS ===== */
        .stat-card {
            text-align: center;
            padding: 1.8rem 1rem;
            border-right: 1px solid rgba(255,255,255,.15);
        }
        .stat-card:last-child { border-right: none; }
        .stat-card .stat-number {
            font-family: 'Poppins', sans-serif;
            font-size: 2.6rem;
            font-weight: 800;
            color: var(--accent);
            line-height: 1;
        }
        .stat-card .stat-label { color: rgba(255,255,255,.8); font-size: .9rem; margin-top: .4rem; }

        /* ===== FEATURE ITEMS ===== */
        .feature-item {
            display: flex; gap: 1.1rem;
            margin-bottom: 1.8rem;
            align-items: flex-start;
        }
        .feature-item .fi-icon {
            flex-shrink: 0;
            width: 50px; height: 50px;
            background: rgba(192,57,43,.1);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            color: var(--accent);
            font-size: 1.3rem;
        }
        .feature-item .fi-text h5 { font-size: 1rem; margin-bottom: .25rem; color: var(--primary); }
        .feature-item .fi-text p  { font-size: .9rem; color: var(--text-muted); margin: 0; }

        /* ===== BLOG CARD ===== */
        .blog-card {
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid var(--border-color);
            transition: transform .25s, box-shadow .25s;
            background: #fff;
            height: 100%;
            display: flex; flex-direction: column;
        }
        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 32px rgba(0,0,0,.09);
        }
        .blog-card img {
            width: 100%; height: 200px; object-fit: cover;
        }
        .blog-card .card-body { padding: 1.4rem; flex: 1; display: flex; flex-direction: column; }
        .blog-card .card-category {
            font-size: .78rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .06em;
            color: var(--accent);
            margin-bottom: .4rem;
        }
        .blog-card .card-title { font-size: 1rem; color: var(--primary); line-height: 1.45; }
        .blog-card .card-date  { font-size: .82rem; color: var(--text-muted); margin-top: auto; padding-top: .8rem; }

        /* ===== FOOTER ===== */
        #mainFooter {
            background: var(--primary);
            color: rgba(255,255,255,.8);
        }
        #mainFooter .footer-brand {
            font-family: 'Poppins', sans-serif;
            font-size: 1.3rem;
            font-weight: 800;
            color: #fff;
        }
        #mainFooter .footer-brand span { color: var(--accent); }
        #mainFooter h6 {
            color: #fff;
            font-weight: 700;
            font-size: .9rem;
            text-transform: uppercase;
            letter-spacing: .08em;
            margin-bottom: 1.1rem;
        }
        #mainFooter a {
            color: rgba(255,255,255,.7);
            text-decoration: none;
            font-size: .9rem;
            display: block;
            margin-bottom: .45rem;
            transition: color .2s;
        }
        #mainFooter a:hover { color: #fff; }
        #mainFooter .footer-divider { border-color: rgba(255,255,255,.12); }
        #mainFooter .footer-bottom { font-size: .85rem; color: rgba(255,255,255,.5); }

        /* ===== BACK TO TOP ===== */
        #backToTop {
            position: fixed; bottom: 1.5rem; right: 1.5rem; z-index: 9999;
            width: 42px; height: 42px;
            background: var(--accent); color: #fff;
            border: none; border-radius: 6px;
            display: none; align-items: center; justify-content: center;
            font-size: 1rem; cursor: pointer;
            box-shadow: 0 4px 16px rgba(0,0,0,.2);
            transition: background .2s;
        }
        #backToTop:hover { background: var(--accent-dark); }

        /* ===== WHATSAPP FLOAT ===== */
        .wa-float {
            position: fixed; bottom: 4.5rem; right: 1.5rem; z-index: 9999;
            width: 48px; height: 48px;
            background: #25D366; color: #fff;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.5rem;
            box-shadow: 0 4px 16px rgba(0,0,0,.2);
            transition: transform .2s;
        }
        .wa-float:hover { transform: scale(1.1); color: #fff; }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 767px) {
            .section { padding: 55px 0; }
            .section-title { font-size: 1.6rem; }
            .stat-card { border-right: none; border-bottom: 1px solid rgba(255,255,255,.15); }
            .stat-card:last-child { border-bottom: none; }
        }
    </style>

    @stack('styles')
</head>
<body>
    
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WW6ZT62V"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

{{-- ===== NAVBAR ===== --}}
<nav id="mainNav" class="navbar navbar-expand-lg sticky-top" aria-label="Navigasi utama">
    <div class="container">
        <a class="navbar-brand" href="{{ route('web.home') }}">
            ARSHAKA <span>LOGISTIK INDONESIA</span>
        </a>
        <button class="navbar-toggler border-0" type="button"
                data-bs-toggle="collapse" data-bs-target="#navMenu"
                aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars text-white fa-lg"></i>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('web.home')    ? 'active' : '' }}"
                       href="{{ route('web.home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('web.about')   ? 'active' : '' }}"
                       href="{{ route('web.about') }}">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('web.services')? 'active' : '' }}"
                       href="{{ route('web.services') }}">Armada Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('web.blog*')   ? 'active' : '' }}"
                       href="{{ route('web.blog.index') }}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('web.gallery') ? 'active' : '' }}"
                       href="{{ route('web.gallery') }}">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-nav-cta {{ request()->routeIs('web.contact') ? 'active' : '' }}"
                       href="{{ route('web.contact') }}">Hubungi Kami</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- ===== PAGE CONTENT ===== --}}
@yield('content')

{{-- ===== FOOTER ===== --}}
<footer id="mainFooter" class="pt-5 pb-3">
    <div class="container">
        <div class="row g-4 pb-4">
            <div class="col-lg-4">
                <div class="footer-brand mb-3">ARSHAKA LOGISTIK INDONESIA</div>
                <p style="font-size:.9rem; line-height:1.8;">
                    PT Arshaka Logistik Indonesia – mitra terpercaya jasa transportasi dan logistik darat
                    ke seluruh Indonesia. Armada modern, driver bersertifikasi, tracking real-time.
                </p>
                <div class="d-flex gap-3 mt-3">
                    <a href="https://www.instagram.com/arshakalogistic" target="_blank" rel="noopener"
                       style="display:inline-flex;align-items:center;justify-content:center;
                              width:36px;height:36px;background:rgba(255,255,255,.1);
                              border-radius:6px;color:#fff;font-size:1rem;margin-bottom:0;"
                       aria-label="Instagram Arshaka Logistik">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://wa.me/6281511015666" target="_blank" rel="noopener"
                       style="display:inline-flex;align-items:center;justify-content:center;
                              width:36px;height:36px;background:rgba(255,255,255,.1);
                              border-radius:6px;color:#fff;font-size:1rem;margin-bottom:0;"
                       aria-label="WhatsApp Arshaka Logistik">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            <div class="col-6 col-lg-2">
                <h6>Tautan Cepat</h6>
                <a href="{{ route('web.home') }}">Beranda</a>
                <a href="{{ route('web.about') }}">Tentang Kami</a>
                <a href="{{ route('web.services') }}">Layanan</a>
                <a href="{{ route('web.blog.index') }}">Blog</a>
                <a href="{{ route('web.contact') }}">Kontak</a>
            </div>

            <div class="col-6 col-lg-3">
                <h6>Layanan</h6>
                <a href="{{ route('web.services') }}#engkel">Truck Engkel</a>
                <a href="{{ route('web.services') }}#double">Truck Double</a>
                <a href="{{ route('web.services') }}#fuso">Fuso Wingbox</a>
                <a href="{{ route('web.services') }}#tronton">Tronton Wingbox</a>
            </div>

            <div class="col-lg-3">
                <h6>Kontak Kami</h6>
                <a href="https://maps.google.com/?q=Gardenia+Residence+Bojong+Gede+Bogor" target="_blank" rel="noopener"><i class="fas fa-map-marker-alt me-2" style="color:var(--accent)"></i>Gardenia Residence Blok A1, Jl. Raya Pabuaran Rawapanjang, Bojong Gede, Kab. Bogor</a>
                <a href="mailto:arshakalogistic@gmail.com"><i class="fas fa-envelope me-2" style="color:var(--accent)"></i>arshakalogistic@gmail.com</a>
                <a href="https://wa.me/6281511015666" target="_blank" rel="noopener"><i class="fab fa-whatsapp me-2" style="color:var(--accent)"></i>0815-1101-5666</a>
                <a href="https://www.instagram.com/arshakalogistic" target="_blank" rel="noopener"><i class="fab fa-instagram me-2" style="color:var(--accent)"></i>@arshakalogistic</a>
            </div>
        </div>

        <hr class="footer-divider">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center footer-bottom">
            <span>&copy; {{ date('Y') }} PT Arshaka Logistik Indonesia. All Rights Reserved.</span>
            <span class="mt-1 mt-md-0">Empowering Business, Connecting Indonesia</span>
        </div>
    </div>
</footer>

{{-- WhatsApp Float --}}
<a href="https://wa.me/6281511015666" class="wa-float" target="_blank" rel="noopener" aria-label="Chat WhatsApp">
    <i class="fab fa-whatsapp"></i>
</a>

{{-- Back to Top --}}
<button id="backToTop" aria-label="Kembali ke atas"><i class="fas fa-chevron-up"></i></button>

{{-- Bootstrap 5 JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

{{-- AOS --}}
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>AOS.init({ duration: 700, once: true, offset: 80 });</script>

{{-- Navbar scroll effect --}}
<script>
    window.addEventListener('scroll', function () {
        const nav = document.getElementById('mainNav');
        nav.classList.toggle('scrolled', window.scrollY > 50);

        const btn = document.getElementById('backToTop');
        btn.style.display = window.scrollY > 400 ? 'flex' : 'none';
    });
    document.getElementById('backToTop').addEventListener('click', function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
</script>

@stack('scripts')
</body>
</html>
