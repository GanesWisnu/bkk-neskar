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
            const perusahaan = tableData.find(val => val.id === id)
            console.log({perusahaan})
            $('#editPerusahaanModal').find('input[name="nama_perusahaan"]').val(perusahaan.nama_perusahaan)
            $('#editPerusahaanModal').find('textarea[name="alamat"]').text(perusahaan.alamat)
            $('#editPerusahaanModal').find('input[name="telepon"]').val(perusahaan.telepon)
            // Note: 
            // Tanyain Bagus returnnya berupa apa? Kalau berupa base64, bisa langsung di set ke src img
            // $('#editPerusahaanModal').find('input[name="logo"]').val(perusahaan.logo)
        }

        function handleDelete(id) {
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
                    { title: "KD Perusahaan", data: "kd_perusahaan"},
                    { title: "Nama Perusahaan", data: "nama_perusahaan"},
                    { title: "Alamat", data: "alamat"},
                    { title: "Telepon", data: "telepon"},
                    {  
                        title: "Action",
                        render: function (data, type, row) {
                            return `<button class="btn btn-secondary btn-sm me-2" onclick="handleEdit('${row.kd_perusahaan}')" data-bs-toggle="modal" data-bs-target="#editPerusahaanModal"><i class="bi bi-pencil-square text-white"></i>&nbsp;&nbsp;Edit</button> <button class="btn btn-danger btn-sm" onclick="handleDelete('${row.kd_perusahaan}')" data-bs-toggle="modal" data-bs-target="#deletePerusahaanModal"><i class="bi bi-trash text-white"></i>&nbsp;&nbsp;Edit</button>`;
                        }
                    }
                ]
            });
        } );
    </script>
@endpush