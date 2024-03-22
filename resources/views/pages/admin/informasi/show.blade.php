{{-- Edit informasi form modal --}}
@include('pages.admin.informasi.edit')

{{-- Hapus informasi modal --}}
@include('pages.admin.informasi.delete')

<table id="informasi-table" class="table table-striped table-bordered">
    <thead>
        {{-- header --}}
    </thead>
    <tbody>
        {{-- data --}}
    </tbody>
</table>

{{-- Bagian masukin data ke dalam table '#perusahaan-table'. Pakai library DataTables --}}
@push('script')
{{-- Quill.js (Edit) --}}
<script>
const quillEdit = new Quill('#konten-input-edit', {
        theme: 'snow',
        placeholder: 'Tulis konten lowongan disini...'
    })

    $(document).ready(function() {
        quillEdit.on('text-change', function(delta, oldDelta, source) {
            $('#konten-hidden-edit').text(quillEdit.container.firstChild.innerHTML)
        })    
    })
</script>

<script>
    const tableData = {!! json_encode($articles) !!};

    function handleEdit(id) {
        const informasi = tableData.find(informasi => informasi.id === id);
        console.log({informasi})
        $('#editInformasiModal').find('input[name="id_informasi"]').val(informasi.id)
        $('#editInformasiModal').find('input[name="judul_informasi"]').val(informasi.judul)
        $('#editInformasiModal').find('input[name="content"]').val(informasi.isi)
        quillEdit.setContents(quillEdit.clipboard.convert({html: informasi.isi}), 'silent')
        $('#image-preview-edit').attr('src', informasi.gambar_cover).removeClass('d-none')
    }

    function handleDelete(id, name) {
        $('#deleteInformasiaModal').find('input[name="id_informasi"]').val(id);
        $('#data-reference').text(name);
    }

    $(document).ready( function () {
        $('#informasi-table').DataTable({
            data: tableData,
            columns: [
                { 
                    title: "No",
                    render: (data, type, row, meta) => meta.row + meta.settings._iDisplayStart + 1  ,
                    width: "5%"
                },
                { title: "Judul", data: "judul"},
                { title: "Tanggal Post", data: "tanggal" },
                {  
                    title: "Action",
                    render: function (data, type, row) {
                        return `<button class="btn btn-secondary btn-sm me-2" onclick="handleEdit('${row.id}')" data-bs-toggle="modal" data-bs-target="#editInformasiModal"><i class="bi bi-pencil-square text-white"></i>&nbsp;&nbsp;Edit</button><button class="btn btn-danger btn-sm" onclick="handleDelete('${row.id}', '${row.judul}')" data-bs-toggle="modal" data-bs-target="#deleteInformasiModal"><i class="bi bi-trash text-white"></i>&nbsp;&nbsp;Hapus</button>`;
                    }
                }
            ]
        });
    });
</script>
@endpush