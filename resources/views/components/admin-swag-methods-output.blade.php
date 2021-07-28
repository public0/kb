<div class="output-template bg-white">
    <div class="row mb-3">
        <div class="col-8">
            <label class="form-label">Out [{{ $key }}]</label>
        </div>
        <div class="col-4 text-right">
            <button type="button" class="btn btn-sm btn-danger btn-delete-one-output" title="{{ __('Delete output') }}"><i class="fe fe-minus"></i></button>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-3">
            <input type="text" name="output[{{ $key }}][code]" placeholder="Code" class="form-control" value="@if(isset($out)){{ $out['code'] }}@endif" />
        </div>
        <div class="col-sm-9">
            <textarea name="output[{{ $key }}][content]" placeholder="Content" class="form-control text-monospace" style="height:150px">@if(isset($out)){{ $out['content'] }}@endif</textarea>
        </div>
    </div>
</div>
