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

        {{-- Фото --}}
        <div style="justify-self:center;">
            <div style="border-radius:999px;padding:5px;
                        background:conic-gradient(from 200deg,
                        rgba(79,70,229,0.9),rgba(8,47,73,0.5),
                        rgba(45,212,191,0.9),rgba(8,47,73,0.5));">
                <img src="/img/profile/oleksandr-stanov.jpg"
                     alt="Oleksandr Stanov"
                     style="width:230px;height:230px;border-radius:999px;
                     border:4px solid #020617;object-fit:cover;">
        </div>
    </section>

    {{-- ABOUT --}}
    @include('portfolio.sections.about')

    {{-- SKILLS --}}
    @include('portfolio.sections.skills')

    {{-- PROJECTS --}}
    <section id="projects">
        <h2 class="section-title">@lang('portfolio.projects_title')</h2>
        <p class="section-subtitle">@lang('portfolio.projects_subtitle')</p>

        {{-- карточки проектов --}}
        @include('portfolio.sections.projects-grid')

        {{-- модалки проектов --}}
        @include('portfolio.sections.project-modals')
    </section>

    {{-- EXPERIENCE --}}
    <section id="experience">
        <h2 class="section-title">@lang('portfolio.experience_title')</h2>
        @include('portfolio.sections.experience')
    </section>

    {{-- REVIEWS --}}
    <section id="reviews">
        <h2 class="section-title">@lang('portfolio.reviews_title')</h2>
        @include('portfolio.sections.reviews')
    </section>

    {{-- CONTACT --}}
    @include('portfolio.sections.contact')

@endsection
