<script>
    document.getElementById('year').textContent = new Date().getFullYear();
</script>

<script>
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".accordion-card").forEach(card => {
        const header = card.querySelector(".accordion-header");
        const body = card.querySelector(".accordion-body");
        const arrow = card.querySelector(".accordion-arrow");

        if (!header || !body) return;

        header.addEventListener("click", () => {
            const isOpen = body.classList.contains("open");

            if (isOpen) {
                body.classList.remove("open");
                card.classList.remove("open");
                body.style.maxHeight = "0px";
                arrow.style.transform = "rotate(0deg)";
            } else {
                body.classList.add("open");
                card.classList.add("open");
                body.style.maxHeight = body.scrollHeight + "px";
                arrow.style.transform = "rotate(90deg)";
            }
        });

        // Если аккордион открыт по умолчанию
        if (body.classList.contains("open")) {
            body.style.maxHeight = body.scrollHeight + "px";
            arrow.style.transform = "rotate(90deg)";
        }
    });
});
</script>

<script>
document.addEventListener("DOMContentLoaded", () => {

    const carousel = document.getElementById("skills-carousel");
    const prev = document.getElementById("skills-prev");
    const next = document.getElementById("skills-next");

    const cards = [...carousel.children];
    const cardWidth = 260 + 20; // ширина + gap
    let index = 0;

    // Дублируем карточки (чтобы хватало для бесконечной прокрутки)
    cards.forEach(c => carousel.appendChild(c.cloneNode(true)));

    function update() {
        carousel.style.transform = `translateX(${-index * cardWidth}px)`;
    }

    next.addEventListener("click", () => {
        index++;
        if (index >= cards.length) index = 0;
        update();
    });

    prev.addEventListener("click", () => {
        index--;
        if (index < 0) index = cards.length - 1;
        update();
    });

});

</script>
