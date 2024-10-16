
{{-- add kriteria form modal --}}
<div class="modal fade" id="editKriteriaModal" tabindex="-1" aria-labelledby="editKriteriaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editKriteriaModalLabel">Ubah Kriteria</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="edit-form" action="" method="POST">
                @method('patch')
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Kriteria</label>
                        <input name="name" type="text" class="form-control" required @required(true) placeholder="Nama kriteria lowongan">
                    </div>
                    <div class="mb-3">
                        <label for="tipe" class="form-label">Tipe</label>
                        <select name="input_type" class="form-select">
                            <option value="text">Teks</option>
                            <option value="date">Tanggal</option>
                            <option value="number">nilai</option>
                        </select>
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