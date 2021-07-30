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
                    <h4 class="page-title mb-0">Clients Instances</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item">Users</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.clients') }}">Clients</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $client->name }}</li>
                    </ol>
                </div>
                <div class="page-rightheader">
                    <div class="btn btn-list">
                        <a href="{{ route('admin.clients') }}" class="btn btn-sm btn-primary mr-3"><i class="fe fe-arrow-left mr-1"></i> {{ __('labels.back') }}</a>
                        <a href="{{ route('admin.clients.instances.add', ['cid' => $client->id]) }}" class="btn btn-sm btn-info"><i class="fe fe-plus mr-1"></i> {{ __('labels.add') }}</a>
                    </div>
                </div>
            </div>
            <!--End Page header-->
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ Session::get('message') }}</div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ Session::get('error') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>@foreach($errors->all() as $error) {{ $error }}<br> @endforeach</div>
            @endif
            <!--div-->
            <div class="card">
                <div class="card-body">
                    @if(!empty($instances))
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">Name</th>
                                <th class="wd-15p border-bottom-0">Server</th>
                                <th class="wd-15p border-bottom-0 no-sort">IP</th>
                                <th class="wd-15p border-bottom-0">Status</th>
                                <th class="wd-15p border-bottom-0 text-center no-sort">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($instances as $item)
                            <tr>
                                <td>{{ $item->instance_name }}</td>
                                <td>{{ $item->server_name }}</td>
                                <td>{{ $item->ip }}</td>
                                <td class="table-col-shrink text-center">
                                    <a href="{{ route('admin.clients.instances.status', ['cid' => $client->id, 'id' => $item->id]) }}" class="btn btn-sm btn-link">{{ $item->status_name }}</a>
                                </td>
                                <td class="table-col-shrink text-center">
                                    <a href="{{ route('admin.clients.instances.edit', ['cid' => $client->id, 'id' => $item->id]) }}" class="btn btn-sm btn-green mr-2"><i class="fe fe-edit-2 mr-1"></i> {{ __('labels.edit') }}</a>
                                    <button type="button" data-href="{{ route('admin.clients.instances.updateapikey', ['id' => $item->id]) }}" data-ak="{{ $item->api_key }}" class="btn btn-sm btn-primary btn-api-key mr-2"><i class="fe fe-feather mr-1"></i> {{ __('Api Key') }}</button>
                                    <a href="{{ route('admin.clients.instances.delete', ['cid' => $client->id, 'id' => $item->id]) }}" class="btn btn-sm btn-danger" onclick="return modals.confirm(this, 'Notice', 'Are you sure you want to delete?', '{{ __('labels.yes') }}', '{{ __('labels.no') }}')"><i class="fe fe-trash-2 mr-1"></i> {{ __('labels.delete') }}</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
            <!--/div-->
        </div>
    </div>
@endsection

@push('body-scripts')
<script>
    $('.btn-api-key').on('click', function (e) {
        e.preventDefault();
        $('.modal').remove();
        var self = $(this);
        var _token = '{{ @csrf_token() }}';
        var buttons = {
            cancel: '{{ __('labels.close') }}',
            ok: '{{ __('labels.generate') }}'
        };
        var html = '<div class="modal show" aria-modal="true">';
        html += '<div class="modal-dialog modal-md" role="document">';
        html += '<div class="modal-content">';
        html += '<div class="modal-header">';
        html += '<h6 class="modal-title">' + self.html() + '</h6>';
        html += '<button aria-label="' + buttons.cancel + '" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>';
        html += '</div>';
        html += '<div class="modal-body">';

        html += '<div class="form-group mb-0">';
        html += '<label class="form-label">Api Key</label>';
        html += '<input type="text" name="api_key" placeholder="Api Key" class="form-control" value="' + self.data('ak') + '" readonly="readonly" />';
        html += '</div>';

        html += '</div>';
        html += '<div class="modal-footer justify-content-center">';
        html += '<button class="btn btn-indigo btn-reset" type="button"><i class="fa fa-spinner fa-spin mr-2 d-none"></i>' + buttons.ok + '</button>';
        html += '<button class="btn btn-secondary" data-dismiss="modal" type="button">' + buttons.cancel + '</button>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';

        $('body').append(html);
        $('.modal').modal();

        $('.modal .btn-reset').on('click', function () {
            var loader = $('i', this);
            loader.removeClass('d-none');
            $.ajax(self.data('href'), {
                method: 'POST',
                data: { '_token': _token },
                success: function (data) {
                    if (data) {
                        $('.modal input[name="api_key"]').val(data);
                    }
                    loader.addClass('d-none');
                },
                error: function () {
                    loader.addClass('d-none');
                }
            });
        });
    });
</script>
@endpush
