<div class="panel-heading @if($m) mt-2 @endif panel-heading-{{ strtolower($method->type) }}" role="tab" id="{{ $idp }}{{ $method->id }}">
    <h4 class="panel-title">
        <p role="button" data-toggle="collapse" href="#{{ $idp }}c{{ $method->id }}" aria-expanded="true" aria-controls="{{ $idp }}c{{ $method->id }}" class="collapsed">
            <span class="badge-type mr-3">{{ $method->type }}</span>
            <span class="text-monospace desc">@if($document->version_in_url)/{{ $document->version }}@endif{{ $method->url }}</span>
            <span class="pull-right mt-1 ml-3">@if($method->req_auth)<i class="fe fe-lock fs-18" title="{{ __('Requires authorization token') }}" role="help"></i>@else<i class="fe fe-unlock fs-18" title="{{ __('Does not require authorization token') }}" role="help"></i>@endif</span>
            @if($method->description)<span class="pull-right mt-1"><i class="fe fe-info fs-18" title="{{ $method->description }}" role="help"></i></span>@endif
            @if($method->stage)<span class="badge-stage pull-right mr-3">{{ $method->stage_name }}</span>@endif
        </p>
    </h4>
</div>
<div id="{{ $idp }}c{{ $method->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="{{ $idp }}{{ $method->id }}">
    <div class="panel-body panel-body-{{ strtolower($method->type) }}">
        <div class="section-title fs-14 d-flex">
            Parameters
            <span class="flex-fill"></span>
            <button type="button" class="btn btn-sm btn-gray btn-try-method" data-method-id="{{ $idp }}c{{ $method->id }}" data-method-type="{{ $method->type }}" data-req-auth="{{ $method->req_auth }}">Try out</button>
        </div>
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
                    @if(isset($param['name']))
                    @if(isset($param['required']) && $param['required'])<small class="badge badge-danger">required</small>@endif
                    <h6 class="mt-2 mb-1">{{ $param['name'] }}</h6>
                    @if(isset($param['type']))<small class="text-monospace">{{ $param['type'] }}</small>@endif
                    @if(isset($param['location']))<small class="text-muted">({{ $param['location'] }})</small>@else<i class="fs-11 text-muted fe fe-log-in"></i>@endif
                    @endif
                </td>
                <td @if(!$loop->last)class="pb-5"@endif>
                    @if(isset($param['name']))
                    <div class="mb-2">
                    @switch($param['type'])
                        @case('object')
                        @case('base64')
                        <textarea class="param-input text-monospace" placeholder="{{ $param['name'] }}" data-param="{{ json_encode($param) }}" disabled="disabled">{!! $param['content'] !!}</textarea>
                        @break
                        @default
                        <input type="{{ $param['type'] }}" placeholder="{{ $param['name'] }}" value="{!! $param['content'] !!}" class="param-input text-monospace" data-param="{{ json_encode($param) }}" disabled="disabled" />
                        @break
                    @endswitch
                    </div>
                    @endif
                    @if(isset($param['description']))<pre class="desc">{!! nl2br($param['description']) !!}</pre>@endif
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
        @if($method->output)
        <div class="section-title fs-14 mt-6">Responses</div>
        <table class="section-table">
            <thead>
            <tr>
                <th width="100">Code</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            @foreach($method->output_data as $out)
            <tr valign="top">
                <td class="pb-5 fs-14">
                    @if(isset($out['code'])){{ $out['code'] }}@endif
                </td>
                <td class="pb-5">
                    @if(isset($out['content']))<pre>{!! $out['content'] !!}</pre>@endif
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @endif
        @if($method->notes)
        <div class="d-flex align-items-start mt-auto fs-14"><i class="fe fe-book-open fs-16 mt-1 mr-3 text-primary"></i>{!! nl2br($method->notes) !!}</div>
        @endif
    </div>
</div>
