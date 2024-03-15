<div class="modal fade" id="editPerusahaanModal" tabindex="-1" aria-labelledby="editPerusahaanModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Perusahaan</h1>
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
                        <label for="alamat" class="form-label">Alamat Perusahaan*</label>
                        <textarea name="alamat" required @required(true) style="min-height: 100px" class="form-control" placeholder="cth: Jl. Contoh 1"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon Perusahaan*</label>
                        <input name="telepon" type="number" class="form-control" required @required(true) placeholder="cth: 08xxx">
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Foto*</label>
                        <input name="logo" class="form-control" type="file" id="image-upload" @required(true) accept="image/jpeg, image/png">
                        <span class="form-text">
                            Ukuran file harus kurang dari 2MB. Format yang diperbolehkan: .jpeg, .png dan berukuran maksimal 128x128 pixel.
                        </span>
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