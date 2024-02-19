<section class="lowongan-container">
    <h1 class="lowongan-heading">Data Lowongan</h1>
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