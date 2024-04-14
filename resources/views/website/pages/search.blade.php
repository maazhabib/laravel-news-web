<div class="search-box-container">
    <h4>Search</h4>
    <form class="search-post" action="{{ route('news-web.index') }}" method="GET">
        <div class="input-group">
            <input type="text" name="title" class="form-control" placeholder="Search .....">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-danger">Search</button>
            </span>
        </div>
    </form>
</div>
