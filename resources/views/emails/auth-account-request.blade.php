@extends('layouts.emails')

@section('content')
    <strong>{{ __(':name Account Request', ['name' => config('app.name')]) }}</strong>
    <p>Name: {{ $data['name'] }}</p>
    <p>Email: {{ $data['email'] }}</p>
    <p>Phone: {{ $data['phone'] }}</p>
    <p>Company: {{ $data['company'] }}</p>
    @if(!empty($data['position']))<p>Position: {{ $data['position'] }}</p>@endif
@endsection
