<div class="container">
    <div class="detail-lowongan-container">
        <div class="lowongan-info">
            <div class="info-head">
                <div class="info-position-container">
                    <img class="info-company-logo" src="{{ $job_vacancy->company->image ? asset('images/upload/'.$job_vacancy->company->image) : asset('images/thumbnail-placeholder')}}" alt="Company Logo" class="company-logo">
                    <h2 class="info-position-name">{{ $job_vacancy->position ? $job_vacancy->position : '{position}' }}</h2>
                </div>
                <div class="info-list-container">
                    <div class="info-list">
                        <i class="info-icon bi bi-buildings"></i>
                        <p class="info-value">{{ $job_vacancy->company->name ? $job_vacancy->company->name : '{company_name}' }}</p>
                    </div>
                    <div class="info-list">
                        <i class="info-icon bi bi-geo-alt"></i>
                        <p class="info-value">{{ $job_vacancy->location ? $job_vacancy->location : '{location}' }}</p>
                    </div>
                    <div class="info-list">
                        <i class="bi bi-calendar"></i>
                        <p class="info-value">{{ $job_vacancy->deadline ? date('d M Y', strtotime($job_vacancy->deadline)) : '{deadline}' }}</p>
                    </div>
                </div>
            </div>

            <div class="description-container">
                <h3 class="description-title">Deskripsi</h3>
                {!! $job_vacancy->description ? $job_vacancy->description : '{description}' !!}
            </div>
            @if(!is_null($job_vacancy->additional_information) || $job_vacancy->additional_information !== '')
                <div class="additional_info-container">
                    <h3 class="description-title">Informasi Tambahan</h3>
                    <p class="paragraph2">
                        {!! $job_vacancy->additional_information !!}
                    </p>
                </div>
            @endif
        </div>


        <div class="lowongan-form">
            @if(!$job_vacancy->criterias->isEmpty())
            <h3 class="form-title">Form Pendaftaran</h3>
            <form action="{{ route('admin.pelamar.store') }}" method="POST">
                @csrf
                <input type="hidden" name="job_vacancies_id" value="{{ $job_vacancy->id }}">
                @foreach($job_vacancy->criterias as $key => $value)
                    <div class="form-inputs-container">
                        <div class="form-field-container">
                            <label for="name" class="form-label">{{ $value->name }}</label>
                            <input type="{{ $value->input_type }}" name="{{ $value->name }}" id="name" class="form-input" required placeholder="Tulis nama lengkapmu disini">
                        </div>
                    </div>
                @endforeach
                <x-forms.button variant="primary" size="sm" type="submit" style="width: 100%;">Lamar Sekarang</x-forms.button>
            </form>
            @else
            <h3 class="form-title">Pendaftaran Belum Dibuka</h3>
            <p>Tunggu informasi selanjutnya. Jika terdapat kesalahan terhadap informasi ini, hubungi kami.</p>
            @endif
        </div>
    </div>

    <div class="other-lowongan-container">
        <div class="other-lowongan-header">
            <h3 class="other-lowongan-title">Lowongan Lainnya</h3>
            <div class="other-lowongan-list">
                <x-Card.lowongan :list="$other_job_vacancies" />
            </div>
        </div>
    </div>
</div>
