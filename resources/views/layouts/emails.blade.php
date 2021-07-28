<!DOCTYPE html>
<html dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
</head>
<body style="margin:0; padding:0; background:#dedede;">
<div style="font-family:Arial, Helvetica, sans-serif; background-color:#dedede; padding:20px;">
    <div style="font-size:16px; max-width:700px; background-color:#fff; padding:15px; margin:0 auto; border-radius:10px;">
        <div style="margin-bottom:30px; padding-bottom:10px; border-bottom: 1px solid #dedede;">
            <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%; padding:0;">
                <tr>
                    <td align="left"><img src="{{ url('/th/assets/images/brand/logo.png') }}" alt="{{ config('app.name') }}" height="40" /></td>
                    @if(!empty($internal))<td align="right"><strong style="color:#c00">INTERNAL</strong></td>@endif
                </tr>
            </table>
        </div>
        @section('content')
        @show
    </div>
    <div style="font-size:14px; text-align:center; margin-top:20px;">
        Copyright &copy; {{ date('Y') }} Ringhel. All rights reserved.
    </div>
</div>
</body>
</html>
