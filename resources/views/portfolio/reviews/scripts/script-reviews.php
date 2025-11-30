<script>
document.addEventListener("DOMContentLoaded", () => {

    console.log("REVIEWS SCRIPT LOADED");

    /* DOM elements */
    const modal = document.getElementById("reviewModal");
    const modalBox = document.getElementById("reviewModalBox");
    const closeBtn = document.getElementById("closeModal");
    const form = document.getElementById("reviewForm");
    const ratingField = document.getElementById("ratingModal");
    const body = document.getElementById("reviewsBody");


    /* -------------------------
       ACCORDION — ALWAYS WORKING
    ------------------------- */
    document.addEventListener("click", e => {
        const header = e.target.closest("#reviewsHeader");
        if (!header) return;

        const block = document.getElementById("reviewsBody");
        const arrow = header.querySelector(".accordion-arrow");

        const open = block.style.display === "block";

        block.style.display = open ? "none" : "block";
        arrow.style.transform = open ? "rotate(90deg)" : "rotate(270deg)";
    });


    /* -------------------------
       OPEN MODAL — delegation
    ------------------------- */
    document.addEventListener("click", e => {
        const btn = e.target.closest("#openReviewModal");
        if (!btn) return;

        modal.style.display = "flex";
        setTimeout(() => modalBox.style.transform = "scale(1)", 10);
    });


    /* -------------------------
       CLOSE MODAL
    ------------------------- */
    function closeModal() {
        modalBox.style.transform = "scale(0.92)";
        setTimeout(() => (modal.style.display = "none"), 200);
    }

    closeBtn.addEventListener("click", closeModal);

    modal.addEventListener("click", e => {
        if (e.target === modal) closeModal();
    });


    /* -------------------------
       RATING SELECTOR — delegation
    ------------------------- */
    document.addEventListener("click", e => {
        const btn = e.target.closest(".star-btn-modal");
        if (!btn) return;

        const val = Number(btn.dataset.value);
        ratingField.value = val;

        document.querySelectorAll(".star-btn-modal").forEach(b => {
            b.style.color =
                Number(b.dataset.value) <= val ? "#facc15" : "#475569";
        });
    });


    /* -------------------------
       AJAX SUBMIT REVIEW
    ------------------------- */
    form.addEventListener("submit", async e => {
        e.preventDefault();

        const resp = await fetch(form.action, {
            method: "POST",
            body: new FormData(form),
            headers: { "X-Requested-With": "XMLHttpRequest" }
        });

        let data;
        try {
            data = await resp.json();
        } catch {
            console.error("❌ Server returned non-JSON");
            console.log(await resp.text());
            alert("Server error, see console.");
            return;
        }

        if (data.success) {
            closeModal();
            resetForm();
            refreshReviews();
        }
    });


    /* -------------------------
       RESET FORM
    ------------------------- */
    function resetForm() {
        form.reset();
        ratingField.value = 0;

        document.querySelectorAll(".star-btn-modal").forEach(b => {
            b.style.color = "#475569";
        });
    }


    /* -------------------------
       LOAD REVIEWS (list + pagination)
    ------------------------- */
    async function refreshReviews(pageUrl = null) {
        const locale = document.documentElement.lang;
        const url = pageUrl || `/${locale}/reviews/paginated`;

        const resp = await fetch(url, {
            headers: { "X-Requested-With": "XMLHttpRequest" }
        });

        const html = await resp.text();
        body.innerHTML = html;
    }


    /* -------------------------
       AJAX PAGINATION — delegation
    ------------------------- */
    document.addEventListener("click", e => {
        const link = e.target.closest(".reviews-page");
        if (!link) return;

        e.preventDefault();
        refreshReviews(link.href);
    });

});
</script>
