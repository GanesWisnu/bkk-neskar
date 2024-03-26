@foreach($list as $key => $value)
    <div class="card-pengumuman" {{ $attributes }}>
        <h3 class="job-position">{{ $value['title'] }}</h3>
        
        <div class="job-company">
            <div class="company-logo_container"><img src="{{ asset($value['company_logo']) }}" alt="" class="company-logo"></div>
            <div class="company-infos">
                <p class="company-name paragraph-2" title="{{ $value['company'] }}">{{ $value['company'] }}</p>
                <p class="company-upload_date paragraph-2">{{ $value['date'] }}</p>
            </div>
        </div>

        <x-forms.button variant="primary" size="sm" onclick="window.location='{{ route('admin.acceptance.download', ['id' => $value->id]) }}'">Lihat Pengumuman</x-forms.button>
    </div>
@endforeach