@extends('layouts.default')

@section('content')
    <div class="site__body">
        <div class="page-header">
            <div class="page-header__container container">
                <div class="page-header__breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">Главная</a>
                                <svg class="breadcrumb-arrow" width="6px" height="9px">
                                    <use xlink:href="{{asset('template/images/sprite.svg#arrow-rounded-right-6x9')}}"></use>
                                </svg>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Оплата</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>Оплата</h1>
                </div>
            </div>
        </div>
        <div class="checkout block">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-7">
                        <div class="card mb-lg-0">
                            <div class="card-body">
                                <h3 class="card-title">Адрес доставки</h3>
                                @if (Auth::user()->address)
                                    <div class="form-group">
                                        <select name="" class="form-control">
                                            @foreach (Auth::user()->address as $address)
                                                <option value="{{$address->id}}">{{$address->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="checkout-first-name">Имя</label>
                                        <input type="text" class="form-control" placeholder="Имя" value="{{Auth::user()->firstname}}" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="checkout-last-name">Фамилия</label>
                                        <input type="text" class="form-control" placeholder="Фамилия" value="{{Auth::user()->lastname}}" disabled>
                                    </div>
                                </div>
                                @if (count(Auth::user()->address)>0)
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="checkout-address">Дом</label>
                                            <input type="text" class="form-control" value="{{Auth::user()->address->first()->home}}">
                                        </div>
                                        <div class="form-group col-md-7">
                                            <label for="checkout-street-address">Улица</label>
                                            <input type="text" class="form-control" placeholder="Улица" value="{{Auth::user()->address->first()->street}}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="checkout-address">Кв</label>
                                            <input type="text" class="form-control" value="{{Auth::user()->address->first()->unit}}">
                                        </div>
                                    </div>
                                @endif
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="checkout-phone">Телефон</label>
                                        <input type="text" class="form-control" id="checkout-phone" placeholder="Телефон" value="{{Auth::user()->phone}}" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="checkout-phone">Дополнительный</label>
                                        <input type="text" class="form-control" id="checkout-phone2" placeholder="Телефон">
                                    </div>
                                </div>
                            </div>
                            <div class="card-divider"></div>
                            <div class="card-body">
                                <h3 class="card-title">Дополнительная информация для доставки</h3>
                                <div class="form-group">
                                    <label for="checkout-comment">Необязательно</label>
                                    <textarea id="checkout-comment" class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-5 mt-4 mt-lg-0">
                        <div class="card mb-0">
                            <div class="card-body">
                                <h3 class="card-title">Ваш заказ</h3>
                                <table class="checkout__totals">
                                    <thead class="checkout__totals-header">
                                        <tr>
                                            <th>Продукт</th>
                                            <th>Сумма</th>
                                        </tr>
                                    </thead>
                                    <tbody class="checkout__totals-products">
                                        @foreach ($order->products as $product)
                                            <tr>
                                                <td>{{$product->title}}</td>
                                                <td>{{number_format($product->price*$product->pivot->count, 0, ' ', ' ')}} тг.</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tbody class="checkout__totals-subtotals">
                                        <tr>
                                            <th>Сумма</th>
                                            <td>{{number_format($sum,0, ' ', ' ')}} тг.</td>
                                        </tr>
                                        <tr>
                                            <th>Доставка</th>
                                            <td>1 000 тг.</td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="checkout__totals-footer">
                                        <tr>
                                            <th>Всего</th>
                                            <td>{{number_format($sum+1000, 0, ' ', ' ')}} тг.</td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <a href="{{route('checkout.success', $order->id)}}" class="btn btn-primary btn-xl btn-block">Оплатить</a>
                            </div>
                        </div>
                    </div>
                    <payment-component></payment-component>
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
        function generateForm() { 
	var widget = new tp.TarlanPayments(); 
	widget.checkout( 
	{ 
		reference_id: 543819, // номер заказа 
		request_url: 'https://site.kz/request', // адрес для перенаправления после платежа 
		back_url: 'https://site.kz/back_url', // адрес для отправки коллбека 
		description: 'оплата заказа', // описание платежа 
		amount: 100, // сумма заказа 
		merchant_id: 1, // номер мерчанта 
		is_test: 1, // опция для тестовой оплаты 
		secret_key: 'merchant_api', // ключ выдданный для мерчанта 
	}, 
	function (data) { 
		// при успешной оплате 
	}, 
	function (err) { 
		// при неуспешной оплате 
	} 
	); 
} 

document.querySelector('.make-payment').addEventListener('click', generateForm);
    </script> --}}
@endsection