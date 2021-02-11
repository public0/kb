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
                    <h4 class="page-title mb-0">Groups</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/'); ?>/admin"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Groups Rights</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row-1 -->
            <div class="row">
                <div class="col-12">
                    <!--div-->
                    <div class="card">
                        <form action="<?php echo URL::to('/'); ?>/admin/groups/rights" method="post">
                        <div class="card-header">
                            <div class="card-title">Groups Rights</div>
                            <a href="" class="btn btn-info">Save</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if(!empty($groups))
                                <table class="table table-bordered text-nowrap" id="example2">
                                    <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">Name</th>
                                        <th class="wd-15p border-bottom-0">Admin</th>
                                        <th class="wd-10p border-bottom-0">Clienti</th>
                                        <th class="wd-10p border-bottom-0">Interni</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($groups as $gr)
                                    <tr>
                                        <td>{{$gr->name}}</td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                    </tr>
                                    @endforeach
                                </table>
                                    @endif
                            </div>
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
