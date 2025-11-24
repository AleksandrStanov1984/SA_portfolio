{{-- resources/views/layout.blade.php --}}
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Oleksandr Stanov – Portfolio')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Full Stack & .NET Developer mit Erfahrung in E-Commerce, Telekommunikation, Embedded und industriellen Testsystemen.">

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
        }

        a { color: inherit; text-decoration: none; }
        a:hover { text-decoration: underline; }

        .page {
            max-width: 1120px;
            margin: 0 auto;
            padding: 32px 20px 60px;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 40px;
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
            border-radius: 999px;
            border: 1px solid transparent;
        }

        nav a:hover {
            border-color: rgba(148, 163, 184, 0.4);
            text-decoration: none;
            color: #f9fafb;
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

    /* Обёртка для картинок проектов */
    .project-image-wrapper {
        width: 100%;
        aspect-ratio: 16 / 9;          /* одинаковая высота при любой ширине */
        border-radius: var(--radius-xl);
        overflow: hidden;
        background: #020617;
        margin-bottom: 12px;
    }

    /* Сама картинка внутри */
    .project-image-wrapper img {
        width: 100%;
        height: 100%;
        display: block;
        object-fit: cover;             /* аккуратно обрезает, без сплющивания */
        transform: scale(1.01);
        transition: transform 180ms ease-out, opacity 180ms ease-out;
    }

    /* Лёгкий эффект при наведении на карточку */
    .card:hover .project-image-wrapper img {
        transform: scale(1.04);
        opacity: 0.96;
    }

.project-image-wrapper {
    width: 100%;
    aspect-ratio: 16 / 9;
    border-radius: var(--radius-xl);
    overflow: hidden;
    background: #020617;
    margin-bottom: 10px;
}

.project-image-wrapper img {
    width: 100%;
    height: 100%;
    display: block;
    object-fit: cover;
    transform: scale(1.01);
    transition: transform 180ms ease-out, opacity 180ms ease-out;
}

.card:hover .project-image-wrapper img {
    transform: scale(1.04);
    opacity: 0.96;
}

.project-meta {
    font-size: 0.85rem;
    color: #9ca3af;
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
    </style>

<style>
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
</style>

</head>
<body>
<div class="page">
    <header>
        <div class="logo">O. STANOV · PORTFOLIO</div>
        <nav style="display:flex;align-items:center;gap:16px;flex-wrap:wrap;">
            <a href="#about">@lang('portfolio.nav_about')</a>
            <a href="#skills">@lang('portfolio.nav_skills')</a>
            <a href="#projects">@lang('portfolio.nav_projects')</a>
            <a href="#experience">@lang('portfolio.nav_experience')</a>
            <a href="#contact">@lang('portfolio.nav_contact')</a>

            {{-- переключатель языков --}}
            <span style="width:1px;height:18px;background:#374151;display:inline-block;"></span>
            @php
                $currentLocale = $locale ?? app()->getLocale();
            @endphp
            <a href="{{ route('portfolio', ['locale' => 'de']) }}"
               style="{{ $currentLocale === 'de' ? 'font-weight:600;color:#e5e7eb;' : '' }}">
                DE
            </a>
            <a href="{{ route('portfolio', ['locale' => 'en']) }}"
               style="{{ $currentLocale === 'en' ? 'font-weight:600;color:#e5e7eb;' : '' }}">
                EN
            </a>
            <a href="{{ route('portfolio', ['locale' => 'ru']) }}"
               style="{{ $currentLocale === 'ru' ? 'font-weight:600;color:#e5e7eb;' : '' }}">
                RU
            </a>
        </nav>
    </header>


    @yield('content')

    <footer style="margin-top:40px;padding:20px 0;text-align:center;
                   font-size:0.85rem;color:#6b7280;border-top:1px solid #1f2937;">
        © {{ date('Y') }} Oleksandr Stanov — All rights reserved.
    </footer>



</div>

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


</body>
</html>
