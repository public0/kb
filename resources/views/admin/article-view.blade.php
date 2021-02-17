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
                    <h4 class="page-title mb-0">Articles List</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/'); ?>/admin"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="<?php echo URL::to('/'); ?>/admin/article">Articles</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row-1 -->
            <div class="row">
                <div class="col-12">
                    <!--div-->
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Article View</div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if(!empty($articles))
                                <table class="table table-bordered text-nowrap" id="example2">
                                    <tbody>
                                    <tr>
                                        <td>Lang</td><td>{{ $articles->lang }}</td>
                                    </tr>
                                    <tr>
                                        <td>Title</td><td>{{ $articles->title }}</td>
                                    </tr>
                                    <tr>
                                        <td>Description</td><td>{{ $articles->description }}</td>
                                    </tr>
                                    <tr>
                                        <td>Body</td><td>{!! $articles->body !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Category</td><td>{{ $articles->categoty }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tags</td><td>{{ $articles->tags }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td><td>@if($articles->status == 0) Active @else Inactive @endif</td>
                                    </tr>
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
