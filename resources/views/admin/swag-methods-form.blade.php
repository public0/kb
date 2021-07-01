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
            <!-- Row-1 -->
            <div class="row">
                <div class="col-12">
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
                                        <label class="form-label">URL</label>
                                        <input type="text" name="url" placeholder="URL" class="form-control"  value="{{ old('url', $method ? $method->url : null) }}" maxlength="255" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <input type="text" name="description" placeholder="Description" class="form-control" value="{{ old('description', $method ? $method->description : null) }}" />
                                    </div>
                                    <div class="form-group">
                                        <div class="row mb-3">
                                            <div class="col-8">
                                                <label class="form-label">Parameters</label>
                                            </div>
                                            <div class="col-4 text-right">
                                                <button type="button" class="btn btn-sm btn-success btn-add-param"><i class="fe fe-plus"></i></button>
                                                <button type="button" class="btn btn-sm btn-danger btn-delete-param"><i class="fe fe-minus"></i></button>
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
                                        <label class="form-label text-success">Output Success</label>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <input type="text" name="output_success[code]" placeholder="Code" class="form-control" value="{{ old('output_success.code', $method ? $method->output_success_data['code'] : null) }}" />
                                            </div>
                                            <div class="col-sm-9">
                                                <textarea name="output_success[content]" placeholder="Content" class="form-control text-monospace" style="height:150px">{{ old('output_success.content', $method ? $method->output_success_data['content'] : null) }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label text-danger">Output Error</label>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <input type="text" name="output_error[code]" placeholder="Code" class="form-control" value="{{ old('output_error.code', $method ? $method->output_error_data['code'] : null) }}" />
                                            </div>
                                            <div class="col-sm-9">
                                                <textarea name="output_error[content]" placeholder="Content" class="form-control text-monospace" style="height:150px">{{ old('output_error.content', $method ? $method->output_error_data['content'] : null) }}</textarea>
                                            </div>
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
        </div>
    </div>
@endsection

@push('body-scripts')
<script>
    $(document).ready(function() {
        var html = $('.params-template:first').html();
        html = '<div class="params-template">' + html + '</div>';
        $('.btn-add-param').on('click', function (e) {
            e.preventDefault();
            var nr = $('.params-template').length;
            $('#TplParams').append(html.replace(/\[0\]/g, '[' + nr + ']'));
            $('.params-template [name^="parameters[' + nr + ']"]').val('').prop('selected', false).prop('checked', false);
        });
        $('.btn-delete-param').on('click', function (e) {
            e.preventDefault();
            var nr = $('.params-template').length;
            if (nr > 1) {
                $('.params-template:last').remove();
            }
        });
    });
</script>
@endpush
