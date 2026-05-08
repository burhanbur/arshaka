@extends('layouts.web')

@section('title', 'Tentang Kami – PT Arshaka Logistik Indonesia')
@section('meta_description', 'Kenali lebih jauh profil, visi, misi, dan nilai-nilai PT Arshaka Logistik Indonesia – perusahaan transportasi logistik darat terpercaya berbasis di Bojong Gede, Bogor.')

@section('content')

{{-- ===== PAGE HEADER ===== --}}
<section style="background:linear-gradient(135deg,var(--primary) 60%,rgba(192,57,43,.7) 100%);
                padding:90px 0 60px;">
    <div class="container text-center" data-aos="fade-up">
        <h1 style="color:#fff;font-size:clamp(1.8rem,4vw,2.8rem);margin-bottom:.6rem;">Tentang Kami</h1>
        <p style="color:rgba(255,255,255,.75);font-size:1rem;">
            <a href="{{ route('web.home') }}" style="color:rgba(255,255,255,.6);text-decoration:none;">Beranda</a>
            <span style="color:rgba(255,255,255,.4);margin:0 .5rem;">/</span>
            <span style="color:#fff;">Tentang Kami</span>
        </p>
    </div>
</section>

{{-- ===== COMPANY PROFILE ===== --}}
<section class="section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <img src="{{ asset('assets/images/about-fleet.jpg') }}"
                     alt="Armada PT Arshaka Logistik Indonesia"
                     class="img-fluid rounded-3 shadow-sm"
                     style="width:100%;object-fit:cover;max-height:420px;">
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <h2 class="section-title">Profil Perusahaan</h2>
                <span class="divider-accent" style="margin-left:0;"></span>
                <p style="color:var(--text-muted);line-height:1.85;margin-bottom:1.2rem;">
                    <strong>PT Arshaka Logistik Indonesia</strong> adalah perusahaan yang bergerak di bidang
                    transportasi dan logistik. Kami hadir untuk memenuhi kebutuhan distribusi barang ke
                    seluruh Indonesia, melayani berbagai sektor industri mulai dari manufaktur, retail,
                    hingga paket dengan pengiriman ekspres dan reguler.
                </p>
                <p style="color:var(--text-muted);line-height:1.85;margin-bottom:1.5rem;">
                    Kami berkomitmen untuk memberikan <strong>keamanan, kecepatan, dan ketepatan waktu</strong>
                    pengiriman. Didukung oleh armada yang terawat dengan sistem pelacakan berbasis teknologi
                    serta tim yang profesional dan berpengalaman. Fokus kami adalah menjadi mitra logistik
                    yang strategis, terus bertumbuh dan handal dalam menghadapi tantangan logistik.
                    Berbasis di <em>Gardenia Residence, Bojong Gede, Kab. Bogor</em> — lokasi strategis
                    dengan akses langsung ke Tol Jagorawi.
                </p>
                <div class="row g-3">
                    <div class="col-6">
                        <div style="background:var(--light-bg);border-radius:8px;padding:1rem;text-align:center;">
                            <div style="font-family:'Poppins',sans-serif;font-size:1.8rem;font-weight:800;color:var(--accent);">50+</div>
                            <div style="font-size:.85rem;color:var(--text-muted);margin-top:.2rem;">Unit Armada</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div style="background:var(--light-bg);border-radius:8px;padding:1rem;text-align:center;">
                            <div style="font-family:'Poppins',sans-serif;font-size:1.8rem;font-weight:800;color:var(--accent);">5+</div>
                            <div style="font-size:.85rem;color:var(--text-muted);margin-top:.2rem;">Tahun Pengalaman</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== SUPPORT ARMADA ===== --}}
<section class="section section-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Support Armada</h2>
            <span class="divider-accent"></span>
            <p class="section-subtitle">Armada kami siap mendukung setiap kebutuhan distribusi Anda.</p>
        </div>
        <div class="row g-4 justify-content-center">
            @php
            $armada = [
                ['icon'=>'fas fa-calendar-check', 'title'=>'Armada Tahun 2016 ke Atas',    'desc'=>'Seluruh unit armada kami rata-rata keluaran tahun 2016 ke atas, terjaga kondisinya dengan perawatan rutin berkala.'],
                ['icon'=>'fas fa-map-marker-alt', 'title'=>'Akses Garasi Fleksibel',        'desc'=>'Memiliki akses garasi yang fleksibel, berlokasi dekat dengan gerbang Tol Jagorawi untuk efisiensi waktu keberangkatan.'],
                ['icon'=>'fas fa-user-check',     'title'=>'Driver Berpengalaman',           'desc'=>'Pengemudi berpengalaman dan bersertifikasi, terlatih dalam standar keselamatan dan keprofesionalan berkendara.'],
            ];
            @endphp
            @foreach($armada as $i => $item)
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div style="background:#fff;border-radius:12px;padding:2rem 1.8rem;height:100%;
                            text-align:center;box-shadow:0 4px 20px rgba(0,0,0,.06);
                            border-bottom:3px solid var(--accent);">
                    <div style="width:60px;height:60px;background:rgba(192,57,43,.1);border-radius:50%;
                                display:flex;align-items:center;justify-content:center;
                                color:var(--accent);font-size:1.4rem;margin:0 auto 1.2rem;">
                        <i class="{{ $item['icon'] }}"></i>
                    </div>
                    <h5 style="color:var(--primary);margin-bottom:.7rem;font-size:1rem;">{{ $item['title'] }}</h5>
                    <p style="color:var(--text-muted);font-size:.9rem;line-height:1.75;margin:0;">{{ $item['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== VISION & MISSION ===== --}}
<section id="vision-mission" class="section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Visi &amp; Misi</h2>
            <span class="divider-accent"></span>
        </div>

        <div class="row g-4">
            <div class="col-md-6" data-aos="fade-right">
                <div style="background:#fff;border-radius:12px;padding:2.5rem;height:100%;
                            border-top:4px solid var(--accent);box-shadow:0 4px 20px rgba(0,0,0,.06);">
                    <div style="display:flex;align-items:center;gap:.8rem;margin-bottom:1.2rem;">
                        <div style="width:48px;height:48px;background:rgba(192,57,43,.1);border-radius:10px;
                                    display:flex;align-items:center;justify-content:center;
                                    color:var(--accent);font-size:1.3rem;">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h3 style="color:var(--primary);font-size:1.3rem;margin:0;">Visi</h3>
                    </div>
                    <p style="color:var(--text-muted);line-height:1.85;font-size:.97rem;margin:0;">
                        Menjadi perusahaan penyedia jasa transportasi logistik yang
                        <strong>profesional, terluas, dan terbaik di Indonesia.</strong>
                    </p>
                </div>
            </div>

            <div class="col-md-6" data-aos="fade-left">
                <div style="background:#fff;border-radius:12px;padding:2.5rem;height:100%;
                            border-top:4px solid var(--primary);box-shadow:0 4px 20px rgba(0,0,0,.06);">
                    <div style="display:flex;align-items:center;gap:.8rem;margin-bottom:1.2rem;">
                        <div style="width:48px;height:48px;background:rgba(28,43,74,.1);border-radius:10px;
                                    display:flex;align-items:center;justify-content:center;
                                    color:var(--primary);font-size:1.3rem;">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h3 style="color:var(--primary);font-size:1.3rem;margin:0;">Misi</h3>
                    </div>
                    <ul style="color:var(--text-muted);line-height:2;font-size:.95rem;padding-left:1.2rem;margin:0;">
                        <li>Menyediakan layanan logistik yang cepat, tepat, dan aman dengan kualitas teknologi yang terbaik.</li>
                        <li>Memberikan pelayanan yang berkualitas, prima, fokus pada keselamatan dan ketepatan, berorientasi kepada pelanggan.</li>
                        <li>Menjalin hubungan kerjasama yang baik dengan partner dan vendor, baik dalam jangka pendek maupun jangka panjang.</li>
                        <li>Meningkatkan nilai perusahaan yang dibangun melalui kreativitas, inovasi, dan kompetensi sumber daya manusia.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== CORE VALUES ===== --}}
<section id="core-value" class="section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Nilai-Nilai Kami</h2>
            <span class="divider-accent"></span>
            <p class="section-subtitle">Prinsip yang menjadi fondasi setiap langkah kami dalam melayani klien.</p>
        </div>

        <div class="row g-4 text-center">
            @php
            $values = [
                ['icon'=>'fas fa-handshake',        'title'=>'Kepercayaan',      'desc'=>'Membangun hubungan jangka panjang berbasis kepercayaan dan integritas bersama setiap klien dan mitra.'],
                ['icon'=>'fas fa-tachometer-alt',   'title'=>'Efisiensi',        'desc'=>'Mengoptimalkan setiap proses logistik untuk menghasilkan biaya yang kompetitif dan waktu tempuh minimal.'],
                ['icon'=>'fas fa-shield-alt',       'title'=>'Keamanan',         'desc'=>'Setiap kargo diperlakukan dengan standar keamanan tertinggi, dilindungi prosedur ketat dan asuransi kargo.'],
                ['icon'=>'fas fa-users',            'title'=>'Profesionalisme',  'desc'=>'Tim kami terdiri dari SDM terlatih dan bersertifikasi yang menjunjung tinggi standar layanan profesional.'],
            ];
            @endphp

            @foreach($values as $i => $v)
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div style="padding:2rem 1.5rem;">
                    <div style="width:70px;height:70px;background:rgba(192,57,43,.1);border-radius:50%;
                                display:flex;align-items:center;justify-content:center;
                                color:var(--accent);font-size:1.6rem;margin:0 auto 1.2rem;">
                        <i class="{{ $v['icon'] }}"></i>
                    </div>
                    <h5 style="color:var(--primary);margin-bottom:.6rem;">{{ $v['title'] }}</h5>
                    <p style="color:var(--text-muted);font-size:.9rem;line-height:1.75;">{{ $v['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== LEGAL INFO ===== --}}
<section class="section section-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8" data-aos="fade-up">
                <div style="background:#fff;border-radius:12px;padding:2.5rem;
                            box-shadow:0 4px 20px rgba(0,0,0,.06);text-align:center;">
                    <h3 style="color:var(--primary);margin-bottom:1.5rem;">Informasi &amp; Legalitas Perusahaan</h3>
                    <div class="row g-3 text-start">
                        <div class="col-md-6">
                            <table class="table table-borderless" style="font-size:.91rem;">
                                <tr><td style="color:var(--text-muted);width:150px;white-space:nowrap;">Nama Resmi</td><td><strong>PT Arshaka Logistik Indonesia</strong></td></tr>
                                <tr><td style="color:var(--text-muted);">Bidang Usaha</td><td>Trucking &amp; Logistik</td></tr>
                                <tr><td style="color:var(--text-muted);">Akta Pendirian</td><td>No. 5 Tanggal 18-11-2024</td></tr>
                                <tr><td style="color:var(--text-muted);">Kemenkumham</td><td>AHU-0091825.AH.01.01.<br>TAHUN 2024</td></tr>
                                <tr><td style="color:var(--text-muted);">NIB</td><td>2112240002929</td></tr>
                                <tr><td style="color:var(--text-muted);">NPWP</td><td>22.708.771.5-403.000</td></tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless" style="font-size:.91rem;">
                                <tr><td style="color:var(--text-muted);width:100px;">Alamat</td><td>Gardenia Residence Blok A1 Rawapanjang, Bojong Gede, Kab. Bogor, Jawa Barat 16920</td></tr>
                                <tr><td style="color:var(--text-muted);">Telepon</td><td><a href="tel:081511015666" style="color:var(--accent);">081511015666</a></td></tr>
                                <tr><td style="color:var(--text-muted);">Email</td><td><a href="mailto:arshakalogistic@gmail.com" style="color:var(--accent);">arshakalogistic@gmail.com</a></td></tr>
                                <tr><td style="color:var(--text-muted);">No. Rekening</td><td>BRI a/n Arshaka Logistik Indonesia<br><strong>3253-0100-0020-563</strong></td></tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
