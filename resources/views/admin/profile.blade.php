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
                    <h4 class="page-title mb-0">Profile</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
                <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>@foreach ($errors->all() as $error) {{ $error }}, @endforeach</div>
            @endif
            <!--div-->
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">{{ __('Change Profile Photo') }}</div>
                        </div>
                        <form class="needs-validation" method="post" action="{{ url()->current() }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <div class="widget-user-image">
                                    @if($user->avatar)
                                    <img alt="{{ $user->full_name }}" class="rounded-circle mr-3" src="{{ $user->avatar }}" />
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Profile Photo</label>
                                <input type="file" name="image" accept="image/*" class="form-control" />
                            </div>
                            <div class="mt-4 mb-0 text-dark">
                                <span class="text-info">*</span> {{ __('The photo must be at least 120px x 120px sqaure.') }}
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            @if($user->image)<a href="{{ route('admin.profile.delete-image') }}" class="btn btn-danger mr-3" onclick="return modals.confirm(this, 'Notice', 'Are you sure you want to delete the profile photo?', '{{ __('labels.yes') }}', '{{ __('labels.no') }}')">{{ __('labels.delete') }}</a>@endif
                            <button type="submit" name="ChangePhoto" class="btn btn-info">{{ __('labels.submit') }}</button>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Change Password') }}</h3>
                        </div>
                        <form class="needs-validation" method="post" action="{{ url()->current() }}">
                        @csrf
                        <div class="card-body pb-2">
                            <div class="row row-sm">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="password" name="CurrentPassword" class="form-control" placeholder="Current password" required="required" value="{{ old('CurrentPassword') }}" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="Password" class="form-control" placeholder="New password" required="required" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="RetypePassword" class="form-control" placeholder="Retype new password" required="required" value="" />
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-0 text-dark">
                                <span class="text-info">*</span> {{ __('The password must be at least 10 characters and contain at least one uppercase character and one number.') }}
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" name="ChangePassword" class="btn btn-info">{{ __('labels.submit') }}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--/div-->
        </div>
    </div>
@endsection
