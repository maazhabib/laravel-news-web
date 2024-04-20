<nav aria-label="...">
    <ul class="pagination pagination-sm float-right ">
        {{-- Previous Page Link --}}
        <li class="page-item {{ ($posts->onFirstPage()) ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $posts->previousPageUrl() }}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>

        {{-- Pagination Links --}}
        @php
            $start = max(1, $posts->currentPage() - 2);
            $end = min($posts->lastPage(), $posts->currentPage() + 1);
        @endphp

        {{-- Page Numbers --}}
        @for ($i = $start; $i <= $end; $i++)
            <li class="page-item {{ ($posts->currentPage() == $i) ? 'active' : '' }}">
                <a class="page-link" href="{{ $posts->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        {{-- Next Page Link --}}
        <li class="page-item {{ ($posts->currentPage() == $posts->lastPage()) ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $posts->nextPageUrl() }}" aria-label="Next">
                <span aria-hidden="true"> &raquo;</span>
            </a>
        </li>
    </ul>
</nav>
