<div class="params-template">
    <label class="form-label">Param [{{ $key }}]</label>
    <div class="row mb-3">
        <div class="col-sm-5">
            <input type="text" name="parameters[{{ $key }}][name]" placeholder="Name" class="form-control" value="@if(isset($param)){{ $param['name'] }}@endif" />
        </div>
        <div class="col-sm-7">
            <input type="text" name="parameters[{{ $key }}][description]" placeholder="Description" class="form-control" value="@if(isset($param)){{ $param['description'] }}@endif" />
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-4">
            <select name="parameters[{{ $key }}][location]" class="form-control">
                <option value="">Location</option>
                @foreach($locations as $item)
                <option value="{{ $item }}"@if(isset($param) && $param['location'] == $item) selected="selected" @endif>{{ $item }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-4">
            <select name="parameters[{{ $key }}][type]" class="form-control">
                <option value="">Type</option>
                @foreach($types as $item)
                <option value="{{ $item }}"@if(isset($param) && $param['type'] == $item) selected="selected" @endif>{{ $item }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-4">
            <input type="hidden" class="custom-control-input" name="parameters[{{ $key }}][required]" value="0" />
            <label class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" name="parameters[{{ $key }}][required]" value="1" @if(isset($param) && $param['required']) checked="checked" @endif /><span class="custom-control-label">Required</span></label>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-12">
            <textarea name="parameters[{{ $key }}][content]" placeholder="Content" class="form-control" style="height:150px">@if(isset($param)){{ $param['content'] }}@endif</textarea>
        </div>
    </div>
</div>
