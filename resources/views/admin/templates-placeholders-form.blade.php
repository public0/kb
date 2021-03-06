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
                    <h4 class="page-title mb-0">Template Placeholders</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item">Templates</li>
                        <li class="breadcrumb-item">Placeholders</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.tpl.place.group') }}">Groups</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.tpl.places', ['gid' => $group->id]) }}">{{ $group->name }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@if($placeholder){{ __('labels.edit') }}@else{{ __('labels.add') }}@endif</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->
            <!--div-->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">@if($placeholder){{ __('labels.edit') }}@else{{ __('labels.add') }}@endif</div>
                </div>
                <form class="needs-validation" method="post" action="{{ url()->current() }}">
                @csrf
                <input type="hidden" name="placeholder_group_id" value="{{ $group->id }}" />
                <div class="card-body">
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" placeholder="Name" class="form-control" required="required" value="{{ old('name', $placeholder ? $placeholder->name : null) }}" maxlength="255" />
                            </div>
                            <div class="form-group">
                                <label class="form-label">Description</label>
                                <input type="text" name="description" placeholder="Description" class="form-control" value="{{ old('description', $placeholder ? $placeholder->description : null) }}" />
                            </div>
                            <div class="form-group">
                                <label class="form-label">Countries <span class="text-danger">*</span></label>
                                <select name="countries[]" class="form-control custom-select select2" required="required" multiple>
                                    @foreach($countries as $code => $name)
                                    <option value="{{$code}}" @if($placeholder && in_array($code, $placeholder->all_country_codes)) selected="selected" @endif>{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-control custom-select select2">
                                    <option value="1"@if(old('status', $placeholder ? $placeholder->status : -1) == 1) selected="selected" @endif>{{ __('status.active') }}</option>
                                    <option value="0"@if(old('status', $placeholder ? $placeholder->status : -1) == 0) selected="selected" @endif>{{ __('status.inactive') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="button" class="btn btn-light mr-2" onclick="window.location='{{ route('admin.tpl.places', ['gid' => $group->id]) }}'">{{ __('labels.back') }}</button>
                    <button type="submit" class="btn btn-info">{{ __('labels.submit') }}</button>
                </div>
                </form>
            </div>
            <!--/div-->
        </div>
    </div>
@endsection
