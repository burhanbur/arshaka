@extends('layouts.web')

@section('title', 'Layanan – PT Arshaka Logistik Indonesia')
@section('meta_description', 'Layanan penyewaan truck engkel, double, fuso/tronton wingbox, tracking real-time dan pengiriman ke seluruh Indonesia dari PT Arshaka Logistik Indonesia.')

@section('content')

{{-- ===== PAGE HEADER ===== --}}
<section style="background: linear-gradient(rgba(30,12,4,.68), rgba(30,12,4,.68)),
                url('{{ asset('assets/images/truck/hero.jpg') }}') center/cover no-repeat;
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

        {{-- Fallback photos per slug if no DB photos exist --}}
        @php
        $fallbackPhotos = [
            'cde-longbox'   => ['assets/images/truck/cde-longbox.jpg'],
            'cdd-longbox'   => ['assets/images/truck/cdd-longbox.jpg'],
            'fuso'     => ['assets/images/truck/fuso-long-wingbox-1.jpeg'],
            'tronton'  => ['assets/images/truck/tronton-wingbox-3.jpeg'],
        ];
        $fleetMeta = [
            'cde-longbox'  => ['badge'=>'Armada Kecil',    'badge_color'=>'var(--accent)',  'specs'=>[
                ['icon'=>'fas fa-box',            'label'=>'Volume',           'value'=>'12 m³'],
                ['icon'=>'fas fa-truck',           'label'=>'Muatan',           'value'=>'2 – 3 ton'],
                ['icon'=>'fas fa-ruler-combined',  'label'=>'Dimensi (P×L×T)', 'value'=>'4.2 × 1.7 × 1.9 m'],
            ]],
            'cdd-longbox'  => ['badge'=>'Armada Menengah', 'badge_color'=>'var(--primary)', 'specs'=>[
                ['icon'=>'fas fa-box',            'label'=>'Volume',           'value'=>'20 – 30 m³'],
                ['icon'=>'fas fa-truck',           'label'=>'Muatan',           'value'=>'2 – 4 ton'],
                ['icon'=>'fas fa-ruler-combined',  'label'=>'Dimensi (P×L×T)', 'value'=>'7–8 × 2.3 × 2.5 m'],
            ]],
            'fuso'    => ['badge'=>'Armada Besar',    'badge_color'=>'var(--accent)',  'specs'=>[
                ['icon'=>'fas fa-box',            'label'=>'Volume',           'value'=>'35 – 40 m³'],
                ['icon'=>'fas fa-truck',           'label'=>'Muatan',           'value'=>'15 ton'],
                ['icon'=>'fas fa-ruler-combined',  'label'=>'Dimensi (P×L×T)', 'value'=>'7–8 × 2.4–2.5 × 2.4–2.6 m'],
            ]],
            'tronton' => ['badge'=>'Armada Terbesar', 'badge_color'=>'var(--accent)',  'specs'=>[
                ['icon'=>'fas fa-box',            'label'=>'Volume',           'value'=>'45 – 50 m³'],
                ['icon'=>'fas fa-truck',           'label'=>'Muatan',           'value'=>'18 – 20 ton'],
                ['icon'=>'fas fa-ruler-combined',  'label'=>'Dimensi (P×L×T)', 'value'=>'9–9.5 × 2.4–2.5 × 2.5–2.6 m'],
            ]],
        ];
        @endphp

        @forelse($fleetCategories as $i => $fleet)
        @php
            $slug    = $fleet->slug;
            $meta    = $fleetMeta[$slug] ?? ['badge'=>'Armada','badge_color'=>'var(--accent)','specs'=>[]];
            $dbPhotos = $fleet->photos->where('is_active', true)->values();
            $hasDB    = $dbPhotos->count() > 0;
            $fallbacks = $fallbackPhotos[$slug] ?? [];
            $carouselId = 'carousel-' . $slug;
            $isEven = $i % 2 === 0;
        @endphp

        <div class="row align-items-center g-5 mb-5" id="{{ $slug }}">
            {{-- Photo carousel column --}}
            <div class="col-lg-6 {{ !$isEven ? 'order-lg-2' : '' }}" data-aos="{{ $isEven ? 'fade-right' : 'fade-left' }}">
                @if($hasDB && $dbPhotos->count() > 1)
                {{-- Bootstrap carousel --}}
                <div id="{{ $carouselId }}" class="carousel slide rounded-3 shadow-sm overflow-hidden"
                     data-bs-ride="carousel" style="max-height:340px;">
                    <div class="carousel-indicators">
                        @foreach($dbPhotos as $pi => $photo)
                        <button type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide-to="{{ $pi }}"
                                {{ $pi === 0 ? 'class=active aria-current=true' : '' }}
                                aria-label="Slide {{ $pi + 1 }}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner" style="max-height:340px;">
                        @foreach($dbPhotos as $pi => $photo)
                        <div class="carousel-item {{ $pi === 0 ? 'active' : '' }}">
                            <img src="{{ asset(Storage::url($photo->image_path)) }}"
                                 alt="{{ $photo->caption ?: $fleet->name }}"
                                 style="width:100%;height:340px;object-fit:cover;">
                            @if($photo->caption)
                            <div class="carousel-caption d-none d-md-block"
                                 style="background:rgba(30,12,4,.55);border-radius:6px;padding:.3rem .8rem;bottom:10px;">
                                <small>{{ $photo->caption }}</small>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
                @elseif($hasDB)
                {{-- Single DB photo --}}
                <img src="{{ asset(Storage::url($dbPhotos->first()->image_path)) }}"
                     alt="{{ $fleet->name }} Arshaka Logistik"
                     class="img-fluid rounded-3 shadow-sm" style="width:100%;object-fit:cover;max-height:340px;">
                @elseif(count($fallbacks) > 1)
                {{-- Fallback carousel from static files --}}
                <div id="{{ $carouselId }}" class="carousel slide rounded-3 shadow-sm overflow-hidden"
                     data-bs-ride="carousel" style="max-height:340px;">
                    <div class="carousel-indicators">
                        @foreach($fallbacks as $fi => $fb)
                        <button type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide-to="{{ $fi }}"
                                {{ $fi === 0 ? 'class=active aria-current=true' : '' }}></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner" style="max-height:340px;">
                        @foreach($fallbacks as $fi => $fb)
                        <div class="carousel-item {{ $fi === 0 ? 'active' : '' }}">
                            <img src="{{ asset($fb) }}" alt="{{ $fleet->name }}"
                                 style="width:100%;height:340px;object-fit:cover;">
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
                @elseif(count($fallbacks) === 1)
                {{-- Single fallback --}}
                <img src="{{ asset($fallbacks[0]) }}" alt="{{ $fleet->name }} Arshaka Logistik"
                     class="img-fluid rounded-3 shadow-sm" style="width:100%;object-fit:cover;max-height:340px;">
                @else
                {{-- No photo at all: placeholder --}}
                <div class="rounded-3 shadow-sm d-flex align-items-center justify-content-center"
                     style="height:340px;background:linear-gradient(135deg,var(--primary) 0%,var(--primary-light) 100%);">
                    <div class="text-center text-white opacity-75">
                        <i class="fas fa-truck" style="font-size:4rem;display:block;margin-bottom:1rem;"></i>
                        <span style="font-size:.9rem;">Foto segera hadir</span>
                    </div>
                </div>
                @endif
            </div>

            {{-- Description column --}}
            <div class="col-lg-6 {{ !$isEven ? 'order-lg-1' : '' }}" data-aos="{{ $isEven ? 'fade-left' : 'fade-right' }}">
                <span style="background:rgba(196,132,42,.12);color:{{ $meta['badge_color'] }};border-radius:4px;
                             font-size:.78rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;
                             padding:.3rem .8rem;margin-bottom:.8rem;display:inline-block;">{{ $meta['badge'] }}</span>
                <h3 style="color:var(--primary);margin-bottom:.8rem;">{{ $fleet->name }}</h3>
                @if($fleet->description)
                <p style="color:var(--text-muted);line-height:1.85;margin-bottom:1.3rem;">{{ $fleet->description }}</p>
                @endif
                @if(count($meta['specs']))
                <div style="display:flex;flex-direction:column;gap:.6rem;margin-bottom:1.3rem;">
                    @foreach($meta['specs'] as $spec)
                    <div style="display:flex;align-items:flex-start;gap:.75rem;">
                        <i class="{{ $spec['icon'] }}" style="color:var(--accent);margin-top:.2rem;flex-shrink:0;width:16px;text-align:center;"></i>
                        <div>
                            <div style="font-size:.75rem;color:var(--text-muted);">{{ $spec['label'] }}</div>
                            <div style="font-size:.9rem;font-weight:700;color:var(--primary);">{{ $spec['value'] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
                <a href="{{ route('web.contact') }}" class="btn-primary-custom">
                    <i class="fas fa-phone-alt me-2"></i>Minta Penawaran
                </a>
            </div>
        </div>

        @if(!$loop->last)
        <hr style="border-color:var(--border-color);margin:3rem 0;">
        @endif

        @empty
        {{-- Fallback: no categories in DB yet, show static content --}}
        <p class="text-center text-muted">Informasi armada sedang dimuat.</p>
        @endforelse

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
