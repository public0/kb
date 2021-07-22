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
                        <li class="breadcrumb-item"><a href="{{ url('/admin/users') }}">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@if($user){{ __('labels.edit') }}@else{{ __('labels.add') }}@endif</li>
                    </ol>
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
                <form class="needs-validation" method="post" action="{{ url()->current() }}">
                @csrf
                <div class="card-body pb-2">
                    <div class="row row-sm">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="form-label">First name</label>
                                <input name="name" class="form-control mb-4" placeholder="First Name" required="required" type="text" value="{{ old('name', $user ? $user->name : null) }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Last Name</label>
                                <input name="surname" class="form-control mb-4" placeholder="Last Name" required="required" type="text" value="{{ old('surname', $user ? $user->surname : null) }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input name="email" class="form-control mb-4" placeholder="Email" required="required" type="text" value="{{ old('email', $user ? $user->email : null) }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Country</label>
                                <select name="country_code" class="form-control custom-select select2">
                                    @foreach($countries as $code => $name)
                                    <option value="{{ $code }}"@if(old('role', $user ? $user->country_code : null) == $code) selected="selected" @endif>{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Role</label>
                                <select name="role" class="form-control custom-select select2">
                                    <option value="">Select Role</option>
                                    @foreach($roles as $roleID => $role)
                                    <option value="{{ $roleID }}"@if(old('role', $user ? $user->role : null) == $roleID) selected="selected" @endif>{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-control custom-select select2">
                                    <option value="1"@if(old('status', $user ? $user->status : -1) == 1) selected="selected" @endif>{{ __('status.active') }}</option>
                                    <option value="0"@if(old('status', $user ? $user->status : -1) == 0) selected="selected" @endif>{{ __('status.inactive') }}</option>
                                </select>
                            </div>
                            @if (!$auth_user->client_id)
                            <div class="form-group">
                                <label class="form-label">Client</label>
                                <select name="client_id" class="form-control custom-select select2">
                                    <option value="">No Client</option>
                                    @foreach($clients as $client)
                                    <option value="{{ $client->id }}"@if(old('client_id', $user ? $user->client_id : null) == $client->id) selected="selected" @endif>{{ $client->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-4 perms-groups">
                            <div class="text-right mb-3">
                                <button type="button" class="btn btn-sm btn-success btn-check-all" title="{{ __('Select All') }}"><i class="fe fe-check"></i></button>
                                <button type="button" class="btn btn-sm btn-danger btn-uncheck-all" title="{{ __('Deselect All') }}"><i class="fe fe-x"></i></button>
                            </div>
                            <div class="row">
                                @if(!$auth_user->client_id)
                                <div class="col-6">
                                @if(!empty($adminModules))
                                    @php
                                    foreach ($adminModules as $group => $items) {
                                        foreach ($items as $k => $item) {
                                            if (!$auth_user->isRole('admin') && !empty($item['admin'])) {
                                                unset($adminModules[$group][$k]);
                                            }
                                        }
                                    }
                                    @endphp
                                    <h4>Admin</h4>
                                    @foreach($adminModules as $group => $items)
                                    @if($items)
                                    <div class="form-group">
                                        <label class="form-label">{{ $group }}</label>
                                        @foreach($items as $item)
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="perms[{{ $item['id'] }}]" data-roles="{{ strtolower($item['roles']) }}" @if($user && in_array($item['id'], $user->permissions_data)) checked="chekcked"@endif />
                                            <span class="custom-control-label">
                                                {{ __($item['name']) }}
                                                @if(!empty($item['admin']))<i class="fe fe-alert-octagon fs-14 text-danger" style="cursor:help" title="{{ __('Requires also a user with Admin role') }}"></i>@endif
                                            </span>
                                        </label>
                                        @endforeach
                                    </div>
                                    @endif
                                    @endforeach
                                @endif
                                </div>
                                @endif
                                <div class="col-6">
                                @if(!empty($appsModules))
                                    @php
                                    foreach ($appsModules as $group => $items) {
                                        foreach ($items as $k => $item) {
                                            if ($auth_user->client_id && empty($item['client'])) {
                                                unset($appsModules[$group][$k]);
                                            }
                                        }
                                    }
                                    @endphp
                                    <h4>Apps</h4>
                                    @foreach($appsModules as $group => $items)
                                    @if($items)
                                    <div class="form-group">
                                        <label class="form-label">{{ $group }}</label>
                                        @foreach($items as $item)
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="perms[{{ $item['id'] }}]" data-roles="{{ strtolower($item['roles']) }}" @if($user && in_array($item['id'], $user->permissions_data)) checked="chekcked"@endif />
                                            <span class="custom-control-label">{{ __($item['name']) }}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                    @endif
                                    @endforeach
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="button" class="btn btn-light mr-2" onclick="window.location='{{ url('/admin/users') }}'">{{ __('labels.back') }}</button>
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
    $(document).ready(function() {
        $('.perms-groups .btn-check-all').on('click', function (e) {
            e.preventDefault();
            $('.perms-groups input.custom-control-input').prop('checked', true);
        });
        $('.perms-groups .btn-uncheck-all').on('click', function (e) {
            e.preventDefault();
            $('.perms-groups input.custom-control-input').prop('checked', false);
        });
        $('select[name="role"]').on('change', function (e) {
            var txt = $('option:selected', this).text();
            $('.perms-groups input.custom-control-input').prop('checked', false);
            $('.perms-groups input.custom-control-input[data-roles*="' + txt.toLowerCase() + '"]').prop('checked', true);
        });
    });
</script>
@endpush
