<section class="pengumuman-container">
    <h1 class="pengumuman-heading">Data Pengumuman</h1>
    <div class="pengumuman-list">
        @php
            $pengumuman = [
                [
                    'title' => 'Junior Web Developer',
                    'company' => 'PT. Mitsubishi Motors Krama Yudha Sales Indonesia',
                    'date' => '2 hari yang lalu',
                    'company_logo' => 'images/logos/Mitsubishi.png',
                ], 
                [
                    'title' => 'Operator Magang',
                    'company' => 'PT. Mitsubishi Motors Krama Yudha Sales Indonesia',
                    'date' => '2 hari yang lalu',
                    'company_logo' => 'images/logos/Mitsubishi.png',
                ],
            ];
        @endphp
        <x-Card.pengumuman :list="$pengumuman" />
    </div>
</section>