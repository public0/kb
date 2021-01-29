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
                    <h4 class="page-title mb-0">Profile</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/'); ?>/admin"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item" aria-current="page">Profile</li>
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
                            <h3 class="card-title">Change Password</h3>
                        </div>
                        <div class="card-body pb-2">
                            <form class="needs-validation" method="post" action="<?php echo URL::to('/'); ?>/admin/profile">
                                @csrf
                                <div class="row row-sm">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input name="Password" class="form-control" placeholder="Password" required="required"  type="password" value="">
                                        </div>
                                        <div class="form-group">
                                            <input name="RetypePassword" class="form-control" placeholder="Retype Password" required="required"  type="password" value="">
                                        </div>
                                        <input type="submit" class="btn btn-info" value="Submit" />
                                    </div>
                                </div>
                                <div class="mt-4 mb-0 text-dark">
                                    * The password must be at least 10 characters and contain at least one uppercase character and one number.
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
