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
        <payment-component
            :user = "{{Auth::user()->load('address')}}"
            :order = "{{$order}}"
            :sum = "{{$sum}}"
            :home_url = "homeUrl">
        </payment-component>
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
