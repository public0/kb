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
                    <h4 class="page-title mb-0">Category</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="<?php echo URL::to('/'); ?>/admin/categories">Categories</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Edit</a></li>
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
                <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>@foreach ($errors->all() as $error) {{ $error }}<br> @endforeach</div>
            @endif
            <!-- Row-1 -->
            <div class="row">
                <div class="col-12">
                    <!--div-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Category Edit</h3>
                        </div>
                        <div class="card-body pb-2 ">
                            <form class="needs-validation" method="post" action="<?php echo URL::to('/'); ?>/admin/category/edit/{{$my_data->id}}">
                                @csrf
                                <div class="row row-sm">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Name" name="name" required="required" type="text" value="{{$my_data->name}}">
                                        </div>
                                        @if(!empty($language))
                                            <div class="form-group">
                                                <label class="form-label">Language</label>
                                                <select name="lang" class="form-control custom-select select2">
                                                    @foreach($language as $lng)
                                                        <option value="{{$lng->abv}}" @if($my_data->lang == $lng->abv) {{'selected="selected"'}} @endif>{{$lng->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                        @if(!empty($categ))
                                            <div class="form-group">
                                                <label class="form-label">Parent</label>
                                                <select name="parent_id" class="form-control custom-select select2">
                                                    <option value="0">---</option>
                                                    @foreach($categ as $gr)
                                                        <option value="{{$gr->id}}" @if($my_data->parent_id == $gr->id) {{'selected="selected"'}} @endif>{{$gr->name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <label class="form-label">Status</label>
                                            <select name="status" class="form-control custom-select select2">
                                                <option value="1" @if($my_data->status == 1) {{'selected="selected"'}} @endif>Active</option>
                                                <option value="0" @if($my_data->status == 0) {{'selected="selected"'}} @endif>Inactive</option>
                                            </select>
                                        </div>
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
