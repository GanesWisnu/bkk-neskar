{{-- Edit lowongan form modal --}}
@include('pages.admin.lowongan.edit')

{{-- Hapus lowongan modal --}}
@include('pages.admin.lowongan.delete')

{{-- Deskripsi lowongan --}}
@include('pages.admin.lowongan.detail')



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
    const vacancies_criterias = {!! json_encode($job_vacancies_criterias) !!};

    function handleEdit(id) {
        const lowongan = tableData.find(lowongan => lowongan.id === id)
        const kriteria = vacancies_criterias.filter(kriteria => kriteria.job_vacancies_id === id)
        $('#edit-form').attr('action', `/api/admin/lowongan/${lowongan.id}`)
        $('#editLowonganModal').find('select[name="company_id"]').val(lowongan.company.id.toString())
        const selectedCriteria = kriteria.map(kriteria => kriteria.criteria_id.toString())
        console.log({selectedCriteria})
        $('#kriteria-dropdown-edit').val(selectedCriteria);
        $('#kriteria-dropdown-edit').trigger('change');
        
        $('#editLowonganModal').find('input[name="position"]').val(lowongan.position)
        $('#editLowonganModal').find('input[name="location"]').val(lowongan.location)
        $('#editLowonganModal').find('textarea[name="description"]').text(lowongan.description);
        quillEdit.setContents(quillEdit.clipboard.convert({html: lowongan.description}), 'silent')
        $('#editLowonganModal').find('input[name="additional_information"]').val(lowongan.additional_information)
        $('#editLowonganModal').find('input[name="deadline"]').val(new Date(lowongan.deadline).toISOString().split('T')[0])
    }

    function handleDelete(id, code) {
        $('#delete-form').attr('action', `/api/admin/lowongan/${id}`)
        $('#data-reference').text(code);
    }

    function showDescription(id) {
        const lowongan = tableData.find(lowongan => lowongan.id === id)
        $('#detailLowonganModalLabel').text(`Deskripsi Lowongan - ${lowongan.code}`)
        $('#LowonganDetailsBody').html(lowongan.description)
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
                        return `<button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#detailLowonganModal" onclick="showDescription(${row.id})"><i class="bi bi-justify-left text-white"></i>&nbsp;Lihat Deskripsi</button>`;
                    }
                },
                {
                    title: "Data Pelamar",
                    render: function (data, type, row) {
                        return `
                        <form action={{route('api.admin.lowongan.export', ['file'=>'pengumuman'])}}>
                            <input type="hidden" name='id' value="${row.id}" />
                            <button type="submit" class="btn btn-dark btn-sm position-relative overflow-hidden">
                                <i class="bi bi-download text-white"></i>
                                &nbsp;Export Data
                            </button>
                        </form>
                        `;
                    }
                },
                // { title: 'Jumlah Pelamar', data: 'jumlah_pelamar' },
                {
                    title: "Action",
                    render: function (data, type, row) {
                        return `<button class="btn btn-secondary btn-sm me-2" onclick="handleEdit(${row.id})" data-bs-toggle="modal" data-bs-target="#editLowonganModal"><i class="bi bi-pencil-square text-white"></i>&nbsp;&nbsp;Edit</button><button class="btn btn-danger btn-sm" onclick="handleDelete(${row.id}, '${row.code}')" data-bs-toggle="modal" data-bs-target="#deleteLowonganModal"><i class="bi bi-trash text-white"></i>&nbsp;&nbsp;Hapus</button>`;
                    }
                }
            ]
        });
    });

</script>
@endpush
