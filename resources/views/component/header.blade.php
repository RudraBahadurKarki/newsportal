
<header class="site-header">

    <div class="top-bar">
        <div class="container top-bar-inner">
            <span>Welcome to NewsHub</span>
            <span>{{ now()->format('l, F d, Y') }}</span>
        </div>
    </div>

    <div class="container header-main">

        <a href="{{ route('home') }}" class="logo">
            NEWS<span>HUB</span><small>.</small>
        </a>

        <form action="{{ route('home') }}" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search news..." value="{{ request('search') }}">
            <button type="submit">Search</button>
        </form>

    </div>

    <nav class="main-nav">
        <div class="container nav-inner">

            <a href="{{ route('home') }}" class="nav-link">Home</a>

            @if(isset($categories))
                @foreach($categories as $category)
                    <a href="{{ route('home') }}?category={{ $category->slug }}" class="nav-link">
                        {{ $category->title }}
                    </a>
                @endforeach
            @endif

        </div>
    </nav>

    <div class="breaking-bar">
        <div class="container breaking-inner">
            <span class="breaking-label">BREAKING NEWS</span>
            <span class="breaking-text">Stay updated with the latest headlines and stories.</span>
        </div>
    </div>

</header>
