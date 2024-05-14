<section class="article">
    <div class="article-headings">
        <h1 class="article-heading">Informasi Terkini</h1>
        <p class="article-description">Dapatkan informasi bermanfaat mengenai tips-tips dalam pekerjaan</p>
    </div>
    <div class="article-list">
    @if($articles->isEmpty())
        <img class="illustration-error" src="{{ asset('images/outofservice.png') }}">
    @else
        <x-Card.article :list="$articles"/>
    @endif
    </div>

</section>