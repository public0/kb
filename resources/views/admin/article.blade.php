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
                    <h4 class="page-title mb-0">Articles</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Articles</a></li>
                    </ol>
                </div>
                <div class="page-rightheader">
                    <div class="btn btn-list">
                        <a href="<?php echo URL::to('/'); ?>/admin/article/add" class="btn btn-info"><i class="fe fe-plus mr-1"></i> Add </a>
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
            @if ($errors->any())
                <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>@foreach ($errors->all() as $error) {{ $error }}, @endforeach</div>
            @endif
            <!-- Row-1 -->
            <div class="row">
                <div class="col-12">
                    <!--div-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Articles List</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if(!empty($articles))
                                <table class="table table-bordered text-nowrap" id="example2">
                                    <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">Title</th>
                                        <th class="wd-15p border-bottom-0">Language</th>
                                        <th class="wd-15p border-bottom-0">Tags</th>
                                        <th class="wd-15p border-bottom-0">Created AT</th>
                                        <th class="wd-10p border-bottom-0">Status</th>
                                        <th class="wd-10p border-bottom-0">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($articles as $art)
                                    <tr @if($art->lang_parent_id != $art->id && !empty($art->lang_parent_id)) class="inccls" @endif>
                                        <td>@if($art->lang_parent_id != $art->id && !empty($art->lang_parent_id)) &raquo;&raquo;  @endif{{ $art->title }}</td>
                                        <td>{{ $art->lang }}</td>
                                        <td>{{ $art->tags }}</td>
                                        <td>{{ $art->created_at }}</td>
                                        <td>@if($art->status == 1)  {{'Active'}} @else {{'Inactive'}} @endif</td>
                                        <td>
                                            <a href="<?php echo URL::to('/'); ?>/admin/article/edit/{{ $art->article_id }}" class="btn btn-info"><i class="fe fe-book-open mr-1"></i> Edit </a>
                                            <a href="<?php echo URL::to('/'); ?>/admin/article/view/{{ $art->article_id }}" class="btn btn-info"><i class="fe fe-book-open mr-1"></i> View </a>
                                            <a href="<?php echo URL::to('/'); ?>/admin/article/delete/{{ $art->article_id }}" class="btn btn-danger" onclick="return confirm('Esti sigur ca vrei sa stergi?')"><i class="fe fe-trash-2 mr-2"></i> Delete </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                    @endif
                            </div>
                        </div>
                    </div>
                    <!--/div-->
                </div>
            </div>
            <!-- End Row-1 -->
        </div>
    </div>

@endsection
