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
                    <h4 class="page-title mb-0">Users Add</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/'); ?>/admin"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="<?php echo URL::to('/'); ?>/admin/users">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add</li>
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
                <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>@foreach ($errors->all() as $error) {{ $error }}, @endforeach</div>
            @endif
            <!-- Row-1 -->
            <div class="row">
                <div class="col-12">
                    <!--div-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Users Add</h3>
                        </div>
                        <div class="card-body pb-2">
                            <form class="needs-validation" method="post" action="<?php echo URL::to('/'); ?>/admin/users/add">
                                @csrf
                                <div class="row row-sm">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">First Name</label>
                                            <input name="name" class="form-control  mb-4" placeholder="First Name" required="required"  type="text" value="{{old('name')}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Last Name</label>
                                            <input name="surname" class="form-control mb-4" placeholder="Last Name" required="required"  type="text" value="{{old('surname')}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">E-Mail</label>
                                            <input name="email" class="form-control  mb-4" placeholder="E-Mail"  required="required" type="text" value="{{old('email')}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Status</label>
                                            <select name="status" id="select-countries" placeholder="E-Mail" class="form-control custom-select select2">
                                                <option value="1" @if(old('status') == 1) selected="selected" @endif>Active</option>
                                                <option value="0" @if(old('status') == 0) selected="selected" @endif>Inactive</option>
                                            </select>
                                        </div>
                                        @if(!empty($groups))
                                        <div class="form-group">
                                            <label class="form-label">Groups</label>
                                            <select name="groups[]" id="select-countries" class="form-control custom-select select2" multiple="multiple">
                                                @foreach($groups as $gr)
                                                    <option value="{{$gr->id}}" @if(!empty(old('groups')) && in_array($gr->id, old('groups'))) selected="selected" @endif>{{$gr->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @endif
                                        <input type="submit" class="btn btn-info" value="Submit" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--/div-->
                </div>
            </div>
            <!-- End Row-1 -->
        </div>
    </div>
@endsection
