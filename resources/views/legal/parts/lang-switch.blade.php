<div class="lang-switch">
    <a href="{{ route($routeName, ['locale' => 'de']) }}"
       style="{{ app()->getLocale() === 'de' ? 'color:#fff;font-weight:700;' : '' }}">DE</a>

    <a href="{{ route($routeName, ['locale' => 'en']) }}"
       style="{{ app()->getLocale() === 'en' ? 'color:#fff;font-weight:700;' : '' }}">EN</a>

    <a href="{{ route($routeName, ['locale' => 'ru']) }}"
       style="{{ app()->getLocale() === 'ru' ? 'color:#fff;font-weight:700;' : '' }}">RU</a>
</div>
