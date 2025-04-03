@if ($paginator->hasPages())
    <div class="pagination-container" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <!-- Hide the "Previous" button when on the first page -->
        @else
            <a class="pagination-item" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"> Previous </a>
        @endif

        {{-- First Page Link --}}
        <a class="pagination-item @if ($paginator->currentPage() == 1) active @endif" href="{{ $paginator->url(1) }}" aria-label="@lang('pagination.first')">1</a>

        {{-- Pagination Elements --}}
        @php
            $start = $paginator->currentPage() - 2;
            $end = $paginator->currentPage() + 2;
            if ($start < 2) {
                $start = 2;
                $end = min(3, $paginator->lastPage());
            }
            if ($end > $paginator->lastPage() - 1) {
                $end = $paginator->lastPage() - 1;
                $start = max(2, $paginator->lastPage() - 3);
            }
        @endphp

        {{-- "Three Dots" Separator --}}
        @if ($start > 2)
            <span class="pagination-item disabled">...</span>
        @endif

        @for ($i = $start; $i <= $end; $i++)
            @if ($i == $paginator->currentPage())
                <a class="pagination-item active" href="{{ $paginator->url($i) }}" aria-current="page">{{ $i }}</a>
            @else
                <a class="pagination-item" href="{{ $paginator->url($i) }}">{{ $i }}</a>
            @endif
        @endfor

        {{-- "Three Dots" Separator --}}
        @if ($end < $paginator->lastPage() - 1)
            <span class="pagination-item disabled">...</span>
        @endif

        {{-- Last Page Link --}}
        <a class="pagination-item" href="{{ $paginator->url($paginator->lastPage()) }}" aria-label="@lang('pagination.last')">{{ $paginator->lastPage() }}</a>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="pagination-item" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"> Next </a>
        @else
            <!-- Hide the "Next" button when on the last page -->
        @endif
    </div>
@endif
