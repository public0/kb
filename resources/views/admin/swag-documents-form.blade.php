@extends('admin.index')

@section('content')
    <div class="app-content main-content">
        <div class="side-app">
            <!--app header-->
            <x-AdminHeader/>
            <!--/app header-->
            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title mb-0">Swag Documents</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item">Swag</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.swag.documents') }}">Documents</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@if($document){{ __('labels.edit') }}@else{{ __('labels.add') }}@endif</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->
            @if(Session::has('error'))
            <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ Session::get('error') }}</div>
            @endif
            @if($errors->any())
            <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>@foreach($errors->all() as $error) {{ $error }}<br> @endforeach</div>
            @endif
            <!--div-->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">@if($document){{ __('labels.edit') }}@else{{ __('labels.add') }}@endif</div>
                </div>
                <form class="needs-validation" method="post" action="{{ url()->current() }}">
                @csrf
                <div class="card-body">
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" placeholder="Name" class="form-control" required="required" value="{{ old('name', $document ? $document->name : null) }}" maxlength="255" />
                            </div>
                            @if($document)
                            <div class="form-group">
                                <label class="form-label">Slug <i class="fe fe-info text-primary" title="{{ __('If you want to generate this value leave blank!') }}"></i></label>
                                <input type="text" name="slug" placeholder="Slug" class="form-control" value="{{ old('slug', $document->slug) }}" maxlength="255" />
                            </div>
                            @endif
                            <div class="form-group">
                                <label class="form-label">URL <span class="text-danger">*</span></label>
                                <input type="text" name="url" placeholder="URL" class="form-control" required="required" value="{{ old('url', $document ? $document->url : null) }}" maxlength="255" />
                            </div>
                            <div class="form-group">
                                <label class="form-label">Version <span class="text-danger">*</span></label>
                                <input type="text" name="version" placeholder="Version" class="form-control" required="required" value="{{ old('version', $document ? $document->version : null) }}" maxlength="255" />
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="version_in_url" value="0" />
                                <label class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" name="version_in_url" value="1" @if(old('version_in_url') || ($document && $document->version_in_url == 1)) checked="checked" @endif /><span class="custom-control-label">Version in URL</span></label>
                            </div>
                            <div class="form-group">
                                <textarea name="description" id="tinymce" class="form-control mb-4" placeholder="Description" style="height:200px">{{ old('description', $document ? $document->description : null) }}</textarea>
                            </div>
                            <hr />
                            <label class="form-label">Authorization Token</label>
                            <div class="row">
                                <div class="col-sm-6">
                                    <span>Name</span>
                                    <input type="text" name="auth[name]" placeholder="Name" class="form-control" value="{{ old('auth.name', $document ? $document->auth_data['name'] : null) }}" />
                                    <div class="row mt-3">
                                        <div class="col-sm-6">
                                            <span>Location</span>
                                            <select name="auth[location]" class="form-control">
                                                <option value="">None</option>
                                                @foreach($locations as $item)
                                                <option value="{{ $item }}"@if(old('auth.location', $document ? $document->auth_data['location'] : null) == $item) selected="selected" @endif>{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <span>Type</span>
                                            <select name="auth[type]" class="form-control">
                                                <option value="">None</option>
                                                @foreach($types as $item)
                                                <option value="{{ $item }}"@if(old('auth.type', $document ? $document->auth_data['type'] : null) == $item) selected="selected" @endif>{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <span>Headers</span>
                                    <textarea name="auth[headers]" placeholder="Headers" class="form-control" style="height:60px">{{ old('auth.headers', $document ? $document->auth_data['headers'] : null) }}</textarea>
                                </div>
                                <div class="col-sm-6">
                                    <span>Description</span>
                                    <textarea name="auth[description]" placeholder="Description" class="form-control" style="height:190px">{{ old('auth.description', $document ? $document->auth_data['description'] : null) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="button" class="btn btn-light mr-2" onclick="window.location='{{ route('admin.swag.documents') }}'">{{ __('labels.back') }}</button>
                    <button type="submit" class="btn btn-info">{{ __('labels.submit') }}</button>
                </div>
                </form>
            </div>
            <!--/div-->
        </div>
    </div>
    <script>
    var site_url = '{{ route('admin.swag.documents.uploadimage') }}';
    tinymce.init({
        selector: '#tinymce',
        images_dataimg_filter: function(img) {
            return img.hasAttribute('internal-blob');
        },
        images_file_types: 'jpg,jpeg,png,gif',
        images_upload_url: site_url + '?_token={{@csrf_token()}}',
        relative_urls: false,
        remove_script_host: true,
        convert_urls: true,

        plugins: 'print preview powerpaste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
        imagetools_cors_hosts: ['ringhel.ro'],
        menubar: 'file edit view insert format tools table help',
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        toolbar_sticky: true,
        autosave_ask_before_unload: true,
        autosave_interval: "30s",
        autosave_prefix: "{path}{query}-{id}-",
        autosave_restore_when_empty: false,
        autosave_retention: "20m",
        image_advtab: true,
        importcss_append: true,
        templates: [
            { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%" border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
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
