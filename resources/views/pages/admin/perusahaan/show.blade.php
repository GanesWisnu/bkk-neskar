{{-- Edit perusahaan form modal --}}
@include('pages.admin.perusahaan.edit')

{{-- Delete perusahaan form modal --}}
@include('pages.admin.perusahaan.delete')

<table id="perusahaan-table" class="table table-striped table-bordered">
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
        const tableData = {!! json_encode($data) !!}
        function handleEdit(id) {
            const perusahaan = tableData.find(val => val.company_id === id)
            $('#edit-form').attr('action', `/api/admin/perusahaan/${perusahaan.company_id}`)
            $('#editPerusahaanModal').find('input[name="name"]').val(perusahaan.name)
            $('#editPerusahaanModal').find('textarea[name="address"]').text(perusahaan.address)
            $('#editPerusahaanModal').find('input[name="telephone"]').val(perusahaan.telephone)
            // $('#image-preview-edit').attr('src', '{{ asset('images/upload/${perusahaan.image}') }}')
        }

        function handleDelete(id) {
            $('#delete-form').attr('action', `/api/admin/perusahaan/${id}`)
            $('#deletePerusahaanModal').find('input[name="id_perusahaan"]').val(id);
            $('#data-reference').text(id);
        }

        $(document).ready( function () {
            $('#perusahaan-table').DataTable({
                data: tableData,
                columns: [
                    {
                        title: "No",
                        render: (data, type, row, meta) => meta.row + meta.settings._iDisplayStart + 1  ,
                        width: "5%"
                    },
                    { title: "KD Perusahaan", data: "company_id"},
                    { title: "Nama Perusahaan", data: "name"},
                    { title: "Alamat", data: "address"},
                    { title: "Telepon", data: "telephone"},
                    {
                        title: "Action",
                        render: function (data, type, row) {
                            return `<button class="btn btn-secondary btn-sm me-2" onclick="handleEdit(${row.company_id})" data-bs-toggle="modal" data-bs-target="#editPerusahaanModal"><i class="bi bi-pencil-square text-white"></i>&nbsp;&nbsp;Edit</button> <button class="btn btn-danger btn-sm" onclick="handleDelete(${row.company_id})" data-bs-toggle="modal" data-bs-target="#deletePerusahaanModal"><i class="bi bi-trash text-white"></i>&nbsp;&nbsp;Delete</button>`;
                        }
                    }
                ]
            });
        } );
    </script>
@endpush
