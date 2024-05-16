@section('style')
    {{-- @vite(['resources/css/root.css', 'resources/css/pages/detail_lowongan.css', 'resources/css/components/navbar.css', 'resources/css/components/button.css', 'resources/css/components/card-lowongan.css', 'resources/css/components/card-article.css', 'resources/css/layouts/footer.css']) --}}
    <link rel="stylesheet" href="{{ asset('css/root.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/detail_lowongan.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/button.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/card-lowongan.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/card-article.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts/footer.css') }}">
@endsection