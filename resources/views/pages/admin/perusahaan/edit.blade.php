<div class="modal fade" id="editPerusahaanModal" tabindex="-1" aria-labelledby="editPerusahaanModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Perusahaan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="edit-form" action="" enctype="multipart/form-data" method="POST">
                @method('patch')
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Perusahaan*</label>
                        <input name="name" type="text" class="form-control" required @required(true) placeholder="cth: PT. Contoh Abadi">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat Perusahaan*</label>
                        <textarea name="address" required @required(true) style="min-height: 100px" class="form-control" placeholder="cth: Jl. Contoh 1"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="telephone" class="form-label">Telepon Perusahaan*</label>
                        <input name="telephone" type="number" class="form-control" required @required(true) placeholder="cth: 08xxx">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Foto</label>
                        <input name="image" class="form-control" type="file" id="image-upload-edit" accept="image/jpeg, image/png">
                        <div class="image-preview_container d-flex pt-2 justify-content-center">
                            <img src="" alt="" id="image-preview-edit" class="image-preview ">
                        </div>
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
        $('#image-upload-edit').on('change', function() {
            var file = this.files[0];
            var fileSize = file.size;
            var fileType = file.type;
            var img = new Image();
            var _URL = window.URL || window.webkitURL;

            img.onload = function () {
                if (fileSize > 2 * 1024 * 1024) {
                    alert('Ukuran file harus kurang dari 2MB.');
                    $('#image-upload-edit').val('');
                    $('.image-preview_container').addClass('d-none').attr('src', '');
                    return;
                }
                if (this.width > 128 || this.height > 128) {
                    alert('Ukuran gambar harus maksimal 128x128 pixel.');
                    $('#image-upload-edit').val('');
                    $('.image-preview_container').addClass('d-none').attr('src', '');
                    return;
                }

            };

            img.onerror = function () {
                alert('File yang diupload bukan gambar.');
                $('#image-upload-edit').val('');
                return;
            };

            if (file) {
                img.src = _URL.createObjectURL(file);
                $('.image-preview_container').removeClass('d-none');
                $('#image-preview-edit').attr('src', img.src);
            }
        });
    });
</script>
@endpush