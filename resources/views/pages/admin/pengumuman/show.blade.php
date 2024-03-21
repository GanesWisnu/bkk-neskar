@include('pages.admin.pengumuman.edit')

@include('pages.admin.pengumuman.delete')

<table id="pengumuman-table" class="table table-striped table-bordered">
    <thead>
        {{-- header --}}
    </thead>
    <tbody>
        {{-- data --}}
    </tbody>
</table>

{{-- Bagian masukin data ke dalam table '#pengumuman-table'. Pakai library DataTables --}}
@push('script')

<script>
    const tableData = {!! json_encode($data) !!};

    function handleEdit(id) {
        const pengumuman = tableData.find(pengumuman => pengumuman.id === Number(id));
        $('#editPengumumanModal').find('input[name="id_pengumuman"]').val(pengumuman.id)
        $('#editPengumumanModal').find('input[name="nama_pengumuman"]').val(pengumuman.nama)
    }

    function handleDelete(id, name) {
        $('#deleteKriteriaModal').find('input[name="id_kriteria"]').val(id);
        $('#data-reference').text(name);
    }

    $(document).ready( function () {
        $('#pengumuman-table').DataTable({
            data: tableData,
            columns: [
                { 
                    title: "No",
                    render: (data, type, row, meta) => meta.row + meta.settings._iDisplayStart + 1  ,
                    width: "5%"
                },
                { title: "Nama Pengumuman", data: "nama"},
                { title: "Tanggal Post", data: "tanggal" },
                { 
                    title: "Import Data", 
                    render: function (data, type, row) {
                        return `
                        <div class="btn btn-dark btn-sm position-relative overflow-hidden">
                            <i class="bi bi-upload text-white"></i>
                            &nbsp;Import Data
                            <input class="position-absolute top-0 start-0 opacity-0" type="file" name="" id="">
                        </div>
                        `;
                    }
                },
                { 
                    title: "Export Data", 
                    render: function (data, type, row) {
                        return `
                        <button type="submit" class="btn btn-dark btn-sm position-relative overflow-hidden">
                            <i class="bi bi-download text-white"></i>
                            &nbsp;Export Data
                        </button>
                        `;
                    }
                },
                {  
                    title: "Action",
                    render: function (data, type, row) {
                        return `
                            <button class="btn btn-secondary btn-sm me-2" onclick="handleEdit('${row.id}')" data-bs-toggle="modal" data-bs-target="#editPengumumanModal"><i class="bi bi-pencil-square text-white"></i>&nbsp;&nbsp;Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="handleDelete('${row.id}', '${row.nama}')" data-bs-toggle="modal" data-bs-target="#deletePengumumanModal"><i class="bi bi-trash text-white"></i>&nbsp;&nbsp;Hapus</button>
                        `;
                    }
                }
            ]
        });
    });
</script>
@endpush