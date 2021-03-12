<template>
    <div class="checkout block">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="card mb-lg-0">
                        <div class="card-body">
                            <h3 class="card-title">Адрес доставки</h3>
                            <div class="form-group">
                                <select name="" v-show="!!user.address.length > 0"class="form-control" v-model="selected">
                                    <option>Адрес доставки</option>
                                    <option v-for="address in user.address" :value="address">{{address.name}}</option>
                                </select>
                            </div>
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

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="checkout-address">Дом</label>
                                    <input type="text" class="form-control" v-model="selected.home">
                                </div>
                                <div class="form-group col-md-7">
                                    <label for="checkout-street-address">Улица</label>
                                    <input type="text" class="form-control" placeholder="Улица" v-model="selected.street">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="checkout-address">Кв</label>
                                    <input type="text" class="form-control" v-model="selected.unit">
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
                                    <td>{{(product.price*product.pivot.count).toLocaleString()}} тг.</td>
                                </tr>
                                </tbody>
                                <tbody class="checkout__totals-subtotals">
                                <tr>
                                    <th>Сумма</th>
                                    <td>{{sum.toLocaleString()}} тг.</td>
                                </tr>
                                <tr>
                                    <th>Доставка</th>
                                    <td>1 000 тг.</td>
                                </tr>
                                </tbody>
                                <tfoot class="checkout__totals-footer">
                                <tr>
                                    <th>Всего</th>
                                    <td>{{(sum+1000).toLocaleString()}} тг.</td>
                                </tr>
                                </tfoot>
                            </table>
                            <a :href="home_url + 'checkout/'+ order.id +'/success'" v-on:click="addOrUpdateAddress" class="btn btn-primary btn-xl btn-block">Оплатить</a>
                            <button class="btn btn-danger" v-on:click="generateForm">pay</button>
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
        'user', 'order', 'sum', 'home_url'
    ],
    data() {
        return {
            selected: {},

        }
    },
    computed: {
        isSelected: function () {
            return this.selected.id != null;
        }
    },
    methods:{
        addOrUpdateAddress() {

            if (this.isSelected) {
                axios.post("/profile/address/update/" + this.selected.id, this.selected)
                .then(function (response) {
                    console.log("success");
                }).catch(function (error) {
                    console.log(error);
                })
            } else {
                this.selected.name = "Новый";
                axios.post("/profile/address", this.selected)
                .then(function (response) {
                    console.log("success")
                })
            }

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
