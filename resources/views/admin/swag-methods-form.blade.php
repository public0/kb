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
                    <h4 class="page-title mb-0">Swag Group Methods</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item">Swag</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.swag.documents') }}">Documents</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.swag.groups', ['docid' => $document->id]) }}">{{ $document->name }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.swag.methods', ['docid' => $document->id, 'gid' => $group->id]) }}">{{ $group->name }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@if($method){{ __('labels.edit') }}@else{{ __('labels.add') }}@endif</li>
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
                    <div class="card-title">@if($method){{ __('labels.edit') }}@else{{ __('labels.add') }}@endif</div>
                </div>
                <form class="needs-validation" method="post" action="{{ url()->current() }}">
                @csrf
                <input type="hidden" name="group_id" value="{{ $group->id }}" />
                <div class="card-body">
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Type</label>
                                <select name="type" class="form-control">
                                    @foreach($types as $item)
                                    <option value="{{ $item }}"@if(old('type', $method ? $method->type : null) == $item) selected="selected" @endif>{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">URL <span class="text-danger">*</span></label>
                                <input type="text" name="url" placeholder="URL" class="form-control" required="required" value="{{ old('url', $method ? $method->url : null) }}" maxlength="255" />
                            </div>
                            <div class="form-group">
                                <label class="form-label">Description</label>
                                <input type="text" name="description" placeholder="Description" class="form-control" value="{{ old('description', $method ? $method->description : null) }}" />
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="req_auth" value="0" />
                                <label class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" name="req_auth" value="1" @if(old('req_auth') || ($method && $method->req_auth == 1)) checked="checked" @endif /><span class="custom-control-label">Requires authorization</span></label>
                            </div>
                            <div class="form-group">
                                <div class="row mb-3">
                                    <div class="col-8">
                                        <label class="form-label">Parameters</label>
                                    </div>
                                    <div class="col-4 text-right">
                                        <button type="button" class="btn btn-sm btn-success btn-add-param" title="{{ __('Add parameter') }}"><i class="fe fe-plus"></i></button>
                                        <button type="button" class="btn btn-sm btn-danger btn-delete-param" title="{{ __('Delete last parameter') }}"><i class="fe fe-minus"></i></button>
                                    </div>
                                </div>
                                <div id="TplParams">
                                @if(old('parameters'))
                                @foreach(old('parameters') as $k => $param)
                                <x-admin-swag-methods-params
                                    :key="$k"
                                    :param="$param"
                                    :locations="$paramsLocations"
                                    :types="$paramsTypes"
                                />
                                @endforeach
                                @elseif($method)
                                @foreach($method->parameters_data as $k => $param)
                                <x-admin-swag-methods-params
                                    :key="$k"
                                    :param="$param"
                                    :locations="$paramsLocations"
                                    :types="$paramsTypes"
                                />
                                @endforeach
                                @else
                                <x-admin-swag-methods-params
                                    key="0"
                                    :locations="$paramsLocations"
                                    :types="$paramsTypes"
                                />
                                @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row mb-3">
                                    <div class="col-8">
                                        <label class="form-label">Output</label>
                                    </div>
                                    <div class="col-4 text-right">
                                        <button type="button" class="btn btn-sm btn-success btn-add-output" title="{{ __('Add output') }}"><i class="fe fe-plus"></i></button>
                                        <button type="button" class="btn btn-sm btn-danger btn-delete-output" title="{{ __('Delete last output') }}"><i class="fe fe-minus"></i></button>
                                    </div>
                                </div>
                                <div id="TplOutput">
                                @if(old('output'))
                                @foreach(old('output') as $k => $out)
                                <x-admin-swag-methods-output
                                    :key="$k"
                                    :out="$out"
                                />
                                @endforeach
                                @elseif($method)
                                @foreach($method->output_data as $k => $out)
                                <x-admin-swag-methods-output
                                    :key="$k"
                                    :out="$out"
                                />
                                @endforeach
                                @else
                                <x-admin-swag-methods-output
                                    key="0"
                                />
                                @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Notes</label>
                                <textarea name="notes" class="form-control mb-4" placeholder="Notes" style="height:150px">{{ old('notes', $method ? $method->notes : null) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-control custom-select select2">
                                    <option value="1"@if(old('status', $method ? $method->status : -1) == 1) selected="selected" @endif>{{ __('status.active') }}</option>
                                    <option value="0"@if(old('status', $method ? $method->status : -1) == 0) selected="selected" @endif>{{ __('status.inactive') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Stage</label>
                                <select name="stage" class="form-control custom-select select2">
                                    @foreach ($stages as $stageID => $stage)
                                    <option value="{{ $stageID }}"@if(old('stage', $method ? $method->stage : 0) == $stageID) selected="selected" @endif>{{ __($stage) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="button" class="btn btn-light mr-2" onclick="window.location='{{ route('admin.swag.methods', ['docid' => $document->id, 'gid' => $group->id]) }}'">{{ __('labels.back') }}</button>
                    <button type="submit" class="btn btn-info">{{ __('labels.submit') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('body-scripts')
<script src="{{ url('/th/assets/plugins/date-picker/jquery-ui.js') }}"></script>
<script>
    function checkParamsNumber() {
        var nr = $('.params-template').length;
        if (nr > 1) {
            $('.btn-delete-one-param').removeClass('invisible');
        } else {
            $('.btn-delete-one-param').addClass('invisible');
        }
        $('#TplParams').sortable('option', 'disabled', nr <= 1);
    }
    function checkOutputNumber() {
        var nr = $('.output-template').length;
        if (nr > 1) {
            $('.btn-delete-one-output').removeClass('invisible');
        } else {
            $('.btn-delete-one-output').addClass('invisible');
        }
        $('#TplOutput').sortable('option', 'disabled', nr <= 1);
    }
    function renameItem(html, nr) {
        return html.replace(/\[\d\]/g, '[' + nr + ']');
    }
    function sortParams() {
        $('.params-template').each(function (k, pt) {
            var fl = $('.form-label', pt);
            fl.text(renameItem(fl.text(), k));
            $('input, select, textarea', pt).each(function (i, fc) {
                $(fc).attr('name', renameItem($(fc).attr('name'), k));
            });
        });
    }
    function sortOutput() {
        $('.output-template').each(function (k, pt) {
            var fl = $('.form-label', pt);
            fl.text(renameItem(fl.text(), k));
            $('input, textarea', pt).each(function (i, fc) {
                $(fc).attr('name', renameItem($(fc).attr('name'), k));
            });
        });
    }
    $(document).ready(function() {
        var htmlParam = $('.params-template:first').prop('outerHTML');
        $('.btn-add-param').on('click', function (e) {
            e.preventDefault();
            var nr = $('.params-template').length;
            $('#TplParams').append(renameItem(htmlParam, nr));
            var obj = $('.params-template [name^="parameters[' + nr + ']"]');
            obj.val('').removeAttr('value').removeAttr('checked');
            $('option', obj).removeAttr('selected');
            checkParamsNumber();
        });
        $('.btn-delete-param').on('click', function (e) {
            e.preventDefault();
            var nr = $('.params-template').length;
            if (nr > 1) {
                $('.params-template:last').remove();
                checkParamsNumber();
            }
        });
        $('#TplParams').on('click', '.btn-delete-one-param', function (e) {
            e.preventDefault();
            var nr = $('.params-template').length;
            if (nr > 1) {
                $(this).closest('.params-template').remove();
                sortParams();
                checkParamsNumber();
            }
        }).sortable({
            cursor: 'move',
            handle: '.form-label',
            items: '> .params-template',
            placeholder: 'bg-gray-100',
            forcePlaceholderSize: true,
            axis: 'y',
            stop: function() {
                sortParams();
            }
        });
        var htmlOutput = $('.output-template:first').prop('outerHTML');
        $('.btn-add-output').on('click', function (e) {
            e.preventDefault();
            var nr = $('.output-template').length;
            $('#TplOutput').append(renameItem(htmlOutput, nr));
            var obj = $('.output-template [name^="output[' + nr + ']"]');
            obj.val('').removeAttr('value');
            checkOutputNumber();
        });
        $('.btn-delete-output').on('click', function (e) {
            e.preventDefault();
            var nr = $('.output-template').length;
            if (nr > 1) {
                $('.output-template:last').remove();
                checkOutputNumber();
            }
        });
        $('#TplOutput').on('click', '.btn-delete-one-output', function (e) {
            e.preventDefault();
            var nr = $('.output-template').length;
            if (nr > 1) {
                $(this).closest('.output-template').remove();
                sortOutput();
                checkOutputNumber();
            }
        }).sortable({
            cursor: 'move',
            handle: '.form-label',
            items: '> .output-template',
            placeholder: 'bg-gray-100',
            forcePlaceholderSize: true,
            axis: 'y',
            stop: function() {
                sortOutput();
            }
        });
        checkParamsNumber();
        checkOutputNumber();
    });
</script>
@endpush
