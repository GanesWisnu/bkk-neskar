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
@endsection

@section('content')

{{-- add lowongan form modal --}}
@include('pages.admin.kriteria.create')

<div class="d-flex flex-column p-4 flex-fill">
    <h3 class='mb-3 text-secondary fw-semibold'>Pelamar</h3>
    <div class="bg-white shadow-sm rounded-2 border flex-fill overflow-auto p-4">
        <button type="button" class="btn btn-success mb-3" onclick="window.location='{{ route('admin.pelamar.export') }}'">
            <i class="bi bi-table text-white"></i>
            &nbsp;Export Excel
        </button>
        @include('pages.admin.pelamar.show')

    </div>
</div>
@endsection

@push('script')
<script>
    var currentFilterCount = 0;
    const criteria = @json($criteria);
    console.log({criteria})

    function getType(count) {
        console.log({count})
        const id = $(`select[name="filter${count}"]`).val();
        console.log({id, type: typeof id})
        const filter = criteria.find(c => c.criteria_id === Number(id));
        if (filter) {
            console.log({filter});
            $(`#filter-input${count}`).find(`input[name="filter_value${count}"]`).attr('type', filter.input_type);
        }
    }

    $(document).ready(function() {
        currentFilterCount++;
        $(`
            <div id="filter-input${currentFilterCount}" class="input-group align-items-start w-25">
                <select name="filter${currentFilterCount}" class="form-select border border-1" aria-label="Default select example" style="max-width: 25%" onchange="getType(${currentFilterCount})">
                    ${criteria.map(c => `<option value="${c.criteria_id}">${c.name}</option>`).join('')}
                </select>
                <input name="filter_value${currentFilterCount}" type="text" class="form-control border border-1" aria-label="Text input with dropdown button">
            </div>
        `).insertBefore('#add-filter');
    });

    $('#add-filter').click(function() {
        currentFilterCount++;
        $(`
            <div id="filter-input${currentFilterCount}" class="input-group align-items-start w-25">
                <select name="filter${currentFilterCount}" class="form-select border border-1" aria-label="Default select example" style="max-width: 25%">
                    ${criteria.map(c => `<option value="${c.criteria_id}" onclick="getType(${c.criteria_id}, ${currentFilterCount})">${c.name}</option>`).join('')}
                </select>
                <input name="filter_value${currentFilterCount}" type="text" class="form-control border border-1" aria-label="Text input with dropdown button">
            </div>
        `).insertBefore(this);
    });
</script>
@endpush
