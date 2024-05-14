<div class="nav-container">
    <div class="logotype">
        <a href="{{ route('user.home') }}">
            <img src="{{ asset('images/logo-bkk.png') }}" alt="Logo Website" class="logo-image">
        </a>
    </div>
    <div class="nav-buttons">
        <a class="button button-ghost" href="{{ route('user.home') }}" class="nav-button">Beranda</a>
        <a class="button button-ghost" href="{{ route('user.pengumuman') }}" class="nav-button">Pengumuman</a>
        <x-forms.button variant="primary" size="sm" onclick="window.location='{{ route('user.lowongan') }}'">Lihat Lowongan</x-forms.button>
    </div>
</div>