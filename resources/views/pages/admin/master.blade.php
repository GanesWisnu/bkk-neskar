<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('style')
    <title>Admin - BKK SMKN 1 Karawang</title>
</head>
<body>
    <main class="d-flex flex-nowrap overflow-hidden">
        @include('layouts.sidebar_admin')
        <div class="d-flex flex-nowrap flex-column flex-fill bg-light">
            <div class="nav d-flex flex-row-reverse align-items-center w-100 px-5 shadow-sm" style="background: var(--white-100); height: 8vh;">
                <div class="dropdown">
                    <button class="btn dropdown-toggle text-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->username }}
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item text-danger" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a></li>
                        <form action="{{ route('admin.logout') }}" id="logout-form" method="POST">
                            @csrf
                        </form>
                      </ul>
                </div>
            </div>
            @yield('content')
        </div>
    </main>
</body>
</html>
@stack('script')
