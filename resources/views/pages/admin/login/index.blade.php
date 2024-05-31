<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/root.css'])
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    {{-- DataTables --}}
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.1/sp-2.3.0/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/v/bs5/dt-2.0.1/sp-2.3.0/datatables.min.js"></script>

    {{-- Quill.js --}}
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.2/dist/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.2/dist/quill.js"></script>
    <style>
    .ql-editor{
        min-height:200px;
    }
    </style>

    {{-- Select2 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <title>Document</title>
    <style>
        .logo-image {
            width: 550px; /* Sesuaikan lebar logo sesuai kebutuhan */
            height: auto; /* Pertahankan aspek rasio logo */
            margin-bottom: 20px; /* Tambahkan jarak antara gambar dan teks "Login" */
        }

        .text-center {
            text-align: center;
        }

        .login-container {
            max-width: 400px; /* Sesuaikan lebar kontainer login */
            margin: 0 auto; /* Pusatkan kontainer login */
            padding: 20px; /* Tambahkan padding di dalam kontainer */
            border: 1px solid #ccc; /* Tambahkan border */
            border-radius: 10px; /* Tambahkan border radius */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Tambahkan shadow */
        }

        .form-group {
            margin-bottom: 15px; /* Tambahkan margin bawah pada setiap grup form */
        }

        .btn-primary {
            width: 100%; /* Buat tombol mengambil lebar penuh */
            padding: 10px; /* Tambahkan padding pada tombol */
        }
    </style>
</head>
<body class="container d-flex justify-content-center align-items-center vw-100 vh-100">
    @if(session()->has('message'))
        <script>
            alert("{{ session('message') }}");
        </script>
    @endif
    <form action="{{ route('login.post') }}" method="POST" class="d-flex flex-column w-50 bg-white shadow-sm h-auto d-block p-5 rounded rounded-md border border gap-3">
        @csrf
        <h1 class="text-center">Admin</h1>
        <div class="logo-container text-center">
            <img src="{{ asset('images/logo-bkk.png') }}" alt="Logo" class="logo-image">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <input type="submit" class="btn btn-primary  mt-4" value="Login" />
    </form>
</body>
</html>
