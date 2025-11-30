<div id="reviewsBody">

    @include('portfolio.reviews.list')

    @include('portfolio.reviews.pagination')

</div>


   <button id="openReviewModal" class="btn"
            style="margin-top:18px;padding:10px 22px;font-size:0.95rem;font-weight:500;border-radius:999px;
                   background:linear-gradient(90deg,#3b82f6,#6366f1);color:white;border:none;
                   cursor:pointer;box-shadow:0 0 12px rgba(59,130,246,0.5);">
        @lang('portfolio.btn_write_review')
    </button>
