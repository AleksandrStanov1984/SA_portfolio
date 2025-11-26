{{-- resources/views/portfolio/sections/reviews-paginated.blade.php --}}


<div class="accordion-card" id="reviewsAccordion" style="margin-top:20px;">

    @include('portfolio.reviews.header')

    @include('portfolio.reviews.body')

</div>

@include('portfolio.modals.modal-reviews')
@include('portfolio.reviews.scripts.script')
