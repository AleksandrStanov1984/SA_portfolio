<header>
    <div class="logo">O. STANOV · PORTFOLIO</div>

    <nav style="display:flex;align-items:center;gap:16px;flex-wrap:wrap;">

        <a href="#about">@lang('portfolio.nav_about')</a>
        <a href="#skills">@lang('portfolio.nav_skills')</a>
        <a href="#projects">@lang('portfolio.nav_projects')</a>
        <a href="#experience">@lang('portfolio.nav_experience')</a>
        <a href="#contact">@lang('portfolio.nav_contact')</a>

        <span style="width:1px;height:18px;background:#374151;display:inline-block;"></span>

        @php $currentLocale = $locale ?? app()->getLocale(); @endphp

        <a href="{{ route('portfolio',['locale'=>'de']) }}"
           style="{{ $currentLocale==='de'?'font-weight:600;color:#e5e7eb;':'' }}">
            DE
        </a>
        <a href="{{ route('portfolio',['locale'=>'en']) }}"
           style="{{ $currentLocale==='en'?'font-weight:600;color:#e5e7eb;':'' }}">
            EN
        </a>
        <a href="{{ route('portfolio',['locale'=>'ru']) }}"
           style="{{ $currentLocale==='ru'?'font-weight:600;color:#e5e7eb;':'' }}">
            RU
        </a>
    </nav>
</header>
