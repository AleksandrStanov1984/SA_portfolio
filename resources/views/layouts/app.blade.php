<!DOCTYPE html>
<html lang="{{ $locale ?? app()->getLocale() }}">
<head>
    @include('layouts.parts.head')
    @include('layouts.parts.css.styles')
</head>

<body>
<div class="page">

    @include('layouts.parts.header')

    @yield('content')

    @include('layouts.parts.footer-legal')

</div>

@include('layouts.parts.scripts.scripts')

</body>
</html>
