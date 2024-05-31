@foreach($list as $key => $value)    
    <div class="card-article">
        <div class="article-thumbnail_container">
            <img src="{{ $value['image_cover'] ? asset('/images/upload/'.$value['image_cover']) : asset($value['thumbnail']) }}" alt="" srcset="">
        </div>
        <div class="article-info_container">
            <div class="article-date_container">
                <img src="{{ asset('images/icons/uil_calender.svg') }}" class="company-logo">
                <p class="paragraph-2 article-date">{{ date('d M Y', strtotime($value->created_at)) }}</p>
            </div>
            <h3 class="article-title" id="article-title">{{ $value['title'] ? $value['title'] : '{title}' }}</h3>
            <x-forms.button variant="ghost-primary" size="md" onclick="window.location='{{ route('user.article.show', ['id' => $value->id]) }}'">Lihat Artikel</x-forms.button>
        </div>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const titles = document.querySelectorAll('.article-title');
        
        titles.forEach(title => {
            let words = title.textContent.trim().split(/\s+/);
            if (words.length > 3) {
                title.textContent = words.slice(0, 3).join(' ') + '...';
            }
        });
    });
</script>
@endforeach