@foreach($list as $key => $value)    
    <div class="card-article">
        <div class="article-thumbnail_container">
            <img src="{{ $value['image_cover'] ? asset('/images/upload/'.$value['image_cover']) : asset($value['thumbnail']) }}" alt="" srcset="">
        </div>
        <div class="article-info_container">
            <div class="article-date_container">
                <img src="{{ asset('images/icons/uil_calender.svg') }}" class="company-logo">
                <p class="paragraph-2 article-date">{{ date('d M Y h:m:s', strtotime($value->created_at)) }}</p>
            </div>
            <h3 class="article-title">{{ $value['title'] ? $value['title'] : '{title}' }}</h3>
            {!! $value['content'] ? substr($value['content'], 0, 50) : '{subtitle}' !!}
            <x-forms.button variant="ghost-primary" size="md">Lihat Artikel</x-forms.button>
        </div>
    </div>
@endforeach