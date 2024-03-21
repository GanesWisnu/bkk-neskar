{{-- Detail data pelamar modal --}}
@include('pages.admin.pelamar.detail')

<table id="pelamar-table" class="table table-striped table-bordered">
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
    const tableData = {!! json_encode($data) !!};
    let selectedData = [];
    let selectedDataId;

    function filterColumn(key) {
        // Replace underscore with space and capitalize each word
        const title = key.replace(/_/g, ' ').replace(/\b\w/g, l => l.toUpperCase());
        return title;
    }

    function showDetails(id) {
        if(selectedDataId === id) return;
        $('#pelamarDetailsBody').empty();
        $('#detailPelamarModalLabel').text(`Detail Pelamar - ${id}`);
        selectedDataId = id;
        selectedData = tableData.find(p => p.id === id);
        $('#pelamarDetailsBody').append(`
            ${Object.keys(selectedData).map(key => `
                <tr>
                    <td>${filterColumn(key)}</td>
                    <td>${selectedData[key]}</td>
                </tr>
            `).join('')}
        `)
    }

    $(document).ready( function () {
        $('#pelamar-table').DataTable({
            data: tableData,
            columns: [
                { 
                    title: "No",
                    render: (data, type, row, meta) => meta.row + meta.settings._iDisplayStart + 1  ,
                    width: "5%"
                },
                { title: "No Regsitrasi", data: "id"},
                // { title: "Lowongan", data: "lowongan"},
                { title: "Tanggal Registrasi", data: "tanggal_registrasi" },
                { 
                    title: "Detail Pelamar",
                    render: function (data, type, row) {
                        return `
                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#detailPelamarModal" onclick="showDetails('${row.id}')">
                                <i class="bi bi-justify-left text-white"></i>&nbsp;Lihat Detail
                            </button>
                        `;
                    } 
                },
            ]
        });
    });
</script>
@endpush