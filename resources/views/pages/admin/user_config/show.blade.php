{{-- Edit user form modal --}}
@include('pages.admin.user_config.edit')

<table id="user-table" class="table table-striped table-bordered">
    <thead>
        {{-- header --}}
    </thead>
    <tbody>
        {{-- data --}}
    </tbody>
</table>

{{-- Bagian masukin data ke dalam table '#user-table'. Pakai library DataTables --}}
@push('script')
    <script>
        const data = {!! json_encode($data) !!}

        function handleEdit(id) {
            const user = data.find(user => user[0] === id)
            $('#editUserModal').find('input[name="username"]').val(user.username)
            $('#editUserModal').find('input[name="nama_lengkap"]').val(user.name)
            $('#editUserModal').find('input[name="level"]').prop('checked', true).val(user.role)
            $('#editUserModal').find('input[name="status"]').prop('checked', true).val(user[5].toLowerCase())
        }

        $(document).ready( function () {
            $('#user-table').DataTable({
                data: data,
                columns: [
                    { 
                        title: "No",
                        render: (data, type, row, meta) => meta.row + meta.settings._iDisplayStart + 1  ,
                        width: "5%"
                    },
                    { title: "Username", data: "username" },
                    { title: "Nama Lengkap", data: "name" },
                    { title: "Level", data: "role" },
                    { title: "Status", data: "status" },
                    { title: "Create Date", data: "created_at" },
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