@extends('layouts.web')

@section('title', 'Hubungi Kami – PT Arshaka Logistik Indonesia')
@section('meta_description', 'Hubungi PT Arshaka Logistik Indonesia untuk kebutuhan transportasi dan logistik Anda. Berlokasi di Bojong Gede, Bogor. Email: arshakalogistic@gmail.com')

@section('content')

{{-- ===== PAGE HEADER ===== --}}
<section style="background:linear-gradient(135deg,var(--primary) 60%,rgba(192,57,43,.7) 100%);
                padding:90px 0 60px;">
    <div class="container text-center" data-aos="fade-up">
        <h1 style="color:#fff;font-size:clamp(1.8rem,4vw,2.8rem);margin-bottom:.6rem;">Hubungi Kami</h1>
        <p style="color:rgba(255,255,255,.75);font-size:1rem;">
            <a href="{{ route('web.home') }}" style="color:rgba(255,255,255,.6);text-decoration:none;">Beranda</a>
            <span style="color:rgba(255,255,255,.4);margin:0 .5rem;">/</span>
            <span style="color:#fff;">Hubungi Kami</span>
        </p>
    </div>
</section>

{{-- ===== CONTACT SECTION ===== --}}
<section class="section">
    <div class="container">

        {{-- Alert Notification --}}
        @if(Session::has('notification'))
        <div class="row justify-content-center mb-4">
            <div class="col-lg-10">
                <div class="alert alert-{{ Session::get('notification.level') === 'success' ? 'success' : 'danger' }} alert-dismissible fade show" role="alert">
                    <i class="fas fa-{{ Session::get('notification.level') === 'success' ? 'check-circle' : 'exclamation-circle' }} me-2"></i>
                    {{ Session::get('notification.message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        @endif

        <div class="row g-5">
            {{-- Contact Info --}}
            <div class="col-lg-4" data-aos="fade-right">
                <h2 class="section-title">Ayo Berkolaborasi!</h2>
                <span class="divider-accent" style="margin-left:0;"></span>
                <p style="color:var(--text-muted);line-height:1.8;margin-bottom:2rem;">
                    Tim kami siap membantu Anda menemukan solusi logistik terbaik.
                    Jangan ragu untuk menghubungi kami kapan saja.
                </p>

                <div style="display:flex;flex-direction:column;gap:1.3rem;">
                    <div style="display:flex;gap:1rem;align-items:flex-start;">
                        <div style="width:44px;height:44px;background:rgba(192,57,43,.1);border-radius:8px;
                                    display:flex;align-items:center;justify-content:center;
                                    color:var(--accent);font-size:1.1rem;flex-shrink:0;">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <div style="font-weight:600;color:var(--primary);font-size:.9rem;margin-bottom:.2rem;">Alamat</div>
                            <div style="font-size:.88rem;color:var(--text-muted);font-size:.88rem;line-height:1.6;">
                                Gardenia Residence Blok A1 Rawapanjang,<br>
                                Bojong Gede, Kab. Bogor,<br>
                                Jawa Barat 16920
                            </div>
                        </div>
                    </div>

                    <div style="display:flex;gap:1rem;align-items:flex-start;">
                        <div style="width:44px;height:44px;background:rgba(192,57,43,.1);border-radius:8px;
                                    display:flex;align-items:center;justify-content:center;
                                    color:var(--accent);font-size:1.1rem;flex-shrink:0;">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <div style="font-weight:600;color:var(--primary);font-size:.9rem;margin-bottom:.2rem;">Email</div>
                            <a href="mailto:arshakalogistic@gmail.com"
                               style="color:var(--text-muted);font-size:.88rem;text-decoration:none;">
                                arshakalogistic@gmail.com
                            </a>
                        </div>
                    </div>

                    <div style="display:flex;gap:1rem;align-items:flex-start;">
                        <div style="width:44px;height:44px;background:rgba(37,211,102,.15);border-radius:8px;
                                    display:flex;align-items:center;justify-content:center;
                                    color:#25D366;font-size:1.1rem;flex-shrink:0;">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div>
                            <div style="font-weight:600;color:var(--primary);font-size:.9rem;margin-bottom:.2rem;">WhatsApp</div>
                            <a href="https://wa.me/6281511015666" target="_blank" rel="noopener"
                               style="color:var(--text-muted);font-size:.88rem;text-decoration:none;">
                                0815-1101-5666
                            </a>
                        </div>
                    </div>

                    <div style="display:flex;gap:1rem;align-items:flex-start;">
                        <div style="width:44px;height:44px;background:rgba(225,48,108,.12);border-radius:8px;
                                    display:flex;align-items:center;justify-content:center;
                                    color:#E1306C;font-size:1.1rem;flex-shrink:0;">
                            <i class="fab fa-instagram"></i>
                        </div>
                        <div>
                            <div style="font-weight:600;color:var(--primary);font-size:.9rem;margin-bottom:.2rem;">Instagram</div>
                            <a href="https://www.instagram.com/arshakalogistic" target="_blank" rel="noopener"
                               style="color:var(--text-muted);font-size:.88rem;text-decoration:none;">
                                @arshakalogistic
                            </a>
                        </div>
                    </div>
                </div>

                <div style="margin-top:2rem;padding:1.2rem;background:var(--light-bg);border-radius:10px;
                            border-left:3px solid var(--accent);">
                    <div style="font-size:.85rem;font-weight:600;color:var(--primary);margin-bottom:.3rem;">
                        <i class="fas fa-clock me-1"></i>Jam Operasional
                    </div>
                    <div style="font-size:.85rem;color:var(--text-muted);line-height:1.7;">
                        Senin – Jumat: 08.00 – 17.00 WIB<br>
                        Sabtu: 08.00 – 13.00 WIB<br>
                        <em>Untuk kebutuhan darurat, hubungi via WhatsApp</em>
                    </div>
                </div>
            </div>

            {{-- Contact Form --}}
            <div class="col-lg-8" data-aos="fade-left">
                <div style="background:#fff;border-radius:12px;padding:2.5rem;
                            box-shadow:0 4px 24px rgba(0,0,0,.07);border:1px solid var(--border-color);">
                    <h3 style="color:var(--primary);margin-bottom:.3rem;font-size:1.4rem;">Kirim Pesan</h3>
                    <p style="color:var(--text-muted);font-size:.9rem;margin-bottom:1.8rem;">
                        Isi formulir di bawah ini dan tim kami akan segera menghubungi Anda.
                    </p>

                    <form method="POST" action="{{ route('web.contact.store') }}" novalidate>
                        @csrf

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" style="font-size:.88rem;font-weight:600;color:var(--primary);">
                                    Nama Lengkap <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="name"
                                       class="form-control @error('name') is-invalid @enderror"
                                       value="{{ old('name') }}"
                                       placeholder="Masukkan nama lengkap Anda">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" style="font-size:.88rem;font-weight:600;color:var(--primary);">
                                    Email <span class="text-danger">*</span>
                                </label>
                                <input type="email" name="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}"
                                       placeholder="email@perusahaan.com">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" style="font-size:.88rem;font-weight:600;color:var(--primary);">
                                    No. Telepon / WhatsApp
                                </label>
                                <input type="text" name="phone"
                                       class="form-control @error('phone') is-invalid @enderror"
                                       value="{{ old('phone') }}"
                                       placeholder="+62 812-XXXX-XXXX">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" style="font-size:.88rem;font-weight:600;color:var(--primary);">
                                    Subjek <span class="text-danger">*</span>
                                </label>
                                <select name="subject"
                                        class="form-select @error('subject') is-invalid @enderror">
                                    <option value="" disabled {{ old('subject') ? '' : 'selected' }}>Pilih keperluan Anda</option>
                                    <option value="Permintaan Penawaran Truck Engkel"    {{ old('subject') === 'Permintaan Penawaran Truck Engkel'    ? 'selected' : '' }}>Permintaan Penawaran – Truck Engkel</option>
                                    <option value="Permintaan Penawaran Truck Double"    {{ old('subject') === 'Permintaan Penawaran Truck Double'    ? 'selected' : '' }}>Permintaan Penawaran – Truck Double</option>
                                    <option value="Permintaan Penawaran Fuso/Wingbox"    {{ old('subject') === 'Permintaan Penawaran Fuso/Wingbox'    ? 'selected' : '' }}>Permintaan Penawaran – Fuso/Wingbox</option>
                                    <option value="Informasi Layanan"                    {{ old('subject') === 'Informasi Layanan'                    ? 'selected' : '' }}>Informasi Layanan</option>
                                    <option value="Kerja Sama / Kemitraan"               {{ old('subject') === 'Kerja Sama / Kemitraan'               ? 'selected' : '' }}>Kerja Sama / Kemitraan</option>
                                    <option value="Lainnya"                              {{ old('subject') === 'Lainnya'                              ? 'selected' : '' }}>Lainnya</option>
                                </select>
                                @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label" style="font-size:.88rem;font-weight:600;color:var(--primary);">
                                    Pesan <span class="text-danger">*</span>
                                </label>
                                <textarea name="body" rows="5"
                                          class="form-control @error('body') is-invalid @enderror"
                                          placeholder="Ceritakan kebutuhan logistik Anda secara detail...">{{ old('body') }}</textarea>
                                @error('body')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button type="submit"
                                        style="background:var(--accent);color:#fff;border:none;
                                               padding:.75rem 2.2rem;border-radius:4px;font-weight:600;
                                               font-size:.95rem;cursor:pointer;transition:background .2s;"
                                        onmouseover="this.style.background='var(--accent-dark)'"
                                        onmouseout="this.style.background='var(--accent)'">
                                    <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== GOOGLE MAPS ===== --}}
<section class="pb-0">
    <div style="width:100%;height:420px;background:var(--light-bg);">
        {{--
            Ganti src iframe di bawah dengan embed URL Google Maps yang benar
            dari https://maps.google.com/ → Share → Embed a map
        --}}
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.2233488219147!2d106.79580427499043!3d-6.481072193500001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c4d5bfffffff%3A0x1!2sBojong%20Gede%2C%20Bogor%20Regency%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid"
            width="100%" height="420" style="border:0;" allowfullscreen=""
            loading="lazy" referrerpolicy="no-referrer-when-downgrade"
            title="Lokasi PT Arshaka Logistik Indonesia">
        </iframe>
    </div>
</section>

@endsection
