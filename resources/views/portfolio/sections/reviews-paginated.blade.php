{{-- resources/views/portfolio/sections/reviews-paginated.blade.php --}}


    {{-- BODY (обновляется AJAXом) --}}
        @include('portfolio.reviews.list')
        @include('portfolio.reviews.pagination')

    {{-- Кнопка (НЕ внутри reviewsBody, чтобы не пропадала) --}}
    <div style="margin-top:18px;">
        <button id="openReviewModal" class="btn"
                style="padding:10px 22px;font-size:0.95rem;font-weight:500;border-radius:999px;
                       background:linear-gradient(90deg,#3b82f6,#6366f1);color:white;border:none;
                       cursor:pointer;box-shadow:0 0 12px rgba(59,130,246,0.5);">
            @lang('portfolio.btn_write_review')
        </button>
    </div>


