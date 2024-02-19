@extends('master')

@include('layouts.home.style')

@section('content')
    @include('layouts.home.cta')
    @include('layouts.home.perusahaan')
    @include('layouts.home.lowongan')
    @include('layouts.home.pengumuman')
    @include('layouts.home.article')
@endsection