@php
$url = route('front.article', ['id' => $art->article_id]);
@endphp
<div class="col-md-6">
    <div class="card overflow-hidden">
        {{-- <div class="item7-card-img">
            <img src="../../assets/images/photos/2.jpg" alt="img" class="cover-image w-100">
        </div> --}}
        <div class="card-body d-flex flex-column">
            {{-- <div class="item7-card-desc d-flex mb-5"> <a href="#" class="d-flex"><i class="fe fe-calendar fs-16 mr-1"></i> Jun-11-2020</a> <div class="ml-auto"> <a class="mr-0 d-flex" href="#"><i class="fe fe-message-square fs-16 mr-1"></i> 7 Comments</a> </div> </div> --}}
            <h4 style="height:38px; overflow:hidden"><a href="{{ $url }}" title="{{ $art->title }}">{{ $art->title }}</a></h4>
            <div class="text-muted">@if($art->description){{ $art->description }}@else{{ substr(strip_tags($art->body), 0, 100) }}...@endif</div>
        </div>
        <div class="card-body">
            <div class="d-flex align-items-center mt-auto">
                {{-- <div class="avatar brround avatar-md mr-3" style="background-image: url(../../assets/images/users/16.jpg)"></div> --}}
                <div>
                    <a href="{{ $url }}" title="{{ $art->title }}" class="font-weight-semibold">{{ $art->article_id }}</a>
                    <small class="d-block text-muted">{{ date('d.m.Y', strtotime($art->created_at)) }}</small>
                </div>
                <div class="ml-auto text-muted">
                    {{-- <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fe fe-heart  fs-16 text-icon"></i></a> --}}
                    {{-- <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fe fe-thumbs-up  fs-16 text-icon"></i></a> --}}
                    <a class="d-none d-md-inline-block ml-3" href="{{ $url }}"><i class="fe fe-message-square fs-16 mr-1"></i>{{ $art->comments_number }} {{ __('labels.comments') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
