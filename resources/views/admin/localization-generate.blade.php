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
                        <li class="breadcrumb-item active" aria-current="page">{{ __('labels.generate') }}</li>
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
                            <div class="card-title">{{ __('labels.generate') }}</div>
                        </div>
                        <form class="needs-validation" method="post" action="{{ url()->current() }}">
                        @csrf
                        <div class="card-body">
                            <div class="row row-sm">
                                <div class="col-lg-12">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th width="50%">From</th>
                                            <th width="50%">To</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                @foreach($languages as $k => $lang)
                                                <label class="custom-control custom-radio"><input type="radio" class="custom-control-input" name="from" value="{{ strtolower($lang->abv) }}" @if($k == 0)checked="checked"@endif /> <span class="custom-control-label">{{ $lang->name }}</span></label>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($languages as $k => $lang)
                                                <label class="custom-control custom-radio"><input type="radio" class="custom-control-input" name="to" value="{{ strtolower($lang->abv) }}" @if($k == 1)checked="checked"@endif /> <span class="custom-control-label">{{ $lang->name }}</span></label>
                                                @endforeach
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
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
            <!-- End Row-1 -->
        </div>
    </div>
@endsection
