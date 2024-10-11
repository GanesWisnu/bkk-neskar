<div class="nav-container">
    <div class="logotype">
        <a href="{{ route('user.home') }}">
            <img src="{{ asset('images/logo-bkk.png') }}" alt="Logo Website" class="logo-image">
        </a>
    </div>
<<<<<<< HEAD
    <div class="nav-toggle" id="nav-toggle">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="nav-buttons" id="nav-buttons">
        <a class="button button-ghost nav-button" href="{{ route('user.home') }}">Beranda</a>
        <a class="button button-ghost nav-button" href="{{ route('user.pengumuman') }}">Pengumuman</a>
=======
    <div class="nav-buttons">
        <a class="button button-ghost" href="{{ route('user.home') }}" class="nav-button">Beranda</a>
        <a class="button button-ghost" href="{{ route('user.pengumuman') }}" class="nav-button">Pengumuman</a>
>>>>>>> origin/main
        <x-forms.button variant="primary" size="sm" onclick="window.location='{{ route('user.lowongan') }}'">Lihat Lowongan</x-forms.button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const navToggle = document.getElementById('nav-toggle');
    const navButtons = document.getElementById('nav-buttons');

    navToggle.addEventListener('click', function() {
        navButtons.classList.toggle('active');
    });
});
</script>
