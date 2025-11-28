<!DOCTYPE html>
<html lang="{{ $locale ?? app()->getLocale() }}">
<head>
    @include('layouts.parts.head')
    @include('layouts.parts.css.styles')
</head>

<body>
<div class="page">

    {{-- только контент, без хедера --}}
    @yield('content')

    {{-- нижний футер оставляем --}}
    @include('layouts.parts.footer-legal')

</div>

@include('layouts.parts.scripts.scripts')

</body>
</html>
