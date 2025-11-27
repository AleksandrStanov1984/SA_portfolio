<p><strong>@lang('portfolio.mail_name'):</strong> {{ $data['name'] }}</p>

<p><strong>@lang('portfolio.mail_email'):</strong> {{ $data['email'] }}</p>

<p><strong>@lang('portfolio.mail_phone'):</strong> {{ $data['phone'] }}</p>

<p><strong>@lang('portfolio.mail_topic'):</strong> {{ $data['topic'] }}</p>

<p><strong>@lang('portfolio.mail_message'):</strong></p>

<p>{!! nl2br(e($data['message'])) !!}</p>
