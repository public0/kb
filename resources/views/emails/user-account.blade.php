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
    <p>Thank you,<br />{{ config('app.name') }} Team</p>
@endsection
