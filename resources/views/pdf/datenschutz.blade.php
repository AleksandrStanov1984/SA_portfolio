<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>@lang('legal_pdf.title_datenschutz')</title>
    @include('pdf.layout.pdf-style')
</head>
<body>

<h1>@lang('legal_pdf.title_datenschutz')</h1>

<div class="section">
    <h2>@lang('legal_pdf.ds_section1_title')</h2>
    <p>@lang('legal_pdf.ds_section1_text')</p>
</div>

<div class="section">
    <h2>@lang('legal_pdf.ds_section2_title')</h2>
    <p>{!! nl2br(e(__('legal_pdf.ds_section2_text'))) !!}</p>
</div>

<div class="section">
    <h2>@lang('legal_pdf.ds_section3_title')</h2>
    <p>@lang('legal_pdf.ds_section3_text')</p>
</div>

<div class="section">
    <h2>@lang('legal_pdf.ds_section4_title')</h2>
    <p>@lang('legal_pdf.ds_section4_text')</p>
</div>

<div class="section">
    <h2>@lang('legal_pdf.ds_section5_title')</h2>
    <p>@lang('legal_pdf.ds_section5_text')</p>
</div>

<div class="footer">
    © {{ date('Y') }} Stanov Oleksandr –
    @lang('legal_pdf.footer_datenschutz')
    ({{ strtoupper(app()->getLocale()) }})
</div>

</body>
</html>
