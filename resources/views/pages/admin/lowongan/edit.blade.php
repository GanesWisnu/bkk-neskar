
{{-- edit lowongan form modal --}}
<div class="modal modal-lg fade" id="editLowonganModal" tabindex="-1" aria-labelledby="editLowonganModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Lowongan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @csrf
            <form action="">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_perusahaan" class="form-label">Nama Perusahaan*</label>
                        <input name="nama_perusahaan" type="text" class="form-control" required @required(true) placeholder="cth: PT. Contoh Abadi">
                    </div>

                    <div class="mb-3">
                        <label for="kriteria" class="form-label">Kriteria*</label>
                        <select name="kriteria" class="form-select" multiple id="kriteria-dropdown-edit" data-placeholder="Pilih kriteria data pendaftaran" @required(true)>
                            <option></option>
                            <option value="1">Reactive</option>
                            <option value="2">Solution</option>
                            <option value="3">Conglomeration</option>
                            <option value="4">Algoritm</option>
                            <option value="5">Holistic</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="posisi" class="form-label">Posisi*</label>
                        <input name="posisi" type="text" class="form-control" required @required(true) placeholder="cth: Junior Developer">
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi*</label>
                        <div id="deskripsi-input-edit"></div>
                        <textarea name="deskripsi" id="deskripsi-hidden-edit" hidden></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="informasi_tambahan" class="form-label">Informasi Tambahan</label>
                        <input name="informasi_tambahan" type="text" class="form-control" placeholder="cth: Junior Developer">
                        <span class="form-text">Tercetak pada bukti pendaftaran</span>
                    </div>

                    <div class="mb-3">
                        <label for="batas_daftar" class="form-label">Batas Daftar*</label>
                        <input name="batas_daftar" type="date" class="form-control" required @required(true) placeholder="cth: Junior Developer">
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