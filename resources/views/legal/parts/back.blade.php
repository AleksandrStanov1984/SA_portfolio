@php
    $backLocale = session('portfolio_start_locale', $locale ?? app()->getLocale());
@endphp

<a href="{{ route('portfolio', ['locale' => $backLocale]) }}"
   class="legal-back-btn"
   style="display:inline-block;padding:6px 14px;border-radius:8px;
          background:#1e293b;color:white;margin-bottom:14px;">
    ← @lang('portfolio.back')
</a>
