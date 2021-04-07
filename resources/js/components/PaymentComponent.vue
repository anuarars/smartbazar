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

                            <!--<div class="form-group" v-if="user.address.length !=0">

                                <select class="form-control" :class="{'is-invalid': emptyAddress}" v-model="selected" v-on:change="showInputs=true">
                                    <option value="" selected disabled>Выберите Адрес</option>
                                    <option v-for="address in user.address" :value="address">{{address.name}}</option>
                                </select>
                            </div>

                            <div>
                                <div class="form-row" v-if="user.address.length !=0" :class="{'d-none': !showInputs}">
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

                                <div class="form-row" v-else>
                                    <div class="form-group col-md-3">
                                        <label for="checkout-address">Дом</label>
                                        <input type="text" class="form-control" v-model="create.home" :class="{'is-invalid': emptyAddress}">
                                    </div>
                                    <div class="form-group col-md-7">
                                        <label for="checkout-street-address">Улица</label>
                                        <input type="text" class="form-control" placeholder="Улица" v-model="create.street" :class="{'is-invalid': emptyAddress}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="checkout-address">Кв</label>
                                        <input type="text" class="form-control" v-model="create.unit" :class="{'is-invalid': emptyAddress}">
                                    </div>
                                </div>
                            </div>
                            -->

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="checkout-phone">Адрес</label>
                                    <input type="text" class="form-control" placeholder="Адрес" v-model="address" v-on:keyup="searchAddress">
                                    <ul class="list-group" v-if="addressList.length > 0">
                                        <li v-for="address in addressList" class="list-group-item">{{address.GeoObject.metaDataProperty.GeocoderMetaData}}</li>
                                    </ul>
                                </div>
                            </div>

                            <!--<div>
                                <div class="form-row" v-if="selected !== 'self'">
                                    <div class="form-group col-md-10">
                                        <label for="checkout-address">Дом</label>
                                        <autocomplete id="checkout-address"
                                                      :search="searchDebounced"
                                                      :get-result-value="getResultAddress"
                                                      :debounce-time="500"></autocomplete>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="checkout-address">Кв</label>
                                        <input type="text" class="form-control" :value="selected.unit">
                                    </div>
                                </div>
                            </div>-->

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="checkout-phone">Телефон</label>
                                    <input type="text" class="form-control" id="checkout-phone" placeholder="Телефон" :value="user.phone" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="checkout-phone">Дополнительный</label>
                                    <input type="text" class="form-control" id="checkout-phone2" placeholder="Телефон" v-model="orderPhone">
                                </div>
                            </div>
                        </div>
                        <div class="card-divider"></div>
                        <div class="card-body">
                            <h3 class="card-title">Дополнительная информация для доставки</h3>
                            <div class="form-group">
                                <label for="checkout-comment">Необязательно</label>
                                <textarea id="checkout-comment" class="form-control" rows="4" v-model="infoByUser"></textarea>
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
                                            {{
                                                (product.pivot.count * Math.ceil((product.price+((product.price*10)/100))-(((product.price+((product.price*10)/100)) * product.discount)/100))).toLocaleString()
                                            }} тг.
                                        </span>
                                        <span v-else>
                                            {{(product.pivot.count * (product.price+((product.price*10)/100))).toLocaleString()}} тг.
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
                                    <td>{{(sum+deliveryprice).toLocaleString()}} тг.</td>
                                </tr>
                                </tfoot>
                            </table>
                            <button v-on:click="addOrUpdateAddress()" class="btn btn-primary btn-xl btn-block">Подтвердить</button>
                            <!--<button class="btn btn-danger" v-on:click="generateForm">pay</button>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
// import Autocomplete from '@trevoreyre/autocomplete-vue';
// import '@trevoreyre/autocomplete-vue/dist/style.css'

// const geocodeUrl = 'https://geocode-maps.yandex.ru/1.x';
// const apikey = '471d7ae6-c5c6-45cc-9c09-52b2246b5fba';
// const astana_bbox = '71.170665,50.986637~71.665036,51.309052';

export default {
    props:[
        'user', 'order', 'sum', 'home_url', 'deliveryprice'
    ],
    // components: {
    //     Autocomplete
    // },
    data() {
        return {
            selected: '',
            orderPhone: '',
            infoByUser: '',
            create:{
                home: '',
                street: '',
                unit: ''
            },
            emptyAddress: false,
            showInputs: false,

            address: '',
            addressList: [],
            astana_bbox: '71.170665,50.986637~71.665036,51.309052',
        }
    },
    methods:{
        addOrUpdateAddress() {
            if(this.user.address.length!=0){
                this.updateOrder();
            }else{
                this.createAddress();
            }
        },
        createAddress(){
            if(this.create.home=='' || this.create.street=='' || this.create.unit==''){
                this.emptyAddress=true;
            }else{
                axios.post(this.home_url + 'profile/address/create/payment', {
                    home: this.create.home,
                    street: this.create.street,
                    unit: this.create.street,
                }).then(response => {
                    axios.post(this.home_url + 'checkout/update/order', {
                        address_id: response.data.id,
                        orderPhone: this.orderPhone,
                        infoByUser: this.infoByUser,
                        order_id: this.order.id,
                    }).then(response => {
                        window.location.href = this.home_url + 'checkout/' + this.order.id + '/success';
                    });
                });
            }
        },
        updateOrder(){
            if(this.selected == ''){
                this.emptyAddress=true;
            }else{
                axios.post(this.home_url + 'checkout/update/order', {
                    address_id: this.selected.id,
                    orderPhone: this.orderPhone,
                    infoByUser: this.infoByUser,
                    order_id: this.order.id,
                }).then(response => {
                    window.location.href = this.home_url + 'checkout/' + this.order.id + '/success';
                });
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
                    window.location.href = data.data.redirect_url;
                },
                function (err) {
                    console.log(err);
                }
            );
        },
        searchAddress(){
            this.addressList = '';
            axios.get('https://geocode-maps.yandex.ru/1.x/?apikey=471d7ae6-c5c6-45cc-9c09-52b2246b5fba&format=json&geocode=Астана,'+this.address+'&lang=ru_RU').then(response => {
                console.log(response.data.response.GeoObjectCollection.featureMember);
                this.addressList = response.data.response.GeoObjectCollection.featureMember;
            });
        },
        // searchDebounced(input) {
        //     const url = `${geocodeUrl}?apikey=${
        //         apikey
        //     }&geocode=${encodeURI(input)}&format=json`
        //     return new Promise(resolve => {
        //         if (input.length < 3) {
        //             return resolve([])
        //         }
        //         fetch(url)
        //             .then(response => response.json())
        //             .then(data => {
        //                 console.log(data);
        //                 // возвращаю массив с адресами и потом парсится с помощью getResultAddress
        //                 resolve(data.response.GeoObjectCollection.featureMember)
        //             })
        //     })
        // },
        // getResultAddress(result){
        //     return result.GeoObject.description;
        // },
    }
}
</script>