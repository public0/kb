@extends('procesio.index')

@section('title', __('labels.search_results'))

@section('page-header')
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">{{ __('labels.search_title') }}: {{ request()->input('q') }}</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('procesio.home') }}"><i class="fe fe-home mr-2 fs-14"></i>{{ __('labels.home') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('labels.search_results') }}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        @if(!empty($results))
        <div class="table-responsive">
            <table class="table table-bordered table-vcenter">
                <thead>
                <tr class="border-top" role="row">
                    <th class="wd-15p border-bottom-0">ID</th>
                    <th class="wd-15p border-bottom-0">Name</th>
                    <th class="wd-15p border-bottom-0">Email Address</th>
                    <th class="wd-15p border-bottom-0">Mobile Number</th>
                    <th class="wd-15p border-bottom-0">Vat Number</th>
                    <th class="wd-15p border-bottom-0">Registration Number</th>
                    <th class="wd-15p border-bottom-0">Address</th>
                    <th class="wd-15p border-bottom-0">Org. Type</th>
                    <th class="wd-10p border-bottom-0">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($results as $item)
                <tr role="row">
                    <td>{{ $item->PartnerId }}</td>
                    <td>{{ $item->Name }}</td>
                    <td>{{ $item->EmailAddress }}</td>
                    <td>{{ $item->MobileNumber }}</td>
                    <td>{{ $item->VatNumber }}</td>
                    <td>{{ $item->RegistrationNumber }}</td>
                    <td>{{ $item->FullAddress }}</td>
                    <td>{{ $item->OrganisationType }}</td>
                    <td class="table-col-shrink text-center">
                        <a href="{{ route('procesio.partners.edit', ['id' => $item->PartnerId]) }}" class="btn btn-sm btn-success"><i class="fe fe-edit-2 mr-1"></i> {{ __('labels.edit') }}</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @else
        <h2>{{ __('labels.no_results') }}</h2>
        @endif
    </div>
</div>
@endsection
