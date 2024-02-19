<div class="nav-container">
    <div class="logotype"></div>
    <div class="nav-buttons">
        <a class="button button-ghost" href="{{ route('home') }}" class="nav-button">Beranda</a>
        <a class="button button-ghost" href="{{ route('pengumuman') }}" class="nav-button">Pengumuman</a>
        <a class="button button-ghost" href="{{ route('home') }}" class="nav-button">Alumni</a>
        <x-forms.button variant="primary" size="sm" onclick="window.location='{{ route('lowongan') }}'">Lihat Lowongan</x-forms.button>
    </div>
</div>