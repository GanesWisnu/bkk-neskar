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
        const tableData = {!! json_encode($user) !!}
        console.log({tableData})

        function handleEdit(id) {
            const user = tableData.find(user => user.id === id)
            console.log({user})
            $('#editUserModal').find('input[name="username"]').val(user.username)
            $('#editUserModal').find('input[name="nama_lengkap"]').val(user.name)
            $('#editUserModal').find('input[name="level"]').prop('checked', true).val(user.role)
            $('#editUserModal').find('input[name="status"]').prop('checked', true).val(user.status.toLowerCase())
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
                    { title: "Level", data: "role" },
                    { title: "Status", data: "status" },
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
                            return `<button class="btn btn-secondary btn-sm me-2" onclick="handleEdit('${row.id}')" data-bs-toggle="modal" data-bs-target="#editUserModal"><i class="bi bi-pencil-square text-white"></i>&nbsp;&nbsp;Edit</button> <button class="btn btn-danger btn-sm" onclick="handleAction('${row.id}')"><i class="bi bi-trash text-white"></i>&nbsp;&nbsp;Edit</button>`;
                        }
                    }
                ]
            });
        } );
    </script>
@endpush