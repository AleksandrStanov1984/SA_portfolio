<section id="skills">
    <h2 class="section-title">@lang('portfolio.skills_title')</h2>
    <p class="section-subtitle">@lang('portfolio.skills_subtitle')</p>

    <div class="skills-mask">
        <button class="skills-arrow left" id="skills-prev">‹</button>

        <div class="skills-carousel" id="skills-carousel">
            <div class="skill-card">@include('portfolio.skills.backend')</div>
            <div class="skill-card">@include('portfolio.skills.frontend')</div>
            <div class="skill-card">@include('portfolio.skills.infrastructure')</div>
            <div class="skill-card">@include('portfolio.skills.embedded')</div>
            <div class="skill-card">@include('portfolio.skills.soft')</div>
        </div>

        <button class="skills-arrow right" id="skills-next">›</button>
    </div>
</section>
