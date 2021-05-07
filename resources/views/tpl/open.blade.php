<!DOCTYPE html>
<html lang="{{ $lang }}" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>{{ $pageTitle }} - {{ config('app.name') }}</title>
    <meta name='viewport' content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="icon" href="<?php echo URL::to('/th/assets/images/brand/favicon.png'); ?>" type="image/x-icon" />
    <!--Bootstrap css -->
    <link href="<?php echo URL::to('/th/assets/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" />
    <!-- Style css -->
    <link href="<?php echo URL::to('/th/assets/css/style.css'); ?>" rel="stylesheet" />
    <link href="<?php echo URL::to('/th/assets/css/dark.css'); ?>" rel="stylesheet" />
    <link href="<?php echo URL::to('/th/assets/css/skin-modes.css'); ?>" rel="stylesheet" />
    <!--Sidemenu css -->
    <link href="<?php echo URL::to('/th/assets/css/closed-sidemenu.css'); ?>" rel="stylesheet" />
    <!-- P-scroll bar css-->
    <link href="<?php echo URL::to('/th/assets/plugins/p-scrollbar/p-scrollbar.css'); ?>" rel="stylesheet" />
    <!---Icons css-->
    <link href="<?php echo URL::to('/th/assets/css/icons.css'); ?>" rel="stylesheet" />
    <!-- Color Skin css -->
    <link id="theme" href="<?php echo URL::to('/th/assets/colors/color1.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo URL::to('/admin.css'); ?>" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .alert {
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 99999;
            border-radius: 5px;
            width: 400px;
            opacity: 1;
        }
        .side-menu {
            margin-top: 94px;
        }
        .side-app {
            max-width: 900px;
            margin: 0 auto;
        }
        .app-sidebar, .app-sidebar__logo {
            width: 300px;
        }
        .card-buttons {
            position: absolute;
            top: 8px;
            right: 10px;
            z-index: 9997;
        }
        .card-buttons .dropdown {
            display: inline-block;
        }
        .card-buttons .dropdown .nav-link img {
            width: 35px;
            height: 35px;
            box-shadow: 0px 2px 3px rgb(4 4 7 / 10%);
            border: 1px solid #ebecf1;
            margin-right: 5px;
            background-position: cover;
        }
        .card-buttons .dropdown .dropdown-item img {
            width: 22px;
            height: 22px;
            margin-right: 10px;
            border: 1px solid #ebecf1;
            background-position: cover;
        }
        .card-title {
            padding-right: 70px;
            text-transform: none;
        }
        footer.footer {
            padding: 1.25rem 1.25rem 1.25rem 300px;
        }
        @media (min-width: 768px) {
            .app-content {
                margin-left: 300px;
            }
            .app.sidenav-toggled .app-sidebar {
                left: -315px !important;
            }
            .sidenav-toggled footer.footer {
                padding: 1.25rem;
            }
        }
        @media (max-width: 767px) {
            .app .app-sidebar {
                left: -315px;
                margin-top: 0;
            }
            .app-sidebar__logo {
                display: block !important;
            }
        }
        .slide-item {
            padding: 8px 14px 8px 45px;
        }
        .btn-copy {
            padding: 0 5px;
        }
        .btn-copy:hover {
            color: #705ec8;
            background-color: #ebeef1;
        }
    </style>
</head>
<body class="app sidebar-mini">
<div class="page">
    <div class="page-main">
        <aside class="app-sidebar ps ps--active-y">
            <div class="app-sidebar__logo">
                <a class="header-brand" href="{{ route('front.home') }}">
                    <img src="<?php echo URL::to('/th/assets/images/brand/logo.png'); ?>" class="header-brand-img desktop-lgo" alt="{{ config('app.name') }}">
                    <img src="<?php echo URL::to('/th/assets/images/brand/logo1.png'); ?>" class="header-brand-img dark-logo" alt="{{ config('app.name') }}">
                </a>
            </div>
            <ul class="side-menu app-sidebar3">
                <li class="side-item side-item-category mt-4">{{ __('tpl.placeholders') }}@if(!empty($template->subtype)) - {{ __($template->subtype->name) }}@endif</li>
                @foreach($placeholdersGroups as $group)
                <li class="slide @if(count($placeholdersGroups) == 1){{'is-expanded'}}@endif">
                    <a class="side-menu__item" data-toggle="slide" href="javascript:void(0)"><svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M11.99 18.54l-7.37-5.73L3 14.07l9 7 9-7-1.63-1.27zM12 16l7.36-5.73L21 9l-9-7-9 7 1.63 1.27L12 16zm0-11.47L17.74 9 12 13.47 6.26 9 12 4.53z"></path></svg> <span class="side-menu__label" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis" title="{{ __($group->name) }}">{{ __($group->name) }}</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        @foreach($group->placeholders as $placeholder)
                        <li><span class="slide-item"><button class="btn btn-copy mr-1" title="{{ __('tpl.copy') }}" onclick="copyPlaceholder('{{ $placeholder->name }}')"><i class="fe fe-copy"></i></button><a href="javascript:void(0)" onclick="insertPlaceholder('{{ $placeholder->name }}')">{{ $placeholder->name }}</a></span></li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
        </aside>
        <div class="app-content main-content" style="margin-top:0">
        <div class="side-app">
            @if(Session::has('error'))
            <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ Session::get('error') }}</div>
            @endif
            @if($errors->any())
            <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>@foreach($errors->all() as $error){{ $error }}<br>@endforeach</div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">{{ $pageTitle }}</div>
                            <div class="card-buttons">
                                @if($languages->isNotEmpty())
                                <div class="dropdown">
                                    <a href="#" class="nav-link pl-0 pr-0 leading-none" data-toggle="dropdown" aria-expanded="false"><span><img src="<?php echo URL::to('/th/assets/images/langs/' . strtolower($selectedLanguage) . '.png'); ?>" alt="{{ $selectedLanguage }}" class="brround" /></span></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated">
                                        @foreach($languages as $lng)
                                        @if($selectedLanguage != $lng->abv)<a class="dropdown-item d-flex" href="javascript:void(0)" onclick="changeLang('{{ $lng->abv }}')"><img src="<?php echo URL::to('/th/assets/images/langs/' . $lng->abv . '.png'); ?>" alt="{{ $lng->name }}" class="brround" /> {{ $lng->name }}</a>@endif
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                                <span class="app-sidebar__toggle m-0 p-0" data-toggle="sidebar">
                                    <a class="open-toggle" href="javascript:void(0)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-left header-icon"><line x1="17" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="17" y1="18" x2="3" y2="18"></line></svg>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <form class="needs-validation" method="post" action="{{ url()->current() }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row row-sm">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('tpl.name') }}</label>
                                        <input type="text" name="name" placeholder="{{ __('tpl.name') }}" class="form-control" required="required" value="{{ $template->name }}" maxlength="255" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">{{ __('tpl.subject') }}</label>
                                        <input type="text" name="subject" id="subject" placeholder="{{ __('tpl.subject') }}" class="form-control" required="required" value="{{ $template->subject }}" maxlength="255" />
                                    </div>
                                    @if($template->tpl_type == 'email')
                                    <div class="form-group">
                                        <label class="form-label">{{ __('tpl.header') }}</label>
                                        <input type="file" name="header" class="form-control-file" />
                                        @if($template->header_image)
                                        <div class="imgs mt-4 position-relative">
                                        <a href="{{ route('tpl.deleteimage', ['uid' => $template->uid, 'field' => 'header', 'image' => $template->header_image]) }}" class="btn btn-sm btn-danger position-absolute d-none" style="top:0; right:0" title="{{ __('tpl.delete_image_title') }}" onclick="return modals.confirm(this, '{{ __('tpl.notice') }}', '{{ __('tpl.delete_image_message') }}', '{{ __('labels.yes') }}', '{{ __('labels.no') }}')"><i class="fe fe-trash-2"></i></a>
                                        <img src="{{ $template->app_url }}{{ $template->app_images_url }}/{{ $template->header_image }}" alt="header" class="img-fluid mx-auto d-block" />
                                        </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">{{ __('tpl.footer') }}</label>
                                        <input type="file" name="footer" class="form-control-file" />
                                        @if($template->footer_image)
                                        <div class="imgs mt-4 position-relative">
                                        <a href="{{ route('tpl.deleteimage', ['uid' => $template->uid, 'field' => 'footer', 'image' => $template->footer_image]) }}" class="btn btn-sm btn-danger position-absolute d-none" style="top:0; right:0" title="{{ __('tpl.delete_image_title') }}" onclick="return modals.confirm(this, '{{ __('tpl.notice') }}', '{{ __('tpl.delete_image_message') }}', '{{ __('labels.yes') }}', '{{ __('labels.no') }}')"><i class="fe fe-trash-2"></i></a>
                                        <img src="{{ $template->app_url }}{{ $template->app_images_url }}/{{ $template->footer_image }}" alt="footer" class="img-fluid mx-auto d-block" />
                                        </div>
                                        @endif
                                    </div>
                                    @endif
                                    @if($template->tpl_type == 'notification')
                                    <div class="form-group">
                                        <label class="form-label">{{ __('tpl.sms_content') }}</label>
                                        <textarea name="sms" id="sms" placeholder="{{ __('tpl.sms_content') }}" class="form-control" style="height:100px">{{ $template->sms }}</textarea>
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <textarea name="content" id="tinymce" placeholder="{{ __('tpl.content') }}" class="form-control" required="required" style="height:300px">{{ $template->content }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="button" class="btn btn-light mr-2" onclick="window.location='{{ $template->backURL }}'">{{ __('labels.back') }}</button>
                            <button type="submit" class="btn btn-info">{{ __('labels.save') }}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <x-AdminFooter/>
    </div>
</div>
<!-- Jquery js-->
<script src="<?php echo URL::to('/th/assets/js/jquery-3.5.1.min.js'); ?>"></script>
<!-- Bootstrap4 js-->
<script src="<?php echo URL::to('/th/assets/plugins/bootstrap/popper.min.js'); ?>"></script>
<script src="<?php echo URL::to('/th/assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!--Sidemenu js-->
<script src="<?php echo URL::to('/th/assets/plugins/sidemenu/sidemenu.js'); ?>"></script>
<!-- P-scroll js-->
<script src="<?php echo URL::to('/th/assets/plugins/p-scrollbar/p-scrollbar.js'); ?>"></script>
<script src="<?php echo URL::to('/th/modals.js'); ?>"></script>
<script src="<?php echo URL::to('/script.js'); ?>"></script>
<script src="https://cdn.tiny.cloud/1/9n1b0elpd20obpyx38wu9ffiokuiqd1ldwot2t8g0pl0lys9/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
    var uploadURL = '{{ route('tpl.uploadimage') }}';
    var csrf = '{{ @csrf_token() }}';
    tinymce.init({
        selector: '#tinymce',
        height: 700,
        setup: function (ed) {
            ed.on('click', function () {
                $('.side-menu').attr('data-insert', ed.id);
            });
        },

        image_advtab: true,
        image_caption: true,
        images_dataimg_filter: function (img) {
            return !img.hasAttribute('internal-blob');
        },
        images_upload_url: uploadURL,
        images_file_types: 'jpg,jpeg,png,gif',
        images_upload_handler: function (blobInfo, success, failure, progress) {
            var xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', uploadURL);
            xhr.setRequestHeader('X-CSRF-TOKEN', csrf);
            xhr.upload.onprogress = function (e) {
                progress(e.loaded / e.total * 100);
            };
            xhr.onload = function () {
                if (xhr.status === 403) {
                    failure('HTTP Error: ' + xhr.status, { remove: true });
                    return;
                }
                if (xhr.status < 200 || xhr.status >= 300) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }
                var json = JSON.parse(xhr.responseText);
                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
                success(json.location);
            };
            xhr.onerror = function () {
                failure('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
            };
            var formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            xhr.send(formData);
        },
        imagetools_cors_hosts: ['ringhel.com'],

        relative_urls: false,
        remove_script_host: false,
        convert_urls: true,

        plugins: 'print preview powerpaste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons  ',
        menubar: 'file edit view insert format tools table help',
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl  ',
        toolbar_sticky: true,
        autosave_ask_before_unload: true,
        autosave_interval: "30s",
        autosave_prefix: "{path}{query}-{id}-",
        autosave_restore_when_empty: false,
        autosave_retention: "20m",
        importcss_append: true,
        templates: [
            { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
            { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
            { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
        ],
        template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
        template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        noneditable_noneditable_class: "mceNonEditable",
        toolbar_mode: 'sliding',
        contextmenu: "link image imagetools table",
    });

    function insertPlaceholder(placeholder) {
        event.preventDefault();
        var dataInsert = $('.side-menu').attr('data-insert');
        if (typeof dataInsert !== 'undefined') {
            if (dataInsert == 'tinymce') {
                tinymce.activeEditor.execCommand('mceInsertContent', false, placeholder);
            } else {
                var obj = $('#' + dataInsert);
                if (obj.length) {
                    var pos = obj.prop('selectionStart');
                    var val = obj.val();
                    obj.val(val.slice(0, pos) + placeholder + val.slice(pos));
                }
            }
        }
    }

    function copyPlaceholder(placeholder) {
        event.preventDefault();
        var el = document.createElement('textarea');
        el.value = placeholder;
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);
    }

    (function($) {
        "use strict";
        /* P-scrolling - pscroll1.js */
        var ps = new PerfectScrollbar('.app-sidebar', {
            useBothWheelAxes: true,
            suppressScrollX: true
        });

        $('.imgs').on('mouseover', function (e) {
            e.preventDefault();
            $('.btn', this).removeClass('d-none');
        }).on('mouseout', function (e) {
            e.preventDefault();
            $('.btn', this).addClass('d-none');
        });

        $('#sms,#subject').on('click', function () {
            $('.side-menu').attr('data-insert', $(this).attr('id'));
        });
        $('input:not([id]),button').on('click', function () {
            $('.side-menu').removeAttr('data-insert');
        });
    })(jQuery);
</script>
</body>
</html>
