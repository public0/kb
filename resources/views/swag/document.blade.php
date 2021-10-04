@extends('layouts.swag')

@section('title', $document->name)

@section('page-header')
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">{{ $document->name }}</h4>
        <div class="text-muted">Version: <strong class="text-info">{{ $document->version }}</strong></div>
        <div class="text-muted">Schema: <select class="small-control" id="DocumentSchemaURL"><option value="http">HTTP</option><option value="https">HTTPS</option></select></div>
        <div class="text-muted">Base URL: <input type="text" class="small-control" id="DocumentBaseURL" value="{{ $document->url }}" style="width:150px" /></div>
    </div>
    <div class="page-rightheader text-right">
        @if(isset($document->auth_data['name']))
        <button class="btn btn-sm btn-primary auth-button" data-auth="{{ json_encode($document->auth_data) }}">{{ __('Authorize') }} <i class="fe fe-unlock ml-1"></i></button>
        @endif
        @if(count($clients))
        <div class="mt-4">
        <select class="form-control form-control-sm text-primary" onchange="window.location='{{ url()->current() }}' + (this.value ? '?c=' + this.value : '')">
            <option value="">{{ __('Select client') }}</option>
            @foreach($clients as $client)
            <option value="{{ $client->client_id }}"@if(app('request')->get('c') == $client->client_id) selected="selected"@endif>{{ $client->client->name }}</option>
            @endforeach
        </select>
        </div>
        @endif
    </div>
</div>
@endsection

@section('content')
<div class="card">
<div class="panel panel-primary">
    <div class=" tab-menu-heading p-0 bg-light">
        <div class="tabs-menu1">
            <ul class="nav panel-tabs">
                <li><a href="#tabIntro" data-toggle="tab" class="active">Intro</a></li>
                @if(count($document->groups))<li><a href="#tabMethods" data-toggle="tab">Methods</a></li>@endif
                @if(count($fluxes))<li><a href="#tabFluxes" data-toggle="tab">Fluxes</a></li>@endif
            </ul>
        </div>
    </div>
    <div class="panel-body tabs-menu-body">
        <div class="tab-content">
            <div class="tab-pane active" id="tabIntro">
                {!! $document->description !!}
            </div>
            @if(count($document->groups))
            <div class="tab-pane" id="tabMethods">
                <div class="panel-group accordion-panel" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-groups">
                        @foreach($document->groups as $group)
                        <div class="panel-heading" role="tab" id="g{{ $group->id }}">
                            <h4 class="panel-title">
                                <p role="button" data-toggle="collapse" href="#gc{{ $group->id }}" aria-expanded="true" aria-controls="gc{{ $group->id }}" class="collapsed">
                                    {{ $group->name }}
                                </p>
                            </h4>
                        </div>
                        <div id="gc{{ $group->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="g{{ $group->id }}">
                            <div class="panel-body">
                                @if(count($group->methods))
                                <div class="panel-group accordion-panel" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-methods">
                                        @foreach($group->methods as $m => $method)
                                        <x-swag-method-info
                                            :document="$document"
                                            :m="$m"
                                            :method="$method"
                                            idp="gm"
                                        />
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            @if(count($fluxes))
            <div class="tab-pane" id="tabFluxes">
                <div class="panel-group accordion-panel" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-groups">
                        @foreach ($fluxes as $flux)
                        <div class="panel-heading" role="tab" id="f{{ $flux->id }}">
                            <h4 class="panel-title">
                                <p role="button" data-toggle="collapse" href="#fc{{ $flux->id }}" aria-expanded="true" aria-controls="fc{{ $flux->id }}" class="collapsed">
                                    {{ $flux->name }}
                                </p>
                            </h4>
                        </div>
                        <div id="fc{{ $flux->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="f{{ $flux->id }}">
                            @if($flux->description)<div class="border-left border-right border-bottom px-3 py-3 fs-14">{!! nl2br($flux->description) !!}</div>@endif
                            <div class="panel-body">
                                @if(count($flux->methods_full))
                                <div class="panel-group accordion-panel" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-methods">
                                        @foreach($flux->methods_full as $m => $method)
                                        <x-swag-method-info
                                            :document="$document"
                                            :m="$m"
                                            :method="$method"
                                            idp="fm"
                                        />
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
</div>
@endsection

@push('head-styles')
<link href="{{ url('/th/swag/document.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('body-scripts')
<script type="text/javascript">
var modalTitle = 'Authorization';
var btnClose = 'Close', btnCancel = 'Cancel', btnClear = 'Clear';
var btnAuth = 'Authorize', btnUnauth = 'Unauthorize', btnTryOut = 'Try out', btnExecute = 'Execute';
var requredErrorMessage = 'Required field is not provided';
</script>
<script src="{{ url('/th/swag/document.js') }}"></script>
@endpush
