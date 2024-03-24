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
    const tableData = {!! json_encode($job_vacancies) !!};
    console.log({tableData})

    function handleEdit(id) {
        const lowongan = tableData.find(lowongan => lowongan.id === id)
        console.log({lowongan})
        $('#edit-form').attr('action', `/admin/job_vacancies/${lowongan.id}`)
        $('#editLowonganModal').find('input[name="company_id"]').prop('selected', true).val(lowongan.code)
        // lowongan.criteria.forEach((kriteria) => {
        //     $('#editLowonganModal').find('select[name="criterias[]"]').prop('selected', true).val(kriteria.toString())
        // })
        $('#editLowonganModal').find('input[name="position"]').val(lowongan.position)
        $('#editLowonganModal').find('input[name="location"]').val(lowongan.location)
        $('#editLowonganModal').find('textarea[name="description"]').text(lowongan.description);
        quillEdit.setContents(quillEdit.clipboard.convert({html: lowongan.description}), 'silent')
        $('#editLowonganModal').find('input[name="informasi_tambahan"]').val(lowongan.deadline)
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
                { title: "ID Lowongan", data: "code"},
                { title: "Nama Perusahaan", data: "company.name" },
                { title: "Posisi", data: "position"},
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
                // { title: 'Jumlah Pelamar', data: 'jumlah_pelamar' },
                {
                    title: "Action",
                    render: function (data, type, row) {
                        return `<button class="btn btn-secondary btn-sm me-2" onclick="handleEdit(${row.id})" data-bs-toggle="modal" data-bs-target="#editLowonganModal"><i class="bi bi-pencil-square text-white"></i>&nbsp;&nbsp;Edit</button><button class="btn btn-danger btn-sm" onclick="handleDelete(${row.id})" data-bs-toggle="modal" data-bs-target="#deleteLowonganModal"><i class="bi bi-trash text-white"></i>&nbsp;&nbsp;Hapus</button>`;
                    }
                }
            ]
        });
    });
</script>
@endpush
