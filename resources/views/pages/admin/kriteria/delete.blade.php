<div class="modal fade" id="deleteKriteriaModal" tabindex="-1" aria-labelledby="deleteKriteriaModaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteKriteriaModaLabel">Hapus Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_lowongan" id="delete-value">
                Apakah anda yakin ingin menghapus data ini?<br>
                data: <div class="d-inline-block fw-semibold" id="data-reference"></div>
            </div>
            <form id="delete-form" action="" method="POST">
                @method('delete')
                @csrf
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>