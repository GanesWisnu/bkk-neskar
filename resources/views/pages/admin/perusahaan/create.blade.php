
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
                        <label for="logo" class="form-label">Foto*</label>
                        <div class="d-flex flex-column">
                            <input name="logo" class="form-control" type="file" id="image-upload" @required(true) accept="image/jpeg, image/png">
                            <div class="image-preview_container d-none d-flex pt-2 justify-content-center">
                                <img src="" alt="" id="image-preview" class="image-preview ">
                            </div>
                            <span class="form-text">
                                Ukuran file harus kurang dari 2MB. Format yang diperbolehkan: .jpeg, .png dan berukuran maksimal 128x128 pixel.
                            </span>
                        </div>
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
        $('#image-upload').on('change', function() {
            var file = this.files[0];
            var fileSize = file.size;
            var fileType = file.type;
            var img = new Image();
            var _URL = window.URL || window.webkitURL;

            img.onload = function () {
                if (fileSize > 2 * 1024 * 1024) {
                    alert('Ukuran file harus kurang dari 2MB.');
                    $('#image-upload').val('');
                    $('.image-preview_container').addClass('d-none').attr('src', '');
                    return;
                }
                if (this.width > 128 || this.height > 128) {
                    alert('Ukuran gambar harus maksimal 128x128 pixel.');
                    $('#image-upload').val('');
                    $('.image-preview_container').addClass('d-none').attr('src', '');
                    return;
                }
                
            };

            img.onerror = function () {
                alert('File yang diupload bukan gambar.');
                $('#image-upload').val('');
                return;
            };

            if (file) {
                img.src = _URL.createObjectURL(file);
                $('.image-preview_container').removeClass('d-none');
                $('#image-preview').attr('src', img.src);
            }
        });
    });
</script>
@endpush