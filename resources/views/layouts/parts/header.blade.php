<header>
    <div class="logo">O. STANOV · PORTFOLIO</div>

    <nav style="display:flex;align-items:center;gap:16px;flex-wrap:wrap;">

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


   {{-- Языковой переключатель — ВНЕ nav --}}
   @php
       $currentLocale = $locale ?? app()->getLocale();
   @endphp

   <div class="locale-switch">
       <a href="{{ $switchLang('de') }}"
          class="{{ $currentLocale === 'de' ? 'active' : '' }}">
           DE
       </a>

       <a href="{{ $switchLang('en') }}"
          class="{{ $currentLocale === 'en' ? 'active' : '' }}">
           EN
       </a>

       <a href="{{ $switchLang('ru') }}"
          class="{{ $currentLocale === 'ru' ? 'active' : '' }}">
           RU
       </a>
   </div>
</header>
