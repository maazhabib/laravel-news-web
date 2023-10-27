<<<<<<< HEAD

=======
@php
    dd($Posts);
@endphp
>>>>>>> 03ec7845ace75859c66183742404d4852c5e0573
<div id="sidebar" class="col-md-4">
    @include('website.pages.search')

    <div class="recent-post-container">
        <h4>Recent Posts</h4>

<<<<<<< HEAD
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
=======
        @foreach($Posts as $post)
            <div class="recent-post">
                <a class="post-img" href="#">
                    <img src="{{ $post->image_url }}" alt="{{ $post->title }}"/>
                </a>
                <div class="post-content">
                    <h5><a href="{{ route('website.single', $post->id) }}">{{ $post->title }}</a></h5>
                    <span>
                        <i class="fa fa-tags" aria-hidden="true"></i>
                        <a href="{{ route('website.category', $post->category->id) }}">{{ $post->category->categories_name }}</a>
                    </span>
                    <span>
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        {{ $post->created_at->format('d, M, Y') }}
                    </span>
                    <a class="read-more" href="{{ route('website.single', $post->id) }}">read more</a>
>>>>>>> 03ec7845ace75859c66183742404d4852c5e0573
                </div>
            </div>
        @endforeach
    </div>
</div>
