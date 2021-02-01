<template>
    <div class="product_item">
        <a href="#" class="product_item_image">
            <img :src="product.image" alt="">
        </a>
        <a href="#" class="add_to_favorite" >
            <img src="icons/heart.svg" alt="heart" class="favorite_like"
            >
            <img src="icons/red_heart.svg" alt="heart" class="favorite_unlike">
        </a>
        <star-component
            :rating = rating
        ></star-component>
        <div class="product_item_title">{{product.description}}</div>
        <div class="product_item_country">{{product.discountPercent}}</div>
        <!-- <div class="product_item_seller">{{product.company.name}}</div> -->
        <div class="product_item_info">
            <div class="product_item_price">
                <div class="new_price">{{product.discount}} тг.</div>
                <div class="old_price">{{product.price}} тг.</div>
            </div>
            <div class="product_item_place">Lorem.</div>
        </div>
        <button v-on:click="$emit('update-item', todo)">В корзину</button>
    </div>
</template>

<script>
    export default {
        props:[
            'product',
            'rating'
        ],
        created(){

        }
    }
</script>
