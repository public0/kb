@extends('admin/index')

@section('content')
    <script>
        var site_url= 'http://localhost/';

        tinymce.init({
            selector: '#tinymce',
            images_dataimg_filter: function(img) {
                return img.hasAttribute('internal-blob');
            },
            images_upload_url: site_url+'admin/uploadimg?_token=@csrf_token()',
            relative_urls : false,
            remove_script_host : false,
            convert_urls : true,
            force_br_newlines : true,

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
            link_list: [
            ],
            image_list: [
            ],
            image_class_list: [
            ],
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
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/'); ?>/admin"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
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
                <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>@foreach ($errors->all() as $error) {{ $error }}, @endforeach</div>
            @endif
            <!-- Row-1 -->
            <div class="row">
                <div class="col-12">
                    <!--div-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Article Edit</h3>
                        </div>
                        <div class="card-body pb-2">
                            @if(!empty($artical))
                            <form class="needs-validation" method="post" action="<?php echo URL::to('/'); ?>/admin/article/edit/{{ $artical->article_id }}">
                                @csrf
                                <div class="row row-sm">
                                    <div class="col-lg-12">
                                        @if(!empty($language))
                                            <div class="form-group">
                                                <label class="form-label">Language</label>
                                                <select name="lang" id="select-countries" class="form-control custom-select select2">
                                                    @foreach($language as $lng)
                                                        <option value="{{$lng->abv}}" @if($lng->abv == $artical->lang) selected="selected" @endif data-data='{"image": "./../../assets/images/flags/br.svg"}'>{{$lng->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <input name="title" class="form-control  mb-4" placeholder="Title" required="required"  type="text" value="{{$artical->title}}">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="description" class="form-control  mb-4" placeholder="Description" required="required"  type="text">{{$artical->description}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <textarea name="body" id="tinymce" class="form-control  mb-4" placeholder="Body" required="required"  type="text" style="height: 200px;">{!! $artical->body !!}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Tags</label>
                                            <input name="tags" class="form-control  mb-4" placeholder="Tags"  type="text" value="{{$artical->tags}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Rank</label>
                                            <input name="rank" class="form-control  mb-4"  type="text" value="{{$artical->rank}}">
                                        </div>
                                        @if(!empty($groups))
                                            <div class="form-group">
                                                <label class="form-label">Category</label>
                                                <select name="categoty" id="select-countries" class="form-control custom-select select2">
                                                    <option value="">--</option>
                                                    @foreach($groups as $gr)
                                                        <option value="{{$gr->id}}" @if(isset($artical->category) && in_array($gr->id,$artical->category)) selected="selected" @endif data-data='{"image": "./../../assets/images/flags/br.svg"}'>{{$gr->Name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                        @if(!empty($relatedArticles))
                                            <div class="form-group">
                                                <label class="form-label">Lang parent</label>
                                                <select name="lang_parent_id" id="select-countries" class="form-control custom-select select2">
                                                    <option value="{{$artical->id}}">---</option>
                                                    @foreach($relatedArticles as $ra)
                                                        <option value="{{$artical->id}},{{$ra->id}}" @if($artical->lang_parent_id == $ra->lang_parent_id) selected="selected" @endif>{{$ra->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <label class="form-label">Status</label>
                                            <select name="status" id="select-countries" placeholder="E-Mail" class="form-control custom-select select2">
                                                <option value="1" @if($artical->status == 1) {{'selected="selected"'}} @endif >Active</option>
                                                <option value="0" @if($artical->status == 0) {{'selected="selected"'}} @endif >Inactive</option>
                                            </select>
                                        </div>
                                        <input type="submit" class="btn btn-info" value="Submit" onclick="tinyMCE.triggerSave();" />
                                    </div>
                                </div>
                            </form>
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
