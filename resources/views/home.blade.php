
@extends('component.layout')

@section('title', 'NewsHub - Latest News')

@section('content')

<section class="hero-section">
    <div class="container">

        <div class="section-heading">
            <div>
                <span class="eyebrow">TODAY'S HEADLINES</span>
                <h1>Stories That <span>Matter.</span></h1>
            </div>
            <p>Discover the latest news, insights and stories from around the world.</p>
        </div>

        @if($featuredArticles->count() > 0)

            @php $hero = $featuredArticles->first(); @endphp

            <div class="hero-grid">

                <article class="hero-main">
                    <a href="{{ route('articles.show', $hero->slug) }}"class="hero-image">
                        @if($hero->image)
                            <img src="{{ str_starts_with($hero->image, 'http') ? $hero->image : asset('storage/' . $hero->image) }}" alt="{{ $hero->title }}">
                        @else
                            <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=1200" alt="News">
                        @endif
                    </a>

                    <div class="hero-overlay">
                        <span class="category-tag">
                            {{ $hero->categories->first()->title ?? 'Top Story' }}
                        </span>

                        <h2>{{ $hero->title }}</h2>

                        <p>
                            By {{ $hero->author->name ?? 'NewsHub Team' }}
                            · {{ $hero->created_at->format('M d, Y') }}
                        </p>
                    </div>
                </article>

                <div class="hero-side">

                    @foreach($featuredArticles->skip(1) as $article)

                        <article class="side-card">
                            <a href="{{ route('articles.show', $article->slug) }}" class="side-image">
                                @if($article->image)
                                    <img src="{{ str_starts_with($article->image, 'http') ? $article->image : asset('storage/' . $article->image) }}" alt="{{ $article->title }}">
                                @else
                                    <img src="https://images.unsplash.com/photo-1495020689067-958852a7765e?w=600" alt="News">
                                @endif
                            </a>

                            <div class="side-card-content">
                                <span class="category-tag">
                                    {{ $article->categories->first()->title ?? 'Latest News' }}
                                </span>

                                <h3>{{ $article->title }}</h3>

                                <small>
                                    {{ $article->created_at->format('M d, Y') }}
                                </small>
                            </div>
                        </article>

                    @endforeach

                </div>

            </div>

        @else

            <div class="empty-state">
                <h2>Welcome to NewsHub!</h2>
                <p>Your latest news stories will appear here.</p>
            </div>

        @endif

    </div>
</section>


<section class="latest-section">
    <div class="container">

        <div class="section-title-row">
            <div>
                <span class="eyebrow">STAY INFORMED</span>
                <h2>Latest News</h2>
            </div>

            <a href="{{ route('home') }}" class="view-all">Explore Stories →</a>
        </div>

        <div class="news-grid">

            @forelse($latestArticles as $article)

                <article class="news-card">

                    <a href="{{ route('articles.show', $article->slug) }}" class="news-image">
                        @if($article->image)
                            <img src="{{ (str_starts_with($article->image, 'http'))
    ? $article->image
    : asset('storage/' . $article->image)}}" alt="{{ $article->title }}">
                        @else
                            <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=600" alt="News">
                        @endif
                    </a>

                    <div class="news-card-body">

                        <span class="category-tag">
                            {{ $article->categories->first()->title ?? 'News' }}
                        </span>

                        <h3>{{ $article->title }}</h3>

                        <p class="article-description">
                            {{ Str::limit(strip_tags($article->content), 110) }}
                        </p>

                        <div class="article-meta">
                            <span>{{ $article->author->name ?? 'NewsHub Team' }}</span>
                            <span>{{ $article->created_at->format('M d, Y') }}</span>
                        </div>

                    </div>

                </article>

            @empty

                <div class="empty-state">
                    <h3>No articles published yet.</h3>
                    <p>News articles will appear here once you add them.</p>
                </div>

            @endforelse

        </div>

    </div>
</section>


<section class="category-section">
    <div class="container">

        <div class="section-title-row">
            <div>
                <span class="eyebrow">EXPLORE TOPICS</span>
                <h2>Browse Categories</h2>
            </div>
        </div>

        <div class="category-grid">

            @forelse($categories as $category)

                <a href="{{ route('home') }}?category={{ $category->slug }}" class="category-card">
                    <span>{{ $category->title }}</span>
                    <span class="category-arrow">→</span>
                </a>

            @empty

                <p>No categories available yet.</p>

            @endforelse

        </div>

    </div>
</section>

@endsection
