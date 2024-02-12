<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/home.css', 'resources/css/navbar.css', 'resources/js/home.js', 'resources/css/button.css', 'resources/css/card-lowongan.css'])
    <title>BKK SMKN 1 Karawang</title>
</head>
<body>
    <x-navbar />
    <section class="cta-page">
        <div class="cta-info">
            <div class="info-meta">
                <h1 class="meta-headline title">Cari Kerja Dengan Mudah</h1>
                <p class="meta-description">Lowongan menarik, penempatan ajaib, pelatihan penuh kreativitas, dan dorongan bagi jiwa wirausaha. Langkah pertama menuju kisah karier yang unik dan sukses! 🚀✨</p>
            </div>
            <x-forms.button variant="primary" size="lg">Lamar Sekarang</x-forms.button>
        </div>
        <div class="illustration">
            <div class="illustration-circle"></div>
            <div class="illustration-background"></div>
            <img class="illustration-person" src="{{ asset('images/person_hero.png') }}" alt="Illustration" class="illustration-image">
        </div>
    </section>

    <section class="perusahaan">
        <div class="perusahaan-headings">
            <h1 class="perusahaan-heading">Perusahaan</h1>
            <p class="perusahaan-description">Kami bermitra dengan perusahaan-perusahaan yang berperan dalam memajukan karier lulusan kami, menciptakan peluang pertumbuhan profesional yang menjanjikan.</p>
        </div>
        <div class="perusahaan-mitra">
            <img src="{{ asset('images/logos/Honda.png') }}" alt="Honda" class="mitra-item">
            <img src="{{ asset('images/logos/Ajinomoto.png') }}" alt="Ajinomoto" class="mitra-item">
            <img src="{{ asset('images/logos/Mitsubishi.png') }}" alt="Mitsubishi" class="mitra-item">
            <img src="{{ asset('images/logos/Suzuki.png') }}" alt="Suzuki" class="mitra-item">
            <img src="{{ asset('images/logos/Hino.png') }}" alt="Hino" class="mitra-item">
            <img src="{{ asset('images/logos/Kalbe_Farma.svg') }}" alt="Kalbe Farma" class="mitra-item">
            <img src="{{ asset('images/logos/Indofood_CBP.svg') }}" alt="Indofood CBP" class="mitra-item">
            <img src="{{ asset('images/logos/Indomaret.png') }}" alt="Indomaret" class="mitra-item">
            <img src="{{ asset('images/logos/JIAEC.png') }}" alt="JIAEC" class="mitra-item">
            <img src="{{ asset('images/logos/Gramedia.png') }}" alt="Gramedia" class="mitra-item">
        </div>
    </section>

    <section class="lowongan">
        <div class="lowongan-headings">
            <h1 class="lowongan-heading">Lowongan Tersedia</h1>
            <p class="lowongan-description">Daftar cepat dengan mendaftar di lowongan ini atau lihat lowongan lainnya di <a class="lowongan-redirect">halaman lowongan</a></p>
        </div>
        <div class="lowongan-list">
            @php
                $lowongan = [
                    [
                        'title' => 'Junior Web Developer',
                        'company' => 'PT. Mitsubishi Motors Krama Yudha Sales Indonesia',
                        'location' => 'Karawang, Jawa Barat',
                        'date' => '2 hari yang lalu',
                        'company_logo' => 'images/logos/Mitsubishi.png',
                        'syarat' => ['Fresh Graduate', 'HTML', 'CSS', 'PHP', 'Kerja di kantor', 'Jurusan Komputer', 'Full-time', 'Bahasa Inggris']
                    ],
                    [
                        'title' => 'Operator Magang',
                        'company' => 'PT. Mitsubishi Motors Krama Yudha Sales Indonesia',
                        'location' => 'Karawang, Jawa Barat',
                        'date' => '2 hari yang lalu',
                        'company_logo' => 'images/logos/Mitsubishi.png',
                        'syarat' => ['Fresh Graduate', 'HTML', 'CSS', 'PHP', 'Kerja di kantor', 'Jurusan Komputer', 'Full-time', 'Bahasa Inggris']
                    ],
                    [
                        'title' => 'Operator Magang',
                        'company' => 'PT. Mitsubishi Motors Krama Yudha Sales Indonesia',
                        'location' => 'Karawang, Jawa Barat',
                        'date' => '2 hari yang lalu',
                        'company_logo' => 'images/logos/Mitsubishi.png',
                        'syarat' => ['Fresh Graduate', 'HTML', 'CSS', 'PHP', 'Kerja di kantor', 'Jurusan Komputer', 'Full-time', 'Bahasa Inggris']
                    ],
                    [
                        'title' => 'Operator Magang',
                        'company' => 'PT. Mitsubishi Motors Krama Yudha Sales Indonesia',
                        'location' => 'Karawang, Jawa Barat',
                        'date' => '2 hari yang lalu',
                        'company_logo' => 'images/logos/Mitsubishi.png',
                        'syarat' => ['Fresh Graduate', 'HTML', 'CSS', 'PHP', 'Kerja di kantor', 'Jurusan Komputer', 'Full-time', 'Bahasa Inggris']
                    ],
                    [
                        'title' => 'Operator Magang',
                        'company' => 'PT. Mitsubishi Motors Krama Yudha Sales Indonesia',
                        'location' => 'Karawang, Jawa Barat',
                        'date' => '2 hari yang lalu',
                        'company_logo' => 'images/logos/Mitsubishi.png',
                        'syarat' => ['Fresh Graduate', 'HTML', 'CSS', 'PHP', 'Kerja di kantor', 'Jurusan Komputer', 'Full-time', 'Bahasa Inggris']
                    ],
                ];
            @endphp
            <x-Card.lowongan :list="$lowongan" />
        </div>
    </section>

    <section class="pengumuman">
        <div class="pengumuman-illustration">
            <img class="illustration-person_pengumuman" src="{{ asset('images/person_lowongan.png') }}" />
            <div class="illustration-background_arch"></div>
        </div>
        <div class="pengumuman-info">
            <h1 class="pengumuman-heading">Pengumuman Lowongan</h1>
            <p class="pengumuman-description" style="margin-bottom: 1.4em">Sudah pernah melamar disini? Lihat info pengumuman dari lowongan yang sudah kamu lamar</p>
            <x-forms.button variant="primary" size="md">Lihat Pengumuman</x-forms.button>
        </div>
    </section>

    <section class="article">
        <div class="article-headings">
            <h1 class="article-heading">Informasi Terkini</h1>
            <p class="article-description">Dapatkan informasi bermanfaat mengenai tips-tips dalam pekerjaan</p>
        </div>
        <div class="article-list">
            <x-Card.article />
        </div>
    </section>
</body>
</html>
