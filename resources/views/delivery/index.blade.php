@extends('layouts.delivery')

@section('content')
	<delivery-component
		:user="{{Auth::user()->load('roles')}}"
		:home_url = 'homeUrl'
	></delivery-component>
@endsection