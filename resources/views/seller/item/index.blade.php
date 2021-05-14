@extends('layouts.seller')

@section('content')

<product-data-table
    :url="'{{ route('api.boutique.items', ['company' => $company_id]) }}'"
    :resource_url="'{{ route('api.items.index') }}'"
    :home_url="homeUrl"
></product-data-table>

@endsection
