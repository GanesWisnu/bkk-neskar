@extends('pages.admin.master')

@section('style')
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
@endsection

@section('content')

{{-- add lowongan form modal --}}
@include('pages.admin.lowongan.create')

<div class="d-flex flex-column p-4 flex-fill">
    <h3 class='mb-3 text-secondary fw-semibold'>Lowongan</h3>
    <div class="bg-white shadow-sm rounded-2 border flex-fill overflow-auto p-4">
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addLowonganModal">
            <i class="bi bi-plus text-white h5"></i>
            Tambah Data
        </button>
        <a type="button" class="btn btn-success mb-3" href="{{route('api.admin.lowongan.export', ['file'=>'database'])}}">
            <i class="bi bi-table text-white"></i>
            &nbsp;Export Excel
        </a>

        @include('pages.admin.lowongan.show')

    </div>
</div>
@endsection
