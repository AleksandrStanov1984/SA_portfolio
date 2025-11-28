<div class="locale-switch">

    @php
        $current = $locale ?? app()->getLocale();
        $route = $routeName ?? Route::currentRouteName();
    @endphp

    <a href="{{ route($route, ['locale' => 'de']) }}"
       class="locale-link {{ $current === 'de' ? 'active' : '' }}">
        DE
    </a>

    <a href="{{ route($route, ['locale' => 'en']) }}"
       class="locale-link {{ $current === 'en' ? 'active' : '' }}">
        EN
    </a>

    <a href="{{ route($route, ['locale' => 'ru']) }}"
       class="locale-link {{ $current === 'ru' ? 'active' : '' }}">
        RU
    </a>

</div>
