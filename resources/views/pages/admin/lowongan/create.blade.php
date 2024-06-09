
{{-- add lowongan form modal --}}
<div class="modal modal-lg fade" id="addLowonganModal" tabindex="-1" aria-labelledby="addLowonganModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Lowongan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.lowongan.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    {{-- <div class="mb-3">
                        <label for="nama_perusahaan" class="form-label">Nama Perusahaan*</label>
                        <input name="nama_perusahaan" type="text" class="form-control" required @required(true) placeholder="cth: PT. Contoh Abadi">
                    </div> --}}
                    <div class="mb-3">
                        <label for="company_id" class="form-label">Perusahaan*</label>
                        <select name="company_id" class="form-select" required @required(true)>
                            {{-- <option></option> --}}
                            @foreach($companies as $company)
                                <option value={{ $company->company_id }}>{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="criterias" class="form-label">Kriteria*</label>
                        <select name="criterias[]" class="form-select" multiple id="kriteria-dropdown" data-placeholder="Pilih kriteria data pendaftaran" @required(true)>
                            <option></option>
                            @foreach($criteria as $key)
                                <option value={{ $key->criteria_id }}>{{ $key->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="posisi" class="form-label">Posisi*</label>
                        <input name="position" type="text" class="form-control" required @required(true) placeholder="cth: Junior Developer">
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Lokasi*</label>
                        <input name="location" type="text" class="form-control" required @required(true) placeholder="cth: Jakarta Barat">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi*</label>
                        <div id="deskripsi-input"></div>
                        <textarea name="description" id="deskripsi-hidden-create" hidden></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="informasi_tambahan" class="form-label">Informasi Tambahan</label>
                        <input name="additional_information" type="text" class="form-control" placeholder="cth: Junior Developer">
                        <span class="form-text">Tercetak pada bukti pendaftaran</span>
                    </div>

                    <div class="mb-3">
                        <label for="batas_daftar" class="form-label">Batas Daftar*</label>
                        <input name="deadline" type="date" class="form-control" required @required(true) placeholder="cth: Junior Developer">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
{{-- Quill.js  --}}
<script>
    const quill = new Quill('#deskripsi-input', {
        theme: 'snow',
        placeholder: 'Tulis deskripsi lowongan disini...',
    })

    $(document).ready(function() {
        quill.on('text-change', function(delta, oldDelta, source) {
            console.log(quill.container.firstChild.innerHTML)
            $('#deskripsi-hidden-create').text(quill.container.firstChild.innerHTML)
        })
    })
</script>

{{-- Select2 --}}
<script>
    $(document).ready(function() {
        $('#kriteria-dropdown').select2({
            theme: 'bootstrap-5',
            width: '100%',
            dropdownAutoWidth: true,
            placeholder: 'Pilih Kriteria',
            allowClear: true,
            dropdownParent: $('#addLowonganModal'),
            closeOnSelect: false,
        })

        $('#kriteria-dropdown').on('select2:select', function (e) {
            console.log(e.params.data)
        })
    });
</script>
@endpush
