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
                        <li class="breadcrumb-item"><a href="{{ route('admin.settings') }}">{{ __('labels.settings') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $setting->key }}</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->
            <!--div-->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{ $setting->key }}</div>
                </div>
                <form class="needs-validation" method="post" action="{{ url()->current() }}">
                @csrf
                <div class="card-body">
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control">{{ old('description', $setting ? $setting->description : null) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Value</label>
                                @switch($setting->type)
                                    @case('checkbox')
                                    <input type="hidden" name="value" value="0" />
                                    <label class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" name="value" value="1" @if(old('value', $setting ? $setting->value : -1) == 1)checked="checked"@endif /><span class="custom-control-label"></span></label>
                                    @break
                                    @case('textarea')
                                    <textarea name="value" placeholder="Value" class="form-control">{{ old('value', $setting ? $setting->value : null) }}</textarea>
                                    @break
                                    @default
                                    <input type="text" name="value" placeholder="Value" class="form-control" value="{{ old('value', $setting ? $setting->value : null) }}" maxlength="255" />
                                    @break
                                @endswitch
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="button" class="btn btn-light mr-2" onclick="window.location='{{ route('admin.settings') }}'">{{ __('labels.back') }}</button>
                    <button type="submit" class="btn btn-info">{{ __('labels.submit') }}</button>
                </div>
                </form>
            </div>
            <!--/div-->
        </div>
    </div>
@endsection
