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
                    <h4 class="page-title mb-0">Template Subtypes</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item">Templates</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.tpl.types') }}">Types</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.tpl.subtypes', ['tid' => $type->id]) }}">{{ $type->name }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@if($subtype){{ __('labels.edit') }}@else{{ __('labels.add') }}@endif</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->
            <!--div-->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">@if($subtype){{ __('labels.edit') }}@else{{ __('labels.add') }}@endif</div>
                </div>
                <form class="needs-validation" method="post" action="{{ url()->current() }}">
                @csrf
                <div class="card-body">
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" placeholder="Name" class="form-control" required="required" value="{{ old('name', $subtype ? $subtype->name : null) }}" maxlength="255" />
                            </div>
                            <div class="form-group">
                                <label class="form-label">Type <span class="text-danger">*</span></label>
                                <select name="type_id" class="form-control custom-select select2" required="required">
                                    @foreach($types as $item)
                                    <option value="{{ $item->id }}"@if(old('type_id', $subtype ? $subtype->type_id : null) == $item->id) selected="selected" @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if($subtype && count($subtype->placeholderGroups))
                            <div class="form-group">
                                <label class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" name="update-placeholder-groups" value="1" /><span class="custom-control-label">Update also the type of ({{ count($subtype->placeholderGroups) }}) placeholder groups associated.</span></label>
                            </div>
                            @endif
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-control custom-select select2">
                                    <option value="1"@if(old('status', $subtype ? $subtype->status : -1) == 1) selected="selected" @endif>{{ __('status.active') }}</option>
                                    <option value="0"@if(old('status', $subtype ? $subtype->status : -1) == 0) selected="selected" @endif>{{ __('status.inactive') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="button" class="btn btn-light mr-2" onclick="window.location='{{ route('admin.tpl.subtypes', ['tid' => $type->id]) }}'">{{ __('labels.back') }}</button>
                    <button type="submit" class="btn btn-info">{{ __('labels.submit') }}</button>
                </div>
                </form>
            </div>
            <!--/div-->
        </div>
    </div>
@endsection
