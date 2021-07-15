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
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ url('/admin/article') }}">Articles</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@if($article){{ __('labels.edit') }}@else{{ __('labels.add') }}@endif</li>
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
                    <h3 class="card-title">@if($article){{ __('labels.edit') }}@else{{ __('labels.add') }}@endif</h3>
                    <div class="card-options">
                        @if($article)
                        @php
                        $viewParams = ['id' => $article->article_id];
                        if (!$article->status) {
                            $viewParams['preview'] = 'true';
                        }
                        @endphp
                        <a href="{{ route('front.article', $viewParams) }}" target="_blank" class="btn btn-sm btn-primary"><i class="fe fe-book-open"></i></a>
                        @endif
                    </div>
                </div>
                <form class="needs-validation" method="post" action="{{ url()->current() }}">
                @csrf
                <div class="card-body pb-2">
                    <div class="row row-sm">
                        <div class="col-xl-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Countries <span class="text-danger">*</span></label>
                                <select name="countries[]" class="form-control custom-select select2" required="required" multiple>
                                    @foreach($countries as $code => $name)
                                    <option value="{{ $code }}" @if(in_array($code, old('countries', $article ? $article->all_country_codes : []))) selected="selected" @endif>{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Rank</label>
                                <input type="number" name="rank" class="form-control mb-4" value="{{ old('rank', $article ? $article->rank : null) }}">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            @if(!empty($language))
                            <div class="form-group">
                                <label class="form-label">Language <span class="text-danger">*</span></label>
                                <select name="lang" class="form-control custom-select select2">
                                    @foreach($language as $lng)
                                    <option value="{{ $lng->abv }}" @if($lng->abv == old('lang', $article ? $article->lang : null)) selected="selected" @endif>{{ $lng->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                            <div class="form-group">
                                <label class="form-label">Related language</label>
                                <select name="lang_parent_id" class="form-control">
                                    @if($article_lang)
                                    <option value="{{ $article_lang->id }}" selected="selected">{{ $article_lang->title }}</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Title <span class="text-danger">*</span></label>
                                <input name="title" class="form-control  mb-4" placeholder="Title" required="required" type="text" value="{{ old('title', $article ? $article->title : null) }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea name="description" class="form-control mb-4" placeholder="Description" required="required" type="text">{{ old('description', $article ? $article->description : null) }}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <select class="form-control" id="files"></select>
                                    <span class="input-group-append">
                                        <button type="button" class="btn btn-sm btn-primary" id="filesbutton"><i class="fe fe-link"></i><i class="fe fe-plus"></i></button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="body" id="tinymce" class="form-control mb-4" placeholder="Body" required="required" type="text" style="height:200px">{!! old('body', $article ? $article->body : null) !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Tags</label>
                                <select name="tags[]" class="form-control custom-select select2-tokens" multiple>
                                    @foreach(old('tags', $article ? $article->tags : []) as $tag)
                                    <option value="{{ $tag }}" selected="selected">{{ $tag }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if(!empty($categories))
                            {{-- <div class="form-group">
                                <label class="form-label">Category</label>
                                <select name="category_id" class="form-control custom-select select2">
                                    <option value="">--</option>
                                    @foreach($categories as $ct)
                                    <option value="{{$ct->id}}" @if(isset($article->category) && in_array($ct->id, $article->category)) selected="selected"@endif>@for($i = 0; $i < substr_count($ct->tree, ','); $i++)&raquo;@endfor {{$ct->name}}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="form-group">
                                <label class="form-label">Categories</label>
                                <select name="categories_ids[]" class="form-control custom-select select2" multiple>
                                    @foreach($categories as $ct)
                                    <option value="{{ $ct->id }}"@if(in_array($ct->id, old('categories_ids', $article ? $article->categories_ids : []))) selected="selected" @endif>@for($i = 0; $i < substr_count($ct->tree, ','); $i++)&nbsp;&nbsp;&nbsp;@endfor {{ $ct->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                            <div class="form-group">
                                <label class="form-label">Role</label>
                                <select name="user_role" class="form-control custom-select select2">
                                    <option value="">Public</option>
                                    @foreach($user_roles as $roleID => $role)
                                    <option value="{{ $roleID }}"@if(old('role', $article ? $article->user_role : null) == $roleID) selected="selected" @endif>{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Right column</label>
                                <select name="in_right_col" class="form-control custom-select select2">
                                    <option value="1"@if(old('in_right_col', $article ? $article->in_right_col : -1) == 1) selected="selected" @endif>{{ __('labels.yes') }}</option>
                                    <option value="0"@if(old('in_right_col', $article ? $article->in_right_col : -1) == 0) selected="selected" @endif>{{ __('labels.no') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-control custom-select select2">
                                    <option value="0"@if(old('status', $article ? $article->status : -1) == 0) selected="selected" @endif>{{ __('status.draft') }}</option>
                                    <option value="1"@if(old('status', $article ? $article->status : -1) == 1) selected="selected" @endif>{{ __('status.published') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="button" class="btn btn-light mr-2" onclick="window.location='{{ url('/admin/article') }}'">{{ __('labels.back') }}</button>
                    <button type="submit" class="btn btn-info" onclick="tinyMCE.triggerSave();">{{ __('labels.submit') }}</button>
                </div>
                </form>
            </div>
            <!--/div-->
        </div>
    </div>
    <script>
    var upload_url = '{{ url('/admin/upload-image') }}?_token={{@csrf_token()}}';
    tinymce.init({
        selector: '#tinymce',
        images_dataimg_filter: function(img) {
            return img.hasAttribute('internal-blob');
        },
        images_file_types: 'jpg,jpeg,png,gif',
        images_upload_url: upload_url,
        relative_urls: false,
        remove_script_host: true,
        convert_urls: true,

        plugins: 'print preview powerpaste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
        imagetools_cors_hosts: ['ringhel.ro'],
        menubar: 'file edit view insert format tools table help',
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen preview save print | insertfile image media template link anchor codesample | ltr rtl',
        toolbar_sticky: true,
        autosave_ask_before_unload: true,
        autosave_interval: "30s",
        autosave_prefix: "{path}{query}-{id}-",
        autosave_restore_when_empty: false,
        autosave_retention: "20m",
        image_advtab: true,
        // content_css: '//www.tiny.cloud/css/codepen.min.css',
        // link_list: [
        // ],
        // image_list: [
        // ],
        // image_class_list: [
        // ],
        importcss_append: true,
        // file_picker_callback: function (callback, value, meta) {
        //     /* Provide file and text for the link dialog */
        //     if (meta.filetype === 'file') {
        //         callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
        //     }
        //
        //     /* Provide image and alt text for the image dialog */
        //     if (meta.filetype === 'image') {
        //         callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
        //     }
        //
        //     /* Provide alternative source and posted for the media dialog */
        //     if (meta.filetype === 'media') {
        //         callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
        //     }
        // },
        templates: [
            { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
            { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
            { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' },
        ],
        template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
        template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
        height: 600,
        image_caption: true,
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        noneditable_noneditable_class: "mceNonEditable",
        toolbar_mode: 'sliding',
        contextmenu: "link image imagetools table",
    });
    </script>
@endsection

@push('body-scripts')
<script>
    function populateLangParentId(lang) {
        $('select[name="lang_parent_id"]').select2({
            ajax: {
                url: '{{ route('admin.ajax.articles.list') }}',
                dataType: 'json',
                data: function (params) {
                    return {
                        term: params.term,
                        select: 'id,title',
                        lang_not: lang
                    };
                },
                processResults: function (data) {
                    var items = [];
                    $.each(data.articles, function(idx, val) {
                        items.push({id: val.id, text: val.title});
                    });
                    return {
                        results: items
                    };
                }
            }
        });
    }
    $(document).ready(function () {
        var selectFiles = $('select#files');
        selectFiles.select2({
            placeholder: '{{ __('labels.select_a_file') }}',
            allowClear: true,
            ajax: {
                url: '{{ route('admin.ajax.files.list') }}',
                method: 'GET',
                dataType: 'json',
                data: function (params) {
                    return {
                        term: params.term
                    };
                },
                processResults: function (data) {
                    var items = [];
                    $.each(data.files, function(idx, val) {
                        items.push({id: val.path, text: val.name});
                    });
                    return {
                        results: items
                    };
                }
            }
        });
        $('#filesbutton').on('click', function (e) {
            e.preventDefault();
            var opt = $('option:selected', selectFiles);
            if (opt.val()) {
                var html = '<a href="' + opt.val() + '" target="_blank" class="file-link">' + opt.text() + '</a>';
                tinymce.activeEditor.execCommand('mceInsertContent', false, html);
                selectFiles.val(null).trigger('change');
            }
        });
        $('select[name="lang_parent_id"]').on('change', function () {
            var id = $(this).val();
            $.ajax('{{ route('admin.ajax.articles.item', ['id' => 0]) }}'.replace('0', id), {
                method: 'GET',
                dataType: 'json',
                data: {
                    select: 'categories_ids,tags,user_role,status,in_right_col'
                },
                success: function (data) {
                    function prepareIds(val) {
                        var result = [];
                        $.each(val.split(','), function (i,v) {
                            if (v) {
                                result.push(v);
                            }
                        });
                        return result;
                    }
                    $('select[name="categories_ids[]"]').val(null).trigger('change');
                    if (data.article.categories_ids) {
                        var categs = prepareIds(data.article.categories_ids);
                        $('select[name="categories_ids[]"]').val(categs).trigger('change');
                    }
                    $('select[name="tags[]"]').val(null).trigger('change');
                    if (data.article.tags) {
                        var tags = prepareIds(data.article.tags);
                        $('select[name="tags[]"]').val(tags).trigger('change');
                    }
                    $('select[name="user_role"]').val(data.article.user_role).trigger('change');
                    $('select[name="status"]').val(data.article.status).trigger('change');
                    $('select[name="in_right_col"]').val(data.article.in_right_col).trigger('change');
                }
            });
        });
        var selectLang = $('select[name="lang"]');
        @if(!empty(old('lang_parent_id')))
        $.ajax('{{ route('api.articles.item', ['id' => old('lang_parent_id')]) }}', {
            method: 'GET',
            dataType: 'json',
            data: {
                select: 'id,title'
            },
            success: function (data) {
                $('select[name="lang_parent_id"]').append($('<option>', {
                    value: data.article.id,
                    text: data.article.title,
                    selected: true
                }));
            }
        });
        @endif
        selectLang.on('change', function () {
            populateLangParentId($(this).val());
        });
        populateLangParentId(selectLang.val());
        $('[required]').removeAttr('required');
    });
</script>
@endpush
