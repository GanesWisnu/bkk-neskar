{{-- Edit perusahaan form modal --}}
@include('pages.admin.perusahaan.edit')

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
        const data = [
            {
                "id": "1",
                "kd_perusahaan": "123",
                "nama_perusahaan": "PT. ABC",
                "alamat": "Jl. ABC No. 123",
                "telepon": "081234567890"
            },]

        function handleEdit(id) {
            // const user = data.find(user => user[0] === id)
            // $('#editUserModal').find('input[name="username"]').val(user.username)
            // $('#editUserModal').find('input[name="nama_lengkap"]').val(user.name)
            // $('#editUserModal').find('input[name="level"]').prop('checked', true).val(user.role)
            // $('#editUserModal').find('input[name="status"]').prop('checked', true).val(user[5].toLowerCase())
        }

        $(document).ready( function () {
            $('#perusahaan-table').DataTable({
                data: data,
                columns: [
                    { 
                        title: "No",
                        render: (data, type, row, meta) => meta.row + meta.settings._iDisplayStart + 1  ,
                        width: "5%"
                    },
                    { title: "KD Perusahaan", data: "kd_perusahaan"},
                    { title: "Nama Perusahaan", data: "nama_perusahaan"},
                    { title: "Alamat", data: "alamat"},
                    { title: "Telepon", data: "telepon"},
                    {  
                        title: "Action",
                        render: function (data, type, row) {
                            return '<button class="btn btn-secondary btn-sm me-2" onclick="handleEdit(' + row[0] + ')" data-bs-toggle="modal" data-bs-target="#editUserModal"><i class="bi bi-pencil-square text-white"></i>&nbsp;&nbsp;Edit</button>' + '<button class="btn btn-danger btn-sm" onclick="handleAction(' + row[0] + ')"><i class="bi bi-trash text-white"></i>&nbsp;&nbsp;Edit</button>';
                        }
                    }
                ]
            });
        } );
    </script>
@endpush