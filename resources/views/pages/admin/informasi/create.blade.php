
{{-- add informasi form modal --}}
<div class="modal modal-lg fade" id="addInformasiModal" tabindex="-1" aria-labelledby="addInformasiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addInformasiModalLabel">Tambah Lowongan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @csrf
            <form action="">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="judul_informasi" class="form-label">Judul*</label>
                        <input name="judul_informasi" type="text" class="form-control" required @required(true) placeholder="cth: Informasi Pendaftaran PT. ABC">
                    </div>

                    <div class="mb-3">
                        <label for="konten" class="form-label">Konten*</label>
                        <div id="konten-input"></div>
                        <textarea name="konten" id="konten-hidden-create" hidden></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="gambar_cover" class="form-label">Gambar Cover*</label>
                        <div class="d-flex flex-column">
                            <input name="gambar_cover" class="form-control" type="file" id="image-upload" @required(true) accept="image/jpeg, image/png">
                            <div class="image-preview_container d-none d-flex pt-2 justify-content-center">
                                <img src="" alt="" id="image-preview" class="image-preview mw-100">
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
{{-- Quill.js  --}}
<script>
    const quill = new Quill('#konten-input', {
        theme: 'snow',
        placeholder: 'Tulis konten lowongan disini...',
    })
    
    $(document).ready(function() {
        quill.on('text-change', function(delta, oldDelta, source) {
            console.log(quill.container.firstChild.innerHTML)
            $('#konten-hidden-create').text(quill.container.firstChild.innerHTML)
        })    
    })
</script>

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