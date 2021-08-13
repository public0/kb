@extends('layouts.emails')

@section('content')
    <strong>{{ __('Welcome') }} {{ $data['name'] }} {{ $data['surname'] }},</strong>
    <p>To log in into your account you need to set up a password for your account.</p>
    <p>Email: {{ $data['email'] }}</p>
    <p>
        Password: click the link below.
        <br />
        <a href="{{ $data['password_link'] }}" target="_blank" style="color:#009">{{ $data['password_link'] }}</a>
    </p>
    <p><i>If the link does not work please copy it in the browser.</i></p>
    <p>&nbsp;</p>
    <p>Thank you,</p>
    <span>
        <img src="{{ url('/th/assets/images/brand/logo.png') }}" alt="{{ config('app.name') }}" height="40" />
        <img src="{{ url('/th/assets/images/brand/logo_procesio.png') }}" alt="{{ config('app.name') }}" height="40" />
    </span>
    <p>14th Geniului Boulevard, 6th District, Bucharest, Romania - 060117</p>
    <p><b style="color:#900">Support:</b> +40 771 111 222</p>
    <p><a href="http://www.ringhel.com" target="_blank" style="color:#009">www.ringhel.com</a> | <a href="http://www.procesio.com" target="_blank" style="color:#009">www.procesio.com</a></p>
@endsection
