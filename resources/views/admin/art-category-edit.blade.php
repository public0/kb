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
                        <li class="breadcrumb-item"><a href="<?php echo route('admin.home'); ?>"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="<?php echo URL::to('/admin/categories'); ?>">Categories</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                        <form class="needs-validation" method="post" action="{{ url()->current() }}">
                        @csrf
                        <div class="card-body pb-2">
                            <div class="row row-sm">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Name" name="name" required="required" type="text" value="{{$category->name}}">
                                    </div>
                                    @if(!empty($language))
                                    <div class="form-group">
                                        <label class="form-label">Language</label>
                                        <select name="lang" class="form-control custom-select select2">
                                            @foreach($language as $lng)
                                            <option value="{{$lng->abv}}" @if($category->lang == $lng->abv) selected="selected" @endif>{{$lng->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif
                                    @if(!empty($categs))
                                    <div class="form-group">
                                        <label class="form-label">Parent</label>
                                        <select name="parent_id" class="form-control custom-select select2">
                                            <option value="0">---</option>
                                            @foreach($categs as $cat)
                                            <option value="{{$cat->id}}" @if($category->parent_id == $cat->id) selected="selected" @endif>{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-control custom-select select2">
                                            <option value="1" @if($category->status == 1) selected="selected" @endif>Active</option>
                                            <option value="0" @if($category->status == 0) selected="selected" @endif>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="button" class="btn btn-light mr-2" onclick="window.location='<?php echo URL::to('/admin/categories'); ?>'">{{ __('labels.back') }}</button>
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
