@if ($paginator->hasPages())
    <div class="navi">
        <nav role="navigation" aria-label="Pagination Navigation">
            @if ($paginator->onFirstPage())
                <span>
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </nav>
    </div>
@endif
