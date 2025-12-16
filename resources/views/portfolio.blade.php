{{-- resources/views/portfolio.blade.php --}}

<style>
/* ============================= */
/*       HERO PROMO BANNER      */
/* ============================= */

#promo-banner {
    margin: 90px auto;
    padding: 0 20px;
    max-width: 1480px;
    position: relative;

    border-radius: 46px;
}

/* Скрыты по умолчанию */
.promo-banner-arrow {
    opacity: 0;
    pointer-events: none;
    transition: opacity .3s, background .25s;
}

.promo-banner-section {
    border-radius: 46px;  /* совпадает с внутренним */
    overflow: hidden;     /* чтобы рамка не торчала */
}

/* Показываем стрелки при наведении */
#promo-banner:hover .promo-banner-arrow {
    opacity: 1;
    pointer-events: auto;
}

/* ----- ARROWS ----- */

.promo-banner-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 50;

    width: 50px;
    height: 50px;

    background: rgba(15, 23, 42, 0.55);
    border: 1px solid rgba(79, 70, 229, 0.65);
    border-radius: 14px;

    color: white;
    font-size: 28px;
    line-height: 48px;
    text-align: center;

    cursor: pointer;
    backdrop-filter: blur(6px);
}

.promo-banner-arrow:hover {
    background: rgba(79, 70, 229, 0.9);
}

.promo-banner-arrow.left {
    left: -22px;
}

.promo-banner-arrow.right {
    right: -22px;
}

/* ----- SLIDES ----- */

.promo-banner-slide {
    display: none;
    text-decoration: none;
    color: inherit;
}

.promo-banner-slide.active {
    display: block;
}

/* ----- BANNER INNER ----- */

.promo-banner-inner {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 60px;
    padding: 60px 70px;

    border-radius: 46px;
    background: radial-gradient(circle at top, #ffffff0c, #00000030);
    box-shadow: 0 30px 70px rgba(0,0,0,0.40);

    position: relative;
    overflow: hidden;
}

/* ----- IMAGE ----- */

.promo-banner-image img {
    width: 480px;
    height: auto;
    filter: drop-shadow(0 25px 55px rgba(0,0,0,0.45));
    border-radius: 40px;
    overflow: hidden;
}

/* ----- TEXT ----- */

.promo-banner-text {
    max-width: 520px;
}

.promo-banner-text h1 {
    font-size: 2.6rem;
    margin-bottom: 14px;
}

.promo-banner-text p {
    font-size: 1.05rem;
    line-height: 1.55;
    color: #94a3b8;
}

/* ----- BUTTON ----- */

.promo-banner-cta {
    margin-top: 22px;
    display: inline-block;
    padding: 12px 26px;

    background: #4f46e5;
    border-radius: 999px;
    font-weight: 600;
    font-size: 1rem;
    color: #fff;

    transition: .25s;
}

.promo-banner-cta:hover {
    background: #4338ca;
}

/* ----- DOTS (ОДИН РАЗ, без дублей!) ----- */

.promo-banner-dots {
    margin-top: 30px;
    display: flex;
    justify-content: center;
    gap: 12px;
}

.promo-banner-dots span {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: #ffffff33;
    cursor: pointer;
    transition: background .25s, transform .25s;
}

.promo-banner-dots span.active {
    background: #fff;
    transform: scale(1.15);
}

/* ----- RESPONSIVE ----- */

@media (max-width: 980px) {

    .promo-banner-inner {
        flex-direction: column;
        text-align: center;
        padding: 40px 30px;
    }

    .promo-banner-image img {
        width: 330px;
    }

    .promo-banner-text h1 {
        font-size: 1.9rem;
    }

    .promo-banner-arrow.left {
        left: -10px;
    }
    .promo-banner-arrow.right {
        right: -10px;
    }
}


</style>





@extends('layouts.app')

@section('title', env('MY_NAME') . ' – Full Stack & .NET Developer')

@section('content')

    {{-- HERO --}}
    <section class="hero" style="
        display:grid;
        grid-template-columns:minmax(0,2.2fr) minmax(0,1.4fr);
        gap:32px;
        align-items:center;
        margin-bottom:56px;
    ">
        <div class="hero-text">
            <h1 style="font-size:clamp(2.3rem,4vw,3rem);line-height:1.1;margin-bottom:16px;">
                <span style="background:linear-gradient(120deg,#a855f7,#4f46e5,#22c55e);
                             -webkit-background-clip:text;color:transparent;">
                    {{ env('MY_NAME') }}
                </span><br/>
                {{ __('portfolio.hero_title') }}
            </h1>

            <p style="font-size:1.05rem;color:#9ca3af;margin-bottom:18px;">
                {{ __('portfolio.hero_subtitle') }}
            </p>

            <div style="display:flex;flex-wrap:wrap;gap:8px;margin-bottom:22px;">
                <span class="tag">Laravel · Vue.js · Shopware 5/6</span>
                <span class="tag">C#/.NET · Windows Forms</span>
                <span class="tag">C/C++ · Embedded · I²C · Modbus</span>
                <span class="tag">REST APIs · SQL · MongoDB</span>
            </div>

            <div style="display:flex;flex-wrap:wrap;gap:12px;">
                <a href="#contact" class="btn btn-primary">{{ __('portfolio.btn_contact') }}</a>

                <!-- <a href="{{ route('portfolio.pdf', ['locale' => $locale]) }}"
                   class="btn btn-outline">
                    {{ __('portfolio.btn_pdf') }}
                </a> -->
                <a href="#" class="btn btn-outline"> {{ __('portfolio.btn_pdf') }} </a>
            </div>
        </div>

        {{-- PHOTO --}}
        <div style="justify-self:center;">
            <div style="border-radius:999px;padding:5px;
                        background:conic-gradient(from 200deg,
                        rgba(79,70,229,0.9),rgba(8,47,73,0.5),
                        rgba(45,212,191,0.9),rgba(8,47,73,0.5));">
                <img src="/img/profile/oleksandr-stanov.jpg"
                     alt="{{ env('MY_NAME') }} "
                     style="width:230px;height:230px;border-radius:999px;
                     border:4px solid #020617;object-fit:cover;">
            </div>
        </div>
    </section>

<section id="promo-banner">

{{-- стрелки --}}
    <button id="promoPrev" class="promo-banner-arrow left">‹</button>
    <button id="promoNext" class="promo-banner-arrow right">›</button>

    <a class="promo-banner-slide active" href="{{ route('promo.full-websites', ['locale' => $locale]) }}">
        <div class="promo-banner-inner">
            <div class="promo-banner-image">
                <img src="/img/promo/websites.png" alt="">
            </div>
            <div class="promo-banner-text">
                <h1>{{ __('promo.full_websites_title') }}</h1>
                <p>{{ __('promo.full_websites_description') }}</p>
                <span class="promo-banner-cta">{{ __('portfolio.more') }}</span>
            </div>
        </div>
    </a>

    <a class="promo-banner-slide" href="{{ route('promo.landing-pages', ['locale' => $locale]) }}">
        <div class="promo-banner-inner">
            <div class="promo-banner-image">
                <img src="/img/promo/small-business-websites.png" alt="">
            </div>
            <div class="promo-banner-text">
                <h1>{{ __('promo.landing_pages_title') }}</h1>
                <p>{{ __('promo.landing_pages_description') }}</p>
                <span class="promo-banner-cta">{{ __('portfolio.more') }}</span>
            </div>
        </div>
    </a>

    <a class="promo-banner-slide" href="{{ route('promo.promotions', ['locale' => $locale]) }}">
        <div class="promo-banner-inner">
            <div class="promo-banner-image">
                <img src="/img/promo/promotions-special-offers.png" alt="">
            </div>
            <div class="promo-banner-text">
                <h1>{{ __('promo.promotions_title') }}</h1>
                <p>{{ __('promo.promotions_description') }}</p>
                <span class="promo-banner-cta">{{ __('portfolio.more') }}</span>
            </div>
        </div>
    </a>

    <a class="promo-banner-slide" href="{{ route('promo.support', ['locale' => $locale]) }}">
        <div class="promo-banner-inner">
            <div class="promo-banner-image">
                <img src="/img/promo/support.png" alt="">
            </div>
            <div class="promo-banner-text">
                <h1>{{ __('promo.support_title') }}</h1>
                <p>{{ __('promo.support_description') }}</p>
                <span class="promo-banner-cta">{{ __('portfolio.more') }}</span>
            </div>
        </div>
    </a>

    <a class="promo-banner-slide" href="{{ route('promo.multilingual', ['locale' => $locale]) }}">
        <div class="promo-banner-inner">
            <div class="promo-banner-image">
                <img src="/img/promo/multilingual.png" alt="">
            </div>
            <div class="promo-banner-text">
                <h1>{{ __('promo.multilingual_title') }}</h1>
                <p>{{ __('promo.multilingual_description') }}</p>
                <span class="promo-banner-cta">{{ __('portfolio.more') }}</span>
            </div>
        </div>
    </a>

    <a class="promo-banner-slide" href="{{ route('promo.menu-price', ['locale' => $locale]) }}">
        <div class="promo-banner-inner">
            <div class="promo-banner-image">
                <img src="/img/promo/menu-price-list.png" alt="">
            </div>
            <div class="promo-banner-text">
                <h1>{{ __('promo.menu_price_title') }}</h1>
                <p>{{ __('promo.menu_price_description') }}</p>
                <span class="promo-banner-cta">{{ __('portfolio.more') }}</span>
            </div>
        </div>
    </a>

    <a class="promo-banner-slide" href="{{ route('promo.ecommerce', ['locale' => $locale]) }}">
        <div class="promo-banner-inner">
            <div class="promo-banner-image">
                <img src="/img/promo/e-commerce-cms.png" alt="">
            </div>
            <div class="promo-banner-text">
                <h1>{{ __('promo.ecommerce_title') }}</h1>
                <p>{{ __('promo.ecommerce_description') }}</p>
                <span class="promo-banner-cta">{{ __('portfolio.more') }}</span>
            </div>
        </div>
    </a>

    <div class="promo-banner-dots" id="promoBannerDots"></div>

</section>




    {{-- ABOUT --}}
    @include('portfolio.sections.about')

    {{-- SKILLS --}}
    @include('portfolio.sections.skills')

    {{-- PROJECTS --}}
    <section id="projects">
        <h2 class="section-title">@lang('portfolio.projects_title')</h2>
        <p class="section-subtitle">@lang('portfolio.projects_subtitle')</p>

        @include('portfolio.sections.projects-grid')
        @include('portfolio.sections.project-modals')
    </section>

    {{-- EXPERIENCE --}}
    <section id="experience">
        @include('portfolio.sections.experience')
    </section>

    {{-- REVIEWS --}}
    <section id="reviews">
        @include('portfolio.modals.modal-reviews')

        <div class="accordion-card" id="reviewsAccordion">

            @include('portfolio.reviews.header')

            <div id="reviewsBody">
                @include('portfolio.sections.reviews-paginated')
            </div>

        </div>
    </section>

    {{-- CONTACT --}}
    @include('portfolio.sections.contact')

@endsection

{{-- POPUP --}}
<div id="toastSuccess"
     style="position:fixed;bottom:20px;right:20px;background:rgba(0,0,0,0.7);color:white;
            padding:12px 18px;border-radius:12px;border:1px solid rgba(255,255,255,0.15);
            opacity:0;pointer-events:none;transition:0.4s;z-index:99999;
            backdrop-filter:blur(6px);">
    ✔ Спасибо за отзыв!
</div>

@include('portfolio.reviews.scripts.script-reviews')


<script>
document.addEventListener('DOMContentLoaded', () => {

    const slides = document.querySelectorAll('.promo-banner-slide');
    const dotsContainer = document.getElementById('promoBannerDots');
    const btnPrev = document.getElementById('promoPrev');
    const btnNext = document.getElementById('promoNext');

    let index = 0;

    // генерируем точки только один раз
    slides.forEach((_, i) => {
        const dot = document.createElement('span');
        if (i === 0) dot.classList.add('active');
        dot.onclick = () => goTo(i);
        dotsContainer.appendChild(dot);
    });

    const dots = dotsContainer.querySelectorAll('span');

    function goTo(i) {
        slides[index].classList.remove('active');
        dots[index].classList.remove('active');

        index = i;

        slides[index].classList.add('active');
        dots[index].classList.add('active');
    }

    function next() {
        goTo((index + 1) % slides.length);
    }

    function prev() {
        goTo((index - 1 + slides.length) % slides.length);
    }

    btnNext.onclick = next;
    btnPrev.onclick = prev;

    setInterval(next, 7000);
});
</script>





