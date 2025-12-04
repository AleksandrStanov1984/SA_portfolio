<section id="contact">
    <h2 class="section-title">@lang('portfolio.contact_title')</h2>

    <div class="card"
         style="
                grid-template-columns:minmax(0,3fr) minmax(0,2fr);
                gap:18px;">

        {{-- Левая часть: вводный текст --}}
        @include('portfolio.contact.contact-body')

        {{-- Правая часть: контактная информация --}}
        @include('portfolio.contact.contact-info')

    </div>
</section>

@include('portfolio.modals.modal-contact')
@include('portfolio.contact.scripts.script-contact')
