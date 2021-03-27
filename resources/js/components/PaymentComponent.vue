<template>
    <div class="checkout block">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="card mb-lg-0">
                        <div class="card-body">
                            <h3 class="card-title">Адрес доставки</h3>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="checkout-first-name">Имя</label>
                                    <input type="text" class="form-control" placeholder="Имя" :value="user.firstname" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="checkout-last-name">Фамилия</label>
                                    <input type="text" class="form-control" placeholder="Фамилия" :value="user.lastname" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <select name="" class="form-control" v-model="selected">
                                    <option value="self">Самовывоз</option>
                                    <option value="create">Адрес доставки</option>
                                    <option v-show="!!user.address.length > 0" v-for="address in user.address" :value="address">{{address.name}}</option>
                                </select>
                            </div>

                            <div>
                                <div class="form-row" v-if="selected !== 'self'">
                                    <div class="form-group col-md-3">
                                        <label for="checkout-address">Дом</label>
                                        <input type="text" class="form-control" :value="selected.home">
                                    </div>
                                    <div class="form-group col-md-7">
                                        <label for="checkout-street-address">Улица</label>
                                        <input type="text" class="form-control" placeholder="Улица" :value="selected.street">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="checkout-address">Кв</label>
                                        <input type="text" class="form-control" :value="selected.unit">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="checkout-phone">Телефон</label>
                                    <input type="text" class="form-control" id="checkout-phone" placeholder="Телефон" :value="user.phone" disabled>
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
                                <tr v-for="product in order.products">
                                    <td>{{product.title}}</td>
                                    <td>
                                        <span v-if="product.discount != null">
                                            {{(Math.ceil(product.price - ((product.price * product.discount)/100))).toLocaleString()}} тг.
                                        </span>
                                        <span v-else>
                                            {{(product.price*product.pivot.count).toLocaleString()}} тг.
                                        </span>
                                    </td>
                                </tr>
                                </tbody>
                                <tbody class="checkout__totals-subtotals">
                                <tr>
                                    <th>Сумма</th>
                                    <td>{{sum.toLocaleString()}} тг.</td>
                                </tr>
                                <tr>
                                    <th>Доставка</th>
                                    <td>{{deliveryprice.toLocaleString()}} тг.</td>
                                </tr>
                                </tbody>
                                <tfoot class="checkout__totals-footer">
                                <tr>
                                    <th>Всего</th>
                                    <td>{{(sum+1000).toLocaleString()}} тг.</td>
                                </tr>
                                </tfoot>
                            </table>
                            <button  v-on:click="addOrUpdateAddress" class="btn btn-primary btn-xl btn-block">Подтвердить</button>
                            <!--<button class="btn btn-danger" v-on:click="generateForm">pay</button>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
export default {
    props:[
        'user', 'order', 'sum', 'home_url', 'deliveryprice'
    ],
    data() {
        return {
            selected: '',
            createRecord:{
                home: '',
                street: '',
                unit: '',
            }
        }
    },
    methods:{
        addOrUpdateAddress() {
            // if(this.selected == 'create'){
            //    this.createAddress();
            // }else if(this.selected == 'self'){
            //     console.log('an');
            // }
            window.location.href = this.home_url + 'checkout/' + this.order.id + '/success';

            // if (this.selected) {
            //     axios.post(this.home_url + "/profile/address/update/" + this.selected.id, this.selected)
            //     .then(function (response) {
            //         // window.location.href = this.home_url + this.order.id + '/success';
            //         // console.log(response);
            //         // console.log(response.success);
            //     })
            // }
            // console.log(this.selected);

        },
        createAddress(){
            console.log(this.selected.home)
            // axios.post(this.home_url + 'profile/address', {
            //     throughPayment: 1,
            // }).then(response => {
            //     console.log(response.data)
            // });
        },
        generateForm() {
            var widget = new tp.TarlanPayments();
            widget.checkout(
                {
                    reference_id: 543820, // номер заказа
                    request_url: 'https://example.com', // адрес для перенаправления после платежа
                    back_url: 'https://site.kz/back_url', // адрес для отправки коллбека
                    description: 'оплата заказа', // описание платежа
                    amount: 1000, // сумма заказа
                    merchant_id: 59, // номер мерчанта
                    is_test: 1, // опция для тестовой оплаты
                    secret_key: 'dzy95RSTjVZLf9U8TFgJ', // ключ выдданный для мерчанта
                    user_id: 1,
                },
                function (data) {
                    console.log(data);
                    window.location.href = data.data.redirect_url;
                },
                function (err) {
                    console.log(err);
                }
            );
        },

    },
    created(){
        console.log(this.order.products);
        console.log(this.user);

    }
}
</script>
