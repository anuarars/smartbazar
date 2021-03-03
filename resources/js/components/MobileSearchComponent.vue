<template>
    <div class="search__suggestions suggestions suggestions--location--mobile-header">
        <ul class="suggestions__list">
            <li class="suggestions__item" v-for="result in search">
                <div class="suggestions__item-image product-image">
                    <div class="product-image__body">
                        <img class="product-image__img" :src="home_url + result.image" alt="">
                    </div>
                </div>
                <div class="suggestions__item-info">
                    <a class="suggestions__item-name" :href="home_url+'products/'+result.id">
                        {{result.title}}
                    </a>
                    <div class="suggestions__item-meta">Произвадитель: {{result.brand_id}}</div>
                </div>
                <div class="suggestions__item-price">
                    {{result.price}} тг.
                </div>
                <div class="suggestions__item-actions">
                    <button type="button" title="В корзину" class="btn btn-primary btn-sm btn-svg-icon">
                        <svg width="16px" height="16px">
                            <use xlink:href="http://smartbazar/public/template/images/sprite.svg#cart-16"></use>
                        </svg>
                    </button>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props:[
            'search','home_url',
        ],
        data: () => ({
            // url: '',  
        }),
        // methods:{
        //     getUrl(){
        //         this.url = this.home_url;
        //         return this.url
        //     }
        // },
        mounted(){
            // this.getUrl();
            console.log(this.home_url);
        }
    }
</script>