@extends('layouts.web')

@section('title', 'Galeri – PT Arshaka Logistik Indonesia')
@section('meta_description', 'Galeri foto kegiatan dan armada PT Arshaka Logistik Indonesia.')

@push('styles')
<style>
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1.25rem;
    }
    .gallery-card {
        position: relative;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(61,31,12,.10);
        cursor: pointer;
        aspect-ratio: 4/3;
        background: var(--light-bg);
        transition: transform .25s, box-shadow .25s;
    }
    .gallery-card:hover { transform: translateY(-4px); box-shadow: 0 8px 24px rgba(61,31,12,.18); }
    .gallery-card img {
        width: 100%; height: 100%;
        object-fit: cover;
        display: block;
        transition: transform .4s;
    }
    .gallery-card:hover img { transform: scale(1.05); }
    .gallery-card-overlay {
        position: absolute; inset: 0;
        background: linear-gradient(to top, rgba(30,12,4,.75) 0%, transparent 55%);
        opacity: 0;
        transition: opacity .3s;
        display: flex; align-items: flex-end; padding: 1rem;
    }
    .gallery-card:hover .gallery-card-overlay { opacity: 1; }
    .gallery-card-title { color: #fff; font-weight: 600; font-size: .95rem; line-height: 1.3; }

    /* Lightbox */
    #galleryLightbox { display:none; position:fixed; inset:0; z-index:9999;
        background: rgba(20,8,2,.92); align-items:center; justify-content:center; }
    #galleryLightbox.open { display:flex; }
    #galleryLightbox img { max-width:90vw; max-height:85vh; object-fit:contain;
        border-radius:8px; box-shadow: 0 4px 32px rgba(0,0,0,.6); }
    .lb-close { position:absolute; top:1.2rem; right:1.5rem; color:#fff; font-size:2rem;
        cursor:pointer; line-height:1; background:none; border:none; }
    .lb-prev, .lb-next { position:absolute; top:50%; transform:translateY(-50%);
        color:#fff; font-size:2.5rem; cursor:pointer; background:rgba(0,0,0,.3);
        border:none; border-radius:50%; width:48px; height:48px; display:flex;
        align-items:center; justify-content:center; transition: background .2s; }
    .lb-prev:hover, .lb-next:hover { background:rgba(196,132,42,.7); }
    .lb-prev { left:1rem; }
    .lb-next { right:1rem; }
    .lb-caption { position:absolute; bottom:1rem; left:50%; transform:translateX(-50%);
        color:rgba(255,255,255,.85); font-size:.9rem; text-align:center;
        background:rgba(0,0,0,.35); padding:.3rem 1rem; border-radius:20px; white-space:nowrap; }
</style>
@endpush

@section('content')

{{-- ===== PAGE HEADER ===== --}}
<section style="background: linear-gradient(rgba(30,12,4,.68), rgba(30,12,4,.68)),
                url('{{ asset('assets/images/truck/hero.jpg') }}') center/cover no-repeat;
                padding:90px 0 60px;">
    <div class="container text-center" data-aos="fade-up">
        <h1 style="color:#fff;font-size:clamp(1.8rem,4vw,2.8rem);margin-bottom:.6rem;">Galeri Kegiatan</h1>
        <p style="color:rgba(255,255,255,.75);font-size:1rem;">
            <a href="{{ route('web.home') }}" style="color:rgba(255,255,255,.6);text-decoration:none;">Beranda</a>
            <span style="color:rgba(255,255,255,.4);margin:0 .5rem;">/</span>
            <span style="color:#fff;">Galeri</span>
        </p>
    </div>
</section>

{{-- ===== GALLERY GRID ===== --}}
<section class="section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Foto Kegiatan Perusahaan</h2>
            <span class="divider-accent"></span>
            <p class="section-subtitle">Dokumentasi kegiatan operasional dan armada PT Arshaka Logistik Indonesia.</p>
        </div>

        @if($galleries->isEmpty())
        <div class="text-center py-5" style="color:var(--text-muted);">
            <i class="fas fa-images" style="font-size:3rem;opacity:.3;display:block;margin-bottom:1rem;"></i>
            Foto galeri belum tersedia.
        </div>
        @else
        <div class="gallery-grid" data-aos="fade-up">
            @foreach($galleries as $i => $item)
            <div class="gallery-card"
                 onclick="openLightbox({{ $i }})"
                 data-index="{{ $i }}">
                <img src="{{ asset(Storage::url($item->image_path)) }}"
                     alt="{{ $item->title }}"
                     loading="lazy">
                <div class="gallery-card-overlay">
                    <span class="gallery-card-title">{{ $item->title }}</span>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

{{-- ===== LIGHTBOX ===== --}}
<div id="galleryLightbox">
    <button class="lb-close" onclick="closeLightbox()">&times;</button>
    <button class="lb-prev" onclick="lbNavigate(-1)">&#8249;</button>
    <img id="lbImg" src="" alt="">
    <button class="lb-next" onclick="lbNavigate(1)">&#8250;</button>
    <span class="lb-caption" id="lbCaption"></span>
</div>

@endsection

@push('scripts')
<script>
    const galleryItems = @json($galleries->map(fn($g) => [
        'src'   => asset(Storage::url($g->image_path)),
        'title' => $g->title,
    ]));

    let currentIndex = 0;

    function openLightbox(index) {
        currentIndex = index;
        updateLightbox();
        document.getElementById('galleryLightbox').classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        document.getElementById('galleryLightbox').classList.remove('open');
        document.body.style.overflow = '';
    }

    function lbNavigate(dir) {
        currentIndex = (currentIndex + dir + galleryItems.length) % galleryItems.length;
        updateLightbox();
    }

    function updateLightbox() {
        const item = galleryItems[currentIndex];
        document.getElementById('lbImg').src = item.src;
        document.getElementById('lbCaption').textContent = item.title;
    }

    document.getElementById('galleryLightbox').addEventListener('click', function(e) {
        if (e.target === this) closeLightbox();
    });

    document.addEventListener('keydown', function(e) {
        const lb = document.getElementById('galleryLightbox');
        if (!lb.classList.contains('open')) return;
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowLeft') lbNavigate(-1);
        if (e.key === 'ArrowRight') lbNavigate(1);
    });
</script>
@endpush
