
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


    // Modal
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
