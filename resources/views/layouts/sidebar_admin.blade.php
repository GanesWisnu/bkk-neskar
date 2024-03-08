<div class="d-flex flex-column flex-shrink-0 p-4 text-bg-dark overflow-hidden m-0 h-0" style="width: 15vw; min-height: 100vh;">
    <h4 class="heading-4 text-white mb-5">Control Panel</h4>
    <ul class="nav nav-pills flex-column mb-auto gap-3">
        <li class="nav-item mt-2 text-secondary fw-semibold">- Settings</li>
        <li class="nav-item" aria-current="true">
            <a href="" class="nav-link text-white opacity-75 fw-semibold {{ Route::currentRouteNamed('admin') ? 'active' : ''  }}">
                <i class="bi bi-globe text-white"></i>
                &nbsp;Website Configuration
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('user-config') }}" class="nav-link text-white fw-semibold opacity-75 {{ Route::currentRouteNamed('user-config') ? 'active' : ''  }}">
                <i class="bi bi-person-circle text-white"></i>
                &nbsp;User Configuration
            </a>
        </li>
        
        <li class="nav-item mt-2 text-secondary fw-semibold">- Lowongan</li>
        <li class="nav-item">
            <a href="{{ route('perusahaan') }}" class="nav-link text-white fw-semibold opacity-75 {{ Route::currentRouteNamed('perusahaan') ? 'active' : ''  }}">
                <i class="bi bi-building text-white"></i>
                &nbsp;Perusahaan
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link text-white fw-semibold opacity-75">
                <i class="bi bi-newspaper text-white"></i>
                <span class="text-white">&nbsp;Lowongan</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link text-white fw-semibold opacity-75">
                <i class="bi bi-person text-white"></i>
                &nbsp;Kriteria Pelamar
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link text-white fw-semibold opacity-75">
                <i class="bi bi-people text-white"></i>
                &nbsp;Data Pelamar
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link text-white fw-semibold opacity-75">
                <i class="bi bi-megaphone text-white"></i>
                &nbsp;Pengumuman/Sortir Data
            </a>
        </li>

        <li class="nav-item mt-2 text-secondary fw-semibold">- Informasi</li>
        <li class="nav-item">
            <a href="" class="nav-link text-white fw-semibold opacity-75">
                <i class="bi bi-newspaper text-white"></i>
                &nbsp;Informasi
            </a>
        </li>
    </ul>
</div>