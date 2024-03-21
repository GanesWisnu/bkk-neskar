{{-- Edit lowongan form modal --}}
@include('pages.admin.lowongan.edit')

{{-- Hapus lowongan modal --}}
@include('pages.admin.lowongan.delete')

<table id="lowongan-table" class="table table-striped table-bordered">
    <thead>
        {{-- header --}}
    </thead>
    <tbody>
        {{-- data --}}
    </tbody>
</table>

{{-- Bagian masukin data ke dalam table '#perusahaan-table'. Pakai library DataTables --}}
@push('script')
{{-- Quill.js  --}}
<script>
    const quillEdit = new Quill('#deskripsi-input-edit', {
        theme: 'snow',
        placeholder: 'Tulis deskripsi lowongan disini...'
    })

    $(document).ready(function() {
        quillEdit.on('text-change', function(delta, oldDelta, source) {
            $('#deskripsi-hidden-edit').text(quillEdit.container.firstChild.innerHTML)
        })    
    })
</script>

<script>
    const tableData = {!! json_encode($data) !!};

    function handleEdit(id) {
        const lowongan = tableData.find(lowongan => lowongan.id_lowongan === id)
        console.log({lowongan})
        $('#editLowonganModal').find('input[name="nama_perusahaan"]').val(lowongan.nama_perusahaan)
        lowongan.kriteria.forEach((kriteria) => {
            $('#editLowonganModal').find('select[name="kriteria"]').prop('selected', true).val(kriteria.toString())
        })
        $('#editLowonganModal').find('input[name="posisi"]').val(lowongan.posisi)
        $('#editLowonganModal').find('textarea[name="deskripsi"]').text(lowongan.deskripsi);
        quillEdit.setContents(quillEdit.clipboard.convert({html: lowongan.deskripsi}), 'silent')
        $('#editLowonganModal').find('input[name="informasi_tambahan"]').val(lowongan.batas_waktu)
    }

    function handleDelete(id) {
        $('#deleteLowonganModal').find('input[name="id_lowongan"]').val(id);
        $('#data-reference').text(id);
    }

    $(document).ready( function () {
        $('#lowongan-table').DataTable({
            data: tableData,
            columns: [
                { 
                    title: "No",
                    render: (data, type, row, meta) => meta.row + meta.settings._iDisplayStart + 1  ,
                    width: "5%"
                },
                { title: "ID Lowongan", data: "id_lowongan"},
                { title: "Nama Perusahaan", data: "nama_perusahaan" },
                { title: "Posisi", data: "posisi"},
                { 
                    title: "Deskripsi",
                    render: function (data, type, row) {
                        return '<button class="btn btn-success btn-sm"><i class="bi bi-justify-left text-white"></i>&nbsp;Lihat Deskripsi</button>';
                    } 
                },
                { 
                    title: "Data Pelamar",
                    render: function (data, type, row) {
                        return '<button class="btn btn-dark btn-sm"><i class="bi bi-file-earmark-arrow-down text-white"></i>&nbsp;Download</button>';
                    } 
                },
                { title: 'Jumlah Pelamar', data: 'jumlah_pelamar' },
                {  
                    title: "Action",
                    render: function (data, type, row) {
                        console.log('row',row)
                        return `<button class="btn btn-secondary btn-sm me-2" onclick="handleEdit('${row.id_lowongan}')" data-bs-toggle="modal" data-bs-target="#editLowonganModal"><i class="bi bi-pencil-square text-white"></i>&nbsp;&nbsp;Edit</button><button class="btn btn-danger btn-sm" onclick="handleDelete('${row.id_lowongan}')" data-bs-toggle="modal" data-bs-target="#deleteLowonganModal"><i class="bi bi-trash text-white"></i>&nbsp;&nbsp;Hapus</button>`;
                    }
                }
            ]
        });
    });
</script>
@endpush