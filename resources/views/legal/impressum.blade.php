@extends('layouts.app')

@section('title', __('portfolio.legal_title_impressum'))

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

        {{-- Переключатель языков --}}
        <div class="lang-switch">
            <a href="{{ route('impressum', ['locale' => 'de']) }}"
               style="{{ app()->getLocale() === 'de' ? 'color:#fff;font-weight:700;' : '' }}">DE</a>
            <a href="{{ route('impressum', ['locale' => 'en']) }}"
               style="{{ app()->getLocale() === 'en' ? 'color:#fff;font-weight:700;' : '' }}">EN</a>
            <a href="{{ route('impressum', ['locale' => 'ru']) }}"
               style="{{ app()->getLocale() === 'ru' ? 'color:#fff;font-weight:700;' : '' }}">RU</a>
        </div>

        <h1 class="section-title">
            {{ __('portfolio.legal_title_impressum') }}
        </h1>
        <p class="section-subtitle">
            {{ __('portfolio.legal_intro_impressum') }}
        </p>

        <div style="margin-top:24px;color:#cbd5e1;">
            <h3>{{ __('portfolio.legal_company') }}</h3>
            <p>{{ __('portfolio.legal_name') }}<br>{{ __('portfolio.legal_address') }}</p>

            <h3 style="margin-top:20px;">{{ __('portfolio.legal_contact') }}</h3>
            <p>
                {{ __('portfolio.legal_email') }}: aleksstanov84@gmail.com<br>
                {{ __('portfolio.legal_phone') }}: +49 173 5141827
            </p>

            <h3 style="margin-top:20px;">{{ __('portfolio.legal_disclaimer') }}</h3>
            <p>{{ __('portfolio.legal_disclaimer_text') }}</p>
        </div>

        <div class="legal-actions">
            <a href="{{ route('impressum.pdf', ['locale' => app()->getLocale()]) }}"
               class="legal-pdf-btn">
                @lang('portfolio.legal_pdf_download')
            </a>
        </div>
    </div>
</div>
@endsection
