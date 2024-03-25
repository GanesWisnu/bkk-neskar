@foreach($list as $value)
    <div class="card-lowongan" {{ $attributes }}>
        <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
        <div class="job-requirements">
            @php
                $dateDiffer = \Carbon\Carbon::parse($value->deadline)->diffInDays(\Carbon\Carbon::now());
            @endphp
            @if( $dateDiffer < 3)
                <span class="deadline-reminder paragraph-2">{{ $dateDiffer.' Hari lagi' }}</span>
            @endif
        </div>
        <h3 class="job-position">{{ $value->position }}</h3>
        <div class="job-location">
            <img src="{{ asset('images/icons/uil_location-point.svg') }}" alt="{{ $value->company->image }}" class="company-logo">
            <p class="location paragraph-2">{{ $value->location }}</p>
        </div>
        <div class="job-company">
            <div class="company-logo_container"><img src="{{ asset('images/upload/'.$value->company->image) }}" alt="" class="company-logo"></div>
            <div class="company-infos">
                <p class="company-name paragraph-2" title="{{ $value->company->name }}">{{ $value->company->name }}</p>
                <p class="company-upload_date paragraph-2">Deadline: {{ date('d M Y', strtotime($value->deadline)) }}</p>
            </div>
        </div>

        <x-forms.button variant="primary" size="sm" onclick="window.location='{{ route('user.lowongan.show', ['id' => $value->id]) }}'">Lamar Sekarang</x-forms.button>
    </div>
@endforeach