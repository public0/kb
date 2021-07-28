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
                    <h4 class="page-title mb-0">Categories</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ url('/admin/categories') }}">Categories</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@if($category){{ __('labels.edit') }}@else{{ __('labels.add') }}@endif</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ Session::get('message') }}</div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ Session::get('error') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>@foreach ($errors->all() as $error) {{ $error }}<br> @endforeach</div>
            @endif
            <!--div-->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@if($category){{ __('labels.edit') }}@else{{ __('labels.add') }}@endif</h3>
                </div>
                <form class="needs-validation" method="post" action="{{ url()->current() }}">
                @csrf
                <div class="card-body pb-2">
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                <input class="form-control" placeholder="Name" name="name" required="required" type="text" value="{{ old('name', $category ? $category->name : null) }}">
                            </div>
                            @if(!empty($language))
                            <div class="form-group">
                                <label class="form-label">Language</label>
                                <select name="lang" class="form-control custom-select select2">
                                    @foreach($language as $lng)
                                    <option value="{{ $lng->abv }}"@if(old('lang', $category ? $category->lang : null) == $lng->abv) selected="selected" @endif>{{ $lng->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                            @if(!empty($categs))
                            <div class="form-group">
                                <label class="form-label">Parent</label>
                                <select name="parent_id" class="form-control custom-select select2">
                                    <option value="0">---</option>
                                    @foreach($categs as $cat)
                                    <option value="{{ $cat->id }}"@if(old('parent_id', $category ? $category->parent_id : null) == $cat->id) selected="selected" @endif>@for($i = 0; $i < substr_count($cat->tree, ','); $i++)&nbsp;&nbsp;&nbsp;@endfor {{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-control custom-select select2">
                                    <option value="1"@if(old('status', $category ? $category->status : -1) == 1) selected="selected" @endif>{{ __('status.active') }}</option>
                                    <option value="0"@if(old('status', $category ? $category->status : -1) == 0) selected="selected" @endif>{{ __('status.inactive') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="button" class="btn btn-light mr-2" onclick="window.location='{{ url('/admin/categories') }}'">{{ __('labels.back') }}</button>
                    <button type="submit" class="btn btn-info">{{ __('labels.submit') }}</button>
                </div>
                </form>
            </div>
            <!--/div-->
        </div>
    </div>
@endsection
