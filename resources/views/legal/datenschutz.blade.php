@extends('layouts.app')

@section('title', __('portfolio.legal_title_privacy'))

@section('content')
<div class="page-legal">
    <div class="page-legal-card">

{{-- Кнопка назад --}}
       @php
           $backLocale = session('portfolio_start_locale', $locale);
       @endphp

       <a href="{{ route('portfolio', ['locale' => $backLocale]) }}"
          class="legal-back-btn"
          style="display:inline-block;padding:6px 14px;border-radius:8px;
                 background:#1e293b;color:white;margin-bottom:14px;">
           ← @lang('portfolio.back')
       </a>

        <div class="lang-switch">
            <a href="{{ route('datenschutz', ['locale' => 'de']) }}"
               style="{{ app()->getLocale() === 'de' ? 'color:#fff;font-weight:700;' : '' }}">DE</a>
            <a href="{{ route('datenschutz', ['locale' => 'en']) }}"
               style="{{ app()->getLocale() === 'en' ? 'color:#fff;font-weight:700;' : '' }}">EN</a>
            <a href="{{ route('datenschutz', ['locale' => 'ru']) }}"
               style="{{ app()->getLocale() === 'ru' ? 'color:#fff;font-weight:700;' : '' }}">RU</a>
        </div>

        <h1 class="section-title">
            {{ __('portfolio.legal_title_privacy') }}
        </h1>
        <p class="section-subtitle">
            {{ __('portfolio.legal_intro_privacy') }}
        </p>

        <div style="margin-top:24px;color:#cbd5e1;">
            <p>{{ __('portfolio.legal_privacy_text') }}</p>

            <h3 style="margin-top:20px;">{{ __('portfolio.legal_contact') }}</h3>
            <p>
                {{ __('portfolio.legal_name') }}<br>
                {{ __('portfolio.legal_address') }}<br>
                {{ __('portfolio.legal_email') }}: aleksstanov84@gmail.com
            </p>
        </div>

        <div class="legal-actions">
            <a href="{{ route('datenschutz.pdf', ['locale' => app()->getLocale()]) }}"
               class="legal-pdf-btn">
                @lang('portfolio.legal_pdf_download')
            </a>
        </div>
    </div>
</div>
@endsection
