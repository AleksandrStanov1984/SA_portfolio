<p>@lang('portfolio.contact_autoreply_hello', ['name' => $data['name']])</p>

<p>@lang('portfolio.contact_autoreply_text')</p>

<p><strong>@lang('portfolio.contact_autoreply_topic')</strong> {{ $data['topic'] }}</p>

<p>@lang('portfolio.contact_autoreply_regards')<br>
{{ config('app.legal_name') }}</p>
