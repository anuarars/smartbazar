@extends('layouts.packer')

@section('body')
<div class="container">
	  <div class="row">
		  <div class="col-md-12">
			  <div class="card">
					<div class="card-body">
						<h1 class="text-center" id="no-order">На данный момент заказов нет</h1>
						<form action="{{route('packer.accept')}}" method="POST" class="notification_form text-center">
							@csrf
							<input type="hidden" name="order_id" id="order_id">
							<button class="btn btn-warning">Принять</button>
						</form>
						@include('includes.errors')
					</div>
			  </div>
		  </div>
	  </div>
  </div>
@endsection