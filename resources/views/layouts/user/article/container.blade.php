<div class="container">
    <div class="article-content">
        <div class="article-meta">
            <div class="article-created-at">
                <i class="bi bi-clock"></i>
                <span>{{ date('l, d M Y H:i', strtotime($article->created_at)) }}</span>
            </div>
            <h1 class="title article-title">{{ $article->title }}</h1>
        </div>

        <div class="article-thumbnail">
            <img src="{{ asset('images/upload/'.$article->image_cover) }}" alt="" srcset="">
        </div>

        <div class="article-body">
            {!! $article->content !!}
        </div>
    </div>
    <div class="article-others">
        <h3 class="others-heading">Informasi Lainnya</h3>
        <div class="others-list">
            @foreach($other_articles as $key => $value)
                <div class="others-card">
                    <div class="others-thumbnail">
                        <img src="{{ $value->image_cover ? asset('images/upload/'.$value->image_cover) : asset($value->thumbnail) }}" alt="" srcset="">
                    </div>
                    <div class="others-info">
                        <div class="others-date">
                            <i class="bi bi-clock"></i>
                            <span>{{ date('d M Y', strtotime($value->created_at)) }}</span>
                        </div>
                        <h3 class="others-title">{{ $value->title }}</h3>
                        <x-forms.button variant="ghost-primary" size="md" onclick="window.location='{{ route('user.article.show', ['id' => $value->article_id]) }}'">Lihat Artikel</x-forms.button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
