{{-- resources/views/portfolio/reviews/pagination.blade.php --}}

@if ($reviews->hasPages())
    <div class="reviews-pagination"
         style="margin-top:14px;display:flex;gap:8px;justify-content:center;">

        {{-- Prev --}}
        @if ($reviews->onFirstPage())
            <span style="padding:6px 12px;border-radius:8px;background:#1e293b;color:#64748b;">
                ‹
            </span>
        @else
            <a href="{{ $reviews->previousPageUrl() }}"
               class="reviews-page"
               style="padding:6px 12px;border-radius:8px;background:#1e293b;color:white;">
                ‹
            </a>
        @endif

        {{-- Numbers --}}
        @foreach ($reviews->getUrlRange(1, $reviews->lastPage()) as $page => $url)
            @if ($page == $reviews->currentPage())
                <span style="padding:6px 12px;border-radius:8px;background:#3b82f6;color:white;">
                    {{ $page }}
                </span>
            @else
                <a href="{{ $url }}"
                   class="reviews-page"
                   style="padding:6px 12px;border-radius:8px;background:#1e293b;color:white;">
                    {{ $page }}
                </a>
            @endif
        @endforeach

        {{-- Next --}}
        @if ($reviews->hasMorePages())
            <a href="{{ $reviews->nextPageUrl() }}"
               class="reviews-page"
               style="padding:6px 12px;border-radius:8px;background:#1e293b;color:white;">
                ›
            </a>
        @else
            <span style="padding:6px 12px;border-radius:8px;background:#1e293b;color:#64748b;">
                ›
            </span>
        @endif

    </div>
@endif
