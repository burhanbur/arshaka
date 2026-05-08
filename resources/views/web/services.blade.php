@extends('layouts.web')

@section('title', 'Layanan – PT Arshaka Logistik Indonesia')
@section('meta_description', 'Layanan penyewaan truck engkel, double, fuso/tronton wingbox, tracking real-time dan pengiriman ke seluruh Indonesia dari PT Arshaka Logistik Indonesia.')

@section('content')

{{-- ===== PAGE HEADER ===== --}}
<section style="background:linear-gradient(135deg,var(--primary) 60%,rgba(192,57,43,.7) 100%);
                padding:90px 0 60px;">
    <div class="container text-center" data-aos="fade-up">
        <h1 style="color:#fff;font-size:clamp(1.8rem,4vw,2.8rem);margin-bottom:.6rem;">Layanan Kami</h1>
        <p style="color:rgba(255,255,255,.75);font-size:1rem;">
            <a href="{{ route('web.home') }}" style="color:rgba(255,255,255,.6);text-decoration:none;">Beranda</a>
            <span style="color:rgba(255,255,255,.4);margin:0 .5rem;">/</span>
            <span style="color:#fff;">Layanan</span>
        </p>
    </div>
</section>

{{-- ===== FLEET TYPES ===== --}}
<section class="section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Jenis Armada Kami</h2>
            <span class="divider-accent"></span>
            <p class="section-subtitle">Pilihan armada lengkap untuk setiap kebutuhan pengiriman Anda, dari kapasitas kecil hingga besar.</p>
        </div>

        {{-- Engkel --}}
        <div class="row align-items-center g-5 mb-5" id="engkel">
            <div class="col-lg-6" data-aos="fade-right">
                <img src="{{ asset('assets/images/truck-engkel.jpg') }}"
                     alt="Truck Engkel Arshaka Logistik"
                     class="img-fluid rounded-3 shadow-sm" style="width:100%;object-fit:cover;max-height:340px;">
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <span style="background:rgba(192,57,43,.1);color:var(--accent);border-radius:4px;
                             font-size:.78rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;
                             padding:.3rem .8rem;margin-bottom:.8rem;display:inline-block;">Armada Kecil</span>
                <h3 style="color:var(--primary);margin-bottom:.8rem;">Truck Engkel</h3>
                <p style="color:var(--text-muted);line-height:1.85;margin-bottom:1.3rem;">
                    Truck engkel adalah pilihan tepat untuk pengiriman dalam kota maupun antar kota dengan
                    kebutuhan muatan menengah. Lincah di berbagai kondisi jalan dan efisien untuk distribusi
                    barang ke berbagai titik.
                </p>
                <div class="row g-2 mb-3">
                    @php
                    $engkelSpecs = [
                        ['label'=>'Kapasitas Muatan',   'val'=>'2 – 4 Ton'],
                        ['label'=>'Dimensi Bak',        'val'=>'± 3.5 x 1.8 m'],
                        ['label'=>'Tahun Armada',       'val'=>'2016 ke atas'],
                        ['label'=>'Area Jangkauan',     'val'=>'Jabodetabek & Jawa'],
                    ];
                    @endphp
                    @foreach($engkelSpecs as $spec)
                    <div class="col-6">
                        <div style="background:var(--light-bg);border-radius:8px;padding:.8rem 1rem;">
                            <div style="font-size:.75rem;color:var(--text-muted);text-transform:uppercase;letter-spacing:.06em;">{{ $spec['label'] }}</div>
                            <div style="font-weight:700;color:var(--primary);font-size:.95rem;margin-top:.2rem;">{{ $spec['val'] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('web.contact') }}" class="btn-primary-custom">
                    <i class="fas fa-phone-alt me-2"></i>Minta Penawaran
                </a>
            </div>
        </div>

        <hr style="border-color:var(--border-color);margin:3rem 0;">

        {{-- Double --}}
        <div class="row align-items-center g-5 mb-5" id="double">
            <div class="col-lg-6 order-lg-2" data-aos="fade-left">
                <img src="{{ asset('assets/images/truck-double.jpg') }}"
                     alt="Truck Double Arshaka Logistik"
                     class="img-fluid rounded-3 shadow-sm" style="width:100%;object-fit:cover;max-height:340px;">
            </div>
            <div class="col-lg-6 order-lg-1" data-aos="fade-right">
                <span style="background:rgba(28,43,74,.08);color:var(--primary);border-radius:4px;
                             font-size:.78rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;
                             padding:.3rem .8rem;margin-bottom:.8rem;display:inline-block;">Armada Menengah</span>
                <h3 style="color:var(--primary);margin-bottom:.8rem;">Truck Double</h3>
                <p style="color:var(--text-muted);line-height:1.85;margin-bottom:1.3rem;">
                    Truck double memberikan kapasitas angkut yang lebih besar, ideal untuk distribusi
                    barang dalam volume menengah ke besar. Tersedia dalam konfigurasi bak terbuka maupun
                    bak tertutup sesuai kebutuhan klien.
                </p>
                <div class="row g-2 mb-3">
                    @php
                    $doubleSpecs = [
                        ['label'=>'Kapasitas Muatan',   'val'=>'6 – 8 Ton'],
                        ['label'=>'Dimensi Bak',        'val'=>'± 5.5 x 2.1 m'],
                        ['label'=>'Tahun Armada',       'val'=>'2016 ke atas'],
                        ['label'=>'Area Jangkauan',     'val'=>'Seluruh Jawa & Bali'],
                    ];
                    @endphp
                    @foreach($doubleSpecs as $spec)
                    <div class="col-6">
                        <div style="background:var(--light-bg);border-radius:8px;padding:.8rem 1rem;">
                            <div style="font-size:.75rem;color:var(--text-muted);text-transform:uppercase;letter-spacing:.06em;">{{ $spec['label'] }}</div>
                            <div style="font-weight:700;color:var(--primary);font-size:.95rem;margin-top:.2rem;">{{ $spec['val'] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('web.contact') }}" class="btn-primary-custom">
                    <i class="fas fa-phone-alt me-2"></i>Minta Penawaran
                </a>
            </div>
        </div>

        <hr style="border-color:var(--border-color);margin:3rem 0;">

        {{-- Fuso / Tronton Wingbox --}}
        <div class="row align-items-center g-5" id="wingbox">
            <div class="col-lg-6" data-aos="fade-right">
                <img src="{{ asset('assets/images/truck-wingbox.jpg') }}"
                     alt="Fuso Tronton Wingbox Arshaka Logistik"
                     class="img-fluid rounded-3 shadow-sm" style="width:100%;object-fit:cover;max-height:340px;">
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <span style="background:rgba(192,57,43,.1);color:var(--accent);border-radius:4px;
                             font-size:.78rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;
                             padding:.3rem .8rem;margin-bottom:.8rem;display:inline-block;">Armada Besar</span>
                <h3 style="color:var(--primary);margin-bottom:.8rem;">Fuso / Tronton Wingbox</h3>
                <p style="color:var(--text-muted);line-height:1.85;margin-bottom:1.3rem;">
                    Armada terbesar kami dengan kapasitas angkut hingga 30 ton. Dilengkapi bak tertutup
                    model wingbox untuk proteksi maksimal dari cuaca dan risiko pencurian selama perjalanan
                    panjang lintas pulau.
                </p>
                <div class="row g-2 mb-3">
                    @php
                    $wingboxSpecs = [
                        ['label'=>'Kapasitas Muatan',   'val'=>'15 – 30 Ton'],
                        ['label'=>'Tipe Bak',           'val'=>'Wingbox (Tertutup)'],
                        ['label'=>'Tahun Armada',       'val'=>'2016 ke atas'],
                        ['label'=>'Area Jangkauan',     'val'=>'Seluruh Indonesia'],
                    ];
                    @endphp
                    @foreach($wingboxSpecs as $spec)
                    <div class="col-6">
                        <div style="background:var(--light-bg);border-radius:8px;padding:.8rem 1rem;">
                            <div style="font-size:.75rem;color:var(--text-muted);text-transform:uppercase;letter-spacing:.06em;">{{ $spec['label'] }}</div>
                            <div style="font-weight:700;color:var(--primary);font-size:.95rem;margin-top:.2rem;">{{ $spec['val'] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('web.contact') }}" class="btn-primary-custom">
                    <i class="fas fa-phone-alt me-2"></i>Minta Penawaran
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ===== ADDED VALUE SERVICES ===== --}}
<section class="section section-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Keunggulan Layanan</h2>
            <span class="divider-accent"></span>
        </div>
        <div class="row g-4">
            @php
            $advantages = [
                ['icon'=>'fas fa-satellite-dish',   'title'=>'GPS Tracking Real-Time',          'desc'=>'Pantau posisi dan status kargo Anda secara langsung 24 jam melalui sistem GPS terintegrasi.'],
                ['icon'=>'fas fa-clock',            'title'=>'On-Time Delivery',                 'desc'=>'Komitmen SLA ketepatan waktu pengiriman untuk mendukung kelancaran rantai pasok bisnis Anda.'],
                ['icon'=>'fas fa-shield-alt',       'title'=>'Keamanan Kargo',                   'desc'=>'Prosedur pengamanan ketat, segel pengaman, dan opsi asuransi kargo untuk perlindungan maksimal.'],
                ['icon'=>'fas fa-headset',          'title'=>'Customer Support 24/7',            'desc'=>'Tim kami siap membantu kapan saja untuk memastikan setiap pengiriman berjalan lancar.'],
                ['icon'=>'fas fa-route',            'title'=>'Jangkauan Seluruh Indonesia',      'desc'=>'Jaringan rute kami mencakup seluruh pulau besar di Indonesia dari Aceh hingga Papua.'],
                ['icon'=>'fas fa-certificate',      'title'=>'Driver Bersertifikasi',            'desc'=>'Seluruh pengemudi memiliki sertifikasi resmi, terlatih keselamatan berkendara, dan berpengalaman.'],
            ];
            @endphp
            @foreach($advantages as $i => $adv)
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 100 }}">
                <div class="feature-item" style="margin-bottom:0;">
                    <div class="fi-icon"><i class="{{ $adv['icon'] }}"></i></div>
                    <div class="fi-text">
                        <h5>{{ $adv['title'] }}</h5>
                        <p>{{ $adv['desc'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== CTA ===== --}}
<section style="background:linear-gradient(135deg,var(--accent) 0%,var(--accent-dark) 100%);padding:65px 0;">
    <div class="container text-center" data-aos="zoom-in">
        <h2 style="color:#fff;margin-bottom:.75rem;">Butuh Armada Sekarang?</h2>
        <p style="color:rgba(255,255,255,.9);max-width:500px;margin:0 auto 2rem;">
            Hubungi tim kami untuk mendapatkan penawaran harga terbaik sesuai kebutuhan pengiriman Anda.
        </p>
        <a href="{{ route('web.contact') }}" class="btn-outline-custom">
            <i class="fas fa-envelope me-2"></i>Kirim Permintaan
        </a>
    </div>
</section>

@endsection
