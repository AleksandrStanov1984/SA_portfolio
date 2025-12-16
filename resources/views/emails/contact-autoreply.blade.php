<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>@lang('portfolio.contact_autoreply_subject')</title>
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
                        <h1 style="margin:0; font-size:18px; font-weight:600; color:#e5e7eb; letter-spacing:0.5px;">
                            {{ config('app.legal_name') }}
                        </h1>
                    </td>
                </tr>

                <!-- Body -->
                <tr>
                    <td style="padding:32px; color:#cbd5f5; font-size:15px; line-height:1.65;">

                        <p style="margin-top:0; color:#e5e7eb;">
                            @lang('portfolio.contact_autoreply_hello', ['name' => $data['name']])
                        </p>

                        <p>
                            @lang('portfolio.contact_autoreply_text')
                        </p>

                        <!-- Topic -->
                        <table width="100%" cellpadding="0" cellspacing="0"
                               style="margin:24px 0; background-color:#020617; border-left:3px solid #38bdf8;">
                            <tr>
                                <td style="padding:14px 16px; font-size:14px; color:#e5e7eb;">
                                    <strong style="color:#7dd3fc;">
                                        @lang('portfolio.contact_autoreply_topic')
                                    </strong>
                                    {{ $data['topic'] }}
                                </td>
                            </tr>
                        </table>

                        <p style="margin-bottom:0;">
                            @lang('portfolio.contact_autoreply_regards')<br>
                            <strong style="color:#e5e7eb;">
                                {{ config('app.legal_name') }}
                            </strong>
                        </p>

                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td style="padding:16px 32px; font-size:12px; color:#64748b; border-top:1px solid #1e293b;">
                        © {{ date('Y') }} {{ config('app.legal_name') }}
                    </td>
                </tr>

            </table>
            <!-- /Card -->

        </td>
    </tr>
</table>

</body>
</html>
