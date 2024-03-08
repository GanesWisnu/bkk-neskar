
{{-- add user form modal --}}
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @csrf
            <form action="">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input name="username" type="text" class="form-control" required @required(true) placeholder="username akun" pattern="[a-zA-Z0-9_]+">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" required @required(true) placeholder="password akun">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Konfirmasi password</label>
                        <input name="confirm_password" type="password" class="form-control" required @required(true) placeholder="ketik ulang password akun">
                    </div>
                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input name="nama_lengkap" type="text" class="form-control" placeholder="nama lengkap akun" required @required(true)>
                    </div>
                    <div class="mb-3">
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