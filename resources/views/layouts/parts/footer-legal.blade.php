<div style="border-top:1px solid #1f2937;margin-top:40px;padding-top:22px;
            display:flex;flex-wrap:wrap;justify-content:space-between;align-items:center;
            gap:18px;font-size:0.88rem;color:#9ca3af;">

    {{-- LEFT --}}
    <div>
        © {{ date('Y') }} {{ env('MY_NAME') }}  — @lang('portfolio.footer_rights')
    </div>

    {{-- CENTER --}}
    <div class="social-icons">
        <a href="https://facebook.com"><img src="/img/icons/facebook.svg" alt=""></a>
        <a href="https://instagram.com"><img src="/img/icons/instagram.svg" alt=""></a>
        <a href="https://github.com/AleksandrStanov1984"><img src="/img/icons/github.svg" alt=""></a>
        <a href="https://linkedin.com/in/OleksandrStanov1984"><img src="/img/icons/linkedin.svg" alt=""></a>
        <a href="https://www.xing.com/profile/Oleksandr_Stanov/cv"><img src="/img/icons/xing.svg" alt=""></a>
        <a href="https://t.me/AleksandrStanov"><img src="/img/icons/telegram.svg" alt=""></a>
        <a href="https://wa.me/491735141827"><img src="/img/icons/whatsapp.svg" alt=""></a>
    </div>



    {{-- RIGHT --}}
    <div style="display:flex;gap:16px;">
        <a href="{{ route('impressum', ['locale' => app()->getLocale()]) }}"
           style="color:#e5e7eb;">
            @lang('portfolio.footer_impressum')
        </a>

        <a href="{{ route('datenschutz', ['locale' => app()->getLocale()]) }}"
           style="color:#e5e7eb;">
            @lang('portfolio.footer_privacy')
        </a>
    </div>

</div>
