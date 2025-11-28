<header>
    <div class="logo">O. STANOV · PORTFOLIO</div>

    <nav style="display:flex;align-items:center;gap:16px;flex-wrap:wrap;">

        <a href="#about">@lang('portfolio.nav_about')</a>
        <a href="#skills">@lang('portfolio.nav_skills')</a>
        <a href="#projects">@lang('portfolio.nav_projects')</a>
        <a href="#experience">@lang('portfolio.nav_experience')</a>
        <a href="#contact">@lang('portfolio.nav_contact')</a>

    </nav>

    {{-- Языковой переключатель — ВНЕ nav --}}
    @php $currentLocale = $locale ?? app()->getLocale(); @endphp

    <div class="locale-switch">
        <a href="{{ route('portfolio',['locale'=>'de']) }}"
           class="{{ $currentLocale==='de' ? 'active' : '' }}">
            DE
        </a>

        <a href="{{ route('portfolio',['locale'=>'en']) }}"
           class="{{ $currentLocale==='en' ? 'active' : '' }}">
            EN
        </a>

        <a href="{{ route('portfolio',['locale'=>'ru']) }}"
           class="{{ $currentLocale==='ru' ? 'active' : '' }}">
            RU
        </a>
    </div>
</header>
