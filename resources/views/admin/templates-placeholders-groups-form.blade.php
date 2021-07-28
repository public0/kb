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
                    <h4 class="page-title mb-0">Template Placeholders Groups</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item">Templates</li>
                        <li class="breadcrumb-item">Placeholders</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.tpl.place.group') }}">Groups</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@if($group){{ __('labels.edit') }}@else{{ __('labels.add') }}@endif</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->
            <!--div-->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">@if($group){{ __('labels.edit') }}@else{{ __('labels.add') }}@endif</div>
                </div>
                <form class="needs-validation" method="post" action="{{ url()->current() }}">
                @csrf
                <div class="card-body">
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" placeholder="Name" class="form-control" required="required" value="{{ old('name', $group ? $group->name : null) }}" maxlength="255" />
                            </div>
                            <div class="form-group">
                                <label class="form-label">Type <span class="text-danger">*</span></label>
                                <select name="type_id" class="form-control custom-select select2" required="required">
                                    @foreach($types as $type)
                                    <option value="{{ $type->id }}"@if(old('type_id', $group ? $group->type_id : null) == $type->id) selected="selected" @endif>{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Subtypes</label>
                                <select name="subtypes_ids[]" id="subtypesIds" class="form-control" multiple>
                                    @foreach($subtypes as $subtype)
                                    <option value="{{ $subtype->id }}"@if($group && in_array($subtype->id, $group->all_subtypes)) selected="selected" @endif>{{ $subtype->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-control custom-select select2">
                                    <option value="1"@if(old('status', $group ? $group->status : -1) == 1) selected="selected" @endif>{{ __('status.active') }}</option>
                                    <option value="0"@if(old('status', $group ? $group->status : -1) == 0) selected="selected" @endif>{{ __('status.inactive') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="button" class="btn btn-light mr-2" onclick="window.location='{{ route('admin.tpl.place.group') }}'">{{ __('labels.back') }}</button>
                    <button type="submit" class="btn btn-info">{{ __('labels.submit') }}</button>
                </div>
                </form>
            </div>
            <!--/div-->
        </div>
    </div>
@endsection

@push('body-scripts')
<script>
    function populateSubtypes(id) {
        $('select#subtypesIds').select2({
            ajax: {
                method: 'GET',
                url: '{{ route('api.templates.getsubtypes') }}' + '/' + id,
                dataType: 'json',
                data: function (params) {
                    return {
                        term: params.term,
                        select: 'id,name'
                    };
                },
                processResults: function (data) {
                    var items = [];
                    $.each(data.subtypes, function(idx, val) {
                        items.push({id: val.id, text: val.name});
                    });
                    return {
                        results: items
                    };
                }
            }
        });
    }
    $(document).ready(function () {
        var selectTypeID = $('select[name="type_id"]');
        selectTypeID.on('change', function () {
            populateSubtypes($(this).val());
        });
        populateSubtypes(selectTypeID.val());
    });
</script>
@endpush
