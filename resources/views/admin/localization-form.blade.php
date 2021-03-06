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
                    <h4 class="page-title mb-0">{{ __('labels.localization') }}</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.localization') }}">{{ __('labels.localization') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@if($localization){{ __('labels.edit') }}@else{{ __('labels.add') }}@endif</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->
            @if ($errors->any())
                <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>@foreach ($errors->all() as $error) {{ $error }}<br> @endforeach</div>
            @endif
            <!--div-->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">@if($localization){{ __('labels.edit') }}@else{{ __('labels.add') }}@endif</div>
                </div>
                <form class="needs-validation" method="post" action="{{ url()->current() }}">
                @csrf
                <div class="card-body">
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            @foreach($fields as $field)
                            <div class="form-group">
                                <label class="form-label"><img src="{{ url('/th/assets/images/langs/' . strtolower($field) . '.png') }}" alt="{{ $field }}" width="24" class="border-top border-right border-bottom border-left border-gray" style="border-radius:50%" /> {{ strtoupper($field) }}</label>
                                <input type="text" name="{{ $field }}" autocapitalize="off" autocomplete="off" autocorrect="off" spellcheck="false" class="form-control" value="{{ old($field, $localization ? $localization->{$field} : null) }}" />
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="button" class="btn btn-light mr-2" onclick="window.location='{{ route('admin.localization') }}'">{{ __('labels.back') }}</button>
                    <button type="submit" class="btn btn-info">{{ __('labels.submit') }}</button>
                </div>
                </form>
            </div>
            <!--/div-->
        </div>
    </div>
@endsection
