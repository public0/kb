@if($newsletterBox)
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Newsletter</h4>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('front.newsletter') }}">
            @csrf
            @if ($errors->newsletter->any())
                <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>@foreach ($errors->newsletter->all() as $error) {{ $error }}<br> @endforeach</div>
            @endif
            <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">{{__('labels.newslwtter_not_publish')}}</label>
                <div class="input-group">
                    <input type="email" name="email" @error('email')style="border-color: red;"@enderror class="form-control" id="exampleInputEmail1" placeholder="{{__('labels.newslwtter_email_here')}}" value="{{ old('email') }}" autocomplete="off" autocapitalize="off" autocorrect="off" spellcheck="false" />
                    <span class="input-group-append">
                        <button type="submit" class="btn btn-primary">{{__('labels.subscribe')}}</button>
                    </span>
                </div>
            </div>
        </form>
    </div>
</div>
@endif
@if(!empty($rightColumnArticles))
    @foreach($rightColumnArticles as $art)
    <x-front-article-box :art="$art" />
    @endforeach
@endif
@if(!empty($newArticles))
<div class="card">
    <div class="card-header">
        <h4 class="card-title">{{__('labels.last_articles')}}</h4>
    </div>
    <div class="card-body">
        @foreach($newArticles as $art)
            @php
            $url = route('front.article', ['id' => $art->article_id]);
            @endphp
            <h4><a href="{{ $url }}">{{ $art->title }}</a></h4>
            <div class="text-muted">{{ $art->description }}</div>
            <div class="d-flex align-items-center pt-3 mt-auto">
                <a href="{{ $url }}" class="d-flex"><i class="fe fe-calendar fs-16 mr-1"></i> @if($art->created_at > $art->updated_at){{ date('d.m.Y', strtotime($art->created_at)) }}@else{{ date('d.m.Y', strtotime($art->updated_at)) }}@endif</a>
                <div class="ml-auto"><a class="mr-0 d-flex" href="{{ $url }}">{{ $art->comments_number }} <i class="fe fe-message-square fs-16 ml-1"></i></a></div>
            </div>
            @if(!$loop->last)<hr>@endif
        @endforeach
    </div>
</div>
@endif
