@extends('layouts.default')

@section('content')

<div class="container">
    <div class="content">
        <input type="radio" name="slider" checked id="home">
        <input type="radio" name="slider" id="blog">
        <input type="radio" name="slider" id="help">
        <input type="radio" name="slider" id="code">
        <input type="radio" name="slider" id="about">
        <div class="list">
            <label for="home" class="home">
                <i class="fas fa-question-circle"></i> <span class="title">FAQ</span>
            </label>
            <label for="blog" class="blog">
                <i class="fas fa-truck"></i> <span class="title">Доставка</span>
            </label>
            <label for="help" class="help">
                <span class="title">О компании</span>   <svg><use xlink:href="{{ secure_asset('icons/logo.svg')}}"></use></svg>
            </label>









            <label for="code" class="code">
                <i class="fas fa-file-contract"></i>  <span class="title">Гарантия/обмен</span>
            </label>
            <label for="about" class="about">
                <i class="fas fa-wallet"></i> <span class="title">Оплата</span>
            </label>
            <div class="slider"></div>
        </div>
        <div class="text-content">
            <div class="home text">
                   <accordion-component></accordion-component>
            </div>
            <div class="blog text">
                <div class="title">Доставка</div>
                <ul>
                   <li> Мы доставляем товары с 10.00 до 18.00 , 7 дней в неделю.</li>
                   <li> Доставка осуществляется только в городе Нур-султан(Астана).</li>
                   <li>Время доставки согласовывается с курьером, который обязательно свяжется с вами сразу после того, как вы разместите свой заказ.</li>
                   <li>Курьеры доставят товар по адресу на дом/офис указанному при оформлении заказа.</li>
                   <li> Продчемонстрируют целостность и комплекность товара.</li>
                   <li>Если необходимо доставить товар по иному адресу, надо сообщить адрес менеджеру, который свяжется с вами непосредственно после оформления заказа на сайте.</li>
                </ul>
            </div>
            <div class="help text">
                <div class="title">Гарантия обмен возврат</div>
                <p>Высокое качество продукции</p>
                <p>Мы &ndash; специализированная торговая площадка интернет магазинов. Даем возможность продавцу и покупателю совершать сделки по покупке-продаже того или иного вида товаров через Интернет. В SmartBazar широкий ассортимент товаров &ndash; от 3000 до 10000 наименований в интернет магазине.</p>
                <p>Мы предлагаем доступные цены и широкий ассортимент товара. Линейка продукции включает в себя (более &hellip;.) Или (от &hellip;. До &hellip;&hellip;) &nbsp;наименований.</p>
                <p>"SmartBazar" -это недорогой универсальный интернет-магазин, который доставляет продукты по всем классификациям, таким как бакалея, натуральные продукты и овощи, красота и здоровье, канцтовары, а также мясо и рыбу прямо к вашему порогу. Мы предлагаем доступные цены и широкий ассортимент товаров. Наша линейка продукции включает в себя (более &hellip;.) Или (от &hellip;. До &hellip;&hellip;) &nbsp;наименований.</p>
                <p>Наши преимущества:</p>
                <p>Быстрая доставка, скидки и акции, широкий ассортимент</p>
                <ul>
                    <li>Наша миссия - удовлетворить наших партнеров и клиентов уникальным опытом покупок, предлагая качество, разнообразие, цену и обслуживание, основанные на внимании и преданности наших сотрудников.</li>
                    <li>Наше видение состоит в том, чтобы быть независимым, инновационным, честным и устойчивым интернет магазином, в котором клиенты могут выбирать из широкого ассортимента товаров по разумным ценам.</li>
                </ul>
                <p>&nbsp;</p>
            </div>
            <div class="code text">
                <div class="title">Гарантия/обмен</div>
                <p><strong>Условия возврата и обмена:</strong>
                </p>
                <p>Обмен и возврат товара осуществляется в течении&nbsp;
                    <strong>14 календарных дней</strong>, с момента покупки, если&nbsp;
                    <strong>товар не был в употреблении</strong>,
                    сохранены товарный вид, потребительские свойства, упаковка, полная комплектация, пломбы, ярлыки, а также документ, подтверждающий факт
                    приобретения товара (статья 30 пункт 1 закона РК «О защите прав потребителя»).</p>
                <p></p>
                <p><strong>Какие товары относятся к продовольственным и непродовольственным?</strong></p>

                <p>Продовольственные товары - товары, представляющие собой пищевые продукты в натуральном или переработанном виде, предназначенные для
                    употребления человеком в качестве пищи (биологически активные добавки, детское питание, вода, молочные продукты и т.д).<br>
                    <br>Непродовольственные товары - это продукты производственного процесса, предназначенные для продажи его гражданам или субъектам
                    хозяйственной деятельности, но не с целью употребления его в пищу человеком (изделия медицинского назначения, лекарственные средства,
                    средства гигиены, косметические средства и.т.д).</p>

                <p><strong>Условия возврата/обмена продовольственных товаров:</strong></p>
                <p>Согласно пунктам&nbsp;
                    <a href="https://online.zakon.kz/document/?doc_id=30661723#pos=497;-40&amp;sdoc_params=text%3D%25D0%25BF%25D1%2580%25D0%25BE%25D0%25B4%25D0%25BE%25D0%25B2%25D0%25BE%25D0%25BB%25D1%258C%25D1%2581%25D1%2582%25D0%25B2%25D0%25B5%25D0%25BD%26mode%3Dindoc%26topic_id%3D30661723%26spos%3D1%26tSynonym%3D1%26tShort%3D1%26tSuff">
                        1-1 и 2 статьи 30 Закона Республики Казахстан «О защите прав потребителей»</a>,
                    продовольственный товар подлежит возврату или обмену в случае продажи товаров с истекшим сроком годности или обнаружения потребителем недостатков, а именно:</p>
                <ul><li>непригодный в пищу товар – испорченные фрукты/овощи, разбитые яйца, и прочие характеристики, делающие продукты непригодными к употреблению;</li>
                    <li>заводской брак;</li>
                    <li>товар, не соответствующий названию и описанию;</li>
                    <li>товар с истекшим сроком годности;</li>
                    <li>товар, доставленный с нарушенной, поврежденной упаковкой.</li>
                </ul>
                <p>
                    Если все в порядке с упаковкой, сроком и товарным видом, то продовольственный товар надлежащего качества возврату или обмену не подлежит.</p>

                <p><strong>Условия возврата/обмена непродовольственных товаров:</strong>
                </p> <p>Непродовольственный товар надлежащего качества Клиент может вернуть в течение 14 дней, не считая дня покупки, если указанный товар не подошел по форме, габаритам, фасону, расцветке, размеру или комплектации.</p>
                <p>Возврат непродовольственного товара надлежащего качества производится, если указанный товар не был в употреблении, сохранены его товарный вид, пломбы, потребительские свойства, &nbsp;фабричные ярлыки, не нарушена упаковка, а также имеется документ, подтверждающий его приобретение в нашем интернет-супермаркете.</p>
                <p><strong>Исключения при возврате/обмене непродовольственных товаров надлежащего качества:</strong></p>
            </div>
            <div class="about text">
                <div class="title">Оплата</div>
                <p>Оплата принимается 4 способами:</p>
                <ol>
                    <li>Наличными</li>
                </ol>
                <p>Заказы на сайте можно оплатить наличными курьеру при получении товара.</p>
                <ol start="2"><li>Банковской картой</li></ol>
                <p>Покупку на сайте можно оплатить банковской картой онлайн при оформлении заказа. Это удобно, быстро и безопасно. Мы принимаем к оплате банковские карты платежных систем:
                    Visa, Mastercard.</p>
                <p>Для оплаты необходимо ввести данные:</p>
                <p>Номер карты ‒ 16 цифр на лицевой стороне карты;</p>
                <p>Срок действия в формате ММ/ГГ;</p>
                <p>CVC/CVV ‒ цифровой номер на обратной стороне карты.</p>
                 <ol start="3">
                    <li>GooglePay</li></ol>
                <p>Заказы на сайте можно оплатить с помощью системы мобильных платежей Google Pay. Для этого необходимо Добавить карту и заполнить поле Платежного адреса.</p>
                <ol start="4"><li>Банковским переводом курьеру при получении товара.</li></ol>
            </div>
        </div>
    </div>
</div>


@endsection
<script>
    import AccordionComponent from "../js/components/AccordionComponent";
    export default {
        components: {AccordionComponent}
    }
</script>
