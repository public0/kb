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
                    <h4 class="page-title mb-0">Users Edit</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/'); ?>/admin"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="<?php echo URL::to('/'); ?>/admin/users">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->
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
            <!-- Row-1 -->
            <div class="row">
                <div class="col-12">
                    <!--div-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">User Edit</h3>
                        </div>
                        <div class="card-body pb-2">
                            @if(!empty($users))
                            <form class="needs-validation" method="post" action="<?php echo URL::to('/'); ?>/admin/users/edit/{{ $users->id }}">
                                @csrf
                                <div class="row row-sm">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input name="name" class="form-control  mb-4" placeholder="First Name" required="required"  type="text" value="@if(!empty(old('name'))) {{old('name')}} @else {{ $users->name }} @endif">
                                        </div>
                                        <div class="form-group">
                                            <input name="surname" class="form-control mb-4" placeholder="Last Name" required="required" type="text" value="@if(!empty(old('surname'))) {{old('surname')}} @else {{ $users->surname }} @endif">
                                        </div>
                                        <div class="form-group">
                                            <input name="email" class="form-control  mb-4" placeholder="E-Mail" required="required"  type="text" value="@if(!empty(old('email'))) {{old('email')}} @else {{ $users->email }} @endif">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Status</label>
                                            <select name="status" id="select-countries" placeholder="E-Mail" class="form-control custom-select select2">
                                                <option value="1"  @if($errors->any()) @if(old('status')==1) selected="selected" @endif @else @if($users->status == 1) selected="selected" @endif @endif >Active</option>
                                                <option value="0"  @if($errors->any()) @if(old('status')==0) selected="selected" @endif @else @if($users->status == 0) selected="selected" @endif @endif >Inactive</option>
                                            </select>
                                        </div>
                                        @if(!empty($groups))
                                            <div class="form-group">
                                                <label class="form-label">Group</label>
                                                <select name="groups[]" id="select-countries" class="form-control custom-select select2" multiple="multiple">
                                                    @foreach($groups as $gr)
                                                        <option value="{{$gr->id}}" @if(collect(old('groups'))->contains($gr->id) && $errors->any())  selected="selected" @else @if(isset($users->groups) && in_array($gr->id,$users->groups) && !$errors->any()) selected="selected" @endif @endif data-data='{"image": "./../../assets/images/flags/br.svg"}'>{{$gr->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                        <input type="submit" class="btn btn-info" value="Submit" />
                                    </div>
                                </div>
                            </form>
                                @endif
                        </div>
                    </div>
                    <!--/div-->
                </div>
            </div>
            <!-- End Row-1 -->
        </div>
    </div>
@endsection
