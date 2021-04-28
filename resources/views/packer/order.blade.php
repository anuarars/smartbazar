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
                        {{$order->address()->first()->description}}
                        <hr>
                        {{$order->fullPrice()}}
                    </div>
                    <div class="card-footer">
                        <h6>Телефон: {{$order->user->phone}}, {{$order->phone ?? ""}}</h6>
                    </div>
                </div>
            </div>
            @foreach ($order->items as $item)
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{$item->product->title}}</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item"><b>Бутик:</b> {{$item->company->name}}</li>
                                <li class="list-group-item"><b>Кол-во:</b> {{$item->pivot->count}} {{$item->product->measure->code}}</li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <h4>{{$item->priceForCount()}} тг.</h4>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-md-12">
                <form action="{{route('packer.delivery', $order)}}" method="POST" id="package_ready" class="text-center">
                    @csrf
                    <div class="form-group">
                        <textarea name="additional" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Передать курьеру</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection