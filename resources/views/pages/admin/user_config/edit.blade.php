{{-- 
    NOTE: 
    Try to implement from this link: https://stackoverflow.com/questions/10626885/passing-data-to-a-bootstrap-modal 
--}}
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="edit-form" action="" method="POST">
                @method('patch')
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input name="name" type="text" class="form-control" placeholder="nama lengkap akun">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input name="username" type="text" class="form-control" placeholder="username akun" pattern="[a-zA-Z0-9_]+">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Baru</label>
                        <input name="password" type="password" class="form-control" placeholder="password baru">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Konfirmasi Password</label>
                        <input name="confirmpassword" type="password" class="form-control" placeholder="konfirmasi password baru">
                    </div>
                    {{-- <div class="mb-3">
                        <label for="level" class="form-label">Level</label>
                        <select name="level" class="form-select">
                            <option value="administrator">Administrator</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <div class="d-flex">
                            <div class="form-check ps-0">
                                <input class="btn-check" type="radio" name="status" value="active" id="statusActive" checked autocomplete="off"> 
                                <label class="btn btn-outline-success" for="statusActive">Active</label>
                            </div>
                            <div class="form-check">
                                <input class="btn-check" type="radio" name="status" value="inactive" id="statusInactive" autocomplete="off">
                                <label class="btn btn-outline-danger" for="statusInactive">Inactive</label>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>