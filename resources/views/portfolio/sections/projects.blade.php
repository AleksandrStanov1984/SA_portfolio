{{-- resources/views/portfolio/sections/projects.blade.php --}}
<section id="projects">
    <h2 class="section-title">@lang('portfolio.projects_title')</h2>

    <p class="section-subtitle">
        @lang('portfolio.projects_subtitle')
    </p>

    <div class="card-grid">

        {{-- SZ.UA --}}
        <article class="card">
            <img src="/img/cards/card_1.png" alt="E-Commerce" style="width:100%;border-radius:1rem;margin-bottom:10px;">
            <h3>@lang('portfolio.proj_szua_title')</h3>
            <p class="card-meta">@lang('portfolio.proj_szua_meta')</p>
            <p>@lang('portfolio.proj_szua_desc')</p>
        </article>

        {{-- SOHONET --}}
        <article class="card">
            <img src="/img/cards/card_9.png" alt="API & Telco" style="width:100%;border-radius:1rem;margin-bottom:10px;">
            <h3>@lang('portfolio.proj_sohonet_title')</h3>
            <p class="card-meta">@lang('portfolio.proj_sohonet_meta')</p>
            <p>@lang('portfolio.proj_sohonet_desc')</p>
        </article>

        {{-- arven.io --}}
        <article class="card">
            <img src="/img/cards/card_3.png" alt="Shopware" style="width:100%;border-radius:1rem;margin-bottom:10px;">
            <h3>@lang('portfolio.proj_arven_title')</h3>
            <p class="card-meta">@lang('portfolio.proj_arven_meta')</p>
            <p>@lang('portfolio.proj_arven_desc')</p>
        </article>

        {{-- MRS Electronic --}}
        <article class="card">
            <img src="/img/cards/card_6.png" alt=".NET Testsystems" style="width:100%;border-radius:1rem;margin-bottom:10px;">
            <h3>@lang('portfolio.proj_mrs_title')</h3>
            <p class="card-meta">@lang('portfolio.proj_mrs_meta')</p>
            <p>@lang('portfolio.proj_mrs_desc')</p>
        </article>

        {{-- ZEO --}}
        <article class="card">
            <img src="/img/cards/card_5.png" alt="ZEO Smart Controllers" style="width:100%;border-radius:1rem;margin-bottom:10px;">
            <h3>@lang('portfolio.proj_zeo_title')</h3>
            <p class="card-meta">@lang('portfolio.proj_zeo_meta')</p>
            <p>@lang('portfolio.proj_zeo_desc')</p>
        </article>

        {{-- Creedle --}}
        <article class="card">
            <img src="/img/cards/card_7.png" alt="Creedle Eco Platform" style="width:100%;border-radius:1rem;margin-bottom:10px;">
            <h3>@lang('portfolio.proj_creedle_title')</h3>
            <p class="card-meta">@lang('portfolio.proj_creedle_meta')</p>
            <p>@lang('portfolio.proj_creedle_desc')</p>
        </article>

    </div>
</section>
