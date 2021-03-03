@extends('layouts.packer')

@section('content')
	<packer-component 
		:user="{{Auth::user()->load('roles')}}"
		:home_url = 'homeUrl'
	></packer-component>
@endsection