<div class="d-flex flex-column flex-shrink-0 p-4 text-bg-dark overflow-hidden m-0 h-0" style="width: 15vw; min-height: 100vh;">
    <h4 class="heading-4 text-white mb-5">Control Panel</h4>
    <ul class="nav nav-pills flex-column mb-auto gap-3">
        <li class="nav-item mt-2 text-secondary fw-semibold">- Settings</li>
        {{-- <li class="nav-item" aria-current="true">
            <a href="" class="nav-link text-white opacity-75 fw-semibold {{ Route::currentRouteNamed('admin') ? 'active' : ''  }}">
                <i class="bi bi-globe text-white"></i>
                &nbsp;Website Configuration
            </a>
        </li> --}}
        <li class="nav-item">
            <a href="{{ route('admin.user-config') }}" class="nav-link text-white fw-semibold opacity-75 {{ Route::currentRouteNamed('admin.user-config') ? 'active' : ''  }}">
                <span class="btn-text">
                <i class="bi bi-person-circle btn-text"></i>
                &nbsp;User Configuration
                </span>
            </a>
        </li>

        <li class="nav-item mt-2 text-secondary fw-semibold">- Lowongan</li>
        <li class="nav-item">
            <a href="{{ route('admin.perusahaan') }}" class="nav-link text-white fw-semibold opacity-75 {{ Route::currentRouteNamed('admin.perusahaan') ? 'active' : ''  }}">
                <span class="btn-text">
                <i class="bi bi-building btn-text"></i>
                &nbsp;Perusahaan
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.lowongan') }}" class="nav-link text-white fw-semibold opacity-75 {{ Route::currentRouteNamed('admin.lowongan') ? 'active' : ''  }}">
                <span class="btn-text">
                <i class="bi bi-newspaper btn-text"></i>
                &nbsp;Lowongan
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.kriteria') }}" class="nav-link text-white fw-semibold opacity-75 {{ Route::currentRouteNamed('admin.kriteria') ? 'active' : ''  }}">
                <span class="btn-text">
                <i class="bi bi-person btn-text"></i>
                &nbsp;Kriteria Pelamar
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.pelamar') }}" class="nav-link text-white fw-semibold opacity-75 {{ Route::currentRouteNamed('admin.pelamar') ? 'active' : ''  }}">
                <span class="btn-text">
                <i class="bi bi-people btn-text"></i>
                &nbsp;Data Pelamar
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.pengumuman') }}" class="nav-link text-white fw-semibold opacity-75 {{ Route::currentRouteNamed('admin.pengumuman') ? 'active' : ''  }}">
                <span class="btn-text">
                <i class="bi bi-megaphone btn-text"></i>
                &nbsp;Pengumuman
                </span>
            </a>
        </li>

        <li class="nav-item mt-2 text-secondary fw-semibold">- Informasi</li>
        <li class="nav-item">
            <a href="{{ route('admin.article') }}" class="nav-link text-white fw-semibold opacity-75 {{ Route::currentRouteNamed('admin.article') ? 'active' : ''  }}">
                <span class="btn-text">
                <i class="bi bi-newspaper btn-text"></i>
                &nbsp;Informasi
                </span>
            </a>
        </li>
    </ul>
</div>

<style>
    .nav-link {
        text-decoration: none; /* No underline by default */
        transition: background-color 0.3s ease; /* Smooth transition for background color */
    }

    .btn-text {
        color: white; /* Default color */
    }

    .nav-link:hover {
        background-color: rgba(13, 110, 253, 0.5); /* Background color with 50% opacity on hover */
        text-decoration: none; /* No underline on hover */
    }

    .nav-link.active {
        background-color: #0d6efd; /* Solid background color when active */
    }

    .nav-link.active .btn-text {
        color: white; /* Text color when active */
    }

    .nav-link:hover .btn-text {
        color: white; /* Ensure text color remains white on hover */
    }
</style>