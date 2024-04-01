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
    const tableData = {!! json_encode($acceptances) !!};

    function handleEdit(id) {
        const pengumuman = tableData.find(pengumuman => pengumuman.id === Number(id));
        $('#edit-form').attr('action', "/api/admin/pengumuman/" + pengumuman.id);
        $('#editPengumumanModal').find('input[name="id"]').val(pengumuman.id)
        $('#editPengumumanModal').find('input[name="name"]').val(pengumuman.name)
    }

    function handleDelete(id, name) {
        $('#delete-form').attr('action', '/api/admin/pengumuman/' + id);
        $('#data-reference').text(name);
    }

    function onUpload(e){
        const file = $('#upload')
        var fd = new FormData();
        fd.append('file', file[0].files[0])
        fd.append('_method', 'patch')
        fd.append('name', 'asdasd')
        $.ajax({
            type: "post",
            url: "/api/admin/pengumuman/" + file.attr('data-id'),
            data: fd,
            processData: false,
            contentType: false,
            success: function (response) {
                window.location.reload()
            },
            error: function (response) {

            }
        });
    }

    function handleUpload(row){
        if (row.url != null | row.url != undefined){
            return row.url
        }
        return `
                <div class="btn btn-dark btn-sm position-relative overflow-hidden">
                    <i class="bi bi-upload text-white"></i>
                        &nbsp;Import Data
                    <input class="position-absolute top-0 start-0 opacity-0" type="file" name="file" id="upload" onchange="onUpload()" data-id='${row.id}'>
                </div>
    `;




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
                { title: "Nama Pengumuman", data: "name"},
                { title: "Tanggal Post", data: "created_at" },
                {
                    title: "Import Data",
                    render: function (data, type, row) {
                        return handleUpload(row)
                    }
                },
                {
                    title: "Export Data",
                    render: function (data, type, row) {
                        return `
                        <form action={{route('api.admin.pengumuman.export', ['file'=>'pengumuman'])}}>
                            <input type="hidden" name='id' value="${row.id}" />
                            <button type="submit" class="btn btn-dark btn-sm position-relative overflow-hidden">
                                <i class="bi bi-download text-white"></i>
                                &nbsp;Export Data
                            </button>
                        </form>
                        `;
                    }
                },
                {
                    title: "Action",
                    render: function (data, type, row) {
                        return `
                            <button class="btn btn-secondary btn-sm me-2" onclick="handleEdit('${row.id}')" data-bs-toggle="modal" data-bs-target="#editPengumumanModal"><i class="bi bi-pencil-square text-white"></i>&nbsp;&nbsp;Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="handleDelete('${row.id}', '${row.name}')" data-bs-toggle="modal" data-bs-target="#deletePengumumanModal"><i class="bi bi-trash text-white"></i>&nbsp;&nbsp;Hapus</button>
                        `;
                    }
                }
            ]
        });
    });
</script>
@endpush
