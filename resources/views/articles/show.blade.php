
@extends('component.layout')

@section('title', $article->title . ' - NewsHub')

@section('meta_description', $article->meta_description ?? '')

@section('content')
<section class="article-page">
    <div class="container article-container">

        <div class="article-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span>/</span>
            <span>Article</span>
        </div>

        <article class="article-details">

            <div class="article-heading">
                @foreach($article->categories as $category)
                    <span class="category-tag">{{ $category->title }}</span>
                @endforeach

                <h1>{{ $article->title }}</h1>

                <div class="article-meta">
                    <span>By {{ $article->author->name ?? 'NewsHub Team' }}</span>
                    <span>{{ $article->created_at->format('F d, Y') }}</span>
                </div>
            </div>

            @if($article->image)
                <div class="article-featured-image">
                    <img src="{{ str_starts_with($article->image, 'http') ? $article->image : asset('storage/' . $article->image) }}"
                         alt="{{ $article->title }}">
                </div>
            @endif

            <div class="article-content">
                {!! nl2br(e($article->content)) !!}
            </div>

        </article>

        @if($relatedArticles->count() > 0)
            <section class="related-section">
                <h2>Related Articles</h2>

                <div class="news-grid">
                    @foreach($relatedArticles as $related)
                        <article class="news-card">
                            <a href="{{ route('articles.show', $related->slug) }}"
                               class="news-image">
                                @if($related->image)
                                    <img src="{{ asset('storage/' . $related->image) }}"
                                         alt="{{ $related->title }}">
                                @else
                                    <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=600"
                                         alt="News">
                                @endif
                            </a>

                            <div class="news-card-body">
                                <h3>
                                    <a href="{{ route('articles.show', $related->slug) }}">
                                        {{ $related->title }}
                                    </a>
                                </h3>
                                <p>{{ Str::limit(strip_tags($related->content), 100) }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif

        <a href="{{ route('home') }}" class="back-home">
            ← Back to Home
        </a>

    </div>
</section>
@endsection
