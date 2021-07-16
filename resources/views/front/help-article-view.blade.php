@extends('layouts.help')

@section('title', $article->title)

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card overflow-hidden">
            <div class="card-body">
                <h3>{{ $article->title }}</h3>
                <hr>
                {!! $article->body !!}
            </div>
        </div>
    </div>
</div>
@endsection
