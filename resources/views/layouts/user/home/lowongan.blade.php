<section id="lowongan-section" class="lowongan">
    <div class="lowongan-headings">
        <h1 class="lowongan-heading">Lowongan Tersedia</h1>
        <p class="lowongan-description">Daftar cepat dengan mendaftar di lowongan ini atau lihat lowongan lainnya di <a class="lowongan-redirect">halaman lowongan</a></p>
    </div>
    <div class="lowongan-list">
        @if($job_vacancies->isEmpty())
            <img class="lowongan-img" src="{{ asset('images/outofservice.png') }}" class="lowongan-img">
        @else
            <x-Card.lowongan :list="$job_vacancies" />
        @endif
    </div>
</section>

<style>
    .lowongan-img {
    width: 250px;
    height: auto;
    margin: 0 auto; /* Membuat gambar berada di tengah secara horizontal */
    display: block; /* Menjamin bahwa margin: 0 auto; berfungsi dengan baik */
    }
</style>