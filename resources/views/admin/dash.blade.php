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
                    <h4 class="page-title mb-0">Hi! Welcome Back</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row-1 -->
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                    <div class="card overflow-hidden dash1-card border-0">
                        <div class="card-body">
                            <p class=" mb-1 ">Total Users</p>
                            <h2 class="mb-1 number-font">{{$users_all}}</h2>
                            <small class="fs-12 text-muted">Active {{$users_active}}</small>
                        </div>
                        <div id="spark2"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                    <div class="card overflow-hidden dash1-card border-0">
                        <div class="card-body">
                            <p class=" mb-1 ">Total Articles</p>
                            <h2 class="mb-1 number-font">{{$articles_all}}</h2>
                            <small class="fs-12 text-muted">Active {{$articles_active}}</small>

                        </div>
                        <div id="spark1"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                    <div class="card overflow-hidden dash1-card border-0">
                        <div class="card-body">
                            <p class=" mb-1 ">Total Categories</p>
                            <h2 class="mb-1 number-font">{{$category_all}}</h2>
                            <small class="fs-12 text-muted">Active {{$category_active}}</small>

                        </div>
                        <div id="spark3"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                    <div class="card overflow-hidden dash1-card border-0">
                        <div class="card-body">
                            <p class=" mb-1">Total Subscribers</p>
                            <h2 class="mb-1 number-font">{{$subscribe_all}}</h2>
                            <small class="fs-12 text-muted">Active {{$subscribe_active}}</small>

                        </div>
                        <div id="spark4"></div>
                    </div>
                </div>
            </div>
            <!-- End Row-1 -->



            <!-- Row-3 -->
            <div class="row">
                <div class="col-xl-6 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Recent Articles</h3>
                        </div>
                        <div class="card-body">
                            @foreach($recent_articles as $rarticle)
                            <div class="list-card">
                                <span class="bg-warning list-bar"></span>
                                <div class="row align-items-center">
                                    <div class="col-9 col-sm-9">
                                        <div class="media mt-0">
                                            <img src="<?php echo URL::to('/'); ?>/th/assets/images/users/1.jpg" alt="img" class="avatar brround avatar-md mr-3">
                                            <div class="media-body">
                                                <div class="d-md-flex align-items-center mt-1">
                                                    <h6 class="mb-1"><a href="<?php echo URL::to('/'); ?>/article/{{$rarticle->article_id}}" target="_blank">{{$rarticle->title}}</a></h6>
                                                </div>
                                                <span class="mb-0 fs-13 text-muted">ID#{{$rarticle->id}}<span class="ml-2 text-success fs-13 font-weight-semibold">{{$rarticle->lang}}</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Recent Users</h3>
                        </div>
                        <div class="card-body">
                            @foreach($recent_users as $user)
                            <div class="list-card">
                                <span class="bg-warning list-bar"></span>
                                <div class="row align-items-center">
                                    <div class="col-9 col-sm-9">
                                        <div class="media mt-0">
                                            <img src="<?php echo URL::to('/'); ?>/th/assets/images/users/1.jpg" alt="img" class="avatar brround avatar-md mr-3">
                                            <div class="media-body">
                                                <div class="d-md-flex align-items-center mt-1">
                                                    <h6 class="mb-1">{{$user->name}} {{$user->surname}}</h6>
                                                </div>
                                                <span class="mb-0 fs-13 text-muted">{{$user->email}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row-3 -->
        </div>
    </div>
@endsection
