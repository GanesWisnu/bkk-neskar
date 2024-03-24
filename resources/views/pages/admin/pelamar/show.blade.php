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
    const tableData = {!! json_encode($applicants) !!};
    let selectedData = [];
    let selectedDataId;

    function filterColumn(key) {
        // Replace underscore with space and capitalize each word
        const title = key.replace(/_/g, ' ').replace(/\b\w/g, l => l.toUpperCase());
        return title;
    }

    function filterRow(key){
        if (key === 'created_at' || key === 'updated_at'){
            return new Intl.DateTimeFormat('id-ID').format(new Date(selectedData[key]));
        } else if (key === 'data'){
            let newElement = []
            Object.keys(selectedData[key]).map((x)=>{
                console.log(x);
                newElement.push(
                    `
                    <span style='display:flex''>
                        <p style='width:10rem; font-size:16px'>${x}</p>
                        <p style='font-size:16px'>: ${selectedData[key][x]}</p>
                    </span>
                    `
                )
            })
            return newElement.join('')
        }
        return selectedData[key]
    }

    function showDetails(id) {
        if(selectedDataId === id) return;
        $('#pelamarDetailsBody').empty();
        $('#detailPelamarModalLabel').text(`Detail Pelamar - ${id}`);
        selectedDataId = id;
        selectedData = tableData.find(p => p.id == id);
        console.log(tableData);
        $('#pelamarDetailsBody').append(`
            ${Object.keys(selectedData).map(key => `
                <tr>
                    <td>${filterColumn(key)}</td>
                    <td key-id="${key}">${filterRow(key)}</td>
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
                { title: "Tanggal Registrasi", data: "created_at" },
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
