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
                    <h4 class="page-title mb-0">Articles</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Articles</a></li>
                    </ol>
                </div>
                <div class="page-rightheader">
                    <div class="btn btn-list">
                        <a href="<?php echo URL::to('/'); ?>/admin/article/add" class="btn btn-info"><i class="fe fe-plus mr-1"></i> Add </a>
                    </div>
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
                <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>@foreach ($errors->all() as $error) {{ $error }}, @endforeach</div>
            @endif
            <!-- Row-1 -->
            <div class="row">
                <div class="col-12">
                    <!--div-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Articles List</h3>
                        </div>
                        <div class="card-body">
                            @if(!empty($articles))
                            <div class="table-responsive">
                                <table class="table table-bordered table-vcenter">
                                    <thead>
                                    <tr class="border-top" role="row">
                                        <th class="wd-15p border-bottom-0">ID</th>
                                        <th class="wd-15p border-bottom-0">Title</th>
                                        <th class="wd-15p border-bottom-0">Language</th>
                                        <th class="wd-15p border-bottom-0">Tags</th>
                                        <th class="wd-15p border-bottom-0">Created AT</th>
                                        <th class="wd-10p border-bottom-0">Status</th>
                                        <th class="wd-15p border-bottom-0">Comments</th>
                                        <th class="wd-10p border-bottom-0">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($articles as $art)
                                    <tr role="row" @if(!empty($art->lang_parent_id) && $art->lang_parent_id != $art->id) class="inccls" @endif>
                                        <td>{{ $art->article_id }}</td>
                                        <td>{{ $art->title }}</td>
                                        <td>{{ $art->lang }}</td>
                                        <td>
                                            @php $art->tags = array_filter(explode(',', $art->tags)) @endphp
                                            @if(!empty($art->tags))
                                            @foreach($art->tags as $tag)
                                            <span class="badge badge-info" title="{{ $tag }}">{{ $tag }}</span>
                                            @endforeach
                                            @endif
                                        </td>
                                        <td class="text-nowrap">
                                            @if($art->created_at)<span title="{{ $art->created_at }}">{{ \Carbon\Carbon::parse($art->created_at)->format('d.m.Y') }}</span>@endif
                                        </td>
                                        <td class="table-col-shrink text-center">
                                            <a href="<?php echo URL::to('/admin/article/status/' . $art->id); ?>" class="btn btn-sm btn-link">{{ $art->status_name }}</a>
                                        </td>
                                        <td class="table-col-shrink text-center">
                                            <a href="<?php echo URL::to('/admin/comments?article=' . $art->id); ?>" class="btn btn-sm btn-link">{{ $art->comments_number }} {{ __('labels.comments') }}</a>
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="<?php echo URL::to('/admin/article/edit/' . $art->id); ?>" class="btn btn-sm btn-green btn-info"><i class="fe fe-edit-2 mr-1"></i> Edit </a>
                                            @php
                                            $viewParams = ['id' => $art->article_id];
                                            if (!$art->status) {
                                                $viewParams['preview'] = 'true';
                                            }
                                            @endphp
                                            <a href="{{ route('front.article', $viewParams) }}" target="_blank" class="btn btn-sm btn-info"><i class="fe fe-book-open mr-1"></i> View</a>
                                            <a href="<?php echo URL::to('/admin/article/delete/' . $art->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Esti sigur ca vrei sa stergi?')"><i class="fe fe-trash-2 mr-2"></i> Delete </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {!! $articles->appends(Request::all())->links() !!}
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
