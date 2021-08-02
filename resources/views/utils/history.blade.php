@extends('utils/index')

@section('content')
    <div class="app-content main-content">
        <div class="side-app">

            <!--app header-->
            <x-AdminHeader/>
            <!--/app header-->

            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title mb-0">Utilitare</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page"><!-- Dashboard --></li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row-3 -->
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Istoric > {{$client_name}} >  {{$server_name}} > {{$instance_name}}</h3>
                        </div>
                        
                        
                        <div class="card-body">
                            <!-- Filters -->
                            <form method="get" action="" class="form-inline">
                                <div class="form-group mr-sm-3">
                                De la&nbsp;<input name="start_date" value="{{$filters['start_date']}}" type="text" id="start_date" class="form-control">
                                   
                                </div>
                                <div class="form-group mr-sm-3">
                                pana la&nbsp;<input name="end_date" value="{{$filters['end_date']}}" type="text" id="end_date" class="form-control">
                                </div>
                               
                                <button type="submit" class="btn btn-primary mr-sm-3">{{ __('labels.filter') }}</button>
                                @if(app('request')->query())<button type="button" class="btn btn-orange" onclick="window.location='{{ url()->current() }}'">{{ __('labels.reset') }}</button>@endif
                            </form>
                            <hr>
                            <!-- // Filters -->
                        @if(!empty($informations))
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%;" id="utils-history">
                                    <thead>
                                    <tr>
                                        <th>Client</th>
                                        <th>Server</th>
                                        <th>Instanta</th>
                                        <th>Status</th>
                                        <th>Versiune CRM</th>
                                        <th>Titlu</th>
                                        <th>Generate in PDF</th>
                                        <th>E-mail-uri netrimise</th>
                                        <th>Versiune DB</th>
                                        <th>U Online</th>
                                        <th>Cronuri</th>
                                        <th>Servicii</th>
                                        <th>Taskuri</th>
                                        <th>Coduri customizate</th>
                                        <th>Versiune PHP</th>
                                        <th>Versiune Yii</th>
                                        <th>Data</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($informations as $info)
                                    <tr>
                                        <td>{{$info->client_name}}</td>
                                        <td>{{$info->server_name}}</td>
                                        <td>{{$info->instance_name}}</td>
                                        <td>{{$info->status}}</td>
                                        <td>{{$info->crm_version}}</td>
                                        <td>{{$info->title}}</td>
                                        <td>{{$info->generate_in_pdf}}</td>
                                        <td>{{$info->email_not_sent}}</td>
                                        <td>{{$info->db_version}}</td>
                                        <td>{{$info->u_online}}</td>
                                        <td>{!!$info->crons!!}</td>
                                        <td>{!!$info->services!!}</td>
                                        <td>{!!$info->tasks!!}</td>
                                        <td>{!!$info->custom_codes!!}</td>
                                        <td>{{$info->php_version}}</td>
                                        <td>{{$info->yii_version}}</td>
                                        <td>{{ \Carbon\Carbon::parse($info->created_at)->format('d.m.Y H:i:s') }}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif
                     {{ $informations->links() }}
                    </div>
                    
                </div>
            </div>
            <!-- End Row-3 -->
        </div>
    </div>
@endsection
