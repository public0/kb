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
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Articles</a></li>
                    </ol>
                </div>
                <div class="page-rightheader">
                    <div class="btn btn-list">
                        <a href="{{ url('/admin/article/add') }}" class="btn btn-sm btn-info"><i class="fe fe-plus mr-1"></i> {{ __('labels.add') }}</a>
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
                <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>@foreach ($errors->all() as $error) {{ $error }}<br> @endforeach</div>
            @endif
            <!--div-->
            <div class="card">
                <div class="card-body">
                    <!-- Filters -->
                    <form method="get" action="" class="form-inline">
                        <div class="form-group mr-sm-3">
                            <select name="category" class="form-control">
                                <option value="">Select Category</option>
                                @foreach($categories as $cat)
                                <option value="{{$cat->id}}" @if($filters['category'] && $filters['category'] == $cat->id) selected="selected" @endif>@for($i = 0; $i < substr_count($cat->tree, ','); $i++)&raquo;@endfor {{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mr-sm-3">
                            <select name="language" class="form-control">
                                <option value="">Select Language</option>
                                @foreach($languages as $lang)
                                <option value="{{ $lang->abv }}"@if($filters['language'] && $filters['language'] == $lang->abv) selected="selected"@endif>{{ $lang->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mr-sm-3">
                            <select name="status" class="form-control">
                                <option value="">Select Status</option>
                                <option value="1"@if(isset($filters['status']) && $filters['status'] == 1) selected="selected"@endif>{{ __('status.published') }}</option>
                                <option value="0"@if(isset($filters['status']) && $filters['status'] == 0) selected="selected"@endif>{{ __('status.draft') }}</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mr-sm-3">{{ __('labels.filter') }}</button>
                        @if(app('request')->query())<button type="button" class="btn btn-orange" onclick="window.location='{{ url()->current() }}'">{{ __('labels.reset') }}</button>@endif
                    </form>
                    <hr>
                    <!-- // Filters -->
                    @if(!empty($articles))
                    <div class="table-responsive">
                        <table class="table table-bordered" id="articles">
                            <thead>
                            <tr role="row">
                                <th class="wd-15p border-bottom-0">ID</th>
                                <th class="wd-15p border-bottom-0">Title</th>
                                <th class="wd-15p border-bottom-0">Language</th>
                                <th class="wd-15p border-bottom-0 no-sort">Tags</th>
                                <th class="wd-15p border-bottom-0">Modified by</th>
                                <th class="wd-15p border-bottom-0 datetime-sort">Modified</th>
                                <th class="wd-15p border-bottom-0">Right Col</th>
                                <th class="wd-10p border-bottom-0">Status</th>
                                <th class="wd-15p border-bottom-0" data-sort="desc">Sort Order</th>
                                <th class="wd-15p border-bottom-0">Comments</th>
                                <th class="wd-10p border-bottom-0 no-sort">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $art)
                            <tr role="row" @if(!empty($art->lang_parent_id) && $art->lang_parent_id != $art->id) class="inccls" @endif>
                                <td>{{ $art->id }}</td>
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
                                <td>
                                    @if($art->updated_by){{ $art->updatedBy->full_name }}@endif
                                </td>
                                <td class="text-nowrap">
                                    @if($art->updated_at)<span title="{{ $art->updated_at }}">{{ \Carbon\Carbon::parse($art->updated_at)->format('d.m.Y H:i:s') }}</span>@endif
                                </td>
                                <td class="table-col-shrink text-center">
                                    <a href="{{ url('/admin/article/right-col', [$art->id]) }}" class="btn btn-sm btn-link">{{ $art->in_right_col_name }}</a>
                                </td>
                                <td class="table-col-shrink text-center">
                                    <a href="{{ url('/admin/article/status', [$art->id]) }}" class="btn btn-sm btn-link">{{ $art->status_name }}</a>
                                </td>
                                <td>{{ $art->rank }}</td>
                                <td class="table-col-shrink text-center">
                                    <a href="{{ url('/admin/comments?article=' . $art->id) }}" class="btn btn-sm btn-link">{{ $art->comments_number }} {{ __('labels.comments') }}</a>
                                </td>
                                <td class="table-col-shrink text-nowrap">
                                    <a href="{{ url('/admin/article/edit', [$art->id]) }}" class="btn btn-sm btn-green btn-info"><i class="fe fe-edit-2 mr-1"></i> {{ __('labels.edit') }}</a>
                                    @php
                                    $viewParams = ['id' => $art->article_id];
                                    if (!$art->status) {
                                        $viewParams['preview'] = 'true';
                                    }
                                    @endphp
                                    <a href="{{ route('front.article', $viewParams) }}" target="_blank" class="btn btn-sm btn-info"><i class="fe fe-book-open mr-1"></i> View</a>
                                    <a href="{{ url('/admin/article/clone', [$art->id]) }}" onclick="return modals.confirm(this, 'Notice', 'Are you sure you want to clone article &quot;{{ $art->title }}&quot;?', '{{ __('labels.yes') }}', '{{ __('labels.no') }}')" class="btn btn-sm btn-info"><i class="fe fe-copy mr-1"></i> Clone</a>
                                    <a href="{{ url('/admin/article/delete', [$art->id]) }}" class="btn btn-sm btn-danger" onclick="return modals.confirm(this, 'Notice', 'Are you sure you want to delete?', '{{ __('labels.yes') }}', '{{ __('labels.no') }}')"><i class="fe fe-trash-2 mr-2"></i> {{ __('labels.delete') }}</a>
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
@endsection

@push('body-scripts')
<script>
    var orderCells = [];
    $('#articles thead tr th').each(function (k, v) {
        var sort = $(v).data('sort');
        if (typeof sort !== 'undefined') {
            orderCells.push([k, sort]);
        }
    });
    $('#articles').DataTable({
        sort: true,
        columnDefs: [
            {
                targets: 'no-sort',
                orderable: false
            }, {
                targets: 'datetime-sort',
                type: 'datetime'
            }
        ],
        order: orderCells,
        language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_',
        }
    });
</script>
@endpush
