@extends('admin/index')

@section('content')
    <div class="app-content main-content">
        <div class="side-app">
            <!--app header-->
            <x-AdminHeader/>
            <!--/app header-->
            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title mb-0">Users</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/admin/users') }}">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('labels.add') }}</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ Session::get('message') }}</div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ Session::get('error') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>@foreach($errors->all() as $error) {{ $error }}<br> @endforeach</div>
            @endif
            <!-- Row-1 -->
            <div class="row">
                <div class="col-12">
                    <!--div-->
                    <div class="card">
                        <form class="needs-validation" method="post" action="{{ url()->current() }}">
                        @csrf
                        <div class="card-body pb-2">
                            <div class="row row-sm">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">First Name</label>
                                        <input name="name" class="form-control mb-4" placeholder="First Name" required="required" type="text" value="{{old('name')}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Last Name</label>
                                        <input name="surname" class="form-control mb-4" placeholder="Last Name" required="required" type="text" value="{{old('surname')}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">E-Mail</label>
                                        <input name="email" class="form-control mb-4" placeholder="E-Mail" required="required" type="text" value="{{old('email')}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Country</label>
                                        <select name="country_code" class="form-control">
                                            @foreach($countries as $code => $name)
                                            <option value="{{$code}}" @if(old('country_code') == $code) selected="selected" @endif>{{$name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-control custom-select select2">
                                            <option value="1" @if(old('status') == 1) selected="selected" @endif>{{ __('status.active') }}</option>
                                            <option value="0" @if(old('status') == 0) selected="selected" @endif>{{ __('status.inactive') }}</option>
                                        </select>
                                    </div>
                                    @if(!empty($groups))
                                    <div class="form-group">
                                        <label class="form-label">Groups</label>
                                        <select name="groups[]" class="form-control custom-select select2" multiple="multiple">
                                            @foreach($groups as $gr)
                                            <option value="{{$gr->id}}" @if(!empty(old('groups')) && in_array($gr->id, old('groups'))) selected="selected" @endif>{{$gr->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif
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
            <!-- End Row-1 -->
        </div>
    </div>
@endsection
