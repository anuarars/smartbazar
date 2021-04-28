@extends('layouts.packer')

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>История заказов</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table">
                            <table class="table table-striped table-md">
                                <thead>
                                <tr>
                                    <th scope="col">Статус</th>
                                    <th scope="col">Дата заказа</th>
                                    <th scope="col">Принят</th>
                                    <th scope="col">Сдан</th>
                                    <th scope="col">Длительность</th>
                                </tr>
                                </thead>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td data-label="Название">{{$order->status->name}}</td>
                                        <td data-label="ЧПУ">{{\Carbon\Carbon::parse($order->created_at)->format('d.m.Y')}}</td>
                                        <td data-label="Редактировать">{{\Carbon\Carbon::parse(optional($order->durationTime())->started_at)->format('d.m.Y')}}</td>
                                        <td data-label="Посмотреть">{{\Carbon\Carbon::parse(optional($order->durationTime())->finished_at)->format('d.m.Y')}}</td>
                                        <td>{{$order->timeSpend()}} мин.</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection