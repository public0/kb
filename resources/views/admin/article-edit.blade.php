@extends('admin/index')

@section('content')
    <script>
        var site_url = '{{ URL::to('/') }}';
        tinymce.init({
            selector: '#tinymce',
            images_dataimg_filter: function(img) {
                return img.hasAttribute('internal-blob');
            },
            images_file_types: 'jpg,jpeg,png,gif',
            images_upload_url: site_url + '/admin/upload-image?_token={{@csrf_token()}}',
            relative_urls: false,
            remove_script_host: true,
            convert_urls: true,

            plugins: 'print preview powerpaste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons  ',
            imagetools_cors_hosts: ['ringhel.ro'],
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl  ',
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
    <div class="app-content main-content">
        <div class="side-app">

            <!--app header-->
            <x-AdminHeader/>
            <!--/app header-->

            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title mb-0">Articles Edit</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo route('admin.home'); ?>"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="<?php echo URL::to('/'); ?>/admin/article">Articles</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                        <div class="card-header">
                            <h3 class="card-title">Article Edit</h3>
                            <div class="card-options">
                                @php
                                $viewParams = ['id' => $article->article_id];
                                if (!$article->status) {
                                    $viewParams['preview'] = 'true';
                                }
                                @endphp
                                <a href="{{ route('front.article', $viewParams) }}" target="_blank" class="btn btn-sm btn-primary"><i class="fe fe-book-open"></i></a>
                            </div>
                        </div>
                        <form class="needs-validation" method="post" action="{{ url()->current() }}">
                        @csrf
                        <div class="card-body pb-2">
                            <div class="row row-sm">
                                <div class="col-lg-12">
                                    @if(!empty($language))
                                        <div class="form-group">
                                            <label class="form-label">Language</label>
                                            <select name="lang" class="form-control custom-select select2">
                                                @foreach($language as $lng)
                                                <option value="{{$lng->abv}}" @if($lng->abv == $article->lang) selected="selected"@endif>{{$lng->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label class="form-label">Title</label>
                                        <input name="title" class="form-control  mb-4" placeholder="Title" required="required" type="text" value="{{$article->title}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <textarea name="description" class="form-control  mb-4" placeholder="Description" required="required" type="text">{{$article->description}}</textarea>
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
                                        <textarea name="body" id="tinymce" class="form-control  mb-4" placeholder="Body" required="required" type="text" style="height: 200px;">{!! $article->body !!}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Tags</label>
                                        <select name="tags[]" class="form-control custom-select select2-tokens" multiple>
                                            @foreach($article->tags as $tag)
                                            <option value="{{$tag}}" selected="selected">{{$tag}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Rank</label>
                                        <input name="rank" class="form-control  mb-4"  type="text" value="{{$article->rank}}">
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
                                                <option value="{{$ct->id}}" @if(!empty($article->categories_ids) && in_array($ct->id, $article->categories_ids)) selected="selected" @endif>@for($i = 0; $i < substr_count($ct->tree, ','); $i++)&raquo;@endfor {{$ct->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label class="form-label">Related language</label>
                                        <select name="lang_parent_id" class="form-control">
                                            @if(!empty($article_lang))
                                            <option value="{{ $article_lang->id }}" selected="selected">{{ $article_lang->title }}</option>
                                            @endif
                                        </select>
                                    </div>
                                    @if(!empty($user_groups))
                                        <div class="form-group">
                                            <label class="form-label">User Groups</label>
                                            <select name="user_groups[]" class="form-control custom-select select2" multiple>
                                                @foreach($user_groups as $ug)
                                                <option value="{{$ug->id}}" @if(!empty($article->user_groups) && in_array($ug->id, $article->user_groups)) selected="selected" @endif>{{$ug->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label class="form-label">Right column</label>
                                        <select name="in_right_col" class="form-control custom-select select2">
                                            <option value="1" @if($article->in_right_col == 1) selected="selected" @endif>Yes</option>
                                            <option value="0" @if($article->in_right_col == 0) selected="selected" @endif>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-control custom-select select2">
                                            <option value="1" @if($article->status == 1) selected="selected" @endif>Active</option>
                                            <option value="0" @if($article->status == 0) selected="selected" @endif>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="button" class="btn btn-light mr-2" onclick="window.location='<?php echo URL::to('/admin/article'); ?>'">{{ __('labels.back') }}</button>
                            <button type="submit" class="btn btn-info" onclick="tinyMCE.triggerSave();">{{ __('labels.submit') }}</button>
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

@push('body-scripts')
<script>
    function populateLangParentId(lang) {
        $('select[name="lang_parent_id"]').select2({
            ajax: {
                url: '{{ route('api.articles.list') }}',
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
                url: '{{ route('api.files.list') }}',
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
        var selectLang = $('select[name="lang"]');
        selectLang.on('change', function () {
            populateLangParentId($(this).val());
        });
        populateLangParentId(selectLang.val());
    });
</script>
@endpush
