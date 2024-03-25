@extends('pages.user.master')

@include('layouts.user.home.style')

{{-- @php
    var_dump($job_vacancies);
@endphp --}}


@section('content')
@include('layouts.user.home.cta')
    @include('layouts.user.home.perusahaan')
    @include('layouts.user.home.lowongan')
    @include('layouts.user.home.pengumuman')
    @include('layouts.user.home.article')
@endsection