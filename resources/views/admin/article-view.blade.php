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
                    <h4 class="page-title mb-0">Article View</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/'); ?>/admin"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="<?php echo URL::to('/'); ?>/admin/article">Articles</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View</li>
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
                            <div class="card-title">{{ $article->title }}</div>
                        </div>
                        <div class="card-body">
                            @if(!empty($article))
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap">
                                    <tbody>
                                    <tr>
                                        <td>Language</td><td>{{ $article->lang }}</td>
                                    </tr>
                                    <tr>
                                        <td>Title</td><td>{{ $article->title }}</td>
                                    </tr>
                                    <tr>
                                        <td>Description</td><td>{{ $article->description }}</td>
                                    </tr>
                                    <tr>
                                        <td>Category</td><td>{{ $article->category_id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tags</td>
                                        <td>
                                            @php $article->tags = array_filter(explode(',', $article->tags)) @endphp
                                            @if(!empty($article->tags))
                                            @foreach($article->tags as $tag)
                                            <span class="badge badge-info" title="{{ $tag }}">{{ $tag }}</span>
                                            @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Status</td><td>{{ $article->status_name }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br><br>
                            {!! $article->body !!}
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
