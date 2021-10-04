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
                    <h4 class="page-title mb-0">Swag Clients</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item">Swag</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.swag.clients') }}">Clients</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@if($client){{ __('labels.edit') }}@else{{ __('labels.add') }}@endif</li>
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
                    <div class="card-title">@if($client){{ __('labels.edit') }}@else{{ __('labels.add') }}@endif</div>
                </div>
                <form class="needs-validation" method="post" action="{{ url()->current() }}">
                @csrf
                <div class="card-body">
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Client <span class="text-danger">*</span></label>
                                <select name="client_id" class="form-control">
                                    <option value="">Select Client</option>
                                    @foreach($clients as $item)
                                    <option value="{{ $item->id }}"@if(old('client_id', $client ? $client->client_id : null) == $item->id) selected="selected" @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Document <span class="text-danger">*</span></label>
                                <select name="document_id" class="form-control">
                                    <option value="">Select Document</option>
                                    @foreach($documents as $item)
                                    <option value="{{ $item->id }}"@if(old('document_id', $client ? $client->document_id : null) == $item->id) selected="selected" @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">URL</label>
                                <input type="text" name="url" placeholder="URL" class="form-control" value="{{ old('url', $client ? $client->url : null) }}" maxlength="255" />
                            </div>
                            <div id="methods" data-methods="@if($client){{ $client->methods }}@endif">
                                <div class="spinner4 mt-5 mb-0 ml-auto mr-auto d-none"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="button" class="btn btn-light mr-2" onclick="window.location='{{ route('admin.swag.clients') }}'">{{ __('labels.back') }}</button>
                    <button type="submit" class="btn btn-info">{{ __('labels.submit') }}</button>
                </div>
                </form>
            </div>
            <!--/div-->
        </div>
    </div>
@endsection

@push('body-scripts')
<script>
    var btnSelectAll = '{{ __('Select All') }}', btnUnselectAll = '{{ __('Deselect All') }}';
    function getMethods(id) {
        var spinnerObj = $('.spinner4');
        spinnerObj.removeClass('d-none');

        $.ajax('{{ url('/admin/ajax/swag-methods') }}/' + id, {
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                spinnerObj.addClass('d-none');
                if (data) {
                    var html = '<div class="text-right mb-3">';
                    html += '<button type="button" class="btn btn-sm btn-success btn-check-all" title="' + btnSelectAll + '"><i class="fe fe-check"></i></button>';
                    html += '<button type="button" class="btn btn-sm btn-danger btn-uncheck-all" title="' + btnUnselectAll + '"><i class="fe fe-x"></i></button>';
                    html += '</div>';
                    $.each(data, function (g, group) {
                        html += '<label class="form-label">' + group.name + '</label>';
                        $.each(group.methods, function (m, method) {
                            html += '<label class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" name="methods[' + method.id + ']" /><span class="custom-control-label mt-0"><span class="badge badge-primary mr-3">' + method.type + '</span>' + (parseInt(group.document.version_in_url) ? '/' + group.document.version : '') + method.url + '</span></label>';
                        });
                    });
                    $('#methods').html(html);

                    var clientMethods = $('#methods').data('methods');
                    if (clientMethods) {
                        $.each(clientMethods, function (k, v) {
                            $('#methods input[type="checkbox"][name="methods[' + v + ']"]').prop('checked', true);
                        });
                    }

                    $('.btn-check-all').on('click', function (e) {
                        e.preventDefault();
                        $('.custom-control.custom-checkbox .custom-control-input').prop('checked', true);
                    });
                    $('.btn-uncheck-all').on('click', function (e) {
                        e.preventDefault();
                        $('.custom-control.custom-checkbox .custom-control-input').prop('checked', false);
                    });
                }
            },
            error: function (xhr) {
                var html = '<div class="text-danger">' + xhr.status + ': ' + xhr.statusText + '</div>';
                $('#methods').html(html);
            }
        });
    }
    $(document).ready(function() {
        $('select[name="document_id"]').on('change', function (e) {
            getMethods($(this).val());
        });
        @if($client)
        getMethods({{ $client->document_id }});
        @endif
    });
</script>
@endpush
