@extends('layouts.app')

@section('content')
    <div class="smb_breadcrumb">
        <ul>
            <li>Главная / </li>
            <li>Доставка</li>
        </ul>
    </div>
    <h2 class="page_title">Доставка</h2>
    <div class="inner_container">
        <div class="page_wrapper">
            <div class="page_term">
                <div class="page_term_header">
                    <img src="{{asset('icons/pages/basket.svg')}}" alt="basket">
                    <h2 class="page_title">Правила доставки</h2>
                </div>
                <div class="page_term_body">
                    <p>Курьеры доставят заказ по указанному Покупателем адресу на дом, офис; </p>
                    <p>Продемонстрируют целостность и комплектность товара, заполнят гарантийный талон;</p>
                    <p>Все претензии к внешнему виду товара, комплектации и количеству принимаются до момента передачи товара. После подписания бланка доставки, заказ считается выполненным;</p>
                    <p>Если товар приобретался на Сайте компании или партнера в этом случае Покупателю необходимо предоставить SMS-код Курьеру для подтверждения получения товара;</p>
                    <p>В случае отсутствия покупателя по адресу доставки курьеры ожидают не более 15 минут, после чего оставляют уведомление о доставке и уезжают. Для повторной доставки вам необходимо обратиться в Сall-центр интернет магазина для назначения новой даты доставки;</p>
                    <p>Повторная доставка оплачивается дополнительно;</p>
                    <p>Работы по установке техники службы доставки не оказывают, просим Покупателя обратиться в специализированные Сервисные центры указанные на сайте или в гарантийном талоне;</p>
                    <p>Работы по переносу мебели внутри квартиры, настройка техники и обучение ее использованию сотрудниками службы доставки не производится;</p>
                    <p>Товар не заносится в квартиру, если расстояние между дверной коробкой или стеной и стороной товара в упаковке менее 10 (десяти) см. В этом случае товар остается на месте, до которого удалось осуществить доставку.</p>
                </div>
            </div>
            <div class="page_term">
                <div class="page_term_header">
                    <img src="{{asset('icons/pages/basket.svg')}}" alt="basket">
                    <h2 class="page_title">Самовывоз</h2>
                </div>
                <div class="page_term_body">
                    <p>Хотите забрать товар из магазина самостоятельно - выберите в процессе оформления заказа «Самовывоз» и укажите магазин, из которого планируете забрать товар. </p>
                    <p>К вашему приезду мы подготовим, выбранный вами товар и документы. </p>
                    <p>Вы можете проверить товар и комплектацию в магазине. </p>
                    <p>Наши специалисты подключат, купленную вами технику к сети 220 В и проверят её работоспособность. </p>
                    <p>Мы будем рады видеть вас в наших магазинах.</p>
                </div>
            </div>
            <div class="page_term">
                <div class="page_term_header">
                    <img src="{{asset('icons/pages/car.svg')}}" alt="basket">
                    <h2 class="page_title">Доставка собственной службой</h2>
                </div>
                <div class="page_term_body">
                    <p>Стоимость доставки указана для заказов онлайн, в городах, где есть розничные магазины «Мечта». При покупке в розницу цены на доставку отличаются.</p>
                    <p>* Доставка товаров осуществляется в административных границах города</p>
                </div>
            </div>
            <div class="page_term">
                <div class="page_city">
                    <h5>Нур-Султан (Астана)</h5>
                    <span class="page_city_text">По городу (ежедневно): </span>
                    <span class="page_city_text">Заказы стоимостью до <span class="text-skyblue">10000 тг. – 1000 тг.</span></span>
                    <span class="page_city_text">Заказы свыше <span class="text-skyblue">10000 тг. – бесплатно!</span></span>
                </div>
            </div>
        </div>
    </div>
@endsection