@extends('swag.index')

@section('title', $document->name)

@section('page-header')
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">{{ $document->name }}</h4>
        <div class="text-muted">Version: <strong class="text-info">{{ $document->version }}</strong></div>
        <div class="text-muted">Schema: <select class="small-control" id="DocumentSchemaURL"><option value="http">HTTP</option><option value="https">HTTPS</option></select></div>
        <div class="text-muted">Base URL: <input type="text" class="small-control" id="DocumentBaseURL" value="{{ $document->url }}" style="width:150px" /></div>
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
                                        <div class="panel-heading @if($m) mt-2 @endif panel-heading-{{ strtolower($method->type) }}" role="tab" id="m{{ $method->id }}">
                                            <h4 class="panel-title">
                                                <p role="button" data-toggle="collapse" href="#mc{{ $method->id }}" aria-expanded="true" aria-controls="mc{{ $method->id }}" class="collapsed">
                                                    <span class="badge-type mr-3">{{ $method->type }}</span>
                                                    <span class="text-monospace">@if($document->version_in_url)/{{ $document->version }}@endif{{ $method->url }}</span>
                                                    @if(isset($method->description))<span class="pull-right mt-1"><i class="fe fe-info fs-18" title="{{ $method->description }}" role="help"></i></span>@endif
                                                </p>
                                            </h4>
                                        </div>
                                        <div id="mc{{ $method->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="m{{ $method->id }}">
                                            <div class="panel-body panel-body-{{ strtolower($method->type) }}">
                                                <div class="section-title fs-14">Parameters</div>
                                                @if($method->parameters)
                                                <table class="section-table">
                                                    <thead>
                                                    <tr>
                                                        <th width="200">Name</th>
                                                        <th>Description</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($method->parameters_data as $param)
                                                    <tr valign="top">
                                                        <td @if(!$loop->last)class="pb-5"@endif>
                                                            @if(isset($param['description']) || isset($param['required']))
                                                            <div class="d-flex align-items-center mt-auto">
                                                            @if(isset($param['description']))<i class="fe fe-info text-primary fs-16 mr-3" title="{{ $param['description'] }}" role="help"></i>@endif
                                                            @if(isset($param['required']) && $param['required'])<small class="badge badge-danger">required</small>@endif
                                                            </div>
                                                            @endif
                                                            @if(isset($param['name']))<h6 class="mt-2 mb-1">{{ $param['name'] }}</h6>@endif
                                                            @if(isset($param['type']))<small class="text-monospace">{{ $param['type'] }}</small>@endif
                                                            @if(isset($param['location']))<small class="text-muted">({{ $param['location'] }})</small>@endif
                                                        </td>
                                                        <td @if(!$loop->last)class="pb-5"@endif>
                                                            @if(isset($param['content']))<pre>{!! $param['content'] !!}</pre>@endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                @endif
                                                <div class="document-full-url d-none">
                                                <div class="section-title fs-14 mt-6">Request URL</div>
                                                <div class="pre text-monospace"><span></span>@if($document->version_in_url)/{{ $document->version }}@endif{{ $method->url }}</div>
                                                </div>
                                                @if(!empty($method->output_success_data['code'])
                                                    || !empty($method->output_success_data['content'])
                                                    || !empty($method->output_error_data['code'])
                                                    || !empty($method->output_error_data['content'])
                                                )
                                                <div class="section-title fs-14 mt-6">Responses</div>
                                                <table class="section-table">
                                                    <thead>
                                                    <tr>
                                                        <th width="100">Code</th>
                                                        <th>Description</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if($method->output_success && (!empty($method->output_success_data['code']) || !empty($method->output_success_data['content'])))
                                                    <tr valign="top">
                                                        <td class="pb-5 fs-14">
                                                            @if(!empty($method->output_success_data['code'])){{ $method->output_success_data['code'] }}@endif
                                                        </td>
                                                        <td class="pb-5">
                                                            @if(!empty($method->output_success_data['content']))<pre>{!! $method->output_success_data['content'] !!}</pre>@endif
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @if($method->output_error && (!empty($method->output_error_data['code']) || !empty($method->output_error_data['content'])))
                                                    <tr valign="top">
                                                        <td class="pb-5 fs-14">
                                                            @if(!empty($method->output_error_data['code'])){{ $method->output_error_data['code'] }}@endif
                                                        </td>
                                                        <td class="pb-5">
                                                            @if(!empty($method->output_error_data['content']))<pre>{!! $method->output_error_data['content'] !!}</pre>@endif
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    </tbody>
                                                </table>
                                                @endif
                                                @if($method->notes)
                                                <div class="d-flex align-items-start mt-auto fs-14"><i class="fe fe-book-open fs-16 mt-1 mr-3 text-primary"></i>{!! nl2br($method->notes) !!}</div>
                                                @endif
                                            </div>
                                        </div>
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
<style type="text/css">
    .small-control {
        padding: 0 2px;
        border-top: 0;
        border-left: 0;
        border-right: 0;
        border-bottom: 1px solid #705ec8;
        background: transparent;
        font-size: 13px;
    }
    .small-control:focus {
        outline: none;
    }
    .panel-groups > .panel-heading {
        padding: 0;
        border-radius: 0;
        background-color: #f0f0f2;
    }
    .panel-groups > .panel-heading:hover {
        opacity: 0.8;
    }
    .panel-groups > .panel-heading .panel-title p {
        display: block;
        padding: 15px;
        text-decoration: none;
        font-weight: bold;
        color: #1a1630;
        position: relative;
    }
    .panel-groups > .panel-heading .panel-title p:before {
        font-family: "feather" !important;
        speak: none;
        font-style: normal;
        font-weight: 400;
        font-variant: normal;
        text-transform: none;
        line-height: 1;
        -webkit-font-smoothing: antialiased;
        position: absolute;
        top: 16px;
        right: 16px;
        content: "\e92d";
    }
    .panel-groups > .panel-heading .panel-title p.collapsed:before {
        content: "\e92f";
    }
    .panel-groups > .panel-heading + .panel-collapse > .panel-body {
        padding: 5px 0 15px 0;
    }
    .panel-methods > .panel-heading {
        padding: 0;
        border-radius: 0;
        border: 0;
        background-color: #705ec8;
    }
    .panel-methods > .panel-heading-get {
        background-color: #5b7fff;
    }
    .panel-methods > .panel-heading-post {
        background-color: #38cb89;
    }
    .panel-methods > .panel-heading-put {
        background-color: #fc7303;
    }
    .panel-methods > .panel-heading-patch {
        background-color: #06c0d9;
    }
    .panel-methods > .panel-heading-delete {
        background-color: #ef4b4b;
    }
    .panel-methods > .panel-heading .panel-title p {
        display: block;
        padding: 10px 15px;
        text-decoration: none;
        font-weight: bold;
        color: #fff;
    }
    .panel-methods > .panel-heading .panel-title .badge-type {
        font-weight: bold;
        border: 1px solid #fff;
        border-radius: 4px;
        display: inline-block;
        width: 86px;
        padding: 4px;
        text-align: center;
    }
    .panel-methods > .panel-heading + .panel-collapse > .panel-body {
        border: 1px solid #705ec8;
        line-height: 25px;
    }
    .panel-methods > .panel-heading + .panel-collapse > .panel-body-get {
        border-color: #5b7fff;
    }
    .panel-methods > .panel-heading + .panel-collapse > .panel-body-post {
        border-color: #38cb89;
    }
    .panel-methods > .panel-heading + .panel-collapse > .panel-body-put {
        border-color: #fc7303;
    }
    .panel-methods > .panel-heading + .panel-collapse > .panel-body-patch {
        border-color: #06c0d9;
    }
    .panel-methods > .panel-heading + .panel-collapse > .panel-body-delete {
        border-color: #ef4b4b;
    }
    .panel-methods > .panel-heading + .panel-collapse > .panel-body .section-title {
        font-weight: bold;
        padding-bottom: 5px;
        margin-bottom: 10px;
        border-bottom: 1px solid #ebecf1;
    }
    .panel-methods > .panel-heading + .panel-collapse > .panel-body .section-table {
        width: 100%;
        border: 0;
        border-collapse: collapse;
    }
    [role="help"] {
        cursor: help;
    }
    .pre {
        border-radius: 3px;
        font-size: 85%;
        line-height: 1.45;
        tab-size: 4;
        hyphens: none;
    }
    pre, .pre {
        border-left: 0;
        margin-bottom: 0;
        background-color: #282d3c;
        color: #fff;
        padding: 1rem;
        max-height: 400px;
        overflow-y: auto;
    }
    pre .json-number {
        color: #06c0d9;
    }
    pre .json-key {
        color: #ef4b4b;
    }
    pre .json-string {
        color: #38cb89;
    }
    pre .json-boolean, pre .json-null {
        color: #ffab00;
    }
    pre .json-comments {
        color: #a9a9a9;
    }
    code {
        font-size: 100%;
    }
</style>
@endpush

@push('body-scripts')
<script type="text/javascript">
function syntaxHighlight(json) {
    json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
        var after = '';
        var cls = 'json-number';
        if (/^"/.test(match)) {
            if (/:$/.test(match)) {
                cls = 'json-key';
                match = match.slice(0, -1);
                after = ':';
            } else {
                cls = 'json-string';
            }
        } else if (/true|false/.test(match)) {
            cls = 'json-boolean';
        } else if (/null/.test(match)) {
            cls = 'json-null';
        }

        return '<span class="' + cls + '">' + match + '</span>' + after;
    });
}
function commentHighlight(json) {
    return json.replace(/\/\*.+\*\//g, function (match) {
        return '<span class="json-comments">' + match + '</span>';
    });
}
function documentURLData() {
    var fullObj = $('.document-full-url');
    var schemaObj = $('#DocumentSchemaURL');
    var schema = schemaObj.val();
    var baseObj = $('#DocumentBaseURL');
    var base = baseObj.val().toLowerCase();
    fullObj.addClass('d-none');
    if (schema && base) {
        var schemaOptions = $.map($('option', schemaObj), function (option) {
            return option.value;
        });
        if (!base.includes('://')) {
            base = schema + '://' + base;
        }
        var parser = document.createElement('a');
        parser.href = base;
        var sch = parser.protocol.replace(':', '');
        if (schemaOptions.includes(sch)) {
            schema = sch;
            schemaObj.val(schema);
        }
        base = parser.hostname;
        baseObj.val(base);
        $('.pre span', fullObj).text(schema + '://' + base);
        fullObj.removeClass('d-none');
    }
}
$(document).ready(function () {
    $('pre').each(function (k, v) {
        var txt = $(v).text();
        try {
            txt = JSON.stringify(JSON.parse(txt.replace(/(\n|\r)/gm, '')), null, 4);
        } catch {
        }
        txt = syntaxHighlight(txt);
        txt = commentHighlight(txt);
        $(v).html(txt);
    });
    $('#DocumentSchemaURL, #DocumentBaseURL').on('change', function (e) {
        e.preventDefault();
        documentURLData();
    });
    documentURLData();
});
</script>
@endpush
