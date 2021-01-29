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
                    <h4 class="page-title mb-0">Newsletter List</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Newsletter</a></li>
                    </ol>
                </div>
                <!--div class="page-rightheader">
                    <div class="btn btn-list">
                        <a href="<?php echo URL::to('/'); ?>/admin/users/add" class="btn btn-info"><i class="fe fe-plus mr-1"></i> Add </a>
                    </div>
                </div-->
            </div>
            <!--End Page header-->

            <!-- Row-1 -->
            <div class="row">
                <div class="col-12">
                    <!--div-->
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                @if(!empty($newsletter))
                                <table class="table table-bordered text-nowrap" id="example2">
                                    <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">Email</th>
                                        <th class="wd-15p border-bottom-0">Status</th>
                                        <th class="wd-15p border-bottom-0">Date</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($newsletter as $new)
                                    <tr>
                                        <td>{{ $new->Email }}</td>
                                        <td>@if($new->Status == 1)  {{'Active'}} @else {{'Inactive'}} @endif</td>
                                        <td>{{ $new->created_at }}</td>
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
