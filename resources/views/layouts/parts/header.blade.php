@php
    $currentLocale = $locale ?? app()->getLocale();
@endphp


<header id="siteHeader" class="site-header">

    <div class="header-inner">

        <!-- Бургер слева -->
        <button id="menuToggle" class="burger">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <!-- Лого по центру -->
        <div class="logo">
            O · STANOV · PORTFOLIO
        </div>

        <!-- Языки справа -->
        <div class="locale-switch">
            <a href="{{ $switchLang('de') }}" class="{{ $currentLocale === 'de' ? 'active' : '' }}">DE</a>
            <a href="{{ $switchLang('en') }}" class="{{ $currentLocale === 'en' ? 'active' : '' }}">EN</a>
            <a href="{{ $switchLang('ru') }}" class="{{ $currentLocale === 'ru' ? 'active' : '' }}">RU</a>
        </div>

        <!-- Навигация -->
        <nav id="mainNav" class="nav-list">
              <a href="{{ route('portfolio', ['locale'=>$locale]) }}#about"
                       class="nav-link">@lang('portfolio.nav_about')</a>

                    <a href="{{ route('portfolio', ['locale'=>$locale]) }}#skills"
                       class="nav-link">@lang('portfolio.nav_skills')</a>

                    <a href="{{ route('portfolio', ['locale'=>$locale]) }}#projects"
                       class="nav-link">@lang('portfolio.nav_projects')</a>

                    <a href="{{ route('portfolio', ['locale'=>$locale]) }}#experience"
                       class="nav-link">@lang('portfolio.nav_experience')</a>

                    <a href="{{ route('portfolio', ['locale'=>$locale]) }}#contact"
                       class="nav-link">@lang('portfolio.nav_contact')</a>
        </nav>

    </div>
</header>

<div id="miniHeader" class="mini-header">
    <div class="mini-arrow">⬇</div>
</div>


