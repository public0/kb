@extends('admin/index')

@section('content')
    <div class="app-content main-content">
        <div class="side-app">
            <!--app header-->
            <x-AdminHeader/>
            <!--/app header-->
            <!--page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title mb-0">Users</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Users</li>
                    </ol>
                </div>
                <div class="page-rightheader">
                    <div class="btn btn-list">
                        <a href="{{ url('/admin/users/add') }}" class="btn btn-sm btn-info"><i class="fe fe-plus mr-1"></i> {{ __('labels.add') }}</a>
                    </div>
                </div>
            </div>
            <!--/page header-->
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ Session::get('message') }}</div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ Session::get('error') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>@foreach($errors->all() as $error) {{ $error }}<br> @endforeach</div>
            @endif
            <!--div-->
            <div class="card">
                <div class="card-body">
                    <!-- Filters -->
                    <form method="get" action="" class="form-inline">
                        <div class="form-group mr-sm-3">
                            <select name="role" class="form-control">
                                <option value="">Select Role</option>
                                @foreach($roles as $roleID => $role)
                                <option value="{{ $roleID }}"@if($filters['role'] && $filters['role'] == $roleID) selected="selected"@endif>{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mr-sm-3">
                            <select name="country" class="form-control">
                                <option value="">Select Country</option>
                                @foreach($countries as $code => $country)
                                <option value="{{ $code }}"@if($filters['country'] && $filters['country'] == $code) selected="selected"@endif>{{ $country }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mr-sm-3">
                            <select name="status" class="form-control">
                                <option value="">Select Status</option>
                                <option value="1"@if(isset($filters['status']) && $filters['status'] == 1) selected="selected"@endif>{{ __('status.active') }}</option>
                                <option value="0"@if(isset($filters['status']) && $filters['status'] == 0) selected="selected"@endif>{{ __('status.inactive') }}</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mr-sm-3">{{ __('labels.filter') }}</button>
                        @if(app('request')->query())<button type="button" class="btn btn-orange" onclick="window.location='{{ url()->current() }}'">{{ __('labels.reset') }}</button>@endif
                    </form>
                    <hr>
                    <!-- // Filters -->
                    @if(!empty($users))
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">First name</th>
                                <th class="wd-15p border-bottom-0">Last name</th>
                                <th class="wd-25p border-bottom-0">Email</th>
                                <th class="wd-15p border-bottom-0">Created AT</th>
                                <th class="wd-20p border-bottom-0">Role</th>
                                <th class="wd-20p border-bottom-0">Country</th>
                                <th class="wd-10p border-bottom-0">Status</th>
                                <th class="wd-10p border-bottom-0 no-sort text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $usr)
                            <tr>
                                <td>{{ $usr->name }}</td>
                                <td>{{ $usr->surname }}</td>
                                <td>{{ $usr->email }}</td>
                                <td>{{ $usr->created_at }}</td>
                                <td>{{ $usr->role_name }}</td>
                                <td>
                                    <img src="{{ url('/th/assets/images/flags/' . strtolower($usr->country_code) . '.svg') }}" alt="{{ $usr->country_code }}" width="24" class="border-top border-right border-bottom border-left border-gray" />
                                </td>
                                <td class="table-col-shrink text-center">
                                    <a href="{{ url('/admin/users/status', [$usr->id]) }}" class="btn btn-sm btn-link">{{ $usr->status_name }}</a>
                                </td>
                                <td class="table-col-shrink text-center">
                                    <a href="{{ url('/admin/users/edit', [$usr->id]) }}" class="btn btn-sm btn-success"><i class="fe fe-edit-2 mr-1"></i> {{ __('labels.edit') }}</a>
                                    <button type="button" data-href="{{ url('/admin/users/password-reset', [$usr->id]) }}" class="btn btn-sm btn-primary btn-password-reset"><i class="fe fe-lock mr-1"></i> {{ __('labels.password_reset') }}</button>
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
    function passwordResetModal(self, data) {
        $('.modal').remove();
        var _token = '{{ @csrf_token() }}';
        var buttons = {
            cancel: '{{ __('labels.close') }}',
            ok: '{{ __('labels.reset') }}'
        };

        var html = '<div class="modal show" aria-modal="true">';
        html += '<div class="modal-dialog modal-md" role="document">';
        html += '<div class="modal-content">';
        html += '<div class="modal-header">';
        html += '<h6 class="modal-title">{{ __('labels.password_reset') }}</h6>';
        html += '<button aria-label="' + buttons.cancel + '" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>';
        html += '</div>';
        html += '<div class="modal-body">';

        html += '<table class="table table-bordered">';
        html += '<tr>';
        html += '<td width="24" align="center"><i class="fe fe-user"></i></td>';
        html += '<td>' + data.name + '</td>';
        html += '</tr>';
        html += '<tr>';
        html += '<td width="24" align="center"><i class="fe fe-mail"></i></td>';
        html += '<td>' + data.email + '</td>';
        html += '</tr>';
        html += '</table>';
        html += '<div class="input-group reset-link-input-group">';
        html += '<input type="text" class="form-control" />';
        html += '<div class="input-group-append">';
        html += '<button class="btn btn-indigo" type="button"><i class="fe fe-arrow-right"></i></button>';
        html += '</div>';
        html += '</div>';

        html += '</div>';
        html += '<div class="modal-footer justify-content-center">';
        html += '<button class="btn btn-indigo btn-reset" type="button">' + buttons.ok + '</button>';
        html += '<button class="btn btn-secondary" data-dismiss="modal" type="button">' + buttons.cancel + '</button>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';

        $('body').append(html);
        $('.modal').modal();

        if (!data.reset_link) {
            $('.modal .reset-link-input-group').addClass('d-none');
        }

        $('.modal .btn-reset').on('click', function () {
            $.ajax(self.data('href'), {
                method: 'POST',
                data: {'_token': _token},
                dataType: 'json',
                success: function (data) {
                    if (data.reset_link) {
                        $('.modal .reset-link-input-group input.form-control').val(data.reset_link);
                        $('.modal .reset-link-input-group .btn').on('click', function () {
                            window.open(data.reset_link, '_blank');
                        });
                        $('.modal .reset-link-input-group').removeClass('d-none');
                    }
                }
            });
        });
    }
    $('.btn-password-reset').on('click', function (e) {
        e.preventDefault();
        var self = $(this);
        $.ajax(self.data('href'), {
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                passwordResetModal(self, data);
            }
        });
    });
</script>
@endpush
