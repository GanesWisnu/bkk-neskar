
{{-- edit informasi form modal --}}
<div class="modal modal-lg fade" id="editInformasiModal" tabindex="-1" aria-labelledby="editInformasiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editInformasiModalLabel">Ubah Informasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="edit-form" action="" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul*</label>
                        <input name="title" type="text" class="form-control" required @required(true) placeholder="cth: Informasi Pendaftaran PT. ABC">
                    </div>

                    <div class="mb-3">
                        <label for="konten-input-edit" class="form-label">Konten*</label>
                        <div id="konten-input-edit"></div>
                        <textarea name="content" id="konten-hidden-edit" hidden></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image_cover" class="form-label">Gambar Cover*</label>
                        <div class="d-flex flex-column">
                            <input name="image_cover" class="form-control" type="file" id="image-upload" accept="image/jpeg, image/png">
                            <div class="image-preview_container d-flex pt-2 justify-content-center">
                                <img src="" alt="" id="image-preview-edit" class="mw-100 d-none">
                            </div>
                            <span class="form-text">
                                Ukuran file harus kurang dari 2MB. Format yang diperbolehkan: .jpeg, .png.
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

{{-- Image preview --}}
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
               if (this.width < 64 || this.height < 32) {
                   alert('Ukuran gambar harus minimal 64x32 pixel.');
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