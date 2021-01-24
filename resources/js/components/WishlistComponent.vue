<template>
    <div class="wishlist_items">
        <ul>
            <li class="wishlist_items_head">
                <ul>
                    <li>Название</li>
                    <li>Продавец</li>
                    <li></li>
                </ul>
            </li>
                <li class="wishlist_item_single" :key="index" v-for="(wishlist, index) in wishlists">
                    <ul>
                        <li>
                            <div class="wishlist_product_image">
                                <img :src="wishlist.product.image" alt="product_image">
                            </div>
                            <div class="wishlist_product_description">
                                <h5>{{wishlist.product.title}}</h5>
                                <h6 class="wishlist_product_status">В наличии</h6>
                                <h6 class="wishlist_product_price">Код/Артикул: <span>000148</span></h6>
                                <h6 class="wishlist_product_price">{{wishlist.product.price}} Тг.</h6>
                            </div>
                        </li>
                        <li>
                            <div class="wishlist_company">
                                <h6 class="wishlist_company_name">{{wishlist.product.company.name}}</h6>
                                <star-component></star-component>
                                <h6 class="wishlist_company_comments">2 отзыва о продавце</h6>
                            </div>
                        </li>
                        <li>
                            <button class="btn-pink-rounded">Купить</button>
                            <a href="#" v-on:click.prevent="removeItem(index)"><img src="icons/trash.svg" alt="trash.svg"></a>
                        </li>
                    </ul>
                </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                wishlists: [],
            }
        },
        methods:{
            getData(){
                axios.get('wishlist/get').then((response) => {
                    this.wishlists = response.data;
                })
            },
            removeItem: function(index) {
                let id = this.wishlists[index].id;
                this.wishlists.splice(index, 1);

                axios.delete('wishlist/'+id).then(response => {
                    console.log(response.data);
                });
            },
        },
        created(){
            this.getData();
        }
    }
</script>
