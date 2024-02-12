@foreach($list as $key => $value)    
    <div class="card-article">
        <div class="article-thumbnail_container">
            <img src="{{ (!$value['thumbnail'] || $value['thumbnail'] === '') ? 'images/thumbnail-placeholder.png' : asset($value['thumbnail']) }}" alt="" srcset="">
        </div>
        <div class="article-info_container">
            <div class="article-date_container">
                <img src="{{ asset('images/icons/uil_calender.svg') }}" class="company-logo">
                <p class="paragraph-2 article-date">{{ $value['published_date'] }}</p>
            </div>
            <h3 class="article-title">{{ $value['title'] }}</h3>
            <p class="article-short_desc">{{ $value['short_desc'] . '...' }}</p>
            <x-forms.button variant="ghost-primary" size="md">Lihat Artikel</x-forms.button>
        </div>
    </div>
@endforeach