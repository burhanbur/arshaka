@extends('layouts.web')

@section('title', $post->title . ' – PT Arshaka Logistik Indonesia')
@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($post->content), 155))
@section('og_image', $post->thumbnail_url)

@section('content')

{{-- ===== PAGE HEADER ===== --}}
<section style="background:linear-gradient(135deg,var(--primary) 60%,rgba(192,57,43,.7) 100%);
                padding:80px 0 50px;">
    <div class="container" data-aos="fade-up">
        <div style="max-width:700px;">
            @if($post->category)
            <span style="background:var(--accent);color:#fff;border-radius:4px;
                         font-size:.75rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;
                         padding:.28rem .7rem;margin-bottom:.9rem;display:inline-block;">
                {{ $post->category->name }}
            </span>
            @endif
            <h1 style="color:#fff;font-size:clamp(1.5rem,3.5vw,2.4rem);line-height:1.3;margin-bottom:.7rem;">
                {{ $post->title }}
            </h1>
            <p style="color:rgba(255,255,255,.7);font-size:.88rem;">
                <a href="{{ route('web.home') }}" style="color:rgba(255,255,255,.6);text-decoration:none;">Beranda</a>
                <span style="margin:0 .4rem;">·</span>
                <a href="{{ route('web.blog.index') }}" style="color:rgba(255,255,255,.6);text-decoration:none;">Blog</a>
                <span style="margin:0 .4rem;">·</span>
                <span style="color:rgba(255,255,255,.85);">{{ Str::limit($post->title, 50) }}</span>
            </p>
        </div>
    </div>
</section>

{{-- ===== ARTICLE CONTENT ===== --}}
<section class="section">
    <div class="container">
        <div class="row g-5">

            {{-- Article --}}
            <div class="col-lg-8">
                <article data-aos="fade-up">

                    {{-- Meta bar --}}
                    <div style="display:flex;flex-wrap:wrap;align-items:center;gap:1.2rem;
                                margin-bottom:2rem;padding-bottom:1.2rem;
                                border-bottom:1px solid var(--border-color);font-size:.85rem;color:var(--text-muted);">
                        <span><i class="fas fa-calendar-alt me-1"></i>{{ $post->published_at->translatedFormat('d F Y') }}</span>
                        @if($post->category)
                        <span><i class="fas fa-tag me-1"></i>{{ $post->category->name }}</span>
                        @endif
                    </div>

                    {{-- Thumbnail --}}
                    @if($post->thumbnail)
                    <img src="{{ asset('storage/' . $post->thumbnail) }}"
                         alt="{{ $post->title }}"
                         class="img-fluid rounded-3 mb-4"
                         style="width:100%;max-height:420px;object-fit:cover;">
                    @endif

                    {{-- Body --}}
                    <div style="font-size:.97rem;line-height:1.9;color:var(--text-dark);">
                        {!! $post->content !!}
                    </div>

                    {{-- Share --}}
                    <div style="margin-top:2.5rem;padding-top:1.5rem;border-top:1px solid var(--border-color);">
                        <span style="font-size:.88rem;font-weight:600;color:var(--primary);margin-right:.8rem;">Bagikan:</span>
                        <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . url()->current()) }}"
                           target="_blank" rel="noopener"
                           style="display:inline-flex;align-items:center;justify-content:center;
                                  width:34px;height:34px;background:#25D366;color:#fff;
                                  border-radius:50%;margin-right:.4rem;font-size:.9rem;text-decoration:none;">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                           target="_blank" rel="noopener"
                           style="display:inline-flex;align-items:center;justify-content:center;
                                  width:34px;height:34px;background:#1877F2;color:#fff;
                                  border-radius:50%;margin-right:.4rem;font-size:.9rem;text-decoration:none;">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(url()->current()) }}"
                           target="_blank" rel="noopener"
                           style="display:inline-flex;align-items:center;justify-content:center;
                                  width:34px;height:34px;background:#1DA1F2;color:#fff;
                                  border-radius:50%;font-size:.9rem;text-decoration:none;">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>

                    {{-- Back link --}}
                    <div style="margin-top:1.5rem;">
                        <a href="{{ route('web.blog.index') }}"
                           style="color:var(--accent);font-size:.9rem;text-decoration:none;font-weight:500;">
                            <i class="fas fa-arrow-left me-1"></i>Kembali ke Blog
                        </a>
                    </div>
                </article>
            </div>

            {{-- Sidebar --}}
            <div class="col-lg-4" data-aos="fade-left">

                {{-- Related Posts --}}
                @if($relatedPosts->count())
                <div style="margin-bottom:2rem;">
                    <h5 style="color:var(--primary);margin-bottom:1rem;font-size:1rem;
                               padding-bottom:.6rem;border-bottom:2px solid var(--accent);">Artikel Terkait</h5>
                    @foreach($relatedPosts as $related)
                    <a href="{{ route('web.blog.show', $related->slug) }}" style="text-decoration:none;">
                        <div style="display:flex;gap:.9rem;margin-bottom:1.1rem;align-items:flex-start;">
                            <img src="{{ $related->thumbnail_url }}" alt="{{ $related->title }}"
                                 style="width:72px;height:54px;object-fit:cover;border-radius:6px;flex-shrink:0;">
                            <div>
                                <div style="font-size:.85rem;font-weight:600;color:var(--primary);
                                           line-height:1.4;margin-bottom:.3rem;">
                                    {{ Str::limit($related->title, 60) }}
                                </div>
                                <div style="font-size:.78rem;color:var(--text-muted);">
                                    {{ $related->published_at->translatedFormat('d M Y') }}
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                @endif

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
                              display:inline-block;">
                        Hubungi Kami
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    /* Article content typography */
    article h2, article h3, article h4 { color: var(--primary); margin-top: 1.8rem; margin-bottom: .7rem; }
    article p  { margin-bottom: 1.2rem; }
    article ul, article ol { padding-left: 1.5rem; margin-bottom: 1.2rem; }
    article li { margin-bottom: .4rem; }
    article blockquote {
        border-left: 4px solid var(--accent);
        background: var(--light-bg);
        padding: 1rem 1.4rem;
        margin: 1.5rem 0;
        border-radius: 0 8px 8px 0;
        color: var(--text-muted);
        font-style: italic;
    }
    article img { border-radius: 8px; max-width: 100%; height: auto; }
    article a { color: var(--accent); }
</style>
@endpush
