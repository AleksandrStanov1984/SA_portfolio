{{-- resources/views/portfolio.blade.php --}}
@extends('layouts.app')

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

                <a href="{{ route('portfolio.pdf', ['locale' => $locale]) }}"
                   class="btn btn-outline">
                    {{ __('portfolio.btn_pdf') }}
                </a>
            </div>
        </div>

        {{-- PHOTO --}}
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
        </div>
    </section>

    {{-- ABOUT --}}
    @include('portfolio.sections.about')

    {{-- SKILLS --}}
    @include('portfolio.sections.skills')

    {{-- EXPERIENCE --}}
    <section id="experience">
        @include('portfolio.sections.experience')
    </section>

    {{-- PROJECTS --}}
    <section id="projects">
        <h2 class="section-title">@lang('portfolio.projects_title')</h2>
        <p class="section-subtitle">@lang('portfolio.projects_subtitle')</p>

        @include('portfolio.sections.projects-grid')
        @include('portfolio.sections.project-modals')
    </section>

    {{-- REVIEWS --}}
    <section id="reviews">
        @include('portfolio.sections.reviews-paginated')
    </section>

    {{-- CONTACT --}}
    @include('portfolio.sections.contact')

@endsection

{{-- POPUP --}}
<div id="toastSuccess"
     style="position:fixed;bottom:20px;right:20px;background:rgba(0,0,0,0.7);color:white;
            padding:12px 18px;border-radius:12px;border:1px solid rgba(255,255,255,0.15);
            opacity:0;pointer-events:none;transition:0.4s;z-index:99999;
            backdrop-filter:blur(6px);">
    ✔ Спасибо за отзыв!
</div>

{{-- JS --}}
<script>
document.addEventListener("DOMContentLoaded", () => {

    const modal = document.getElementById("reviewModal");
    const modalBox = document.getElementById("reviewModalBox");
    const openBtn = document.getElementById("openReviewModal");
    const closeBtn = document.getElementById("closeModal");
    const form = document.getElementById("reviewForm");
    const toast = document.getElementById("toastSuccess");
    const list = document.querySelector(".reviews-list");

    /* OPEN MODAL */
    openBtn.onclick = () => {
        modal.style.display = "flex";
        setTimeout(() => modalBox.style.transform = "scale(1)", 10);
    };

    /* CLOSE MODAL */
    closeBtn.onclick = () => {
        modalBox.style.transform = "scale(0.92)";
        setTimeout(() => modal.style.display = "none", 200);
    };

    modal.onclick = e => {
        if (e.target === modal) {
            modalBox.style.transform = "scale(0.92)";
            setTimeout(() => modal.style.display = "none", 200);
        }
    };

    /* RATING */
    document.querySelectorAll(".star-btn-modal").forEach(btn => {
        btn.onclick = () => {
            const val = btn.dataset.value;
            document.getElementById("ratingModal").value = val;

            document.querySelectorAll(".star-btn-modal").forEach(b => {
                b.style.color = (b.dataset.value <= val ? "#facc15" : "#475569");
            });
        };
    });

    /* AJAX SUBMIT */
    form.onsubmit = async e => {
        e.preventDefault();

        const data = new FormData(form);
        const res = await fetch(form.action, {
            method: "POST",
            body: data,
            headers: { "X-Requested-With": "XMLHttpRequest" }
        });

        const json = await res.json();

        if (json.review) {
            const r = json.review;

            const el = document.createElement("div");
            el.className = "review-card";
            el.style = "background:#0f172a;border:1px solid #1e293b;border-radius:12px;padding:14px 18px;margin-bottom:10px;";

            el.innerHTML = `
                <div style="display:flex;justify-content:space-between;align-items:center;">
                    <span style="font-weight:600;color:white;">${r.name ?? 'Anonymous'}</span>
                    <span>${"★".repeat(r.rating).replace(/★/g,'<span style=\"color:#facc15\">★</span>')}</span>
                </div>
                <p style="color:#cbd5e1;margin-top:6px;">${r.comment}</p>
            `;

            list.prepend(el);

            modalBox.style.transform = "scale(0.92)";
            setTimeout(() => modal.style.display = "none", 200);

            toast.style.opacity = "1";
            setTimeout(() => toast.style.opacity = "0", 2000);

            form.reset();
        }
    };
});
</script>


