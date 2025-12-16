
<!-- Promo Slider Styles -->
    <link rel="stylesheet" href="{{ asset('css/promo-slider.css') }}">



<style>
        :root {
            --bg: #050816;
            --bg-alt: #0b1020;
            --accent: #4f46e5;
            --accent-soft: rgba(79, 70, 229, 0.12);
            --text: #e5e7eb;
            --muted: #9ca3af;
            --card: #111827;
            --border: #1f2933;
            --radius-xl: 1.5rem;
            --shadow-soft: 0 18px 40px rgba(15, 23, 42, 0.65);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "SF Pro Text",
            "Segoe UI", sans-serif;
            background: radial-gradient(circle at top, #111827 0, #020617 55%);
            color: var(--text);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            padding-top: 120px !important;
        }

        /* ==== FIXED HEADER WITH ROUNDED CORNERS ==== */
        header {
            position: fixed;
            top: 12px;                 /* чуть отступаем вниз от края */
            left: 50%;
            transform: translateX(-50%);

            width: 1120px;             /* как .page */
            max-width: calc(100% - 40px); /* отступы на маленьких экранах */
            padding: 18px 24px;

            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(12px);
            border-radius: 18px;       /* ← ОКРУГЛЕНИЕ */
            border: 1px solid rgba(255,255,255,0.05);
            box-shadow: 0 12px 32px rgba(0,0,0,0.45);

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;

            z-index: 99999;
        }

        a { color: inherit; text-decoration: none; }
        a:hover { text-decoration: underline; }

        .page {
            max-width: 1120px;
            margin: 0 auto;
            padding: 32px 20px 60px;
        }


        .logo {
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            font-size: 0.9rem;
            color: var(--muted);
        }

        nav {
            display: flex;
            flex-wrap: wrap;
            gap: 18px;
            font-size: 0.9rem;
            color: var(--muted);
        }

        nav a {
            padding: 6px 10px;
        }

        nav a:hover {
            color: #f9fafb;
            text-decoration: none;
        }

    .site-footer {
        text-align: center;
        margin-top: 40px;
        font-size: 0.82rem;
        color: #9ca3af;
        opacity: 0.9;
    }

    .footer-signature {
        font-size: 0.78rem;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        opacity: 0.85;
    }

    /* Скрыть некоторые элементы при печати / PDF (Puppeteer учитывает @media print) */
    @media print {
        .no-print {
            display: none !important;
        }
    }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 18px;
            border-radius: 999px;
            border: 1px solid transparent;
            font-size: 0.95rem;
            cursor: pointer;
            background: transparent;
            color: inherit;
        }

        .btn-primary {
            background: linear-gradient(135deg, #4f46e5, #2563eb);
            color: white;
            box-shadow: 0 12px 25px rgba(37, 99, 235, 0.4);
        }

        .btn-primary:hover { filter: brightness(1.05); }

        .btn-outline {
            border-color: rgba(148, 163, 184, 0.6);
        }

        .btn-outline:hover {
            background-color: rgba(15, 23, 42, 0.9);
        }

        section { margin-bottom: 40px; }

        .section-title {
            font-size: 1.2rem;
            margin-bottom: 14px;
        }

        .section-subtitle {
            font-size: 0.9rem;
            color: var(--muted);
            margin-bottom: 14px;
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 18px;
        }

        .card {
            background: radial-gradient(circle at top left, #111827, #020617 55%);
            border-radius: var(--radius-xl);
            padding: 18px 18px 16px;
            border: 1px solid var(--border);
            box-shadow: 0 14px 30px rgba(15, 23, 42, 0.6);
            transition:
                transform 180ms ease-out,
                box-shadow 180ms ease-out,
                border-color 180ms ease-out,
                background 180ms ease-out;
            transform-origin: center;
        }

        /* эффект при наведении */
        .card:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 22px 45px rgba(15, 23, 42, 0.85);
            border-color: rgba(129, 140, 248, 0.8); /* мягкий фиолетовый */
            background: radial-gradient(circle at top left, #111827, #020617 45%);
        }

        .card img {
            transition: transform 200ms ease-out;
        }

        .card:hover img {
            transform: translateY(-2px) scale(1.03);
        }

/* === FULL BLOCK HOVER FOR EXPERIENCE === */

.experience-card {
    position: relative;
    transform-origin: center !important;
    transition: transform 0.35s ease, box-shadow 0.35s ease;
    will-change: transform;
    z-index: 1;
}

/* Поднимаем блок при наведении */
.experience-card:hover {
    transform: scale(1.03) !important;
    z-index: 999; /* выше всего */
    box-shadow: 0 25px 55px rgba(0, 0, 0, 0.55);
}

/* ВНУТРЕННИЕ элементы НЕ должны создавать transform-контексты */
.experience-card * {
    transform: none !important;
}

  /* === SKILLS CAROUSEL — ФИНАЛ === */

.skills-mask {
    width: 100%;
    overflow: hidden;
    position: relative;
    padding: 30px 0;
}

.skills-carousel {
    display: flex;
    gap: 20px;
    transition: transform 0.35s ease;
    will-change: transform;
}

.skill-card {
    width: 260px;
    min-width: 260px;
    background: #0f172a;
    border: 1px solid #1e293b;
    border-radius: 16px;
    padding: 18px 20px;
    transition: transform .25s, box-shadow .25s;
}

.skill-card:hover {
    transform: scale(1.10);
    z-index: 20;
    box-shadow: 0 20px 40px rgba(0,0,0,.6);
}

.skills-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: #1e293b;
    border: none;
    font-size: 22px;
    color: #fff;
    cursor: pointer;
    z-index: 50;
}

.skills-arrow.left {
left: -10px;
 }

.skills-arrow.right {
right: -10px;
}

/* --- PROJECT CARD IMAGE FIX --- */

/* Универсальный блок для всех твоих новых картинок 16:9 */
.project-image-wrapper {
    width: 100%;
    aspect-ratio: 1 / 1;
    border-radius: var(--radius-xl);
    overflow: hidden;
    background: #020617;
    margin-bottom: 12px;

    display: flex;
    align-items: center;
    justify-content: center;
}

/* Картинка занимает весь блок, но не выходит за рамки */
.project-image-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;     /* заполняет весь блок */
    transition: transform 180ms ease-out, opacity 180ms ease-out;
}

/* Hover-эффект */
.card:hover .project-image-wrapper img {
    transform: scale(1.04);
    opacity: 0.96;
}

/* --- ВЫРАВНИВАНИЕ ТЕКСТОВ — ОЧЕНЬ ВАЖНО --- */
.card .project-meta {
    min-height: 33px;               /* делаем одинаковую высоту блока текста */
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
}

.project-meta {
    font-size: 0.85rem;
    color: #9ca3af;
}

.project-meta p {
    display: -webkit-box;
    -webkit-line-clamp: 6;   /* максимум 6 строк */
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}


.collapsible-section {
    margin-top: 32px;
}

.collapsible-header {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0;
    border: 0;
    background: transparent;
    color: inherit;
    cursor: pointer;
}

.collapsible-icon {
    font-size: 1.2rem;
    color: #9ca3af;
    transition: transform 0.2s ease;
}

/* Поворот стрелки, когда свернуто */
.collapsible-section[data-collapsed="true"] .collapsible-icon {
    transform: rotate(90deg);
}

        footer {
            margin-top: 24px;
            font-size: 0.8rem;
            color: var(--muted);
            text-align: center;
        }

        @media (max-width: 820px) {
            header {
                flex-direction: column;
                align-items: flex-start;
            }
        }

    /* === Accordion Card === */
    .accordion-card {
        background: #0f172a;
        border: 1px solid #1e293b;
        border-radius: 16px;
        padding: 18px 22px;
        margin-bottom: 18px;
        transition: background 0.35s, transform 0.25s;
        cursor: pointer;
    }

    .accordion-card:hover {
        background: #1e293b;
        transform: translateY(-2px);
    }

    .accordion-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 1.2rem;
        font-weight: 600;
        color: #e2e8f0;
    }

    .accordion-arrow {
        transition: transform 0.3s ease;
        font-size: 1.5rem;
    }

    .accordion-body {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.35s ease;
        color: #cbd5e1;
        padding-right: 8px;
    }

    .accordion-body.open {
        padding-top: 14px;
    }

/* Hover-эффект для about (accordion-card) */
#about.accordion-card {
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

#about.accordion-card:hover {
    transform: scale(1.05);
    z-index: 20;
    box-shadow: 0 22px 45px rgba(15, 23, 42, 0.65);
}

/* --- Ограничение текста в карточках: максимум 4 строки + "..." --- */
.card .project-text {
    display: -webkit-box;
    -webkit-line-clamp: 4;        /* <= ГЛАВНОЕ: количество строк */
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    max-height: 6.8em;            /* под 4 строки */
}

/* --- HOVER EFFECT for ABOUT & EXPERIENCE blocks --- */

.about-card,
.experience-card {
    position: relative;
    transition: transform 0.35s ease, box-shadow 0.35s ease;
    transform-origin: center;
    z-index: 1;
}

/* Мощная ярко выраженная тень */
.about-card:hover,
.experience-card:hover {
    transform: scale(1.03);
    box-shadow:
        0 0 0 2px rgba(129, 140, 248, 0.35),      /* мягкая фиолетовая окантовка */
        0 22px 50px rgba(0, 0, 0, 0.8),           /* глубокая чёрная тень */
        0 12px 25px rgba(79, 70, 229, 0.25);      /* фиолетовое свечение */
    z-index: 50;
}

/* Чтобы внутренние элементы не ломали эффект */
.about-card *,
.experience-card * {
    transform: none !important;
}

/* ОБЩИЙ фикс — аккордеоны должны пропускать тень */
.accordion-card {
    overflow: visible !important;
    position: relative;
    transition: transform 0.25s ease, box-shadow 0.35s ease;
    overflow: hidden;
}

/* Убираем скрытие внутри */
.accordion-body {
    max-height: 0;
    overflow: hidden;
    padding-top: 0 !important;
    transition:
        max-height 0.35s ease,
        padding 0.35s ease;
}

.accordion-body.open {
    overflow: visible;
}

/* --- ТЕНЬ + УВЕЛИЧЕНИЕ ПРИ НАВЕДЕНИИ (как на других аккордионах) --- */
.accordion-card:hover {
    transform: scale(1.03);
    box-shadow:
        0 0 0 2px rgba(129, 140, 248, 0.35),   /* фиолетовая мягкая рамка */
        0 22px 50px rgba(0, 0, 0, 0.85),       /* глубокая тень вниз */
        0 12px 25px rgba(79, 70, 229, 0.25);   /* фиолетовое свечение */
    z-index: 50;
}

.footer-social a:hover {
     opacity: 1;
     transform: scale(1.12);
 }

 .page-legal {
     max-width: 800px;
     margin: 40px auto 0;
     animation: fadeInUp 0.6s ease forwards;
     opacity: 0;
     transform: translateY(18px);
 }

 .page-legal-card {
     background: #0b1120;
     border-radius: 16px;
     border: 1px solid #1f2937;
     padding: 24px 26px 28px;
     box-shadow: 0 18px 40px rgba(15, 23, 42, 0.7);
 }

 @keyframes fadeInUp {
     0% { opacity: 0; transform: translateY(18px); }
     100% { opacity: 1; transform: translateY(0); }
 }

 .legal-back-btn {
     display: inline-block;
     margin-bottom: 22px;
     padding: 10px 16px;
     background: #1e293b;
     border-radius: 10px;
     color: #e5e7eb;
     border: 1px solid #334155;
     font-size: 0.9rem;
     transition: .25s;
 }

 .legal-back-btn:hover {
     background: #334155;
     transform: translateX(-3px);
 }

 .lang-switch {
     display: flex;
     gap: 12px;
     margin-bottom: 16px;
 }

 .lang-switch a {
     color: #9ca3af;
     font-weight: 500;
     font-size: 0.9rem;
     transition: .2s;
 }

 .lang-switch a:hover {
     color: #fff;
 }

 .legal-actions {
     margin-top: 24px;
     display: flex;
     flex-wrap: wrap;
     gap: 10px;
     justify-content: flex-end;
 }

 .legal-pdf-btn {
     padding: 8px 14px;
     border-radius: 999px;
     border: 1px solid #4b5563;
     background: #020617;
     color: #e5e7eb;
     font-size: 0.85rem;
     cursor: pointer;
     text-decoration: none;
     transition: .2s;
 }

 .legal-pdf-btn:hover {
     border-color: #818cf8;
     color: #fff;
 }


.social-icons {
    display: flex;
    align-items: center;
    gap: 14px;
}

/* контейнер под иконку — круг */
.social-icons a {
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #0f172a; /* тёмный круг */
    border-radius: 50%;
    transition:
        transform 0.28s ease,
        box-shadow 0.28s ease,
        background 0.28s ease,
        opacity 0.28s ease;
    opacity: 0.85;
}

/* сами SVG */
.social-icons a img {
    width: 20px;
    height: 20px;
    pointer-events: none;
}

/* hover эффект */
.social-icons a:hover {
    transform: scale(1.18);
    background: #1e293b; /* немного светлее фон */
    opacity: 1;
    box-shadow:
        0 0 10px rgba(129, 140, 248, 0.6),
        0 0 20px rgba(79, 70, 229, 0.45);
}

/* ---- ERROR INPUT ---- */
.input-error {
    border: 1px solid #f87171 !important;
    box-shadow: 0 0 0 2px rgba(248, 113, 113, 0.3);
}

/* ---- MAX LENGTH LABEL ---- */
.field-hint {
    margin-top: 4px;
    font-size: 0.75rem;
    color: #9ca3af;
}

.input-error {
    border: 1px solid #f87171 !important;
    box-shadow: 0 0 0 3px rgba(248,113,113,0.25);
}

/* ---- ERROR BUBBLE ---- */

.error-container {
    min-height: 22px;
    margin-top: 4px;
}

.error-bubble {
    display: inline-block;
    background: #fee2e2;
    color: #991b1b;
    padding: 6px 12px;
    font-size: 0.85rem;
    border-radius: 12px;
    border-left: 4px solid #ef4444;
    animation: fadeIn .2s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-4px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* ============================================================
   SUCCESS INPUT STATE — зелёная рамка (валидный ввод)
   ============================================================ */
.input-success {
    border: 1px solid #4ade80 !important;              /* зелёная рамка */
    box-shadow: 0 0 0 3px rgba(74, 222, 128, 0.25);    /* мягкое свечение */
    transition: border 0.25s ease, box-shadow 0.25s ease;
}


/* ============================================================
   ERROR BUBBLE — улучшенная анимация (как iOS)
   ============================================================ */
.error-bubble {
    display: inline-block;
    background: #fee2e2;
    color: #991b1b;
    padding: 6px 12px;
    font-size: 0.85rem;
    border-radius: 14px;
    border-left: 4px solid #ef4444;
    animation: bubbleIn 0.32s cubic-bezier(0.16, 1, 0.3, 1);
    transform-origin: left top;
}

@keyframes bubbleIn {
    0% {
        opacity: 0;
        transform: translateY(-6px) scale(0.92);
    }
    60% {
        opacity: 1;
        transform: translateY(0) scale(1.03);
    }
    100% {
        transform: scale(1);
    }
}


/* ============================================================
   CHAR COUNTERS — для всех input/textarea
   ============================================================ */
.char-counter {
    font-size: 0.72rem;
    margin-top: 3px;
    text-align: right;
    color: #6b7280;
    opacity: 0.85;
}

.char-counter strong {
    color: #e5e7eb; /* белые цифры */
}


/* ============================================================
   FIELD GROUP — универсальный контейнер
   ============================================================ */
.form-group {
    margin-bottom: 18px;
}

.error-container {
    min-height: 24px;
    margin-top: 4px;
}


/* ============================================================
   SPECIAL FIX — при ошибке игнорировать success-рамку
   ============================================================ */
.input-error.input-success {
    border: 1px solid #f87171 !important;
    box-shadow: 0 0 0 3px rgba(248,113,113,0.25) !important;
}

/* ============================================================
   FIX: уменьшение расстояний между полями формы
   ============================================================ */

.form-group {
    margin-bottom: 5px !important; /* было 18 — теперь аккуратнее */
}

.field-hint {
    margin-top: 2px !important;     /* было 4 — теперь плотнее */
}

.error-container {
    min-height: 18px !important;    /* было 22/24 — формирует компактный вид */
    margin-top: 2px !important;
}

.char-counter {
    margin-top: 2px !important;     /* было 3 — уменьшено */
    font-size: 0.72rem !important;
}

/* рамки success и error не трогаем — они нормальные */
.input-success {
    border: 1px solid #4ade80 !important;
    box-shadow: 0 0 0 3px rgba(74, 222, 128, 0.25);
}

.input-error {
    border: 1px solid #f87171 !important;
    box-shadow: 0 0 0 3px rgba(248,113,113,0.25);
}

/* уменьшить пузырь ошибки */
.error-bubble {
    padding: 5px 10px !important;
    font-size: 0.8rem !important;
    border-radius: 10px !important;
}

/* чтобы success не перекрывался error */
.input-error.input-success {
    border: 1px solid #f87171 !important;
    box-shadow: 0 0 0 3px rgba(248,113,113,0.25) !important;
}

/* =========================================================
   ЕДИНЫЙ СТИЛЬ ЯЗЫКОВОГО ПЕРЕКЛЮЧАТЕЛЯ (для header и legal)
   ========================================================= */

.lang-switch a,
.locale-switch a {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    padding: 6px 10px;
    border-radius: 999px;

    border: 1px solid transparent;
    color: #9ca3af;
    font-weight: 400;
    font-size: 0.9rem;

    transition:
        border-color .18s ease,
        color .18s ease,
        transform .18s ease;
}

/* hover — кружок и движение */
.lang-switch a:hover,
.locale-switch a:hover {
    border-color: rgba(148,163,184,0.4);
    color: #f9fafb;
    transform: translateY(-1px);
}

/* активный язык — кружок */
.lang-switch a.active,
.locale-switch a.active {
    border-color: rgba(148,163,184,0.4);
    color: #e5e7eb;
    font-weight: 600;
}

/* отключить border у active, если hover НЕ на нём */
/* работает и в header и на legal страницах */
.locale-switch:hover a.active:not(:hover),
.lang-switch:hover a.active:not(:hover) {
    border-color: transparent !important;
}

.main-nav {
    display: flex;
    gap: 22px;
    align-items: center;
}

.nav-link {
    padding: 6px 14px;
    border-radius: 999px;
    transition: .25s;
}

.nav-link.active {
    border: 1px solid #fff;
}

.nav-link:hover {
    border: 1px solid #4f46e5;
}





/* ============================================================
   EXTRA RESPONSIVE TWEAKS (mobile & tablet)
   ============================================================ */
@media (max-width: 768px) {
    .page {
        padding: 20px 14px 40px;
    }

    /* Одноколоночная сетка проектов на узких экранах */
    .card-grid {
        grid-template-columns: minmax(0, 1fr);
    }

    /* Заголовки и подзаголовки чуть меньше, чтобы влезал текст */
    .section-title {
        font-size: 1.08rem;
    }

    .section-subtitle {
        font-size: 0.86rem;
    }

    /* Слайдер навыков — каждая карточка на всю ширину */
    .skills-mask {
        padding: 18px 0;
    }

    .skill-card {
        min-width: 100%;
    }

    .skills-arrow.left {
        left: 4px;
    }

    .skills-arrow.right {
        right: 4px;
    }
}

@media (max-width: 600px) {
    /* Модальные окна контактов и отзывов — адаптация под мобильные */
    #contactModalBox,
    #reviewModalBox {
        width: calc(100% - 32px) !important;
        max-height: calc(100vh - 40px);
        overflow-y: auto;
        padding: 20px !important;
    }

    /* Чуть компактнее карточки проектов */
    .project-card {
        padding: 16px;
    }
}

@media (max-width: 480px) {
    /* Хедер — компактнее логотип и отступы */
    .site-header .header-inner {
        padding-inline: 14px;
    }

    .logo {
        font-size: 0.84rem;
    }
}

/* ============================= */
/*   MOBILE HEADER ( <768px )   */
/* ============================= */

@media (max-width: 767px) {

    #siteHeader {
        border-radius: 26px;
        padding: 10px 0;
        background: rgba(8, 15, 29, 0.95);
        backdrop-filter: blur(12px);
    }

    .header-inner {
        width: 100%;
        max-width: 360px;
        display: grid;
        grid-template-columns: 32px 1fr auto;
        align-items: center;
        gap: 10px;
        position: relative;
    }

    .burger {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 4px;
        width: 28px;
        height: 24px;
        background: none;
        border: none;
        padding: 0;
        cursor: pointer;
    }

    .burger span {
        width: 22px;
        height: 2px;
        background: #fff;
        border-radius: 2px;
    }

    .logo {
        text-align: center;
        font-size: 0.85rem;
        white-space: nowrap;
    }

    .locale-switch {
        display: flex;
        flex-direction: column;
        gap: 2px;
        text-align: right;
        font-size: 0.75rem;
    }

    .nav-list {
        position: absolute;
        top: calc(100% + 10px);
        right: 0;
        width: 150px;
        padding: 16px 18px;
        display: none;
        flex-direction: column;
        gap: 14px;

        border-radius: 20px;
        border: 1px solid #1f2937;
        background: rgba(8, 15, 29, 0.96);
        backdrop-filter: blur(12px);
        z-index: 9999;
    }

    .nav-list.show {
        display: flex;
    }
}


 /* ============================= */
 /*     DESKTOP HEADER (>=768px)  */
 /* ============================= */

 @media (min-width: 768px) {

     #siteHeader {
         position: fixed;
         top: 12px;
         left: 50%;
         transform: translateX(-50%);
         z-index: 9999;
         opacity: 1 !important;
     }

     .burger {
         display: none !important;
     }

     #miniHeader {
         display: none !important;
     }

     .header-inner {
         display: grid !important;
         grid-template-columns: auto 1fr auto !important;
         align-items: center;
         gap: 32px;
         width: 100%;
     }

     .logo {
         text-align: left !important;
         font-size: 0.9rem;
         justify-self: left;
     }

     .nav-list {
         display: flex !important;
         position: static !important;
         flex-direction: row !important;
         gap: 24px;
         background: none !important;
         border: none !important;
         padding: 0 !important;
     }

     #mainNav {
         justify-self: center !important;
     }

     .locale-switch {
         display: flex !important;
         flex-direction: row !important;
         gap: 12px;
         justify-content: flex-end;
     }
 }




/* MOBILE — 1 column */
.projects-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 26px;
}

/* TABLET — 2 columns */
@media (min-width: 600px) {
    .projects-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* DESKTOP — 3 columns */
@media (min-width: 992px) {
    .projects-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

/* ВАЖНО — карточка никогда не должна быть grid-контейнером */
.card.project-card {
    display: block !important;
}




/* Мини панель со стрелкой — iOS стиль */
.mini-header {
    position: fixed;
    top: 12px;                 /* чуть ниже края */
    left: 50%;
    transform: translateX(-50%);

    width: auto;
    padding: 8px 18px;

    background: rgba(255, 255, 255, 0.08); /* светлее текущего фона */
    backdrop-filter: blur(14px);

    border-radius: 20px;       /* капсула */
    border: 1px solid rgba(255, 255, 255, 0.12);

    box-shadow: 0 4px 18px rgba(0, 0, 0, 0.35);

    display: flex;
    justify-content: center;
    align-items: center;

    opacity: 0;
    pointer-events: none;
    transition: opacity 0.25s ease, transform 0.25s ease;
    z-index: 99999;
}

/* Показываем панель */
.mini-header.show {
    opacity: 1;
    pointer-events: auto;
    transform: translateX(-50%) translateY(0);
}

.mini-arrow {
    font-size: 22px;
    color: #ffffff;
    cursor: pointer;
    user-select: none;
    transition: transform 0.2s ease;
}

.mini-arrow:hover {
    transform: translateY(2px);
}




















</style>
