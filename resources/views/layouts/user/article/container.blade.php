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

    </div>
</div>