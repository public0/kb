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
                    <h4 class="page-title mb-0">Swag Group Methods</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item">Swag</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.swag.documents') }}">Documents</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.swag.groups', ['docid' => $document->id]) }}">{{ $document->name }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.swag.methods', ['docid' => $document->id, 'gid' => $group->id]) }}">{{ $group->name }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('labels.move') }}</li>
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
                            <div class="card-title">{{ __('labels.move') }}</div>
                        </div>
                        <form class="needs-validation" method="post" action="{{ url()->current() }}">
                        @csrf
                        <div class="card-body">
                            <div class="row row-sm">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Group</label>
                                        <select name="group_id" class="form-control custom-select select2">
                                            @foreach($groups as $item)
                                            <option value="{{ $item->id }}"@if($method->group_id == $item->id) selected="selected" @endif>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="button" class="btn btn-light mr-2" onclick="window.location='{{ route('admin.swag.methods', ['docid' => $document->id, 'gid' => $group->id]) }}'">{{ __('labels.back') }}</button>
                            <button type="submit" class="btn btn-info">{{ __('labels.submit') }}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
