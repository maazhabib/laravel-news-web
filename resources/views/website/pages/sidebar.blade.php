<div id="sidebar" class="col-md-4">
    <!-- search box -->
        @include('website.pages.search')
    <!-- /search box -->
    <!-- recent posts box -->
    <div class="recent-post-container">
        <h4>Recent Posts</h4>
        {{-- @foreach ($post as $side) --}}
            <div class="recent-post">
                <a class="post-img" href="">
                    <img src="images/post-format.jpg" alt=""/>
                </a>
                <div class="post-content">
                    <h5><a href="single.php">Lorem ipsum dolor sit amet</a></h5>
                    <span>
                        <i class="fa fa-tags" aria-hidden="true"></i>
                        <a href='category.php'>Html</a>
                    </span>
                    <span>
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        01 Nov, 2019
                    </span>
                    <a class="read-more" href="single.php">read more</a>
                </div>
            </div>
        {{-- @endforeach --}}
    </div>
    <!-- /recent posts box -->
</div>



{{-- <div id="sidebar" class="col-md-4">
        @include('website.pages.search')
    <div class="recent-post-container">
        <h4>Recent Posts</h4>
        @foreach ($post as $dat)
            <div class="recent-post">
                <a class="post-img" href="">
                    <img src="" alt="{{ $dat->title }}"/>
                </a>
                <div class="post-content">
                    <h5><a href="single.php">{{ $dat->title }}</a></h5>
                    <span>
                        <i class="fa fa-tags" aria-hidden="true"></i>
                        <a href='category.php'>{{ $dat->categories->categories_name }}</a>
                    </span>
                    <span>
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        {{ $dat->created_at->format('d, M, Y') }}
                    </span>
                    <a class="read-more" href="single.php">read more</a>
                </div>
            </div>
        @endforeach
    </div>
</div> --}}