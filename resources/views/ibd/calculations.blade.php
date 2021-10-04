@extends('ibd/base')

@section('content')
    <div class="app-content main-content">
        <div class="side-app">
            <x-AdminHeader/>
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title mb-0">Configurator Calculations</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/'); ?>"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Configurator</li>
                        <li class="breadcrumb-item active" aria-current="page">Calculations</li>
                    </ol>
                </div>
                <div class="page-rightheader">
                    <button class="btn btn-success" data-toggle="modal" data-target="#add-trigger-modal" type="button">Add</button>
                </div>
            </div>
            <!-- Input Types modal-->
            <div class="modal fade" id="it-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Input Type</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger d-none" id="input-alert" role="alert"></div>
                            <div class="alert alert-light-success d-none" id="input-info" role="alert"></div>
                            <input type="hidden" id="it-id" value="">
                            <input type="hidden" id="it-calc" value="">
                            <table class="table table-bordered text-nowrap" id="trigger_params">
                                <tbody>
                                    <tr>
                                        <td>Description</td>
                                        <td><textarea class="form-control" id="it-desc"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td>TypeId</td>
                                        <td>
                                            <select id="it-type" class="form-control">
                                                @foreach($types as $type)
                                                    <option value="{{$type->TypeId}}">({{$type->TypeId}}) {{$type->TypeName}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TypeAlias</td>
                                        <td><input type="text" id="it-alias" class="form-control" value=""/></td>
                                    </tr>
                                    <tr>
                                        <td>UpdateValue</td>
                                        <td><textarea class="form-control" id="it-update"></textarea></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" class="mx-2 my-2 btn btn-success btn iu-it">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Input Types modal-->
            <!-- Custom Params modal-->
            <div class="modal fade" id="cp-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Param</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger d-none" id="param-alert" role="alert"></div>
                            <div class="alert alert-light-success d-none" id="param-info" role="alert"></div>
                            <table class="table table-bordered text-nowrap" id="trigger_params">
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>CalculationCustomParamType</td>
                                        <td>
                                            <input type="hidden" id="ccp-id" value="">
                                            <input type="hidden" id="ccp-calc" value="">
                                            <select id="ccp-sel" name="ccp" class="form-control">
                                                @foreach($calccustomparams as $ccp)
                                                    <option value="{{$ccp->CalculationCustomParamType}}">{{$ccp->CalculationCustomParamType}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ParameterName</td>
                                        <td>
                                            <select id="ccp-params" name="params" class="form-control">
                                                @foreach($params as $param)
                                                    <option value="{{$param->Id}}">{{$param->Name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>SQLExpression</td>
                                        <td><textarea class="form-control" id="ccp-sql" name="sql"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td>TypeNameInput</td>
                                        <td>
                                            <select id="ccp-it" name="types" class="form-control">
                                                @foreach($types as $type)
                                                    <option value="{{$type->TypeId}}">{{$type->TypeName}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" class="mx-2 my-2 btn btn-success btn iu-ccp">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Custom Params modal-->
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
                                <table class="table table-bordered text-nowrap" id="calcs_table">
                                    <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">Id</th>
                                        <th class="wd-15p border-bottom-0">Name</th>
                                        <th class="wd-15p border-bottom-0">Description</th>
                                        <th class="wd-15p border-bottom-0">Output Type</th>
                                        <th class="wd-15p border-bottom-0">Calcualation Type</th>
                                        <th class="wd-15p border-bottom-0">Calcualation</th>
                                        <th class="wd-15p border-bottom-0">Status</th>
                                        <th class="wd-15p border-bottom-0">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($calculations as $calculation)
                                        <div id="calc_iu_{{$calculation->CalculationId}}">
                                            <tr class="" id="{{$calculation->CalculationId}}">
                                                <td>{{$calculation->CalculationId}}</td>
                                                <td><input type="text" class="form-control" name="trigger_name" value="{{$calculation->CalculationName}}"></td>
                                                <td><input type="text" class="form-control" name="trigger_desc" value="{{$calculation->Description}}"></td>
                                                <td><input type="text" class="form-control" name="trigger_desc" value="{{$calculation->OutputTypeId}}"></td>
                                                <td><input type="text" class="form-control" name="trigger_desc" value="{{$calculation->CalculationType}}"></td>
                                                <td><input type="text" class="form-control" name="trigger_desc" value="{{$calculation->Calculation}}"></td>
                                                <td><input type="text" class="form-control" name="trigger_desc" value="{{$calculation->Activ}}"></td>
                                                <td><button class="btn calc-row-btn"><i class="fa fa-bars"></i></button></td>
                                            </tr>
                                            <tr id="calc_iu_{{$calculation->CalculationId}}">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </div>
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