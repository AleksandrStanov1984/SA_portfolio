{{-- resources/views/portfolio/sections/reviews-paginated.blade.php --}}
<div class="accordion-card" id="reviewsAccordion" style="margin-top:20px;">

    {{-- HEADER --}}
    <div class="accordion-header" id="reviewsHeader"
         style="display:flex;justify-content:space-between;align-items:center;cursor:pointer;">
        <span style="font-size:1.2rem;font-weight:600;color:white;">Feedback & Testimonials</span>
        <span class="accordion-arrow"
              style="font-size:1.5rem;color:white;transform:rotate(90deg);transition:0.3s;">›</span>
    </div>

    {{-- BODY --}}
    <div class="accordion-body" id="reviewsBody" style="display:none;padding-top:16px;">

        {{-- LIST --}}
        <div class="reviews-list" style="display:flex;flex-direction:column;gap:12px;">
            @foreach($reviews as $review)
                <div style="background:#0f172a;border:1px solid #243045;border-radius:12px;padding:14px 18px;">
                    <div style="display:flex;justify-content:space-between;align-items:center;">
                        <span style="font-weight:600;color:white;">{{ $review->name ?? 'Anonymous' }}</span>
                        <span>
                            @for($i=1;$i<=5;$i++)
                                <span style="color:{{ $i <= $review->rating ? '#facc15' : '#475569' }}">★</span>
                            @endfor
                        </span>
                    </div>
                    <p style="color:#cbd5e1;margin-top:6px;">{{ $review->comment }}</p>
                </div>
            @endforeach
        </div>

        {{-- PAGINATION --}}
        <div style="display:flex;justify-content:center;margin-top:14px;gap:8px;">
            @for($i = 1; $i <= $reviews->lastPage(); $i++)
                <a href="?page={{ $i }}"
                   style="padding:6px 12px;border-radius:8px;background:{{ $i == $reviews->currentPage() ? '#1e3a8a':'#0f172a' }};
                       color:white;border:1px solid #243045;">
                    {{ $i }}
                </a>
            @endfor
        </div>

        {{-- BUTTON AT BOTTOM --}}
        <button id="openReviewModal"
                style="margin-top:18px;padding:10px 22px;font-size:0.95rem;font-weight:500;border-radius:999px;
                       background:linear-gradient(90deg,#3b82f6,#6366f1);color:white;border:none;
                       cursor:pointer;box-shadow:0 0 12px rgba(59,130,246,0.5);">
            Написать отзыв
        </button>

    </div>
</div>


{{-- REVIEW MODAL --}}
<div id="reviewModal"
     style="position:fixed;inset:0;background:rgba(0,0,0,0.55);backdrop-filter:blur(4px);
            display:none;align-items:center;justify-content:center;z-index:9999;transition:0.3s;">
    <div style="width:720px;background:#0f172a;border:1px solid #243045;border-radius:16px;
                padding:28px;color:white;transform:scale(0.92);transition:0.25s;"
         id="reviewModalBox">

        <h3 style="font-size:1.4rem;margin-bottom:16px;">Оставить отзыв</h3>

        <form id="reviewForm" method="POST" action="{{ route('reviews.store',['locale'=>$locale]) }}">
            @csrf

            <label>Имя (необязательно)</label>
            <input name="name"
                   style="width:100%;margin:6px 0 12px;padding:12px;border-radius:10px;
                          background:#0d1322;border:1px solid #243045;color:white;">

            <label>Рейтинг</label>
            <div style="display:flex;gap:8px;margin:6px 0 12px;">
                @for($i=1;$i<=5;$i++)
                    <button type="button" class="star-btn-modal"
                            data-value="{{ $i }}"
                            style="background:transparent;border:none;font-size:1.6rem;color:#475569;cursor:pointer;">
                        ★
                    </button>
                @endfor
            </div>

            <input type="hidden" id="ratingModal" name="rating" value="5">

            <label>Комментарий</label>
            <textarea name="comment" required maxlength="250"
                      style="width:100%;height:150px;margin-top:6px;padding:12px;background:#0d1322;
                             border:1px solid #243045;color:white;border-radius:10px;"></textarea>

            <button type="submit"
                    style="margin-top:16px;width:100%;padding:12px;border-radius:12px;
                           background:linear-gradient(90deg,#3b82f6,#6366f1);color:white;border:none;font-size:1.05rem;cursor:pointer;">
                Отправить
            </button>
        </form>

        <button id="closeModal"
                style="margin-top:12px;width:100%;padding:10px;border:none;background:#1e293b;
                       border-radius:10px;color:white;cursor:pointer;">Закрыть</button>

    </div>
</div>


<script>
document.addEventListener("DOMContentLoaded", () => {

    // Accordion
    const header = document.getElementById("reviewsHeader");
    const body = document.getElementById("reviewsBody");
    const arrow = header.querySelector(".accordion-arrow");

    header.onclick = () => {
        const open = body.style.display === "block";
        body.style.display = open ? "none" : "block";
        arrow.style.transform = open ? "rotate(90deg)" : "rotate(270deg)";
    };


    // Modal open
    const modal = document.getElementById("reviewModal");
    const modalBox = document.getElementById("reviewModalBox");
    const openBtn = document.getElementById("openReviewModal");
    const closeBtn = document.getElementById("closeModal");

    openBtn.onclick = () => {
        modal.style.display = "flex";
        setTimeout(() => {
            modalBox.style.transform = "scale(1)";
        }, 10);
    };

    closeBtn.onclick = () => {
        modalBox.style.transform = "scale(0.92)";
        setTimeout(() => modal.style.display = "none", 200);
    };

    modal.onclick = e => {
        if (e.target === modal) {
            modalBox.style.transform = "scale(0.92)";
            setTimeout(() => modal.style.display = "none", 200);
        }
    };


    // Rating
    document.querySelectorAll(".star-btn-modal").forEach(btn => {
        btn.onclick = () => {
            const val = btn.dataset.value;
            document.getElementById("ratingModal").value = val;

            document.querySelectorAll(".star-btn-modal").forEach(b => {
                b.style.color = b.dataset.value <= val ? "#facc15" : "#475569";
            });
        };
    });
});
</script>
