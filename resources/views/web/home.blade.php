@extends('layouts.web')

@section('title', 'Arshaka Logistik Indonesia – Empowering Business, Connecting Indonesia')
@section('meta_description', 'PT Arshaka Logistik Indonesia menyediakan jasa penyewaan truck dan pengiriman barang ke seluruh Indonesia dengan armada modern dan driver bersertifikasi.')

@section('content')

{{-- ============================================================
     HERO
============================================================ --}}
<section id="hero" style="
    min-height: 92vh;
    background: url('{{ asset('assets/images/truck/hero.jpg') }}') center/cover no-repeat;
    display: flex; align-items: center;
    position: relative; overflow: hidden;">

    <div data-aos="fade-down" data-aos-delay="100"
         style="position:absolute;top:4rem;right:2%;
                max-width:600px;
                background:rgba(255,255,255,.5);backdrop-filter:blur(2px);
                -webkit-backdrop-filter:blur(2px);
                border-radius:14px;padding:1.4rem 1.6rem;
                border:1px solid rgba(255,255,255,.6);
                box-shadow:0 4px 24px rgba(0,0,0,.1);">
        <span style="display:inline-block;background:rgba(196,132,42,.2);color:#E8A84C;
                     border:1px solid rgba(196,132,42,.5);border-radius:20px;
                     font-size:.7rem;font-weight:600;letter-spacing:.08em;
                     padding:.25rem .8rem;text-transform:uppercase;margin-bottom:.9rem;">
            PT Arshaka Logistik Indonesia
        </span>
        <h1 style="font-size:clamp(1.3rem,2.5vw,1.9rem);color:var(--primary);line-height:1.25;margin-bottom:.7rem;">
            Empowering Business,<br>
            <span style="color:var(--accent);">Connecting Indonesia.</span>
        </h1>
        <p style="color:var(--text-dark);font-size:.82rem;margin-bottom:1.2rem;line-height:1.7;">
            Armada terawat, driver bersertifikasi, dan tracking digital real-time ke seluruh Indonesia.
        </p>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('web.contact') }}" class="btn-primary-custom" style="font-size:.8rem;padding:.5rem 1.1rem;">
                <i class="fas fa-phone-alt me-1"></i>Konsultasi Gratis
            </a>
            <a href="{{ route('web.services') }}" class="btn-outline-custom"
               style="color:var(--primary);border-color:var(--primary);font-size:.8rem;padding:.5rem 1.1rem;">
                <i class="fas fa-truck me-1"></i>Lihat Layanan
            </a>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <a href="#stats" style="position:absolute;bottom:2rem;left:50%;transform:translateX(-50%);
                             color:rgba(61,31,12,.5);font-size:.8rem;text-align:center;
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
            {{-- CDE Long --}}
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="0">
                <div class="service-card" style="padding:0;overflow:hidden;">
                    <img src="{{ asset('assets/images/truck/cde-longbox.jpg') }}"
                         alt="CDE Long" style="width:100%;height:245px;object-fit:cover;">
                    <div style="padding:1.4rem;">
                        <h4 style="color:var(--primary);font-size:1.05rem;margin-bottom:1rem;">CDE Long</h4>
                        <div style="display:flex;flex-direction:column;gap:.6rem;">
                            <div style="display:flex;align-items:flex-start;gap:.75rem;">
                                <i class="fas fa-box" style="color:var(--accent);margin-top:.15rem;flex-shrink:0;"></i>
                                <div>
                                    <div style="font-size:.75rem;color:var(--text-muted);">Volume</div>
                                    <div style="font-size:.9rem;font-weight:700;color:var(--primary);">12 m³</div>
                                </div>
                            </div>
                            <div style="display:flex;align-items:flex-start;gap:.75rem;">
                                <i class="fas fa-truck" style="color:var(--accent);margin-top:.15rem;flex-shrink:0;"></i>
                                <div>
                                    <div style="font-size:.75rem;color:var(--text-muted);">Muatan</div>
                                    <div style="font-size:.9rem;font-weight:700;color:var(--primary);">2 – 3 ton</div>
                                </div>
                            </div>
                            <div style="display:flex;align-items:flex-start;gap:.75rem;">
                                <i class="fas fa-ruler-combined" style="color:var(--accent);margin-top:.15rem;flex-shrink:0;"></i>
                                <div>
                                    <div style="font-size:.75rem;color:var(--text-muted);">Dimensi (P x L x T)</div>
                                    <div style="font-size:.9rem;font-weight:700;color:var(--primary);">4.2 x 1.7 x 1.9 m</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- CDD Long --}}
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card" style="padding:0;overflow:hidden;">
                    <img src="{{ asset('assets/images/truck/cdd-longbox.jpg') }}"
                         alt="CDD Long" style="width:100%;height:245px;object-fit:cover;">
                    <div style="padding:1.4rem;">
                        <h4 style="color:var(--primary);font-size:1.05rem;margin-bottom:1rem;">CDD Long</h4>
                        <div style="display:flex;flex-direction:column;gap:.6rem;">
                            <div style="display:flex;align-items:flex-start;gap:.75rem;">
                                <i class="fas fa-box" style="color:var(--accent);margin-top:.15rem;flex-shrink:0;"></i>
                                <div>
                                    <div style="font-size:.75rem;color:var(--text-muted);">Volume</div>
                                    <div style="font-size:.9rem;font-weight:700;color:var(--primary);">20 – 30 m³</div>
                                </div>
                            </div>
                            <div style="display:flex;align-items:flex-start;gap:.75rem;">
                                <i class="fas fa-truck" style="color:var(--accent);margin-top:.15rem;flex-shrink:0;"></i>
                                <div>
                                    <div style="font-size:.75rem;color:var(--text-muted);">Muatan</div>
                                    <div style="font-size:.9rem;font-weight:700;color:var(--primary);">2 – 4 ton</div>
                                </div>
                            </div>
                            <div style="display:flex;align-items:flex-start;gap:.75rem;">
                                <i class="fas fa-ruler-combined" style="color:var(--accent);margin-top:.15rem;flex-shrink:0;"></i>
                                <div>
                                    <div style="font-size:.75rem;color:var(--text-muted);">Dimensi (P x L x T)</div>
                                    <div style="font-size:.9rem;font-weight:700;color:var(--primary);">7–8 x 2.3 x 2.5 m</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Fuso --}}
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="service-card" style="padding:0;overflow:hidden;">
                    <img src="{{ asset('assets/images/truck/fuso-long-wingbox-1.jpeg') }}"
                         alt="Fuso" style="width:100%;height:245px;object-fit:cover;">
                    <div style="padding:1.4rem;">
                        <h4 style="color:var(--primary);font-size:1.05rem;margin-bottom:1rem;">Fuso (Box, Bak, Wingbox)</h4>
                        <div style="display:flex;flex-direction:column;gap:.6rem;">
                            <div style="display:flex;align-items:flex-start;gap:.75rem;">
                                <i class="fas fa-box" style="color:var(--accent);margin-top:.15rem;flex-shrink:0;"></i>
                                <div>
                                    <div style="font-size:.75rem;color:var(--text-muted);">Volume</div>
                                    <div style="font-size:.9rem;font-weight:700;color:var(--primary);">35 – 40 m³</div>
                                </div>
                            </div>
                            <div style="display:flex;align-items:flex-start;gap:.75rem;">
                                <i class="fas fa-truck" style="color:var(--accent);margin-top:.15rem;flex-shrink:0;"></i>
                                <div>
                                    <div style="font-size:.75rem;color:var(--text-muted);">Muatan</div>
                                    <div style="font-size:.9rem;font-weight:700;color:var(--primary);">15 ton</div>
                                </div>
                            </div>
                            <div style="display:flex;align-items:flex-start;gap:.75rem;">
                                <i class="fas fa-ruler-combined" style="color:var(--accent);margin-top:.15rem;flex-shrink:0;"></i>
                                <div>
                                    <div style="font-size:.75rem;color:var(--text-muted);">Dimensi (P x L x T)</div>
                                    <div style="font-size:.9rem;font-weight:700;color:var(--primary);">7–8 x 2.4–2.5 x 2.4–2.6 m</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Tronton --}}
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <div class="service-card" style="padding:0;overflow:hidden;">
                    <img src="{{ asset('assets/images/truck/tronton-wingbox-3.jpeg') }}"
                         alt="Tronton" style="width:100%;height:245px;object-fit:cover;">
                    <div style="padding:1.4rem;">
                        <h4 style="color:var(--primary);font-size:1.05rem;margin-bottom:1rem;">Tronton (Box, Bak, Wingbox)</h4>
                        <div style="display:flex;flex-direction:column;gap:.6rem;">
                            <div style="display:flex;align-items:flex-start;gap:.75rem;">
                                <i class="fas fa-box" style="color:var(--accent);margin-top:.15rem;flex-shrink:0;"></i>
                                <div>
                                    <div style="font-size:.75rem;color:var(--text-muted);">Volume</div>
                                    <div style="font-size:.9rem;font-weight:700;color:var(--primary);">45 – 50 m³</div>
                                </div>
                            </div>
                            <div style="display:flex;align-items:flex-start;gap:.75rem;">
                                <i class="fas fa-truck" style="color:var(--accent);margin-top:.15rem;flex-shrink:0;"></i>
                                <div>
                                    <div style="font-size:.75rem;color:var(--text-muted);">Muatan</div>
                                    <div style="font-size:.9rem;font-weight:700;color:var(--primary);">18 – 20 ton</div>
                                </div>
                            </div>
                            <div style="display:flex;align-items:flex-start;gap:.75rem;">
                                <i class="fas fa-ruler-combined" style="color:var(--accent);margin-top:.15rem;flex-shrink:0;"></i>
                                <div>
                                    <div style="font-size:.75rem;color:var(--text-muted);">Dimensi (P x L x T)</div>
                                    <div style="font-size:.9rem;font-weight:700;color:var(--primary);">9–9.5 x 2.4–2.5 x 2.5–2.6 m</div>
                                </div>
                            </div>
                        </div>
                    </div>
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
     KLIEN KAMI
============================================================ --}}
<section id="clients" class="section section-light">
    <div class="container">
        <div class="text-center" data-aos="fade-up">
            <h2 class="section-title">Klien Kami</h2>
            <span class="divider-accent"></span>
            <p class="section-subtitle">Dipercaya oleh berbagai perusahaan terkemuka di Indonesia.</p>
        </div>
        <div class="row g-4 align-items-center justify-content-center">
            @php
            $clients = [
                ['logo' => 'assets/images/client/jne-express.png',    'name' => 'JNE Express'],
                ['logo' => 'assets/images/client/jnt-express.jpeg',   'name' => 'J&T Express'],
                ['logo' => 'assets/images/client/jnt-cargo.jpg',      'name' => 'J&T Cargo'],
                ['logo' => 'assets/images/client/spx.png',            'name' => 'Shopee Express'],
                ['logo' => 'assets/images/client/sdn-distribution.png','name' => 'SDN Distribution'],
                ['logo' => 'assets/images/client/gree.png',           'name' => 'Gree'],
            ];
            @endphp
            @foreach($clients as $i => $client)
            <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 80 }}">
                <div style="background:#fff;border-radius:10px;padding:1.8rem 1rem;
                            text-align:center;box-shadow:0 4px 16px rgba(0,0,0,.05);
                            transition:transform .2s,box-shadow .2s;height:100%;
                            display:flex;align-items:center;justify-content:center;"
                     onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 10px 28px rgba(0,0,0,.1)'"
                     onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 16px rgba(0,0,0,.05)'">
                    <img src="{{ asset($client['logo']) }}"
                         alt="{{ $client['name'] }}"
                         style="max-height:55px;max-width:130px;width:100%;object-fit:contain;
                                filter:grayscale(25%);transition:filter .2s;"
                         onmouseover="this.style.filter='grayscale(0%)'"
                         onmouseout="this.style.filter='grayscale(25%)'">
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('web.contact') }}" class="btn-primary-custom">
                <i class="fas fa-handshake me-2"></i>Bergabung Bersama Klien Kami
            </a>
        </div>
    </div>
</section>

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
            <a href="https://wa.me/6281511015666" target="_blank" rel="noopener"
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
