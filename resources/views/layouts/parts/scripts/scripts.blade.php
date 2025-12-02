
<link rel="stylesheet" href="/scripts/promo-slider.js">



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

<script>
window.showTopAlert = function(message, type = 'success') {

    const bar = document.getElementById('topAlert');
    const text = document.getElementById('topAlertText');

    text.textContent = message;

    if (type === 'success') {
        bar.style.background = '#22c55e'; // зелёный
    } else {
        bar.style.background = '#dc2626'; // красный
    }

    bar.style.top = "0px";

    setTimeout(() => {
        bar.style.top = "-70px";
    }, 5000);
}
</script>

<script>
window.showAlert = function (text, type = "success") {
    const bar = document.getElementById('alertBar');
    if (!bar) return;

    bar.textContent = text;

    // Мягкие цвета под тёмный фон
    if (type === "success") {
        // мягкий зелёный / бирюзовый
        bar.style.background = "linear-gradient(90deg, #059669, #22c55e)";
        bar.style.color = "#ecfdf5"; // чуть теплее, чем чисто белый
    } else {
        // приглушённый тёплый красный
        bar.style.background = "linear-gradient(90deg, #b91c1c, #f97373)";
        bar.style.color = "#fef2f2";
    }

    // старт слева
    bar.style.left = "-100%";

    // выезд слева направо (2 сек)
    setTimeout(() => {
        bar.style.left = "0";
    }, 10);

    // 2 сек анимации + 3 сек пауза = 5 сек
    setTimeout(() => {
        // уезжаем обратно (2 сек по transition)
        bar.style.left = "-100%";
    }, 5000);
};

<script>
document.addEventListener('DOMContentLoaded', () => {

    const sections = {
        about: document.getElementById("about"),
        skills: document.getElementById("skills"),
        projects: document.getElementById("projects"),
        experience: document.getElementById("experience"),
        contact: document.getElementById("contact"),
    };

    const links = document.querySelectorAll(".nav-link");

    function setActive(id) {
        links.forEach(a => a.classList.remove("active"));
        const activeLink = document.querySelector(`.nav-link[href="#${id}"]`);
        if (activeLink) activeLink.classList.add("active");
    }

    window.addEventListener("scroll", () => {
        let scrollPos = window.scrollY + 200;

        for (let id in sections) {
            const sec = sections[id];
            if (!sec) continue;

            if (scrollPos >= sec.offsetTop && scrollPos < sec.offsetTop + sec.offsetHeight) {
                setActive(id);
            }
        }
    });
});

</script>


