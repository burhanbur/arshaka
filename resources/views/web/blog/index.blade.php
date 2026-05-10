@extends('layouts.web')

@section('title', 'Blog – PT Arshaka Logistik Indonesia')
@section('meta_description', 'Baca artikel terbaru seputar industri logistik, tips pengiriman, dan berita bisnis dari PT Arshaka Logistik Indonesia.')

@section('content')

{{-- ===== PAGE HEADER ===== --}}
<section style="background: linear-gradient(rgba(30,12,4,.68), rgba(30,12,4,.68)),
                url('{{ asset('assets/images/truck/hero.jpg') }}') center/cover no-repeat;
                padding:90px 0 60px;">
    <div class="container text-center" data-aos="fade-up">
        <h1 style="color:#fff;font-size:clamp(1.8rem,4vw,2.8rem);margin-bottom:.6rem;">Blog & Artikel</h1>
        <p style="color:rgba(255,255,255,.75);font-size:1rem;">
            <a href="{{ route('web.home') }}" style="color:rgba(255,255,255,.6);text-decoration:none;">Beranda</a>
            <span style="color:rgba(255,255,255,.4);margin:0 .5rem;">/</span>
            <span style="color:#fff;">Blog</span>
        </p>
    </div>
</section>

{{-- ===== BLOG CONTENT ===== --}}
<section class="section">
    <div class="container">
        <div class="row g-5">

            {{-- Posts Grid --}}
            <div class="col-lg-8">

                {{-- Search + Active Filter info --}}
                @if(request('q') || request('kategori'))
                <div class="mb-4" data-aos="fade-up">
                    <p style="color:var(--text-muted);font-size:.9rem;">
                        @if(request('q'))
                            Hasil pencarian untuk: <strong>"{{ request('q') }}"</strong>
                        @endif
                        @if(request('kategori'))
                            Kategori: <strong>{{ $categories->firstWhere('slug', request('kategori'))?->name ?? request('kategori') }}</strong>
                        @endif
                        &nbsp;·&nbsp;
                        <a href="{{ route('web.blog.index') }}" style="color:var(--accent);">Hapus filter</a>
                    </p>
                </div>
                @endif

                @if($posts->count())
                <div class="row g-4">
                    @foreach($posts as $post)
                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 2) * 100 }}">
                        <a href="{{ route('web.blog.show', $post->slug) }}" style="text-decoration:none;display:block;height:100%;">
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

                {{-- Pagination --}}
                <div class="mt-5 d-flex justify-content-center" data-aos="fade-up">
                    {{ $posts->links('pagination::bootstrap-5') }}
                </div>
                @else
                <div style="text-align:center;padding:4rem 0;" data-aos="fade-up">
                    <i class="fas fa-search" style="font-size:2.5rem;color:var(--border-color);margin-bottom:1rem;display:block;"></i>
                    <h4 style="color:var(--primary);margin-bottom:.5rem;">Artikel tidak ditemukan</h4>
                    <p style="color:var(--text-muted);">Coba kata kunci lain atau hapus filter aktif.</p>
                    <a href="{{ route('web.blog.index') }}" class="btn-primary-custom mt-2">Lihat Semua Artikel</a>
                </div>
                @endif
            </div>

            {{-- Sidebar --}}
            <div class="col-lg-4" data-aos="fade-left">

                {{-- Search --}}
                <div style="margin-bottom:2rem;">
                    <h5 style="color:var(--primary);margin-bottom:1rem;font-size:1rem;
                               padding-bottom:.6rem;border-bottom:2px solid var(--accent);">Cari Artikel</h5>
                    <form method="GET" action="{{ route('web.blog.index') }}">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control"
                                   placeholder="Kata kunci..." value="{{ request('q') }}">
                            <button class="btn" type="submit"
                                    style="background:var(--accent);color:#fff;border:none;">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Categories --}}
                <div style="margin-bottom:2rem;">
                    <h5 style="color:var(--primary);margin-bottom:1rem;font-size:1rem;
                               padding-bottom:.6rem;border-bottom:2px solid var(--accent);">Kategori</h5>
                    <ul style="list-style:none;padding:0;margin:0;">
                        <li style="padding:.45rem 0;border-bottom:1px solid var(--border-color);">
                            <a href="{{ route('web.blog.index') }}"
                               style="color:{{ !request('kategori') ? 'var(--accent)' : 'var(--text-muted)' }};
                                      text-decoration:none;font-size:.9rem;display:flex;justify-content:space-between;">
                                <span><i class="fas fa-tag me-2" style="color:var(--accent);font-size:.75rem;"></i>Semua Artikel</span>
                                <span style="background:var(--light-bg);border-radius:10px;padding:.1rem .6rem;font-size:.8rem;">{{ $posts->total() }}</span>
                            </a>
                        </li>
                        @foreach($categories as $cat)
                        @if($cat->published_posts_count > 0)
                        <li style="padding:.45rem 0;border-bottom:1px solid var(--border-color);">
                            <a href="{{ route('web.blog.index', ['kategori' => $cat->slug]) }}"
                               style="color:{{ request('kategori') === $cat->slug ? 'var(--accent)' : 'var(--text-muted)' }};
                                      text-decoration:none;font-size:.9rem;display:flex;justify-content:space-between;">
                                <span><i class="fas fa-tag me-2" style="color:var(--accent);font-size:.75rem;"></i>{{ $cat->name }}</span>
                                <span style="background:var(--light-bg);border-radius:10px;padding:.1rem .6rem;font-size:.8rem;">{{ $cat->published_posts_count }}</span>
                            </a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>

                {{-- CTA Box --}}
                <div style="background:linear-gradient(135deg,var(--primary) 0%,var(--primary-light) 100%);
                            border-radius:12px;padding:1.8rem;text-align:center;">
                    <i class="fas fa-truck" style="font-size:2rem;color:var(--accent);margin-bottom:.8rem;display:block;"></i>
                    <h5 style="color:#fff;margin-bottom:.6rem;">Butuh Solusi Logistik?</h5>
                    <p style="color:rgba(255,255,255,.75);font-size:.85rem;margin-bottom:1.2rem;line-height:1.7;">
                        Tim kami siap membantu kebutuhan pengiriman Anda ke seluruh Indonesia.
                    </p>
                    <a href="{{ route('web.contact') }}"
                       style="background:var(--accent);color:#fff;padding:.6rem 1.4rem;
                              border-radius:4px;font-size:.85rem;font-weight:600;text-decoration:none;
                              display:inline-block;transition:background .2s;"
                       onmouseover="this.style.background='var(--accent-dark)'"
                       onmouseout="this.style.background='var(--accent)'">
                        Hubungi Kami
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
