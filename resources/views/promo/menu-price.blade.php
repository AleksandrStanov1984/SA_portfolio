@extends('layouts.app')

{{-- ======================== --}}
{{--          SEO             --}}
{{-- ======================== --}}

@section('title')
    {{ __('menu.seo_title') }}
@endsection

@section('meta_description')
    {{ __('menu.seo_description') }}
@endsection

@push('meta')
    {{-- Canonical --}}
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph --}}
    <meta property="og:title" content="{{ __('menu.seo_title') }}">
    <meta property="og:description" content="{{ __('menu.seo_description') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('/img/menu/og_preview.jpg') }}">
    <meta property="og:locale" content="{{ app()->getLocale() }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ __('menu.seo_title') }}">
    <meta name="twitter:description" content="{{ __('menu.seo_description') }}">
    <meta name="twitter:image" content="{{ asset('/img/menu/og_preview.jpg') }}">
@endpush

@section('content')

{{-- BACK BUTTON --}}
<a href="{{ route('portfolio', ['locale' => $locale]) }}" class="btn btn-primary">
    ← {{ __('portfolio.back') }}
</a>


{{-- ======================== --}}
{{--   ЯКОРНОЕ МЕНЮ           --}}
{{-- ======================== --}}
<nav class="pack-nav">
    <div class="promo-switch" style="display:flex; gap:16px; justify-content:center; margin-bottom:40px;">
        <a href="#premium" class="btn btn-outline btn-primary">Premium</a>
        <a href="#standard" class="btn btn-outline btn-primary">Standard</a>
        <a href="#basic" class="btn btn-outline btn-primary">Basic</a>
    </div>
</nav>

<style>
.pack-nav {
    display:flex;
    gap:22px;
    justify-content:center;
    margin:40px 0 60px;
}

/* чтобы на мобильных кнопки не вылезали */
.promo-switch {
    flex-wrap:wrap;
}

.pack-nav a {
    padding:10px 22px;
    border-radius:12px;
    background:#1f2937;
    color:white;
    text-decoration:none;
    transition:.25s;
}
.pack-nav a:hover {
    background:#4f46e5;
}

.pack-section {
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:60px;
    align-items:center;
    padding:80px 0;
}

.pack-img {
    border-radius:32px;
    overflow:hidden;
    box-shadow:0 18px 45px rgba(0,0,0,0.45);
}
.pack-img img { width:100%; display:block; }

.pack-text h2 { font-size:2.6rem; margin-bottom:16px; }
.pack-text p  { font-size:1.1rem; color:#9ca3af; margin-bottom:22px; }
.pack-text .btn {
    padding:12px 26px; background:#4f46e5; color:white;
    border-radius:999px; display:inline-block;
}

/* анимации появления */
.fade-up    { opacity:0; transform:translateY(40px); transition:1s; }
.fade-left  { opacity:0; transform:translateX(-60px); transition:1s; }
.fade-right { opacity:0; transform:translateX(60px);  transition:1s; }
.visible    { opacity:1!important; transform:translate(0,0)!important; }

.promo-back-btn {
    display:inline-block;
    padding:10px 18px;
    background:#1f2937;
    color:white;
    border-radius:10px;
    margin-bottom:20px;
    transition:.25s;
}
.promo-back-btn:hover { background:#4f46e5; }

/* --- Графики (слайдер) --- */
.grafik-slide {
    display:none;
    opacity:0;
    transition:opacity .6s ease;
}
.grafik-slide.active {
    display:block;
    opacity:1;
}

/* --- блок "что входит" --- */
.included-grid {
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:40px;
    max-width:1200px;
    margin:0 auto;
}

/* --- таблица сравнения --- */
.compare-wrapper {
    max-width:1100px;
    margin:0 auto;
    background:#0f1629;
    border-radius:22px;
    padding:20px 0;
    box-shadow:0 12px 35px rgba(0,0,0,0.45);
    overflow:hidden;
}
.compare-table {
    width:100%;
    border-collapse:collapse;
    color:#fff;
}
.compare-table tr:hover {
    background:#111827;
}
.compare-table th,
.compare-table td {
    padding:14px 18px;
}

/* бейджи для ✓ */
.badge-no {
    display:inline-block;
    padding:3px 10px;
    border-radius:999px;
    background:#475569;
    color:#e5e7eb;
    font-size:0.8rem;
}
.badge-mid {
    display:inline-block;
    padding:3px 10px;
    border-radius:999px;
    background:#fbbf24;
    color:#111827;
    font-size:0.8rem;
}
.badge-yes {
    display:inline-block;
    padding:3px 10px;
    border-radius:999px;
    background:#22c55e;
    color:#022c22;
    font-size:0.8rem;
}
.badge-yes2 {
    display:inline-block;
    padding:3px 10px;
    border-radius:999px;
    background:#22c55e;
    color:#022c22;
    font-size:0.8rem;
    box-shadow:0 0 0 2px rgba(16,185,129,0.4);
}

/* --- адаптив --- */
@media (max-width: 1024px) {
    .pack-section {
        grid-template-columns:1fr;
        gap:32px;
        text-align:center;
    }
    .pack-img {
        max-width:600px;
        margin:0 auto;
    }
}

@media (max-width: 768px) {
    .included-grid {
        grid-template-columns:1fr;
        gap:24px;
        padding:0 16px;
    }

    .compare-wrapper {
        margin:0 12px;
    }

    /* таблица в горизонтальный скролл */
    .compare-wrapper {
        overflow-x:auto;
    }
    .compare-table {
        min-width:620px;
    }
}

/* === ANALYTICS SLIDER (графики) === */

.analytics-wrapper {
    position: relative;
    width: 100%;
    max-width: 510px; /* ширина под твои графики */
    aspect-ratio: 3 / 2; /* ГЛАВНОЕ: фиксирует высоту автоматически */
    border-radius: 22px;
    overflow: hidden;
    box-shadow: 0 18px 45px rgba(0,0,0,0.45);
    cursor: pointer;
}

.analytics-slide {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: contain;
    opacity: 0;
    transition: opacity .6s ease;
}

.analytics-slide.active {
    opacity: 1;
    z-index: 2;
}

/* Текстовый блок справа */
#analytics-title {
    font-size: 2rem;
    font-weight: 600;
    margin-bottom: 12px;
}

#analytics-desc {
    font-size: 1.1rem;
    color: #9ca3af;
    margin-bottom: 25px;
}

/* === ADAPTIVE === */
@media (max-width: 1024px) {
    .pack-section {
        grid-template-columns: 1fr;
        text-align: center;
    }

    .analytics-wrapper {
        margin: 0 auto 30px auto;
        max-width: 100%;
        aspect-ratio: 3/2;
    }
}

@media (max-width: 600px) {
    #analytics-title { font-size: 1.6rem; }
    #analytics-desc  { font-size: 1rem; }
}

/* ====== WHAT INCLUDED BLOCK — UPDATED ====== */

.included-section {
    padding: 60px 0 70px; /* уменьшил сверху/снизу */
}

.included-title {
    text-align: center;
    font-size: 2.4rem;
    margin-bottom: 35px; /* уменьшил */
}

.included-grid {
    max-width: 1200px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 28px; /* меньше расстояние */
    padding: 0 25px;
}

.included-card {
    background: #111827;
    border-radius: 18px;
    padding: 30px 26px;
    text-align: center;
    border: 1px solid rgba(255,255,255,0.05);
    box-shadow: 0 6px 18px rgba(0,0,0,0.34);
    transition: .25s ease;
    transform: scale(1);
}

.included-card:hover {
    transform: scale(1.025); /* +2.5% увеличение */
    border-color: #4f46e5;
    box-shadow: 0 10px 30px rgba(79,70,229,0.35);
    background: #131b2e;
}

.included-icon {
    font-size: 2.2rem;
    margin-bottom: 12px;
}

.included-card h3 {
    font-size: 1.35rem;
    margin-bottom: 12px;
}

.included-card p {
    font-size: 1rem;
    color: #9ca3af;
    line-height: 1.55;
}


/* ====== ADAPTIVE ====== */

@media(max-width: 1024px) {
    .included-grid {
        grid-template-columns: 1fr 1fr;
    }
}

@media(max-width: 650px) {
    .included-grid {
        grid-template-columns: 1fr;
    }

    .included-section {
        padding: 50px 0 55px;
    }

    .included-card {
        padding: 26px 22px;
    }
}

/* ====== HOVER EFFECT FOR ALL BIG SECTIONS ====== */
.pack-section {
    position: relative;
    backdrop-filter: blur(6px);
    border-radius: 28px;               /* скруглённые углы */
    padding: 60px 70px;                /* внутренние отступы */
    margin-bottom: 120px;              /* расстояние между секциями */

    transition: transform .28s ease, box-shadow .28s ease, background .3s ease;
    box-shadow: 0 10px 35px rgba(0,0,0,0.2);
}

/* Hover эффект */
.pack-section:hover {
    transform: scale(1.02);
    box-shadow: 0 25px 55px rgba(0,0,0,0.45);
    background: rgba(30, 38, 60, 0.85);
}

/* Скругление внутри (картинка не должна выпадать за рамки) */
.pack-img img {
    border-radius: 20px;
    transition: transform .35s ease;
}

.pack-section:hover .pack-img img {
    transform: scale(1.03);
}

/* Адаптив: на телефонах уменьшаем внутренние отступы */
@media (max-width: 768px) {
    .pack-section {
        padding: 35px 30px;
        border-radius: 22px;
    }
}

/* PREMIUM */
.premium-wrapper {
    position: relative;
    width: 100%;
    max-width: 520px;
    aspect-ratio: 3 / 2;
    border-radius: 22px;
    overflow: hidden;
    box-shadow: 0 18px 45px rgba(0,0,0,0.45);
}

.premium-slide {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: contain;
    opacity: 0;
    transition: opacity .6s ease;
}

.premium-slide.active {
    opacity: 1;
}

</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    /* анимации появления */
    const animated = document.querySelectorAll('.fade-up, .fade-left, .fade-right');
    function check() {
        animated.forEach(el => {
            const rect = el.getBoundingClientRect();
            if (rect.top < window.innerHeight - 80) {
                el.classList.add('visible');
            }
        });
    }
    window.addEventListener('scroll', check);
    check();

    /* авто-переключение графиков */
    const slides = document.querySelectorAll('.grafik-slide');
    if (slides.length > 0) {
        let index = 0;
        const show = (i) => {
            slides.forEach(s => s.classList.remove('active'));
            slides[i].classList.add('active');
        };
        show(index);
        setInterval(() => {
            index = (index + 1) % slides.length;
            show(index);
        }, 5000);
    }
});
</script>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const slides = document.querySelectorAll(".premium-slide");
    const title  = document.getElementById("premium-title");
    const desc   = document.getElementById("premium-desc");

    let index = 0;

    function showSlide(i) {
        slides.forEach(s => s.classList.remove("active"));
        slides[i].classList.add("active");

        title.textContent = slides[i].dataset.title;
        desc.textContent = slides[i].dataset.desc;
    }

    setInterval(() => {
        index = (index + 1) % slides.length;
        showSlide(index);
    }, 4000); // 8 секунд

    showSlide(0);
});
</script>



<script>
document.addEventListener("DOMContentLoaded", () => {

    const slides = document.querySelectorAll(".analytics-slide");
    const title  = document.getElementById("analytics-title");
    const desc   = document.getElementById("analytics-desc");

    let index = 0;

    // Заголовки + описания
    const titles = [
        "{{ __('menu.analytics_title_1') }}",
        "{{ __('menu.analytics_title_2') }}",
        "{{ __('menu.analytics_title_3') }}",
        "{{ __('menu.analytics_title_4') }}",
        "{{ __('menu.analytics_title_5') }}"
    ];

    const descriptions = [
        "{{ __('menu.analytics_desc_1') }}",
        "{{ __('menu.analytics_desc_2') }}",
        "{{ __('menu.analytics_desc_3') }}",
        "{{ __('menu.analytics_desc_4') }}",
        "{{ __('menu.analytics_desc_5') }}"
    ];

    function showSlide(i) {
        slides.forEach(el => el.classList.remove("active"));
        slides[i].classList.add("active");
        title.textContent = titles[i];
        desc.textContent = descriptions[i];
    }

    // Авто переключение
    setInterval(() => {
        index = (index + 1) % slides.length;
        showSlide(index);
    }, 8000);

    // Клик → следующий
    slides.forEach(s => s.addEventListener("click", () => {
        index = (index + 1) % slides.length;
        showSlide(index);
    }));

});
</script>

{{-- ======================== --}}
{{--   PREMIUM BLOCK (FINAL)  --}}
{{-- ======================== --}}
<section id="premium" class="pack-section" style="grid-template-columns:1fr 1fr;">

    {{-- ЛЕВАЯ ЧАСТЬ — текст меняется --}}
    <div class="pack-text fade-left">
        <h2 id="premium-title">{{ __('menu.premium_title') }}</h2>
        <p id="premium-desc">{{ __('menu.premium_desc') }}</p>
        <a class="btn" href="#contact">{{ __('menu.order_premium') }}</a>
    </div>

    {{-- ПРАВАЯ ЧАСТЬ — автослайдер --}}
    <div class="premium-wrapper fade-right">

        {{-- СЛАЙД 1 --}}
        <img src="/img/menu/premium/premium_main.jpg"
             class="premium-slide active"
             data-title="{{ __('menu.premium_title') }}"
             data-desc="{{ __('menu.premium_desc') }}"
             alt="Premium">

        {{-- СЛАЙД 2 --}}
        <img src="/img/menu/premium/premium_admin.jpg"
             class="premium-slide"
             data-title="{{ __('menu.premium_title_admin') }}"
             data-desc="{{ __('menu.premium_desc_admin') }}"
             alt="Admin">

    </div>
</section>


{{-- ======================== --}}
{{--   STANDARD BLOCK         --}}
{{-- ======================== --}}
<section id="standard" class="pack-section" style="grid-template-columns:1fr 1fr;">
    <div class="pack-img fade-left">
        <img src="/img/menu/standard/standard.jpg" alt="Standard Pack">
    </div>

    <div class="pack-text fade-right">
        <h2>{{ __('menu.standard_title') }}</h2>
        <p>{{ __('menu.standard_desc') }}</p>
        <a class="btn" href="#contact">{{ __('menu.order_standard') }}</a>
    </div>
</section>


{{-- ======================== --}}
{{--   BASIC BLOCK            --}}
{{-- ======================== --}}
<section id="basic" class="pack-section">
    <div class="pack-text fade-left">
        <h2>{{ __('menu.basic_title') }}</h2>
        <p>{{ __('menu.basic_desc') }}</p>
        <a class="btn" href="#contact">{{ __('menu.order_basic') }}</a>
    </div>

    <div class="pack-img fade-right">
        <img src="/img/menu/basic/basic.jpg" alt="Basic Pack">
    </div>
</section>


{{-- ======================== --}}
{{--    ANALYTICS BLOCK       --}}
{{-- ======================== --}}

<h2 style="text-align:center; font-size:2.4rem; margin-bottom:40px;">
        {{ __('menu.analytics_title') }}
    </h2>

<section id="analytics" class="pack-section" style="grid-template-columns:1fr 1fr;">

    {{-- Левая часть — график --}}
    <div class="fade-left analytics-wrapper" id="analyticsSlider">

        {{-- Слайды графиков --}}
        <img src="{{ asset('img/menu/grafiks/grafik-main.jpg') }}"
             alt="Analytics chart 1"
             class="analytics-slide active"
             id="slide-0">

        <img src="{{ asset('img/menu/grafiks/grafik-2.jpg') }}"
             alt="Analytics chart 2"
             class="analytics-slide"
             id="slide-1">

        <img src="{{ asset('img/menu/grafiks/grafik-3.jpg') }}"
             alt="Analytics chart 3"
             class="analytics-slide"
             id="slide-2">

        <img src="{{ asset('img/menu/grafiks/grafik-4.jpg') }}"
             alt="Analytics chart 4"
             class="analytics-slide"
             id="slide-3">

        <img src="{{ asset('img/menu/grafiks/grafik-5.jpg') }}"
             alt="Analytics chart 5"
             class="analytics-slide"
             id="slide-4">
    </div>

    {{-- Правая часть — текст, меняется по графику --}}
    <div class="pack-text fade-right">
        <h2 id="analytics-title">{{ __('menu.analytics_title_1') }}</h2>
        <p id="analytics-desc">{{ __('menu.analytics_desc_1') }}</p>
        <a class="btn" href="#contact">{{ __('menu.order_standard') }}</a>
    </div>
</section>




{{-- ======================== --}}
{{--  БЛОК «Что входит?»     --}}
{{-- ======================== --}}
<section class="included-section">
    <h2 class="included-title">
        {{ __('menu.what_included') }}
    </h2>

    <div class="included-grid">

        <div class="included-card fade-up">
            <div class="included-icon">📌</div>
            <h3>{{ __('menu.inc_design') }}</h3>
            <p>{{ __('menu.inc_design_text') }}</p>
        </div>

        <div class="included-card fade-up">
            <div class="included-icon">📋</div>
            <h3>{{ __('menu.inc_structure') }}</h3>
            <p>{{ __('menu.inc_structure_text') }}</p>
        </div>

        <div class="included-card fade-up">
            <div class="included-icon">📱</div>
            <h3>{{ __('menu.inc_formats') }}</h3>
            <p>{{ __('menu.inc_formats_text') }}</p>
        </div>

    </div>
</section>



{{-- ======================== --}}
{{--  СРАВНЕНИЕ ПАКЕТОВ      --}}
{{-- ======================== --}}
<section style="padding:100px 0;">
    <h2 style="text-align:center; font-size:2.4rem; margin-bottom:40px;">
        {{ __('menu.compare_title') }}
    </h2>

    <div class="compare-wrapper">
        <table class="compare-table">

            {{-- Header --}}
            <tr style="background:#111827;">
                <th style="font-weight:600; text-align:left;">
                    {{ __('menu.col_feature') }}
                </th>
                <th style="font-weight:600; text-align:center;">
                    {{ __('menu.col_basic') }}
                </th>
                <th style="font-weight:600; text-align:center;">
                    {{ __('menu.col_standard') }}
                </th>
                <th style="font-weight:600; text-align:center;">
                    {{ __('menu.col_premium') }}
                </th>
            </tr>

            {{-- Стиль --}}
            <tr>
                <td>{{ __('menu.row_style') }}</td>
                <td style="text-align:center;">{{ __('menu.basic_style') }}</td>
                <td style="text-align:center;">{{ __('menu.standard_style') }}</td>
                <td style="text-align:center;">{{ __('menu.premium_style') }}</td>
            </tr>

            {{-- Иконки --}}
            <tr>
                <td>{{ __('menu.row_icons') }}</td>
                <td style="text-align:center;">{{ __('menu.basic_icons') }}</td>
                <td style="text-align:center;">{{ __('menu.standard_icons') }}</td>
                <td style="text-align:center;">{{ __('menu.premium_icons') }}</td>
            </tr>

            {{-- Страницы --}}
            <tr>
                <td>{{ __('menu.row_pages') }}</td>
                <td style="text-align:center;">{{ __('menu.basic_pages') }}</td>
                <td style="text-align:center;">{{ __('menu.standard_pages') }}</td>
                <td style="text-align:center;">{{ __('menu.premium_pages') }}</td>
            </tr>

            {{-- Dashboards / графики --}}
            <tr>
                <td>{{ __('menu.row_dash') }}</td>
                <td style="text-align:center;"><span class="badge-no">—</span></td>
                <td style="text-align:center;"><span class="badge-mid">✓</span></td>
                <td style="text-align:center;"><span class="badge-yes">✓</span></td>
            </tr>

            {{-- Быстрая правка --}}
            <tr>
                <td>{{ __('menu.row_edit') }}</td>
                <td style="text-align:center;"><span class="badge-no">—</span></td>
                <td style="text-align:center;"><span class="badge-yes">✓</span></td>
                <td style="text-align:center;"><span class="badge-yes2">✓✓</span></td>
            </tr>

        </table>
    </div>
</section>



{{-- CONTACT --}}
@include('portfolio.sections.contact')

@endsection
