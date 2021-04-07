@extends('layouts.packer')

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{$order->user->firstname}} {{$order->user->lastname}}</h4>
                    </div>
                    <div class="card-body">
                        {{$order->address->home}}, {{$order->address->street}}, {{$order->address->unit}}
                        <hr>
                        {{$order->fullPrice()}}
                    </div>
                    <div class="card-footer">
                        <h6>Телефон: {{$order->user->phone}}, {{$order->phone ?? ""}}</h6>
                    </div>
                </div>
            </div>
            @foreach ($order->products as $product)
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{$product->title}}</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item"><b>Бутик:</b> {{$product->company->name}}</li>
                                <li class="list-group-item"><b>Кол-во:</b> {{$product->pivot->count}} {{$product->measure->code}}</li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <h4>{{$product->priceForCount()}} тг.</h4>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-md-12">
                <form action="{{route('notification.delivery', $order)}}" method="POST" id="package_ready" class="text-center">
                    @csrf
                    <div class="form-group">
                        <textarea name="additional" class="form-control" rows="5"></textarea>
                    </div>
                    <input type="hidden" name="order_id" value="{{$order->id}}">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Передать курьеру</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection