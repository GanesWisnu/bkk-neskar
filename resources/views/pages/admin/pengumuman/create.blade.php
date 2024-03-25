
{{-- add Pengumuman form modal --}}
<div class="modal fade" id="addPengumumanModal" tabindex="-1" aria-labelledby="addPengumumanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addPengumumanModalLabel">Tambah Pengumuman</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @csrf
            <form method="POST" action="{{ route('admin.pengumuman.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Pengumuman</label>
                        <input name="name" type="text" class="form-control" required @required(true) placeholder="Nama pengumuman">
                    </div>
                    <div class="mb-3">
                        <select name="job_vancancies_id" id="job_vacancies_id" class="form-select">
                                <option selected>Pilih Kode Lowongan</option>
                                @foreach ($job_vacancies as $job)
                                    <option value="{{$job->id}}">{{$job->code}}</option>
                                @endforeach
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
