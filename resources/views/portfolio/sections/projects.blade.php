<section id="projects">
    <h2 class="section-title">@lang('portfolio.projects_title')</h2>

    <p class="section-subtitle">
        @lang('portfolio.projects_subtitle')
    </p>

    <div class="card-grid">

        @include('portfolio.projects.szua')
        @include('portfolio.projects.sohonet')
        @include('portfolio.projects.arven')
        @include('portfolio.projects.mrs')
        @include('portfolio.projects.zeo')
        @include('portfolio.projects.creedle')

    </div>
</section>
