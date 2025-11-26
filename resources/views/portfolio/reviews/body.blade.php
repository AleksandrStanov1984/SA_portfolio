{{-- resources/views/portfolio/reviews/body.blade.php --}}
<div class="accordion-body" id="reviewsBody" style="display:none;padding-top:16px;">

    @include('portfolio.reviews.list')

    @include('portfolio.reviews.pagination')

    <button id="openReviewModal"
            style="margin-top:18px;padding:10px 22px;font-size:0.95rem;font-weight:500;border-radius:999px;
                   background:linear-gradient(90deg,#3b82f6,#6366f1);color:white;border:none;
                   cursor:pointer;box-shadow:0 0 12px rgba(59,130,246,0.5);">
        @lang('portfolio.btn_write_review')
    </button>

</div>
