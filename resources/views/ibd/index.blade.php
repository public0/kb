@extends('ibd/base')

@section('content')
    <div class="app-content main-content">
        <div class="side-app">
            <x-AdminHeader/>
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title mb-0">Configurator Types</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/'); ?>"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Configurator</li>
                    </ol>
                </div>
                <div class="page-rightheader">
                    <button class="btn btn-success" type="button">Add</button>
                </div>
            </div>
            <!-- Params Modal -->
            <div class="modal fade" id="params-config-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Parameters</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                    <option selected>Choose...</option>
                                    @foreach($params as $param)
                                        <option value="{{$param->Id}}">({{$param->Id}}){{$param->Name}}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-success" type="button">Add</button>
                                </div>
                            </div>
                            <br/>

                            <table class="table table-bordered text-nowrap" id="params">
                                <thead>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>actions</th>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Params MODAL -->

            <!-- Calculations Modal -->
            <div class="modal fade" id="calculations-config-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="activeCalculation" data-value=""></div>
                            <table class="table table-bordered text-nowrap" id="calculations">
                                <thead>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Type</th>
                                <th>Calculation</th>
                                <th>Status</th>
                                <th>actions</th>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Calculations inputs --}}
            <div class="modal fade" id="calculations-inputs-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Input types</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger d-none" id="input-type-alert" role="alert"></div>
                            <div class="alert alert-light-success d-none" id="input-info" role="alert"></div>
                            <button type="button" id="add-input" class="float-right btn btn-success" data-dismiss="modal">Add new</button>
                            <br />
                            <br />
                            <br />
                            <table class="table table-bordered text-nowrap" id="calculation_inputs">
                                <thead>
                                <th>Id</th>
                                <th>Type</th>
                                <th>Alias</th>
                                <th>Update Values</th>
                                <th>Description</th>
                                <th>Actions</th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Calculations inputs --}}

            {{-- Calculations custom params --}}
            <div class="modal fade" id="calculations-params-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Custom Params</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger d-none" id="param-alert" role="alert"></div>
                            <div class="alert alert-light-success d-none" id="param-info" role="alert"></div>
                            <button type="button" id="add-param" class="float-right btn btn-success" data-dismiss="modal">Add new</button>
                            <br />
                            <br />
                            <br />
                            <table class="table table-bordered text-nowrap" id="calculation_params">
                                <thead>
                                <th>Id</th>
                                <th>TypeId</th>
                                <th>Param ID</th>
                                <th>Type</th>
                                <th>Expression</th>
                                <th>Actions</th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        {{-- Calculations custom params --}}

            <!-- Calculations MODAL -->

            <!-- Triggers Modal -->
            <div class="modal fade" id="triggers-config-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Triggers MODAL -->

            <!-- Row-1 -->
            <div class="row">
                <div class="col-12">
                    <!--div-->
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Configurator</div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap" id="example3">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">Id</th>
                                            <th class="wd-15p border-bottom-0">Name</th>
                                            <th class="wd-15p border-bottom-0">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($types as $type)
                                        <tr>
                                            <td>{{$type->TypeId}}</td>
                                            <td>{{$type->TypeName}}</td>
                                            <td>
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#params-config-modal" data-id="{{$type->TypeId}}" >
                                                    Params
                                                </button>
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#calculations-config-modal" data-id="{{$type->TypeId}}">
                                                    Calculations
                                                </button>
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#triggers-config-modal" data-id="{{$type->TypeId}}">
                                                    Triggers
                                                </button>

                                            </td>
                                        </tr>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/div-->
                </div>
            </div>
        </div>
    </div>

@endsection