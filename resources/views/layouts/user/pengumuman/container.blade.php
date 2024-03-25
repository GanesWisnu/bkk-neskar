<section class="pengumuman-container">
    <h1 class="pengumuman-heading">Data Pengumuman</h1>
    <div class="pengumuman-list">
        {{-- @php
        var_dump($acceptances);
            $pengumuman = [
                [
                    'title' => 'Junior Web Developer',
                    'company' => 'PT. Mitsubishi Motors Krama Yudha Sales Indonesia',
                    'date' => '2 hari yang lalu',
                    'company_logo' => 'images/logos/Mitsubishi.png',
                ], 
                [
                    'title' => 'Operator Magang',
                    'company' => 'PT. Mitsubishi Motors Krama Yudha Sales Indonesia',
                    'date' => '2 hari yang lalu',
                    'company_logo' => 'images/logos/Mitsubishi.png',
                ],
            ];
        @endphp --}}
        {{-- <x-Card.pengumuman :list="$pengumuman" /> --}}
    </div>
    
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
                            <button type="submit" class="btn btn-dark btn-sm position-relative overflow-hidden">
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