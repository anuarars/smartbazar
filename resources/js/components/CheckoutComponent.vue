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

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="checkout-phone">Адрес</label>
                                    <input type="text" class="form-control" placeholder="Адрес, Дом" v-model="address" v-on:keyup="searchAddress" v-bind:class="{ 'is-invalid': emptyAddress }">
                                    <ul class="list-group" v-if="addressList.length > 0" v-click-outside="emptyAddressList">
                                        <li v-for="address in addressList" class="list-group-item">
                                            <a href="#" v-on:click.prevent="addAddress(address.GeoObject.name)">{{address.GeoObject.name}}</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="checkout-phone">Кв</label>
                                    <input type="text" class="form-control" placeholder="Кв">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="checkout-phone">Подъезд</label>
                                    <input type="text" class="form-control" placeholder="Пд">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="checkout-phone">Этаж</label>
                                    <input type="text" class="form-control" placeholder="Этаж">
                                </div>
                            </div>

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
                                <tr v-for="item in order.items">
                                    <td>{{item.product.title}}</td>
                                    <td>
                                        <span v-if="item.discount != null">
                                            {{
                                                Math.ceil((item.pivot.count *(item.price+((item.price*10)/100))-(((item.price+((item.price*10)/100)) * item.discount)/100))).toLocaleString()
                                            }} тг.
                                        </span>
                                        <span v-else>
                                            {{Math.ceil((item.pivot.count * (item.price+((item.price*10)/100)))).toLocaleString()}} тг.
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
                            <button v-on:click="sendForPack()" class="btn btn-primary btn-xl btn-block">Подтвердить</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import vClickOutside from 'v-click-outside'

export default {
    props:[
        'user', 'order', 'sum', 'home_url', 'deliveryprice'
    ],
    directives: {
        clickOutside: vClickOutside.directive
    },
    data() {
        return {
            orderPhone: '',
            infoByUser: '',

            address: '',
            addressList: [],
            astana_bbox: '71.170665,50.986637~71.665036,51.309052',
            emptyAddress: false
        }
    },
    methods:{
        sendForPack(){
            if(this.address === ""){
                this.emptyAddress = true;
            }else{
                axios.post(this.home_url + 'checkout/update/order', {
                    description: this.address,
                    orderPhone: this.orderPhone,
                    infoByUser: this.infoByUser,
                    order_id: this.order.id,
                }).then(response => {
                    window.location.href = this.home_url + 'checkout/' + this.order.id + '/success';
                });
            }
        },
        searchAddress(){
            this.addressList = '';
            axios.get('https://geocode-maps.yandex.ru/1.x/?apikey=471d7ae6-c5c6-45cc-9c09-52b2246b5fba&format=json&geocode=Астана,'+this.address+'&results=5&lang=ru_RU').then(response => {
                console.log(response.data.response.GeoObjectCollection.featureMember);
                this.addressList = response.data.response.GeoObjectCollection.featureMember;
            });
        },
        addAddress(x){
            this.address = x;
            this.addressList = '';
        },
        emptyAddressList(){
            this.addressList = '';
        }
    },
    created(){
        console.log(this.order)
    }
}
</script>