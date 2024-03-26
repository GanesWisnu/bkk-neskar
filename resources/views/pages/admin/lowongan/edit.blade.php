
{{-- edit lowongan form modal --}}
<div class="modal modal-lg fade" id="editLowonganModal" tabindex="-1" aria-labelledby="editLowonganModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Lowongan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="edit-form" action="">
                @csrf
                <div class="modal-body">
                    {{-- <div class="mb-3">
                        <label for="nama_perusahaan" class="form-label">Nama Perusahaan*</label>
                        <input name="nama_perusahaan" type="text" class="form-control" required @required(true) placeholder="cth: PT. Contoh Abadi">
                    </div> --}}
                    <div class="mb-3">
                        <label for="company_id" class="form-label">Perusahaan*</label>
                        <select name="company_id" class="form-select" required @required(true)>
                            <option></option>
                            @foreach($companies as $company)
                                <option value={{ $company->id }}>{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="criterias" class="form-label">Kriteria*</label>
                        <select name="criterias[]" class="form-select" multiple id="kriteria-dropdown-edit" data-placeholder="Pilih kriteria data pendaftaran" @required(true)>
                            <option></option>
                            @foreach($criteria as $key)
                                <option value={{ $key->id }}>{{ $key->name }}</option>
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
                        <div id="deskripsi-input-edit"></div>
                        <textarea name="description" id="deskripsi-hidden-edit" hidden></textarea>
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
{{-- Select2 --}}
<script>
    $(document).ready(function() {
        $('#kriteria-dropdown-edit').select2({
            theme: 'bootstrap-5',
            width: '100%',
            dropdownAutoWidth: true,
            placeholder: 'Pilih Kriteria',
            allowClear: true,
            dropdownParent: $('#editLowonganModal'),
            closeOnSelect: false
        })
    });
</script>
@endpush