@extends('ibd/base')

@section('content')
    <div class="app-content main-content">
        <div class="side-app">
            <x-AdminHeader/>
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title mb-0">Configurator Triggers</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/'); ?>"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Configurator</li>
                    </ol>
                </div>
                <div class="page-rightheader">
                    <button class="btn btn-success" data-toggle="modal" data-target="#add-trigger-modal" type="button">Add</button>
                </div>
            </div>
            <div hidden>
                <select class="custom-select form-control" name="trigger_type" id="types_add">
                    @foreach($types as $type)
                        <option value="{{$type->TypeId}}">({{$type->TypeId}}){{$type->TypeName}}</option>
                    @endforeach
                </select>
                <select class="custom-select form-control" name="trigger_calculation" id="calcs_add">
                    @foreach($calculations as $calculation)
                        <option value="{{$calculation->CalculationId}}">({{$calculation->CalculationId}}){{$calculation->CalculationName}}</option>
                    @endforeach
                </select>
            </div>
            <!-- Params modal-->
            <div class="modal fade" id="trigger-params-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Param</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="activeTrigger" data-value=""></div>
                            <div class="alert alert-danger d-none" id="trigger-param-alert" role="alert"></div>
                            <div class="alert alert-light-success d-none" id="trigger-param" role="alert"></div>
                            <button type="button" id="add-trigger-param" class="float-right btn btn-success" data-dismiss="modal">Add new</button>
                            <br />
                            <br />
                            <br />
                            <table class="table table-bordered text-nowrap" id="trigger_params">
                                <thead>
                                <th>Id</th>
                                <th>Type</th>
                                <th>Param Id</th>
                                <th>Type SQL Expression</th>
                                <th>SQL Expression</th>
                                <th>Output Param</th>
                                <th>Actions</th>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Params modal-->
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
                                <table class="table table-bordered text-nowrap" id="triggers_table">
                                    <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">Id</th>
                                        <th class="wd-15p border-bottom-0">Name</th>
                                        <th class="wd-15p border-bottom-0">Description</th>
                                        <th class="wd-15p border-bottom-0">Type</th>
                                        <th class="wd-15p border-bottom-0">Calcualtion</th>
                                        <th class="wd-15p border-bottom-0">Status</th>
                                        <th class="wd-15p border-bottom-0">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($triggers as $trigger)
                                        <tr>
                                            <td>{{$trigger->Id}}</td>
                                            <td><input type="text" class="form-control" name="trigger_name" value="{{$trigger->TriggerName}}"></td>
                                            <td><input type="text" class="form-control" name="trigger_desc" value="{{$trigger->Description}}"></td>
                                            <td>
                                                <div class="card shadow-none" style="min-width:250px">
                                                    <select class="form-control triggertype" name="trigger_type"
                                                        data-url="/ibd/ajax/getselecttypes" autocomplete="off" placeholder="({{$trigger->TriggeredType}}){{$trigger->TypeName}}">
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="card shadow-none" style="min-width:250px">
                                                    <select class="form-control triggercalc" name="trigger_calculation"
                                                            data-url="/ibd/ajax/getselectcalcs" autocomplete="off" placeholder="({{$trigger->GeneratedCalculationId}}){{$trigger->CalculationName}}">
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="card shadow-none" style="min-width:100px">
                                                    <select class="custom-select form-control" name="trigger_status">
                                                        <option value="0" {{($trigger->Activ == 0)?'selected':''}}>Inactiv</option>
                                                        <option value="1" {{($trigger->Activ == 1)?'selected':''}}>Activ</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-success update-trigger" data-toggle="modal" data-target="" data-id="{{$trigger->Id}}" >
                                                    Save
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="" data-id="{{$trigger->Id}}">
                                                    Delete
                                                </button>
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#trigger-params-modal" data-id="{{$trigger->Id}}">
                                                    Params
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