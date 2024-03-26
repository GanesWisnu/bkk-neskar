<section class="pengumuman-container">
    <h1 class="pengumuman-heading">Data Pengumuman</h1>
    <div class="pengumuman-list">
    </div>
    
    @if(session()->has('message'))
        <script>
            alert("{{ session('message') }}");
        </script>
    @endif

    <table id="pengumuman-table" class="table table-striped table-bordered table-responsive w-100">
        <thead>
            {{-- header --}}
        </thead>
        <tbody>
            {{-- data --}}
        </tbody>
    </table>
    <script>
        const tableData = {!! json_encode($acceptances) !!};

        function downloadFile(id) {
            window.location = `acceptance/${id}/download`;
        }

        $(document).ready( function () {
            $('#pengumuman-table').DataTable({
                data: tableData,
                columns: [
                    { 
                        title: "No",
                        render: (data, type, row, meta) => meta.row + meta.settings._iDisplayStart + 1  ,
                        width: "5%"
                    },
                    { title: "Nama Pengumuman", data: "name"},
                    { 
                        title: "Tanggal Post", 
                        render: (data, type, row) => new Date(row.created_at).toLocaleDateString('id', {
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        }), 
                    },
                    { 
                        title: "Export Data", 
                        render: function (data, type, row) {
                            return `
                            <button type="submit" class="btn btn-dark btn-sm position-relative overflow-hidden"  onclick="downloadFile(${row.id})">
                                <i class="bi bi-download text-white"></i>
                                &nbsp;Unduh Data
                            </button>
                            `;
                        }
                    }
                ]
            });
        });
    </script>
</section>