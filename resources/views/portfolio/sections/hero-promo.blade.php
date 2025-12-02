<section id="promo-banner" class="promo-banner-section">

    {{-- === 1 === --}}
    <a class="promo-banner-slide active" href="{{ route('promo.full-websites', ['locale' => $locale ?? app()->getLocale()]) }}">
        <div class="promo-banner-inner">
            <div class="promo-banner-image">
                <img src="/img/promo/websites.png" alt="">
            </div>
            <div class="promo-banner-text">
                <h1>{{ __('promo.full_websites_title') }}</h1>
                <p>{{ __('promo.full_websites_description') }}</p>
                <span class="promo-banner-cta">{{ __('portfolio.more') }} →</span>
            </div>
        </div>
    </a>

    {{-- === 2 === --}}
    <a class="promo-banner-slide" href="{{ route('promo.landing-pages', ['locale' => $locale ?? app()->getLocale()]) }}">
        <div class="promo-banner-inner">
            <div class="promo-banner-image">
                <img src="/img/promo/small-business-websites.png" alt="">
            </div>
            <div class="promo-banner-text">
                <h1>{{ __('promo.landing_pages_title') }}</h1>
                <p>{{ __('promo.landing_pages_description') }}</p>
                <span class="promo-banner-cta">{{ __('portfolio.more') }} →</span>
            </div>
        </div>
    </a>

    {{-- === 3 === --}}
    <a class="promo-banner-slide" href="{{ route('promo.promotions', ['locale' => $locale ?? app()->getLocale()]) }}">
        <div class="promo-banner-inner">
            <div class="promo-banner-image">
                <img src="/img/promo/promotions-special-offers.png" alt="">
            </div>
            <div class="promo-banner-text">
                <h1>{{ __('promo.promotions_title') }}</h1>
                <p>{{ __('promo.promotions_description') }}</p>
                <span class="promo-banner-cta">{{ __('portfolio.more') }} →</span>
            </div>
        </div>
    </a>

    {{-- === 4 === --}}
    <a class="promo-banner-slide" href="{{ route('promo.support', ['locale' => $locale ?? app()->getLocale()]) }}">
        <div class="promo-banner-inner">
            <div class="promo-banner-image">
                <img src="/img/promo/support.png" alt="">
            </div>
            <div class="promo-banner-text">
                <h1>{{ __('promo.support_title') }}</h1>
                <p>{{ __('promo.support_description') }}</p>
                <span class="promo-banner-cta">{{ __('portfolio.more') }} →</span>
            </div>
        </div>
    </a>

    {{-- === 5 === --}}
    <a class="promo-banner-slide" href="{{ route('promo.multilingual', ['locale' => $locale ?? app()->getLocale()]) }}">
        <div class="promo-banner-inner">
            <div class="promo-banner-image">
                <img src="/img/promo/multilingual.png" alt="">
            </div>
            <div class="promo-banner-text">
                <h1>{{ __('promo.multilingual_title') }}</h1>
                <p>{{ __('promo.multilingual_description') }}</p>
                <span class="promo-banner-cta">{{ __('portfolio.more') }} →</span>
            </div>
        </div>
    </a>

    {{-- === 6 === --}}
    <a class="promo-banner-slide" href="{{ route('promo.menu-price', ['locale' => $locale ?? app()->getLocale()]) }}">
        <div class="promo-banner-inner">
            <div class="promo-banner-image">
                <img src="/img/promo/menu-price-list.png" alt="">
            </div>
            <div class="promo-banner-text">
                <h1>{{ __('promo.menu_price_title') }}</h1>
                <p>{{ __('promo.menu_price_description') }}</p>
                <span class="promo-banner-cta">{{ __('portfolio.more') }} →</span>
            </div>
        </div>
    </a>

    {{-- === 7 === --}}
    <a class="promo-banner-slide" href="{{ route('promo.ecommerce', ['locale' => $locale ?? app()->getLocale()]) }}">
        <div class="promo-banner-inner">
            <div class="promo-banner-image">
                <img src="/img/promo/e-commerce-cms.png" alt="">
            </div>
            <div class="promo-banner-text">
                <h1>{{ __('promo.ecommerce_title') }}</h1>
                <p>{{ __('promo.ecommerce_description') }}</p>
                <span class="promo-banner-cta">{{ __('portfolio.more') }} →</span>
            </div>
        </div>
    </a>

    <div class="promo-banner-dots" id="promoBannerDots"></div>

</section>
