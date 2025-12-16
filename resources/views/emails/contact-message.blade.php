<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>@lang('portfolio.mail_admin_subject')</title>
</head>

<body style="margin:0; padding:0; background-color:#0f172a; font-family:Arial, Helvetica, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background-color:#0f172a; padding:40px 0;">
    <tr>
        <td align="center">

            <!-- Card -->
            <table width="600" cellpadding="0" cellspacing="0"
                   style="background-color:#020617; border-radius:8px; overflow:hidden;">

                <!-- Header -->
                <tr>
                    <td style="padding:28px 32px; border-bottom:1px solid #1e293b;">
                        <h1 style="margin:0; font-size:18px; font-weight:600; color:#e5e7eb;">
                            {{ config('app.legal_name') }}
                        </h1>
                        <p style="margin:6px 0 0; font-size:13px; color:#94a3b8;">
                            @lang('portfolio.mail_admin_subject')
                        </p>
                    </td>
                </tr>

                <!-- Body -->
                <tr>
                    <td style="padding:32px; color:#cbd5f5; font-size:15px; line-height:1.65;">

                        <!-- Meta -->
                        <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:24px;">
                            <tr>
                                <td style="padding:6px 0;">
                                    <strong style="color:#7dd3fc;">
                                        @lang('portfolio.mail_name'):
                                    </strong>
                                    {{ $data['name'] }}
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:6px 0;">
                                    <strong style="color:#7dd3fc;">
                                        @lang('portfolio.mail_email'):
                                    </strong>
                                    {{ $data['email'] }}
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:6px 0;">
                                    <strong style="color:#7dd3fc;">
                                        @lang('portfolio.mail_phone'):
                                    </strong>
                                    {{ $data['phone'] ?: '—' }}
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:6px 0;">
                                    <strong style="color:#7dd3fc;">
                                        @lang('portfolio.mail_topic'):
                                    </strong>
                                    {{ $data['topic'] }}
                                </td>
                            </tr>
                        </table>

                        <!-- Message -->
                        <table width="100%" cellpadding="0" cellspacing="0"
                               style="background-color:#020617; border-left:3px solid #38bdf8;">
                            <tr>
                                <td style="padding:16px; font-size:14px; color:#e5e7eb;">
                                    <strong style="display:block; margin-bottom:8px; color:#7dd3fc;">
                                        @lang('portfolio.mail_message'):
                                    </strong>
                                    {!! nl2br(e($data['message'])) !!}
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td style="padding:16px 32px; font-size:12px; color:#64748b; border-top:1px solid #1e293b;">
                        {{ now()->format('d.m.Y H:i') }} · {{ request()->ip() ?? 'IP n/a' }}
                    </td>
                </tr>

            </table>
            <!-- /Card -->

        </td>
    </tr>
</table>

</body>
</html>
