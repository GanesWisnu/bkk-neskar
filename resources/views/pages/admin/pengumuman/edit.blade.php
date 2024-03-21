
{{-- edit Pengumuman form modal --}}
<div class="modal fade" id="editPengumumanModal" tabindex="-1" aria-labelledby="editPengumumanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editPengumumanModalLabel">Tambah Pengumuman</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @csrf
            <form action="">
                <div class="modal-body">
                    <div class="mb-3 d-none">
                        <input name="id_pengumuman" type="text" disabled class="form-control" required @required(true) placeholder="Id pengumuman lowongan">
                    </div>
                    <div class="mb-3">
                        <label for="nama_pengumuman" class="form-label">Nama Pengumuman</label>
                        <input name="nama_pengumuman" type="text" class="form-control" required @required(true) placeholder="Nama pengumuman">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>