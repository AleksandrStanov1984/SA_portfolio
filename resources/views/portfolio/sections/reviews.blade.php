{{-- resources/views/portfolio/sections/reviews.blade.php --}}
<div class="accordion-card open">
    <div class="accordion-header">
        <span>@lang('portfolio.reviews_title')</span>
        <span class="accordion-arrow">›</span>
    </div>

    <div class="accordion-body open">

        <div class="card-grid">

            {{-- Список отзывов --}}
            <div class="card">
                <h3 style="margin-bottom:10px;">@lang('portfolio.reviews_list_title')</h3>

                @forelse($reviews as $review)
                    <div class="review-item">
                        <div class="review-header">
                            <span class="review-name">
                                {{ $review->name ?: __('portfolio.reviews_anonymous') }}
                            </span>

                            <span class="review-stars">
                                @for($i = 1; $i <= 5; $i++)
                                    <span class="star {{ $i <= $review->rating ? 'star-filled' : '' }}">★</span>
                                @endfor
                            </span>
                        </div>

                        <p class="review-comment">{{ $review->comment }}</p>
                    </div>
                @empty
                    <p style="font-size:0.9rem;color:#9ca3af;">
                        @lang('portfolio.reviews_empty')
                    </p>
                @endforelse
            </div>

            {{-- Форма отзыва --}}
            <div class="card">
                <h3 style="margin-bottom:10px;">@lang('portfolio.reviews_form_title')</h3>

                @if(session('review_submitted'))
                    <div class="alert-success">
                        @lang('portfolio.reviews_success')
                    </div>
                @endif

                <form method="POST" action="{{ route('portfolio.review.store', ['locale' => $locale]) }}">
                    @csrf

                    <div class="form-group">
                        <label for="review_name">@lang('portfolio.reviews_name_label')</label>
                        <input id="review_name" type="text" name="name"
                               value="{{ old('name') }}" maxlength="80">
                    </div>

                    <div class="form-group">
                        <label>@lang('portfolio.reviews_rating_label')</label>

                        <div class="star-input"
                             data-input-id="rating"
                             data-ajax-url="{{ route('portfolio.review.rate', ['locale' => $locale]) }}">

                            @for($i = 1; $i <= 5; $i++)
                                <button type="button" class="star-btn" data-value="{{ $i }}">★</button>
                            @endfor
                        </div>

                        <input type="hidden" id="rating" name="rating" value="{{ old('rating', 5) }}">
                        @error('rating')
                        <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="review_comment">
                            @lang('portfolio.reviews_comment_label')
                            <span class="char-counter" data-for="review_comment">0 / 100</span>
                        </label>

                        <textarea id="review_comment"
                                  name="comment" maxlength="100"
                                  rows="4" required
                                  pattern="[^<>]*">{{ old('comment') }}</textarea>

                        @error('comment')
                        <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        @lang('portfolio.reviews_submit')
                    </button>

                </form>

            </div>

        </div>

    </div>
</div>


@push('styles')
<style>
    .review-item + .review-item {
        margin-top:10px;
        padding-top:10px;
        border-top:1px solid #111827;
    }
    .review-header {
        display:flex;
        justify-content:space-between;
        align-items:center;
        gap:8px;
        margin-bottom:2px;
    }
    .review-name { font-weight:500;font-size:0.9rem; }
    .review-stars .star { font-size:0.9rem;color:#9ca3af; }
    .review-stars .star-filled { color:#facc15; }
    .review-comment { font-size:0.9rem;color:#e5e7eb; }

    .alert-success {
        font-size:0.85rem;
        color:#bbf7d0;
        background:rgba(22,163,74,0.12);
        border:1px solid rgba(22,163,74,0.4);
        border-radius:0.75rem;
        padding:6px 10px;
        margin-bottom:10px;
    }

    .form-group { margin-bottom:10px;font-size:0.9rem; }
    .form-group label {
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:4px;
    }
    .form-group input,
    .form-group textarea {
        width:100%;
        border-radius:0.75rem;
        border:1px solid #1f2937;
        background:#020617;
        padding:10px 12px;
        color:#e5e7eb;
        font-size:0.9rem;
        outline:none;
    }
    .form-group textarea { min-height:120px; }
    .form-group input:focus,
    .form-group textarea:focus {
        border-color:#4f46e5;
        box-shadow:0 0 0 1px rgba(79,70,229,0.5);
    }

    .form-error { margin-top:2px;font-size:0.8rem;color:#fca5a5; }

    .star-input { display:flex; gap:4px;margin:2px 0; }
    .star-btn {
        border:none;background:transparent;cursor:pointer;
        font-size:1.2rem;color:#9ca3af;padding:0 2px;
        transition:transform .1s,color .1s;
    }
</style>
@endpush


@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const wrap = document.querySelector(".star-input");
    if (!wrap) return;

    const hidden = document.getElementById(wrap.dataset.inputId);

    function updateStars(v) {
        wrap.querySelectorAll(".star-btn").forEach(btn => {
            btn.style.color = (parseInt(btn.dataset.value) <= v) ? "#facc15" : "#9ca3af";
        });
    }

    updateStars(hidden.value);

    wrap.querySelectorAll(".star-btn").forEach(btn => {
        btn.addEventListener("click", e => {
            e.preventDefault();

            const v = parseInt(btn.dataset.value, 10);
            hidden.value = v;
            updateStars(v);

            fetch(wrap.dataset.ajaxUrl, {
                method: "POST",
                headers: {
                    "Content-Type":"application/json",
                    "X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').content,
                    "Accept":"application/json"
                },
                body: JSON.stringify({ rating: v })
            }).catch(err => console.warn("Rating AJAX error", err));
        });
    });
});
</script>
@endpush
