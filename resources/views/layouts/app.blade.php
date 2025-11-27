<!DOCTYPE html>
<html lang="{{ $locale ?? app()->getLocale() }}">
<head>
    @include('layouts.parts.head')
    @include('layouts.parts.css.styles')
</head>

<body>
    <div id="alertBar"
         style="
            position: fixed;
            top: 20px;
            left: -100%;
            width: calc(100% - 40px);
            margin: 0 20px;
            padding: 14px 20px;
            text-align: center;
            font-size: 1.05rem;
            font-weight: 600;
            color: #e5e7eb;
            z-index: 99999;
            transition: left 2s ease;
            backdrop-filter: blur(8px);
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.7);
            border-radius: 14px;  /* ← Скругление */
         ">
    </div>


<div class="page">

    @include('layouts.parts.header')

    @yield('content')

    @include('layouts.parts.footer-legal')

</div>

@include('layouts.parts.scripts.scripts')

</body>
</html>
