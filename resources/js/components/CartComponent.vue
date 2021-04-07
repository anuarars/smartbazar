<template>
    <div v-if="products.length === 0" class="container">
        <div class="block-empty__body">
            <div class="block-empty__message">Ваша корзина пуста</div>
            <div class="block-empty__actions">
                <a class="btn btn-primary btn-sm" :href="home_url">Продолжить</a>
            </div>
        </div>
    </div>
    <div v-else-if="order == 0" class="container">
        <div class="block-empty__body">
            <div class="block-empty__message">Ваша корзина пуста</div>
            <div class="block-empty__actions">
                <a class="btn btn-primary btn-sm" :href="home_url">Продолжить</a>
            </div>
        </div>
    </div>
    <div v-else class="container">
        <table class="cart__table cart-table" v-if="products">
            <thead class="cart-table__head">
                <tr class="cart-table__row">
                    <th class="cart-table__column cart-table__column--image"></th>
                    <th class="cart-table__column cart-table__column--product">Продукт</th>
                    <th class="cart-table__column cart-table__column--price">Цена</th>
                    <th class="cart-table__column cart-table__column--quantity">Кол-во</th>
                    <th class="cart-table__column cart-table__column--total">Сумма</th>
                    <th class="cart-table__column cart-table__column--remove"></th>
                </tr>
            </thead>
            <tbody class="cart-table__body">
                <tr class="cart-table__row" v-for="(product, index) in products">
                    <td class="cart-table__column cart-table__column--image">
                        <div class="product-image">
                            <a :href="home_url + 'products/' + product.id" class="product-image__body">
                                <img class="product-image__img" :src="product.galleries[0].image" alt="">
                            </a>
                        </div>
                    </td>
                    <td class="cart-table__column cart-table__column--product">
                        <a :href="home_url + 'products/' + product.id"  class="cart-table__product-name">{{product.title}}</a>
                    </td>

                    <td class="cart-table__column cart-table__column--price" data-title="Цена">
                        <div class="d-flex flex-column" v-if="product.discount != 0">
                            <span class="text-success">
                            {{(Math.ceil((product.price+((product.price*10)/100)) - (((product.price+((product.price*10)/100)) * product.discount)/100))).toLocaleString()}} тг.
                            </span>
                            <span class="line-through text-danger">
                                {{(product.price+((product.price*10)/100)).toLocaleString()}} тг.
                            </span>
                        </div>
                        <div class="d-flex flex-column" v-else>
                            {{(product.price+((product.price*10)/100)).toLocaleString()}} тг.
                        </div>
                    </td>

                    <td class="cart-table__column cart-table__column--quantity" data-title="Кол-во">
                        <strong>{{product.measure.code}}</strong>
                        <div class="input-number">
                            <input class="form-control input-number__input" type="number" min="1" :value="product.pivot.count" disabled>
                            <div class="input-number__add" v-on:click="addQuantity(index)"></div>
                            <div class="input-number__sub" v-on:click="subQuantity(index)"></div>
                        </div>
                    </td>

                    <td class="cart-table__column cart-table__column--total" data-title="Всего">
                        <span v-if="product.discount != null">
                            {{
                                (product.pivot.count * Math.ceil((product.price+((product.price*10)/100))-(((product.price+((product.price*10)/100)) * product.discount)/100))).toLocaleString()
                            }} тг.
                        </span>
                        <span v-else>
                            {{(product.pivot.count * (product.price+((product.price*10)/100))).toLocaleString()}} тг.
                        </span>
                    </td>

                    <td class="cart-table__column cart-table__column--remove">
                        <button type="button" class="btn btn-light btn-sm btn-svg-icon" v-on:click.prevent="removeItem(index)">
                            <svg width="12px" height="12px">
                                <use xlink:href="template/images/sprite.svg#cross-12"></use>
                            </svg>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="row justify-content-end pt-5">
            <div class="col-12 col-md-7 col-lg-6 col-xl-5">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Сумма корзины</h3>
                        <table class="cart__totals">
                            <thead class="cart__totals-header">
                                <tr>
                                    <th>Корзина</th>
                                    <td>{{subTotal.toLocaleString()}} тг.</td>
                                </tr>
                            </thead>
                            <tbody class="cart__totals-body">
                                <tr>
                                    <th>Доставка</th>
                                    <td>
                                        {{deliveryprice.toLocaleString()}} тг.
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot class="cart__totals-footer">
                                <tr>
                                    <th>Всего</th>
                                    <td>{{(subTotal + deliveryprice).toLocaleString()}} тг.</td>
                                </tr>
                            </tfoot>
                        </table>
                        <a class="btn btn-primary btn-xl btn-block cart__checkout-button" :href="this.home_url + 'checkout/'+order.id">Продолжить покупку</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['order', 'home_url', 'deliveryprice'],
        data(){
            return{
                products: [],
            }
        },
        methods:{
            getData(){
                if(this.order != 0){
                    axios.get('cart/get').then((response) => {
                        this.products = response.data;
                        console.log(this.products);
                    })
                }
            },
            addQuantity: function(index){
                this.products[index].pivot.count++;
                let id = this.products[index].id;
                axios.post(this.home_url + 'cart/update', {
                    product_add: id,
                }).then(response => {
                    console.log(response.data);
                });
                this.products[index].total = this.products[index].pivot.count * this.products[index].price;
            },
            subQuantity: function(index){
                if(this.products[index].pivot.count > 1){
                    this.products[index].pivot.count--;
                    let id = this.products[index].id;
                    axios.post(this.home_url + 'cart/update', {
                        product_sub: id,
                    }).then(response => {
                        console.log(response.data);
                    });
                    this.products[index].total = this.products[index].pivot.count * this.products[index].price;
                }
            },
            removeItem: function(index) {
                let id = this.products[index].id;
                this.products.splice(index, 1);

                axios.post(this.home_url + 'cart/destroy', {
                    product_id: id,
                }).then(response => {
                    this.$parent.countCart();
                });
            }
        },
        created(){
            this.getData();
        },
        computed: {
            subTotal: function() {
                var subTotal = 0;

                for (var i = 0; i < this.products.length; i++) {
                    if(this.products[i].discount != null){
                        var discountPrice = Math.ceil((this.products[i].price+((this.products[i].price*10)/100)) - (((this.products[i].price+((this.products[i].price*10)/100)) * this.products[i].discount)/100))
                        subTotal += this.products[i].pivot.count * discountPrice;
                    }else{
                        subTotal += (this.products[i].price+((this.products[i].price*10)/100))* this.products[i].pivot.count;
                    }
                }

                return subTotal;
            },
        },
    }
</script>

<style>
    .line-through{
        text-decoration: line-through;
    }
</style>