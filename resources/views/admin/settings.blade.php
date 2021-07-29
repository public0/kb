@extends('admin.index')

@section('content')
    <div class="app-content main-content">
        <div class="side-app">
            <!--app header-->
            <x-AdminHeader/>
            <!--/app header-->
            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title mb-0">{{ __('labels.settings') }}</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('labels.settings') }}</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->
            <!--div-->
            <div class="card">
                <div class="card-body">
                    @if(!empty($settings))
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap" id="example2">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">Key</th>
                                <th class="wd-15p border-bottom-0">Description</th>
                                <th class="wd-15p border-bottom-0">Value</th>
                                <th class="wd-15p border-bottom-0 text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($settings as $item)
                            <tr>
                                <td>{{ $item->key }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                @switch($item->type)
                                    @case('checkbox')
                                    @if($item->value == 1){{ __('status.on') }}@else{{ __('status.off') }}@endif
                                    @break
                                    @default
                                    {{ $item->value }}
                                    @break
                                @endswitch
                                </td>
                                <td class="table-col-shrink text-center">
                                    <a href="{{ route('admin.settings.edit', ['id' => $item->id]) }}" class="btn btn-sm btn-green btn-info"><i class="fe fe-edit-2 mr-1"></i> {{ __('labels.edit') }}</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
            <!--/div-->
        </div>
    </div>
@endsection
