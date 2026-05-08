@extends('layouts.web')

@section('title', 'PT Arshaka Logistik Indonesia – Empowering Business, Connecting Indonesia')
@section('meta_description', 'PT Arshaka Logistik Indonesia menyediakan jasa penyewaan truck dan pengiriman barang ke seluruh Indonesia dengan armada modern dan driver bersertifikasi.')

@section('content')

{{-- ============================================================
     HERO
============================================================ --}}
<section id="hero" style="
    min-height: 92vh;
    background: linear-gradient(135deg, rgba(28,43,74,.92) 0%, rgba(28,43,74,.78) 60%, rgba(192,57,43,.55) 100%),
                url('{{ asset('assets/images/hero-truck.jpg') }}') center/cover no-repeat;
    display: flex; align-items: center;
    position: relative; overflow: hidden;">

    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-7" data-aos="fade-right">
                <span style="display:inline-block;background:rgba(192,57,43,.2);color:#f09090;
                             border:1px solid rgba(192,57,43,.4);border-radius:20px;
                             font-size:.8rem;font-weight:600;letter-spacing:.1em;
                             padding:.3rem 1rem;text-transform:uppercase;margin-bottom:1.2rem;">
                    PT Arshaka Logistik Indonesia
                </span>
                <h1 style="font-size:clamp(2rem,5vw,3.6rem);color:#fff;line-height:1.2;margin-bottom:1rem;">
                    Empowering Business,<br>
                    <span style="color:var(--accent);">Connecting Indonesia.</span>
                </h1>
                <p style="color:rgba(255,255,255,.85);font-size:1.1rem;max-width:540px;margin-bottom:2rem;line-height:1.8;">
                    Kami hadir untuk memenuhi kebutuhan distribusi barang ke seluruh Indonesia.
                    Armada terawat rata-rata tahun 2016 ke atas, driver bersertifikasi, dan
                    sistem tracking berbasis teknologi digital real-time.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('web.contact') }}" class="btn-primary-custom">
                        <i class="fas fa-phone-alt me-2"></i>Konsultasi Gratis
                    </a>
                    <a href="{{ route('web.services') }}" class="btn-outline-custom">
                        <i class="fas fa-truck me-2"></i>Lihat Layanan
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <a href="#stats" style="position:absolute;bottom:2rem;left:50%;transform:translateX(-50%);
                             color:rgba(255,255,255,.5);font-size:.8rem;text-align:center;
                             text-decoration:none;animation:bounce 2s infinite;"
       aria-label="Scroll ke bawah">
        <i class="fas fa-chevron-down fa-lg"></i>
    </a>
</section>

<style>
@keyframes bounce {
    0%,100% { transform: translateX(-50%) translateY(0); }
    50%      { transform: translateX(-50%) translateY(8px); }
}
</style>

{{-- ============================================================
     STATS BAR
============================================================ --}}
<section id="stats" class="section-dark py-0">
    <div class="container">
        <div class="row g-0">
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="0">
                <div class="stat-card">
                    <div class="stat-number">50<span style="font-size:1.5rem">+</span></div>
                    <div class="stat-label">Unit Armada Aktif</div>
                </div>
            </div>
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-card">
                    <div class="stat-number">34<span style="font-size:1.5rem">+</span></div>
                    <div class="stat-label">Provinsi Terjangkau</div>
                </div>
            </div>
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-card">
                    <div class="stat-number">5<span style="font-size:1.5rem">+</span></div>
                    <div class="stat-label">Tahun Pengalaman</div>
                </div>
            </div>
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-card">
                    <div class="stat-number">100<span style="font-size:1.5rem">%</span></div>
                    <div class="stat-label">Kepuasan Pelanggan</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================
     SERVICES OVERVIEW
============================================================ --}}
<section id="services" class="section">
    <div class="container">
        <div class="text-center" data-aos="fade-up">
            <h2 class="section-title">Layanan Unggulan Kami</h2>
            <span class="divider-accent"></span>
            <p class="section-subtitle">Solusi logistik darat lengkap dengan armada modern dan teknologi tracking digital.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                <div class="service-card">
                    <div class="icon-wrap"><i class="fas fa-truck"></i></div>
                    <h4 style="color:var(--primary);font-size:1.15rem;margin-bottom:.7rem;">Penyewaan Truck Engkel</h4>
                    <p style="color:var(--text-muted);font-size:.93rem;margin-bottom:1rem;">
                        Ideal untuk pengiriman dalam kota dan antar kota dengan muatan hingga 4 ton.
                        Cocok untuk usaha kecil menengah.
                    </p>
                    <ul style="color:var(--text-muted);font-size:.88rem;padding-left:1.1rem;margin:0;">
                        <li>Kapasitas muat ±2–4 ton</li>
                        <li>Armada tahun 2016 ke atas</li>
                        <li>Driver berpengalaman & bersertifikasi</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card">
                    <div class="icon-wrap"><i class="fas fa-truck-moving"></i></div>
                    <h4 style="color:var(--primary);font-size:1.15rem;margin-bottom:.7rem;">Penyewaan Truck Double</h4>
                    <p style="color:var(--text-muted);font-size:.93rem;margin-bottom:1rem;">
                        Kapasitas lebih besar untuk kebutuhan distribusi volume menengah.
                        Tersedia dengan berbagai konfigurasi bak.
                    </p>
                    <ul style="color:var(--text-muted);font-size:.88rem;padding-left:1.1rem;margin:0;">
                        <li>Kapasitas muat ±6–8 ton</li>
                        <li>Akses mudah ke tol Jagorawi</li>
                        <li>Jangkauan Jabodetabek & Jawa</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="service-card">
                    <div class="icon-wrap"><i class="fas fa-shipping-fast"></i></div>
                    <h4 style="color:var(--primary);font-size:1.15rem;margin-bottom:.7rem;">Fuso / Tronton Wingbox</h4>
                    <p style="color:var(--text-muted);font-size:.93rem;margin-bottom:1rem;">
                        Armada besar untuk muatan berat dan pengiriman lintas pulau.
                        Dilengkapi bak tertutup (wingbox) untuk keamanan kargo.
                    </p>
                    <ul style="color:var(--text-muted);font-size:.88rem;padding-left:1.1rem;margin:0;">
                        <li>Kapasitas muat ±15–30 ton</li>
                        <li>Wingbox – aman dari cuaca & pencurian</li>
                        <li>Rute seluruh Indonesia</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                <div class="service-card">
                    <div class="icon-wrap"><i class="fas fa-map-marker-alt"></i></div>
                    <h4 style="color:var(--primary);font-size:1.15rem;margin-bottom:.7rem;">Tracking Real-Time</h4>
                    <p style="color:var(--text-muted);font-size:.93rem;margin-bottom:1rem;">
                        Pantau posisi armada Anda secara langsung melalui sistem GPS tracking digital
                        yang terintegrasi.
                    </p>
                    <ul style="color:var(--text-muted);font-size:.88rem;padding-left:1.1rem;margin:0;">
                        <li>GPS aktif 24 jam penuh</li>
                        <li>Notifikasi status pengiriman</li>
                        <li>Laporan perjalanan lengkap</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card">
                    <div class="icon-wrap"><i class="fas fa-clock"></i></div>
                    <h4 style="color:var(--primary);font-size:1.15rem;margin-bottom:.7rem;">Pengiriman Tepat Waktu</h4>
                    <p style="color:var(--text-muted);font-size:.93rem;margin-bottom:1rem;">
                        Kami berkomitmen pada SLA ketepatan waktu yang tinggi demi kelancaran
                        rantai pasok bisnis Anda.
                    </p>
                    <ul style="color:var(--text-muted);font-size:.88rem;padding-left:1.1rem;margin:0;">
                        <li>On-time delivery commitment</li>
                        <li>Standar prosedur keamanan ketat</li>
                        <li>Asuransi kargo tersedia</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="service-card">
                    <div class="icon-wrap"><i class="fas fa-globe-asia"></i></div>
                    <h4 style="color:var(--primary);font-size:1.15rem;margin-bottom:.7rem;">Jangkauan Seluruh Indonesia</h4>
                    <p style="color:var(--text-muted);font-size:.93rem;margin-bottom:1rem;">
                        Dari Sabang sampai Merauke, kami siap mengantarkan kargo Anda
                        ke seluruh penjuru nusantara.
                    </p>
                    <ul style="color:var(--text-muted);font-size:.88rem;padding-left:1.1rem;margin:0;">
                        <li>Rute Jawa, Sumatera, Kalimantan</li>
                        <li>Sulawesi, Bali & Nusa Tenggara</li>
                        <li>Koordinasi armada terpusat</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('web.services') }}" class="btn-primary-custom">
                Lihat Detail Layanan <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

{{-- ============================================================
     WHY CHOOSE US
============================================================ --}}
<section id="why-us" class="section section-light">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5" data-aos="fade-right">
                <h2 class="section-title">Mengapa Memilih<br>Arshaka Logistik?</h2>
                <span class="divider-accent" style="margin-left:0;"></span>
                <p style="color:var(--text-muted);font-size:.97rem;line-height:1.85;margin-bottom:2rem;">
                    Dengan pengalaman bertahun-tahun di industri logistik darat Indonesia,
                    kami hadir sebagai mitra bisnis yang andal, profesional, dan berorientasi
                    pada kepuasan klien.
                </p>
                <a href="{{ route('web.about') }}" class="btn-primary-custom">
                    Kenali Kami Lebih Jauh
                </a>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <div class="feature-item">
                    <div class="fi-icon"><i class="fas fa-truck"></i></div>
                    <div class="fi-text">
                        <h5>Armada Lengkap &amp; Terawat</h5>
                        <p>Truck Engkel, Double, Fuso Wingbox, dan Tronton Wingbox — rata-rata keluaran tahun 2016 ke atas, dirawat secara berkala untuk memastikan keandalan setiap pengiriman.</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="fi-icon"><i class="fas fa-id-card"></i></div>
                    <div class="fi-text">
                        <h5>Pengemudi Profesional &amp; Bersertifikasi</h5>
                        <p>Seluruh driver kami telah tersertifikasi dan mengikuti pelatihan keselamatan berkala, menjunjung tinggi etika profesionalisme di jalan raya.</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="fi-icon"><i class="fas fa-headset"></i></div>
                    <div class="fi-text">
                        <h5>Dukungan Pelanggan 24/7</h5>
                        <p>Tim kami siap melayani kebutuhan dan pertanyaan Anda kapan saja, termasuk situasi darurat di luar jam operasional kantor.</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="fi-icon"><i class="fas fa-receipt"></i></div>
                    <div class="fi-text">
                        <h5>Transparansi Biaya</h5>
                        <p>Estimasi biaya yang jelas dan tidak ada biaya tersembunyi — kami percaya transparansi adalah fondasi kepercayaan jangka panjang bersama klien.</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="fi-icon"><i class="fas fa-satellite-dish"></i></div>
                    <div class="fi-text">
                        <h5>Sistem Tracking Digital</h5>
                        <p>Pantau posisi armada dan status pengiriman kargo Anda secara real-time melalui teknologi GPS tracking terintegrasi langsung dari genggaman tangan.</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="fi-icon"><i class="fas fa-clock"></i></div>
                    <div class="fi-text">
                        <h5>Komitmen Tepat Waktu &amp; Aman</h5>
                        <p>Kami berkomitmen pada SLA ketepatan waktu yang tinggi dengan prosedur keamanan ketat — keamanan, kecepatan, dan ketepatan adalah janji kami.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================
     COVERAGE MAP BANNER
============================================================ --}}
<section id="coverage" class="section section-dark text-center">
    <div class="container" data-aos="zoom-in">
        <h2 style="font-size:clamp(1.6rem,4vw,2.5rem);color:#fff;margin-bottom:.75rem;">
            Jangkauan ke Seluruh Indonesia
        </h2>
        <span class="divider-accent" style="margin:0 auto 1.5rem;"></span>
        <p style="color:rgba(255,255,255,.8);max-width:600px;margin:0 auto 2.5rem;font-size:1rem;line-height:1.8;">
            Dari Sabang sampai Merauke, PT Arshaka Logistik Indonesia siap menjadi mitra pengiriman
            darat terpercaya Anda di seluruh nusantara.
        </p>
        <div class="row justify-content-center g-3 mb-4">
            @foreach(['Jawa & Bali', 'Sumatera', 'Kalimantan', 'Sulawesi', 'Nusa Tenggara', 'Maluku & Papua'] as $region)
            <div class="col-auto">
                <span style="background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.25);
                             color:#fff;border-radius:25px;padding:.4rem 1.2rem;font-size:.88rem;
                             font-weight:500;">
                    <i class="fas fa-check-circle me-1" style="color:var(--accent)"></i>{{ $region }}
                </span>
            </div>
            @endforeach
        </div>
        <a href="{{ route('web.contact') }}" class="btn-outline-custom">
            <i class="fas fa-phone-alt me-2"></i>Konsultasi Rute Sekarang
        </a>
    </div>
</section>

{{-- ============================================================
     LATEST BLOG
============================================================ --}}
@if($latestPosts->count())
<section id="latest-blog" class="section">
    <div class="container">
        <div class="text-center" data-aos="fade-up">
            <h2 class="section-title">Artikel & Berita Terbaru</h2>
            <span class="divider-accent"></span>
            <p class="section-subtitle">Update industri logistik dan tips bisnis pengiriman untuk Anda.</p>
        </div>
        <div class="row g-4">
            @foreach($latestPosts as $post)
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <a href="{{ route('web.blog.show', $post->slug) }}" style="text-decoration:none;">
                    <div class="blog-card">
                        <img src="{{ $post->thumbnail_url }}" alt="{{ $post->title }}">
                        <div class="card-body">
                            @if($post->category)
                            <div class="card-category">{{ $post->category->name }}</div>
                            @endif
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-date">
                                <i class="fas fa-calendar-alt me-1"></i>
                                {{ $post->published_at->translatedFormat('d F Y') }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('web.blog.index') }}" class="btn-primary-custom">
                Lihat Semua Artikel <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>
@endif

{{-- ============================================================
     CTA BANNER
============================================================ --}}
<section id="cta" style="
    background: linear-gradient(135deg, var(--accent) 0%, var(--accent-dark) 100%);
    padding: 70px 0;">
    <div class="container text-center" data-aos="zoom-in">
        <h2 style="color:#fff;font-size:clamp(1.5rem,3.5vw,2.2rem);margin-bottom:.75rem;">
            Siap Mulai Kerja Sama?
        </h2>
        <p style="color:rgba(255,255,255,.9);max-width:520px;margin:0 auto 2rem;font-size:1rem;">
            Percayakan kebutuhan logistik bisnis Anda kepada kami.
            Tim kami siap memberikan solusi terbaik 24/7.
        </p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="{{ route('web.contact') }}" class="btn-outline-custom">
                <i class="fas fa-envelope me-2"></i>Kirim Pesan
            </a>
            <a href="https://wa.me/6281234567890" target="_blank" rel="noopener"
               style="background:#fff;color:var(--accent);border:2px solid #fff;
                      border-radius:4px;padding:.7rem 2rem;font-weight:600;font-size:.95rem;
                      text-decoration:none;transition:background .2s;"
               onmouseover="this.style.background='rgba(255,255,255,.85)'"
               onmouseout="this.style.background='#fff'">
                <i class="fab fa-whatsapp me-2"></i>Chat WhatsApp
            </a>
        </div>
    </div>
</section>

@endsection
