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
                    <h4 class="page-title mb-0">Comments</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/admin/article') }}">Articles</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Comments</li>
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
            <!-- Row-1 -->
            <div class="row">
                <div class="col-12">
                    <!--div-->
                    <div class="card">
                        <div class="card-body">
                            <!-- Filters -->
                            <form method="get" action="" class="form-inline">
                                <div class="form-group mr-sm-3">
                                    <select name="article" class="form-control filter-select2" style="max-width:500px">
                                        <option value="">Select Article</option>
                                        @foreach($articles as $article)
                                        <option value="{{ $article->id }}"@if($filters['article'] && $filters['article'] == $article->id) selected="selected"@endif>{{ $article->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mr-sm-3">{{ __('labels.filter') }}</button>
                                @if(app('request')->query())<button type="button" class="btn btn-orange" onclick="window.location='{{ url()->current() }}'">{{ __('labels.reset') }}</button>@endif
                            </form>
                            <hr>
                            <!-- // Filters -->
                            @if(!empty($comments))
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap" id="example1">
                                    <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">Name</th>
                                        <th class="wd-15p border-bottom-0">Email</th>
                                        <th class="wd-15p border-bottom-0">Comment</th>
                                        <th class="wd-15p border-bottom-0">Date</th>
                                        <th class="wd-15p border-bottom-0 text-center">Status</th>
                                        <th class="wd-15p border-bottom-0 text-center no-sort">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->name }}</td>
                                        <td>{{ $comment->email }}</td>
                                        <td>{!! nl2br($comment->comment) !!}</td>
                                        <td>
                                            @if($comment->created_at)<span title="{{ $comment->created_at }}">{{ \Carbon\Carbon::parse($comment->created_at)->format('d.m.Y') }}</span>@endif
                                        </td>
                                        <td class="table-col-shrink text-center">
                                            <a href="{{ url('/admin/comments/status', ['id' => $comment->id]) }}" class="btn btn-sm btn-link">{{ $comment->status_name }}</a>
                                        </td>
                                        <td class="table-col-shrink text-center">
                                            <a href="{{ url('/admin/comments/delete', ['id' => $comment->id]) }}" class="btn btn-sm btn-danger" onclick="return confirm('Esti sigur ca vrei sa stergi?')"><i class="fe fe-trash-2 mr-1"></i> {{ __('labels.delete') }}</a>
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
            <!-- End Row-1 -->
        </div>
    </div>
@endsection

@push('body-scripts')
<script>
    $(document).ready(function() {
        $('select.filter-select2').select2();
    });
</script>
@endpush
