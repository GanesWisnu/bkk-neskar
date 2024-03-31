{{-- Edit user form modal --}}
@include('pages.admin.user_config.edit')

{{-- Delete user form modal --}}
@include('pages.admin.user_config.delete')

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
        const tableData = {!! json_encode($user) !!}

        function handleEdit(id) {
            const user = tableData.find(user => user.id === id)
            console.log({user})
            $('#edit-form').attr('action', "/api/admin/user/"+id)
            $('#editUserModal').find('input[name="username"]').val(user.username)
            $('#editUserModal').find('input[name="name"]').val(user.name)
            // $('#editUserModal').find('input[name="level"]').prop('checked', true).val(user.role)
            // $('#editUserModal').find('input[name="status"]').prop('checked', true).val(user.status.toLowerCase())
        }

        function handleDelete(id, username) {
            $('#delete-form').attr('action', "/api/admin/user/"+id)
            // $('#deleteUserModal').find('input[name="id_user"]').val(id)
            $('#deleteUserModal').find('#data-reference').text(username)
        }

        $(document).ready( function () {
            $('#user-table').DataTable({
                data: tableData,
                columns: [
                    {
                        title: "No",
                        render: (data, type, row, meta) => meta.row + meta.settings._iDisplayStart + 1  ,
                        width: "5%"
                    },
                    { title: "Username", data: "username" },
                    { title: "Nama Lengkap", data: "name" },
                    // { title: "Level", data: "role" },
                    // { title: "Status", data: "status" },
                    {
                        title: "Create Date",
                        render: (data, type, row) => new Date(row.created_at).toLocaleDateString('id', {
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        }),
                    },
                    {
                        title: "Action",
                        render: function (data, type, row) {
                            return `<button class="btn btn-secondary btn-sm me-2" onclick="handleEdit(${row.id})" data-bs-toggle="modal" data-bs-target="#editUserModal"><i class="bi bi-pencil-square text-white"></i>&nbsp;&nbsp;Edit</button> <button class="btn btn-danger btn-sm" onclick="handleDelete('${row.id}', '${row.username}')" data-bs-toggle="modal" data-bs-target="#deleteUserModal"><i class="bi bi-trash text-white"></i>&nbsp;&nbsp;Delete</button>`;
                        }
                    }
                ]
            });
        } );
    </script>
@endpush
