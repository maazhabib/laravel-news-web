
<div id="sidebar" class="col-md-4">
    @include('website.pages.search')

    <div class="recent-post-container">
        <h4>Recent Posts</h4>

        @foreach($Sidebar as $side)
            <div class="recent-post">
                <a class="post-img" href="{{ route('news-web.show', $side->id) }}">
                    <img src="{{ asset('images/' . $side->image) }}" alt="{{ $side->title }}"/>
                </a>
                <div class="post-content">
                    <h5><a href="">{{ $side->title }}</a></h5>
                    <span>
                        <i class="fa fa-tags" aria-hidden="true"></i>
                        <a href="">{{ $side->categories->categories_name }}</a>
                    </span>
                    <span>
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        {{ $side->created_at->format('d, M, Y') }}
                    </span>
                    <a class="read-more" href="{{ route('news-web.show', $side->id) }}">read more</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
