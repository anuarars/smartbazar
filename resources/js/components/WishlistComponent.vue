<template>
    <div v-if="wishlists.length === 0" class="container">
        <div class="block-empty__body">
            <div class="block-empty__message">У вас пока нет избранных товаров</div>
            <div class="block-empty__actions">
                <a class="btn btn-primary btn-sm" :href="home_url">Продолжить</a>
            </div>
        </div>
    </div>
    <div v-else class="container">
        <table class="wishlist">
            <thead class="wishlist__head">
                <tr class="wishlist__row">
                    <th class="wishlist__column wishlist__column--image"></th>
                    <th class="wishlist__column wishlist__column--product">Продукт</th>
                    <th class="wishlist__column wishlist__column--stock">В наличии</th>
                    <th class="wishlist__column wishlist__column--price">Цена</th>
                    <th class="wishlist__column wishlist__column--remove"></th>
                </tr>
            </thead>
            <tbody class="wishlist__body">
                <tr class="wishlist__row" :key="index" v-for="(wishlist, index) in wishlists">
                    <td class="wishlist__column wishlist__column--image">
                        <div class="product-image">
                            <a href="" class="product-image__body">
                                <img class="product-image__img" :src="wishlist.item.product.galleries[0].image" alt="">
                            </a>
                        </div>
                    </td>
                    <td class="wishlist__column wishlist__column--product">
                        <a href="" class="wishlist__product-name">{{wishlist.item.product.title}}</a>
                        <div class="wishlist__product-rating">
                            <div class="rating">
                                <div class="rating__body">
                                    <star-component></star-component>
                                </div>
                            </div>
                            <div class="wishlist__product-rating-legend">
                                Просмотров: {{wishlist.item.views}}
                            </div>
                        </div>
                    </td>
                    <td class="wishlist__column wishlist__column--stock">
                        <div class="badge badge-success">Да</div>
                    </td>
                    <td class="wishlist__column wishlist__column--price">
                        <div class="d-flex flex-column" v-if="wishlist.item.discount != 0">
                            <span class="text-success">
                            {{(Math.ceil((wishlist.item.price+((wishlist.item.price*$parent.fee)/100)) - (((wishlist.item.price+((wishlist.item.price*$parent.fee)/100)) * wishlist.item.discount)/100))).toLocaleString()}} тг.
                            </span>
                            <span class="line-through text-danger">
                                {{(wishlist.item.price+((wishlist.item.price*$parent.fee)/100)).toLocaleString()}} тг.
                            </span>
                        </div>
                        <div class="d-flex flex-column" v-else>
                            {{(wishlist.item.price+((wishlist.item.price*$parent.fee)/100)).toLocaleString()}} тг.
                        </div>
                    </td>
                    <td class="wishlist__column wishlist__column--remove">
                        <button type="button" class="btn btn-light btn-sm btn-svg-icon" v-on:click.prevent="removeItem(index)">
                            <svg width="12px" height="12px">
                                <use v-bind="{'xlink:href': home_url + 'template/images/sprite.svg#cross-12'}"></use>
                            </svg>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props:['home_url'],
        data(){
            return{
                authUser: window.authUser,
                wishlists: [],
            }
        },
        methods:{
            getData(){
                axios.get(this.home_url + 'wishlist/get').then((response) => {
                    this.wishlists = response.data;
                    console.log(this.wishlists);
                })
            },
            removeItem: function(index) {
                let id = this.wishlists[index].id;
                this.wishlists.splice(index, 1);

                axios.delete(this.home_url + 'wishlist/'+id).then(response => {
                    this.$parent.countWishlist();
                });
            },
            addToCart: function(product_id){
                axios.post(this.home_url + 'cart/create', {
                    product_id: product_id,
                }).then(response => {
                    this.$parent.countCart();
                });
            }
        },
        created(){
            this.getData();
        },
    }
</script>
