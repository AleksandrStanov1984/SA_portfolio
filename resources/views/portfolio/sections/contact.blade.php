{{-- resources/views/portfolio/sections/contact.blade.php --}}
<section id="contact">
    <h2 class="section-title">@lang('portfolio.contact_title')</h2>

    <div class="card"
         style="display:grid;
                grid-template-columns:minmax(0,3fr) minmax(0,2fr);
                gap:18px;">

        <div>

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
                @lang('portfolio.preferred_languages'):
                @lang('portfolio.languages_list')
            </div>
        </div>
    </div>
</section>
