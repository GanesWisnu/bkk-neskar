<section class="article">
    <div class="article-headings">
        <h1 class="article-heading">Informasi Terkini</h1>
        <p class="article-description">Dapatkan informasi bermanfaat mengenai tips-tips dalam pekerjaan</p>
    </div>
    <div class="article-list">
        @php
            $articleList = [
                [
                    'title' => 'Faktor-Faktor Tidak Dipanggil HRD',
                    'published_date' => '14 December 2024',
                    'short_desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer egestas efficitur mi. Nam elementum, metus quis molestie rhoncus, velit tortor porta diam, sagittis consequat nibh nisi euismod ante. Sed auctor est arcu, eget vehicula magna venenatis',
                    'thumbnail' => ''
                ],
                [
                    'title' => 'Faktor-Faktor Tidak Dipanggil HRD',
                    'published_date' => '14 December 2024',
                    'short_desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer egestas efficitur mi. Nam elementum, metus quis molestie rhoncus, velit tortor porta diam, sagittis consequat nibh nisi euismod ante. Sed auctor est arcu, eget vehicula magna venenatis',
                    'thumbnail' => 'images/article-thumbnail-example.png'
                ],
                [
                    'title' => 'Faktor-Faktor Tidak Dipanggil HRD',
                    'published_date' => '14 December 2024',
                    'short_desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer egestas efficitur mi. Nam elementum, metus quis molestie rhoncus, velit tortor porta diam, sagittis consequat nibh nisi euismod ante. Sed auctor est arcu, eget vehicula magna venenatis',
                    'thumbnail' => 'images/article-thumbnail-example.png'
                ],
                [
                    'title' => 'Faktor-Faktor Tidak Dipanggil HRD',
                    'published_date' => '14 December 2024',
                    'short_desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer egestas efficitur mi. Nam elementum, metus quis molestie rhoncus, velit tortor porta diam, sagittis consequat nibh nisi euismod ante. Sed auctor est arcu, eget vehicula magna venenatis',
                    'thumbnail' => 'images/article-thumbnail-example.png'
                ],
            ]
        @endphp
        <x-Card.article :list="$articleList"/>
    </div>
</section>