{{-- Edit lowongan form modal --}}
@include('pages.admin.kriteria.edit')

{{-- Hapus lowongan modal --}}
@include('pages.admin.kriteria.delete')

<table id="kriteria-table" class="table table-striped table-bordered">
    <thead>
        {{-- header --}}
    </thead>
    <tbody>
        {{-- data --}}
    </tbody>
</table>

{{-- Bagian masukin data ke dalam table '#perusahaan-table'. Pakai library DataTables --}}
@push('script')

<script>
    const tableData = {!! json_encode($criterias) !!};

    function handleEdit(id) {
        const kriteria = tableData.find(kriteria => kriteria.id === Number(id));
        $('#editKriteriaModal').find('input[name="id_kriteria"]').val(kriteria.id)
        $('#editKriteriaModal').find('input[name="nama_kriteria"]').val(kriteria.nama)
        $('#editKriteriaModal').find('input[name="tipe"]').prop('checked', true).val(kriteria.tipe)
    }

    function handleDelete(id, name) {
        $('#deleteKriteriaModal').find('input[name="id_kriteria"]').val(id);
        $('#data-reference').text(name);
    }

    $(document).ready( function () {
        $('#kriteria-table').DataTable({
            data: tableData,
            columns: [
                {
                    title: "No",
                    render: (data, type, row, meta) => meta.row + meta.settings._iDisplayStart + 1  ,
                    width: "5%"
                },
                { title: "Nama", data: "name"},
                { title: "Tipe", data: "input_type" },
                {
                    title: "Action",
                    render: function (data, type, row) {
                        return `<button class="btn btn-secondary btn-sm me-2" onclick="handleEdit('${row.id}')" data-bs-toggle="modal" data-bs-target="#editKriteriaModal"><i class="bi bi-pencil-square text-white"></i>&nbsp;&nbsp;Edit</button><button class="btn btn-danger btn-sm" onclick="handleDelete('${row.id}', '${row.nama}')" data-bs-toggle="modal" data-bs-target="#deleteKriteriaModal"><i class="bi bi-trash text-white"></i>&nbsp;&nbsp;Hapus</button>`;
                    }
                }
            ]
        });
    });
</script>
@endpush
