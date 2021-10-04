@extends('admin.index')

@section('content')
    <div class="app-content main-content">
        <div class="side-app">
            <!--app header-->
            <x-AdminHeader/>
            <!--/app header-->
            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title mb-0">Swag Document Fluxes</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item">Swag</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.swag.documents') }}">Documents</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.swag.groups', ['docid' => $document->id]) }}">{{ $document->name }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@if($flux){{ __('labels.edit') }}@else{{ __('labels.add') }}@endif</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->
            @if(Session::has('error'))
            <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ Session::get('error') }}</div>
            @endif
            @if($errors->any())
            <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>@foreach($errors->all() as $error) {{ $error }}<br> @endforeach</div>
            @endif
            <!--div-->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">@if($flux){{ __('labels.edit') }}@else{{ __('labels.add') }}@endif</div>
                </div>
                <form class="needs-validation" method="post" action="{{ url()->current() }}">
                @csrf
                <input type="hidden" name="document_id" value="{{ $document->id }}" />
                <div class="card-body">
                    <div class="row row-sm">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" placeholder="Name" class="form-control" required="required" value="{{ old('name', $flux ? $flux->name : null) }}" maxlength="255" />
                            </div>
                            <div class="form-group">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" placeholder="Description" style="height:150px">{{ old('description', $flux ? $flux->description : null) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-control custom-select select2">
                                    <option value="1"@if(old('status', $flux ? $flux->status : -1) == 1) selected="selected" @endif>{{ __('status.active') }}</option>
                                    <option value="0"@if(old('status', $flux ? $flux->status : -1) == 0) selected="selected" @endif>{{ __('status.inactive') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Methods <span class="text-danger">*</span> <i class="fe fe-info text-primary" title="If you want to reorder the methods drag one up or down from type label"></i></label>
                                <div class="input-group">
                                    <select class="form-control" id="methods"></select>
                                    <span class="input-group-append">
                                        <button type="button" class="btn btn-sm btn-primary" id="methodsbutton"><i class="fe fe-plus"></i></button>
                                    </span>
                                </div>
                            </div>
                            <div id="FluxMethods">
                                <div class="spinner4 mt-5 mb-0 ml-auto mr-auto d-none"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="button" class="btn btn-light mr-2" onclick="window.location='{{ route('admin.swag.fluxes', ['docid' => $document->id]) }}'">{{ __('labels.back') }}</button>
                    <button type="submit" class="btn btn-info">{{ __('labels.submit') }}</button>
                </div>
                </form>
            </div>
            <!--/div-->
        </div>
    </div>
@endsection

@push('body-scripts')
<script src="{{ url('/th/assets/plugins/date-picker/jquery-ui.js') }}"></script>
<script>
function renameItem(html, nr) {
    return html.replace(/\[\d\]/g, '[' + nr + ']');
}
function sortMethods() {
    $('.method-template').each(function (k, m) {
        $('input', m).each(function (i, hf) {
            $(hf).attr('name', renameItem($(hf).attr('name'), k));
        });
    });
}
function ajaxResultItems(data) {
    var items = [];
    $.each(data, function(idx, val) {
        var group = { id: val.id, text: val.name, children: [] };
        var version = parseInt(val.document.version_in_url) ? '/' + val.document.version : '';
        $.each(val.methods, function (idx, val) {
            group.children.push({ id: val.id, text: val.type + ' : ' + version + val.url });
        });
        items.push(group);
    });

    return items;
}
function drawTemplate(nr, id, text) {
    var text = text.split(':');
    var html = '<div class="method-template mb-1 row">';
    html += '<div class="col-md-10">';
    html += '<input type="hidden" name="methods[' + nr + ']" value="' + id + '" />';
    html += '<span class="badge badge-primary mr-3">' + text[0].trim() + '</span> ' + text[1].trim();
    html += '</div>';
    html += '<div class="col-md-2 text-right">';
    html += '<button type="button" class="btn btn-sm btn-danger btn-delete-one-method"><i class="fe fe-minus"></i></button>';
    html += '</div>';
    html += '</div>';
    $('#FluxMethods').append(html);
}
$(document).ready(function() {
    var ajaxURL = '{{ url('/admin/ajax/swag-methods/' . $document->id) }}';
    var selectMethods = $('select#methods');
    selectMethods.select2({
        placeholder: 'Search a method',
        allowClear: true,
        ajax: {
            url: ajaxURL,
            method: 'GET',
            dataType: 'json',
            data: function (params) {
                return {
                    term: params.term
                };
            },
            processResults: function (data) {
                return {
                    results: ajaxResultItems(data)
                };
            }
        }
    });
    $('#methodsbutton').on('click', function (e) {
        e.preventDefault();
        var opt = $('option:selected', selectMethods);
        if (opt.val()) {
            drawTemplate($('.method-template').length, opt.val(), opt.text());
        }
    });
    $('#FluxMethods').on('click', '.btn-delete-one-method', function (e) {
        e.preventDefault();
        $(this).closest('.method-template').remove();
        sortMethods();
    }).sortable({
        cursor: 'move',
        handle: '.badge-primary',
        items: '> .method-template',
        placeholder: 'bg-gray-100',
        forcePlaceholderSize: true,
        axis: 'y',
        stop: function() {
            sortMethods();
        }
    });
    @if($flux)
    var methods = JSON.parse('{{ $flux->methods }}');
    var spinnerObj = $('.spinner4');
    spinnerObj.removeClass('d-none');
    $.ajax(ajaxURL, {
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            spinnerObj.addClass('d-none');
            var result = [];
            var items = ajaxResultItems(data);
            $.each(items, function (idx, val) {
                $.each(val.children, function (idx, val) {
                    if (methods.includes(val.id)) {
                        result.push({nr: methods.indexOf(val.id), id: val.id, text: val.text});
                    }
                });
            });
            result.sort(function (a, b) {
                return a.nr > b.nr ? 1 : -1;
            });
            $.each(result, function (k, v) {
                drawTemplate(v.nr, v.id, v.text);
            });
        }
    });
    @endif
});
</script>
@endpush
