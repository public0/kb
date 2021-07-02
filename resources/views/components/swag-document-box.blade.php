<div class="card overflow-hidden">
    <div class="card-body d-flex flex-column">
        <h4 class="d-flex align-items-center mt-auto">
            <a href="{{ route('swag.document', ['slug' => $item->slug]) }}" title="{{ $item->name }}">{{ $item->name }}</a>
            <span class="badge badge-info ml-2">{{ $item->version }}</span>
        </h4>
        <div class="text-muted">URL: {{ $item->url }}</div>
    </div>
    <div class="card-body pt-3 pb-3">
        <div class="d-flex align-items-center mt-auto">
            <div>
                <small class="d-block text-muted">{{ date('d.m.Y', strtotime($item->updated_at)) }}</small>
            </div>
        </div>
    </div>
</div>
