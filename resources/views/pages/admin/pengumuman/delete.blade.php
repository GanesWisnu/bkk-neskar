<div class="modal fade" id="deletePengumumanModal" tabindex="-1" aria-labelledby="deletePengumumanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="delete-form" action="" method="POST">
            @method('delete')
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deletePengumumanModalLabel">Hapus Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_pengumuman" id="delete-value">
                    Apakah anda yakin ingin menghapus data ini?<br>
                    data: <div class="d-inline-block fw-semibold" id="data-reference"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </form>
    </div>
</div>
