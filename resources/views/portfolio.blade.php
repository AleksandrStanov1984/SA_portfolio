{{-- resources/views/portfolio.blade.php --}}
@extends('layout')

@section('title', 'Oleksandr Stanov – Full Stack & .NET Developer')

@section('content')
    {{-- HERO --}}
    <section class="hero" style="
        display:grid;
        grid-template-columns:minmax(0,2.2fr) minmax(0,1.4fr);
        gap:32px;
        align-items:center;
        margin-bottom:56px;
    ">
        <div class="hero-text">
            <h1 style="font-size:clamp(2.3rem,4vw,3rem);line-height:1.1;margin-bottom:16px;">
                <span style="background:linear-gradient(120deg,#a855f7,#4f46e5,#22c55e);
                             -webkit-background-clip:text;color:transparent;">
                    Oleksandr Stanov
                </span><br/>
                {{ __('portfolio.hero_title') }}
            </h1>
            <p style="font-size:1.05rem;color:#9ca3af;margin-bottom:18px;">
                {{ __('portfolio.hero_subtitle') }}
            </p>
            <div style="display:flex;flex-wrap:wrap;gap:8px;margin-bottom:22px;">
                <span class="tag">Laravel · Vue.js · Shopware 5/6</span>
                <span class="tag">C#/.NET · Windows Forms</span>
                <span class="tag">C/C++ · Embedded · I²C · Modbus</span>
                <span class="tag">REST APIs · SQL · MongoDB</span>
            </div>
            <div style="display:flex;flex-wrap:wrap;gap:12px;">
                <a href="#contact" class="btn btn-primary">{{ __('portfolio.btn_contact') }}</a>
                <a href="{{ route('portfolio.pdf', ['locale' => $locale]) }}" class="btn btn-outline">
                    {{ __('portfolio.btn_pdf') }}
                </a>
            </div>
        </div>

        <div style="justify-self:center;">
            <div style="border-radius:999px;padding:5px;
                        background:conic-gradient(from 200deg,
                        rgba(79,70,229,0.9),rgba(8,47,73,0.5),
                        rgba(45,212,191,0.9),rgba(79,70,229,0.9));
                        box-shadow:0 18px 40px rgba(15,23,42,0.8);">
                <div style="border-radius:999px;padding:6px;
                            background:radial-gradient(circle at 20% 0,#111827,#020617);">
                    {{-- нейтральная картинка/аватар --}}
                    <img src="/img/panels/panel_1.png"
                         alt="Software Engineer"
                         style="width:210px;height:210px;border-radius:999px;object-fit:cover;display:block;">
                </div>
            </div>
        </div>
    </section>

    {{-- ABOUT --}}
    <section id="about">
        <h2 class="section-title">@lang('portfolio.about_title')</h2>
        <p class="section-subtitle">
            @lang('portfolio.about_subtitle')
        </p>
        <p>
            @lang('portfolio.about_text')
        </p>
    </section>

    {{-- SKILLS --}}
    <section id="skills">
        <h2 class="section-title">@lang('portfolio.skills_title')</h2>
        <p class="section-subtitle">
            @lang('portfolio.skills_subtitle')
        </p>

        <div class="card-grid">
            <div class="card">
                <h3>@lang('portfolio.skills_backend')</h3>
                <p>@lang('portfolio.skills_backend_text')</p>
            </div>
            <div class="card">
                <h3>@lang('portfolio.skills_frontend')</h3>
                <p>@lang('portfolio.skills_frontend_text')</p>
            </div>
            <div class="card">
                <h3>@lang('portfolio.skills_infra')</h3>
                <p>@lang('portfolio.skills_infra_text')</p>
            </div>
            <div class="card">
                <h3>@lang('portfolio.skills_embedded')</h3>
                <p>@lang('portfolio.skills_embedded_text')</p>
            </div>
            <div class="card">
                <h3>@lang('portfolio.skills_soft')</h3>
                <p>@lang('portfolio.skills_soft_text')</p>
            </div>
        </div>
    </section>

    {{-- PROJECTS --}}
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
                <p style="font-size:0.85rem;color:#9ca3af;">@lang('portfolio.proj_szua_meta')</p>
                <p>@lang('portfolio.proj_szua_desc')</p>
            </article>

            {{-- SOHONET --}}
            <article class="card">
                <img src="/img/cards/card_9.png" alt="API & Telco" style="width:100%;border-radius:1rem;margin-bottom:10px;">
                <h3>@lang('portfolio.proj_sohonet_title')</h3>
                <p style="font-size:0.85rem;color:#9ca3af;">@lang('portfolio.proj_sohonet_meta')</p>
                <p>@lang('portfolio.proj_sohonet_desc')</p>
            </article>

            {{-- arven.io --}}
            <article class="card">
                <img src="/img/cards/card_3.png" alt="Shopware" style="width:100%;border-radius:1rem;margin-bottom:10px;">
                <h3>@lang('portfolio.proj_arven_title')</h3>
                <p style="font-size:0.85rem;color:#9ca3af;">@lang('portfolio.proj_arven_meta')</p>
                <p>@lang('portfolio.proj_arven_desc')</p>
            </article>

            {{-- MRS --}}
            <article class="card">
                <img src="/img/cards/card_6.png" alt=".NET Testsystems" style="width:100%;border-radius:1rem;margin-bottom:10px;">
                <h3>@lang('portfolio.proj_mrs_title')</h3>
                <p style="font-size:0.85rem;color:#9ca3af;">@lang('portfolio.proj_mrs_meta')</p>
                <p>@lang('portfolio.proj_mrs_desc')</p>
            </article>

            {{-- ZEO --}}
            <article class="card">
                <img src="/img/cards/card_5.png" alt="ZEO Smart Controllers" style="width:100%;border-radius:1rem;margin-bottom:10px;">
                <h3>@lang('portfolio.proj_zeo_title')</h3>
                <p style="font-size:0.85rem;color:#9ca3af;">@lang('portfolio.proj_zeo_meta')</p>
                <p>@lang('portfolio.proj_zeo_desc')</p>
            </article>

            {{-- Creedle --}}
            <article class="card">
                <img src="/img/cards/card_7.png" alt="Creedle Eco Platform" style="width:100%;border-radius:1rem;margin-bottom:10px;">
                <h3>@lang('portfolio.proj_creedle_title')</h3>
                <p style="font-size:0.85rem;color:#9ca3af;">@lang('portfolio.proj_creedle_meta')</p>
                <p>@lang('portfolio.proj_creedle_desc')</p>
            </article>
        </div>
    </section>

    {{-- EXPERIENCE --}}
    <section id="experience">
        <h2 class="section-title">@lang('portfolio.experience_title')</h2>

        {{-- MRS --}}
        <div class="experience-item" style="padding:14px 0;border-bottom:1px solid #1f2937;">
            <div style="display:flex;justify-content:space-between;gap:8px;flex-wrap:wrap;">
                <div>
                    <div style="font-weight:600;">@lang('portfolio.exp_mrs_role')</div>
                    <div style="font-size:0.9rem;color:#9ca3af;">
                        @lang('portfolio.exp_mrs_company')
                    </div>
                </div>
                <div style="font-size:0.8rem;color:#9ca3af;">
                    @lang('portfolio.exp_mrs_period')
                </div>
            </div>
            <ul style="margin-left:18px;margin-top:4px;font-size:0.9rem;">
                <li>@lang('portfolio.exp_mrs_li1')</li>
                <li>@lang('portfolio.exp_mrs_li2')</li>
                <li>@lang('portfolio.exp_mrs_li3')</li>
                <li>@lang('portfolio.exp_mrs_li4')</li>
            </ul>
        </div>

        {{-- arven.io --}}
        <div class="experience-item" style="padding:14px 0;border-bottom:1px solid #1f2937;">
            <div style="display:flex;justify-content:space-between;gap:8px;flex-wrap:wrap;">
                <div>
                    <div style="font-weight:600;">@lang('portfolio.exp_arven_role')</div>
                    <div style="font-size:0.9rem;color:#9ca3af;">
                        @lang('portfolio.exp_arven_company')
                    </div>
                </div>
                <div style="font-size:0.8rem;color:#9ca3af;">
                    @lang('portfolio.exp_arven_period')
                </div>
            </div>
            <ul style="margin-left:18px;margin-top:4px;font-size:0.9rem;">
                <li>@lang('portfolio.exp_arven_li1')</li>
                <li>@lang('portfolio.exp_arven_li2')</li>
                <li>@lang('portfolio.exp_arven_li3')</li>
                <li>@lang('portfolio.exp_arven_li4')</li>
            </ul>
        </div>

        {{-- SOHONET --}}
        <div class="experience-item" style="padding:14px 0;border-bottom:1px solid #1f2937;">
            <div style="display:flex;justify-content:space-between;gap:8px;flex-wrap:wrap;">
                <div>
                    <div style="font-weight:600;">@lang('portfolio.exp_sohonet_role')</div>
                    <div style="font-size:0.9rem;color:#9ca3af;">
                        @lang('portfolio.exp_sohonet_company')
                    </div>
                </div>
                <div style="font-size:0.8rem;color:#9ca3af;">
                    @lang('portfolio.exp_sohonet_period')
                </div>
            </div>
            <ul style="margin-left:18px;margin-top:4px;font-size:0.9rem;">
                <li>@lang('portfolio.exp_sohonet_li1')</li>
                <li>@lang('portfolio.exp_sohonet_li2')</li>
                <li>@lang('portfolio.exp_sohonet_li3')</li>
                <li>@lang('portfolio.exp_sohonet_li4')</li>
            </ul>
        </div>

        {{-- SMARTZONE --}}
        <div class="experience-item" style="padding:14px 0;border-bottom:1px solid #1f2937;">
            <div style="display:flex;justify-content:space-between;gap:8px;flex-wrap:wrap;">
                <div>
                    <div style="font-weight:600;">@lang('portfolio.exp_szua_role')</div>
                    <div style="font-size:0.9rem;color:#9ca3af;">
                        @lang('portfolio.exp_szua_company')
                    </div>
                </div>
                <div style="font-size:0.8rem;color:#9ca3af;">
                    @lang('portfolio.exp_szua_period')
                </div>
            </div>
            <ul style="margin-left:18px;margin-top:4px;font-size:0.9rem;">
                <li>@lang('portfolio.exp_szua_li1')</li>
                <li>@lang('portfolio.exp_szua_li2')</li>
                <li>@lang('portfolio.exp_szua_li3')</li>
                <li>@lang('portfolio.exp_szua_li4')</li>
            </ul>
        </div>

        {{-- GRAIN CAPITAL --}}
        <div class="experience-item" style="padding:14px 0;border-bottom:1px solid #1f2937;">
            <div style="display:flex;justify-content:space-between;gap:8px;flex-wrap:wrap;">
                <div>
                    <div style="font-weight:600;">@lang('portfolio.exp_grain_role')</div>
                    <div style="font-size:0.9rem;color:#9ca3af;">
                        @lang('portfolio.exp_grain_company')
                    </div>
                </div>
                <div style="font-size:0.8rem;color:#9ca3af;">
                    @lang('portfolio.exp_grain_period')
                </div>
            </div>
            <ul style="margin-left:18px;margin-top:4px;font-size:0.9rem;">
                <li>@lang('portfolio.exp_grain_li1')</li>
                <li>@lang('portfolio.exp_grain_li2')</li>
                <li>@lang('portfolio.exp_grain_li3')</li>
                <li>@lang('portfolio.exp_grain_li4')</li>
            </ul>
        </div>
    </section>

    {{-- CONTACT --}}
    <section id="contact">
        <h2 class="section-title">@lang('portfolio.contact_title')</h2>
        <div class="card" style="display:grid;grid-template-columns:minmax(0,3fr) minmax(0,2fr);gap:18px;">
            <div>
                <h3 style="font-size:1.05rem;margin-bottom:8px;">
                    @lang('portfolio.contact_title')
                </h3>
                <p>
                    @lang('portfolio.contact_intro')
                </p>
            </div>
            <div style="font-size:0.9rem;">
                <div>
                    <strong>@lang('portfolio.location_label'):</strong>
                    78628 Rottweil, Baden-Württemberg
                </div>
                <div>
                    <strong>@lang('portfolio.email_label'):</strong>
                    <a href="mailto:aleksstanov84@gmail.com">aleksstanov84@gmail.com</a>
                </div>
                <div>
                    <strong>@lang('portfolio.phone_label'):</strong>
                    +49 173 5141827
                </div>
                <div>
                    <strong>@lang('portfolio.github_label'):</strong>
                    <a href="https://github.com/AleksandrStanov1984" target="_blank">
                        github.com/AleksandrStanov1984
                    </a>
                </div>
                <div>
                    <strong>@lang('portfolio.linkedin'):</strong>
                    <a href="https://www.linkedin.com/in/aleksandr-stanov-b21ab8181/" target="_blank">
                        @lang('portfolio.linkedin_profile')
                    </a>
                </div>

                <div style="font-size:0.8rem;color:#9ca3af;margin-top:6px;">
                    @lang('portfolio.preferred_languages'): @lang('portfolio.languages_list')
                </div>

            </div>
        </div>
    </section>
@endsection
