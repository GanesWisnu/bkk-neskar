{{-- Edit informasi form modal --}}
@include('pages.admin.informasi.edit')

{{-- Hapus informasi modal --}}
@include('pages.admin.informasi.delete')

{{-- Detail informasi modal --}}
@include('pages.admin.informasi.detail')

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
        const informasi = tableData.find(informasi => informasi.article_id === id);
        $('#edit-form').attr('action', `/api/admin/article/${informasi.article_id}`)
        $('#editInformasiModal').find('input[name="title"]').val(informasi.title)
        $('#editInformasiModal').find('textarea[name="content"]').text(informasi.content)
        quillEdit.setContents(quillEdit.clipboard.convert({html: informasi.content}), 'silent')
        $('#image-preview-edit').attr('src', '{{ URL::asset('/images/upload') }}/' + informasi.image_cover).removeClass('d-none')
    }

    function handleDelete(id, name) {
        $('#delete-form').attr('action', '/api/admin/article/' + id)
        $('#data-reference').text(name);
    }

    function showContent(id) {
        $('#ArticleContentBody').empty();
        const informasi = tableData.find(informasi => informasi.article_id === id);
        $('#ArticleContentBody').append(`
            <img src="{{ URL::asset('/images/upload') }}/${informasi.image_cover}" class="img-fluid" alt="Gambar Cover">
            <h2 class="fs-4">${informasi.title}</h2>
            <p>${informasi.content}</p>
        `);
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
                { title: "Judul", data: "title"},
                { title: "Tanggal Post", data: "created_at" },
                {
                    title: "Isi",
                    render: function (data, type, row) {
                        return `<button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#detailArticleModal" onclick="showContent(${row.article_id})"><i class="bi bi-justify-left text-white"></i>&nbsp;Lihat Konten</button>`;
                    }
                },
                {
                    title: "Action",
                    render: function (data, type, row) {
                        return `<button class="btn btn-secondary btn-sm me-2" onclick="handleEdit(${row.article_id})" data-bs-toggle="modal" data-bs-target="#editInformasiModal"><i class="bi bi-pencil-square text-white"></i>&nbsp;&nbsp;Edit</button><button class="btn btn-danger btn-sm" onclick="handleDelete('${row.article_id}', '${row.title}')" data-bs-toggle="modal" data-bs-target="#deleteInformasiModal"><i class="bi bi-trash text-white"></i>&nbsp;&nbsp;Hapus</button>`;
                    }
                }
            ]
        });
    });
</script>
@endpush
