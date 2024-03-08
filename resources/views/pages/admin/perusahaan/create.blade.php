
{{-- add perusahaan form modal --}}
<div class="modal fade" id="addPerusahaanModal" tabindex="-1" aria-labelledby="addPerusahaanModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Perusahaan</h1>
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
                        <input class="form-control" type="file" id="image-upload" @required(true) accept="image/jpeg, image/png">
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

@push('script')
<script>
    $(document).ready(function() {
        $('#image-upload').change(function() {
            console.log('here')
            const file = this.files[0];
            const filetype = file.type;
            const validImageType = ["image/jpeg", "image/png"];
            
            if($.inArray(fileType, validImageType) === -1) {
                alert('File yang diupload harus berupa gambar (jpeg, png)!');
                $(this).val('');
                return;
            }
    
            const img = new Image();
            img.onload = function() {
                var width = this.width;
                var height = this.height;
                var maxSize = 128;

                if ((width !== height) && (width > maxSize || height > maxSize)) {
                    alert("Image resolution is too large. Maximum resolution allowed is " + maxSize + "x" + maxSize + ".");
                    $(this).val('');
                    return;
                }
            };
            img.src = URL.createObjectURL(file);
        });
    })
</script>
@endpush