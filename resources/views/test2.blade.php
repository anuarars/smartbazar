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
                <span class="title">FAQ</span>
            </label>
            <label for="blog" class="blog">
                <span class="title">О компании</span>
            </label>
            <label for="help" class="help">
                <span class="title">Доставка</span>
            </label>
            <label for="code" class="code">
                <span class="title">Гарантия/обмен</span>
            </label>
            <label for="about" class="about">
                <span class="title">Оплата</span>
            </label>
            <div class="slider"></div>
        </div>
        <div class="text-content">
            <div class="home text">
                    <div class="accordion">
                        <div class="accordion-item">
                            <div class="accordion-item-header">
                                Как зарегистрироваться?
                            </div>
                            <div class="accordion-item-body">
                                <div class="accordion-item-body-content">
                                    1. В правом верхнем углу сайта найдите кнопку с иконкой пользователя. Нажмите на нее.<br>
                                    2. Затем нажмите на кнопку «Зарегистрироваться».<br>
                                    3. Заполните соответствующую форму.<br>
                                    4. Согласитесь со всеми условиями нашего интернет-магазина.<br>
                                    5. Нажмите на кнопку «Регистрация».<br>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-item-header">
                                Для чего нужна регистрация?

                            </div>
                            <div class="accordion-item-body">
                                <div class="accordion-item-body-content">
                                    1. Добавлять товары в избранное/корзину. <br>
                                    2. Оформлять заказ.<br>
                                    3. Отслеживать статус заказа/историю покупок.<br>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-item-header">
                                Как войти в личный аккаунт?
                            </div>
                            <div class="accordion-item-body">
                                <div class="accordion-item-body-content">
                                    1. В правом верхнем углу сайта найдите кнопку с иконкой пользователя. <br>
                                    2. Нажмите на нее. <br>
                                    3. Введите номер телефона и пароль. <br>
                                    4. Нажмите на кнопку «Войти». <br>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-item-header">
                                Что делать если я забыл(а) свой пароль?

                            </div>
                            <div class="accordion-item-body">
                                <div class="accordion-item-body-content">
                                    Если вы забыли пароль от Личного аккаунта, пройдите процедуру восстановления пароля. Для этого
                                    перейдите по ссылке «Забыли пароль?» и введите номер телефона, который был указан при регистрации
                                    Личного аккаунта. Затем нажмите на кнопку «Восстановить». Сообщение с новым паролем будет отправлено
                                    на указанный номер.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-item-header">
                                Где посмотреть наличие товара?

                            </div>
                            <div class="accordion-item-body">
                                <div class="accordion-item-body-content">
                                    Есть ли товар в наличии или нет написано в карточке товара над ценой.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-item-header">
                                Где посмотреть наличие товара?

                            </div>
                            <div class="accordion-item-body">
                                <div class="accordion-item-body-content">
                                    Есть ли товар в наличии или нет написано в карточке товара над ценой.
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="blog text">
                <div class="title">Доставка</div>
                <p> Мы доставляем товары с 10.00 до 18.00 , 7 дней в неделю. <br/>
                    Доставка осуществляется только в городе Нур-султан(Астана).<br/>
                    Время доставки согласовывается с курьером, который обязательно свяжется с вами сразу после того, как вы разместите свой заказ.<br/>
                    Курьеры доставят товар по адресу на дом/офис указанному при оформлении заказа.<br/>
                    Продемонстрируют целостность и комплекность товара.<br/>
                    Если необходимо доставить товар по иному адресу, надо сообщить адрес менеджеру, который свяжется с вами непосредственно после оформления заказа на сайте.</p>
            </div>
            <div class="help text">
                <div class="title">Гарантия обмен возврат</div>
                <p> Условия возврата и обмена:



                    Обмен и возврат товара осуществляется в течении 14 календарных дней, с момента покупки, если товар не был в употреблении, сохранены товарный вид, потребительские свойства, упаковка, полная комплектация, пломбы, ярлыки, а также документ, подтверждающий факт приобретения товара (статья 30 пункт 1 закона РК «О защите прав потребителя»).



                    Какие товары относятся к продовольственным и непродовольственным?



                    Продовольственные товары - товары, представляющие собой пищевые продукты в натуральном или переработанном виде, предназначенные для употребления человеком в качестве пищи (биологически активные добавки, детское питание, вода, молочные продукты и т.д).

                    Непродовольственные товары - это продукты производственного процесса, предназначенные для продажи его гражданам или субъектам хозяйственной деятельности, но не с целью употребления его в пищу человеком (изделия медицинского назначения, лекарственные средства, средства гигиены, косметические средства и.т.д).



                    Условия возврата/обмена продовольственных товаров:

                    Согласно пунктам 1-1 и 2 статьи 30 Закона Республики Казахстан «О защите прав потребителей», продовольственный товар подлежит возврату или обмену в случае продажи товаров с истекшим сроком годности или обнаружения потребителем недостатков, а именно:

                    непригодный в пищу товар – испорченные фрукты/овощи, разбитые яйца, и прочие характеристики, делающие продукты непригодными к употреблению;
                    заводской брак;
                    товар, не соответствующий названию и описанию;
                    товар с истекшим сроком годности;
                    товар, доставленный с нарушенной, поврежденной упаковкой.

                    Если все в порядке с упаковкой, сроком и товарным видом, то продовольственный товар надлежащего качества возврату или обмену не подлежит.



                    Условия возврата/обмена непродовольственных товаров:

                    Непродовольственный товар надлежащего качества Клиент может вернуть в течение 14 дней, не считая дня покупки, если указанный товар не подошел по форме, габаритам, фасону, расцветке, размеру или комплектации.

                    Возврат непродовольственного товара надлежащего качества производится, если указанный товар не был в употреблении, сохранены его товарный вид, пломбы, потребительские свойства,  фабричные ярлыки, не нарушена упаковка, а также имеется документ, подтверждающий его приобретение в нашем интернет-супермаркете.

                    Исключения при возврате/обмене непродовольственных товаров надлежащего качества:

                    Согласно Закону Республики Казахстан от 4 мая 2010 года № 274-IV «О защите прав потребителей», статья 30, подпункт 1, возврату не подлежат:

                    1) лекарственные средства и изделия медицинского назначения
                    2) нательное белье;
                    3) чулочно-носочные изделия;
                    4) животные и растения;
                    5) метражные товары, а именно ткани из волокон всех видов, трикотажного и гардинного полотна, меха искусственного, ковровых изделий, нетканых материалов, лент, кружева, тесьмы, проводов, шнуров, кабелей, линолеума, багета, пленки, клеенки;
                    6) абонентские устройства сотовой связи.</p>
            </div>
            <div class="code text">
                <div class="title">Code Content</div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore magnam vitae inventore blanditiis nam tenetur voluptates doloribus error atque reprehenderit, necessitatibus minima incidunt a eius corrupti placeat, quasi similique deserunt, harum? Quia ut impedit ab earum expedita soluta repellat perferendis hic tempora inventore, accusantium porro consequuntur quisquam et assumenda distinctio dignissimos doloremque enim nemo delectus deserunt! Ullam perspiciatis quae aliquid animi quam amet deleniti, at dolorum tenetur, tempore laborum.</p>
            </div>
            <div class="about text">
                <div class="title">About Content</div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus incidunt possimus quas ad, sit nam veniam illo ullam sapiente, aspernatur fugiat atque. Laboriosam libero voluptatum molestiae veniam earum quisquam, laudantium aperiam, eligendi dicta animi maxime sunt non nisi, ex, ipsa! Soluta ex, quibusdam voluptatem distinctio asperiores recusandae veritatis optio dolorem illo nesciunt quos ullam, dicta numquam ipsam cumque sed. Blanditiis omnis placeat, enim sit dicta eligendi voluptatibus laborum consectetur repudiandae tempora numquam molestiae rerum mollitia nemo. Velit perspiciatis, nesciunt, quo illo quas error debitis molestiae et sapiente neque tempore natus?</p>
            </div>
        </div>
    </div>
</div>


@endsection
