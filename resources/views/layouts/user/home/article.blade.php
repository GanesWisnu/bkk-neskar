<section class="article">
    <div class="article-headings">
        <h1 class="article-heading">Informasi Terkini</h1>
        <p class="article-description">Dapatkan informasi bermanfaat mengenai tips-tips dalam pekerjaan</p>
    </div>
    <div class="article-list">
    @if($articles->isEmpty())
        <img class="illustration-error" src="{{ asset('images/outofservice.png') }}">
    @else
        <x-Card.article :list="$articles"/>
    @endif
    </div>
</section>

<style>
    .illustration-error {
    width: 250px; /* Atur lebar tetap */
    height: 250px; /* Atur tinggi tetap */
    margin: 0 auto; /* Membuat gambar berada di tengah secara horizontal */
    display: block; /* Memastikan margin: 0 auto; berfungsi dengan baik */
    object-fit: contain; /* Memastikan gambar sesuai dengan ukuran tanpa distorsi */
    }
</style>