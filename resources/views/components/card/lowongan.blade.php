@foreach($list as $key => $value)
    <div class="card-lowongan" {{ $attributes }}>
        <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
        <h2 class="job-position">{{ $value['title'] }}</h2>
        <div class="job-location">
            <img src="{{ asset('images/icons/uil_location-point.svg') }}" alt="{{ $value['company'] }}" class="company-logo">
            <p class="location paragraph-2">{{ $value['location'] }}</p>
        </div>
        <div class="job-requirements">
            @foreach($value['syarat'] as $requirement)
                @if($loop->index <= 4)
                    <span class="requirement-item paragraph-2">{{ $requirement }}</span>
                @else
                    <span class="requirement-item paragraph-2">+{{ $loop->count - 5 }}</span>
                    @break
                @endif
            @endforeach
        </div>
        <div class="job-company">
            <div class="company-logo_container"><img src="{{ asset($value['company_logo']) }}" alt="" class="company-logo"></div>
            <div class="company-infos">
                <p class="company-name paragraph-2" title="{{ $value['company'] }}">{{ $value['company'] }}</p>
                <p class="company-upload_date paragraph-2">{{ $value['date'] }}</p>
            </div>
        </div>

        <x-forms.button variant="primary" size="sm">Lamar Sekarang</x-forms.button>
    </div>
@endforeach