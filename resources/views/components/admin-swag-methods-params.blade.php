<div class="params-template bg-white">
    <div class="row">
        <div class="col-8">
            <label class="form-label">Param [{{ $key }}]</label>
        </div>
        <div class="col-4 text-right">
            <button type="button" class="btn btn-sm btn-danger btn-delete-one-param" title="{{ __('Delete parameter') }}"><i class="fe fe-minus"></i></button>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-4">
            <span>Name</span>
            <input type="text" name="parameters[{{ $key }}][name]" placeholder="Name" class="form-control" value="@if(isset($param)){{ $param['name'] }}@endif" />
        </div>
        <div class="col-sm-3">
            <span>Location</span>
            <select name="parameters[{{ $key }}][location]" class="form-control">
                <option value="">None</option>
                @foreach($locations as $item)
                <option value="{{ $item }}"@if(isset($param) && $param['location'] == $item) selected="selected" @endif>{{ $item }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-3">
            <span>Type</span>
            <select name="parameters[{{ $key }}][type]" class="form-control">
                <option value="">None</option>
                @foreach($types as $item)
                <option value="{{ $item }}"@if(isset($param) && $param['type'] == $item) selected="selected" @endif>{{ $item }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-2">
            <span>&nbsp</span>
            <input type="hidden" class="custom-control-input" name="parameters[{{ $key }}][required]" value="0" />
            <label class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" name="parameters[{{ $key }}][required]" value="1" @if(isset($param) && $param['required']) checked="checked" @endif /><span class="custom-control-label">Required</span></label>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-6">
            <span>Description</span>
            <textarea name="parameters[{{ $key }}][description]" placeholder="Description" class="form-control text-monospace" style="height:150px">@if(isset($param)){{ $param['description'] }}@endif</textarea>
        </div>
        <div class="col-sm-6">
            <span>Content</span>
            <textarea name="parameters[{{ $key }}][content]" placeholder="Content" class="form-control text-monospace" style="height:150px">@if(isset($param)){{ $param['content'] }}@endif</textarea>
        </div>
    </div>
</div>
