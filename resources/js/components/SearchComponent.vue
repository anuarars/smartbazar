<template>
    <div class="search search--location--header ">
        <div class="search__body">
            <div class="search__form">
                <input
                    class="search__input"
                    name="search"
                    placeholder="Найти"
                    aria-label="Site search"
                    type="text"
                    autocomplete="off"
                    v-on:focus="searchFocused = true"
                    v-on:blur="searchFocused = !searchFocused"
                    v-model="searchInput"
                    v-on:keyup="searchProduct"
                    >
                <button class="search__button search__button--type--submit" type="submit">
                    <svg width="20px" height="20px">
                        <use v-bind="{'xlink:href': home_url + 'template/images/sprite.svg#search-20'}"></use>
                    </svg>
                </button>
                <div class="search__border"></div>
            </div>
            <div v-if="searchShow" class="search__suggestions suggestions suggestions--location--header">
                <ul class="suggestions__list">
                    <li class="suggestions__item" v-for="(result, index) in searchResult" :key="index">
                        <div class="suggestions__item-image product-image">
                            <div class="product-image__body">
                                <img class="product-image__img" alt="" :src="result.galleries[0].image">
                            </div>
                        </div>
                        <a :href="home_url + 'products/' + result.id" class="suggestions__item-info">
                            <a class="suggestions__item-name">
                                {{result.title}}
                            </a>
                            <div class="suggestions__item-meta">Производитель: {{result.brand_id}}</div>
                        </a>
                        <div class="suggestions__item-price">
                            {{result.items[0].price.toLocaleString()}} тг.
                        </div>
<!--                        <div class="suggestions__item-actions">-->
<!--                            <button type="button" title="В корзину" class="btn btn-primary btn-sm btn-svg-icon" v-on:click="addToCart(result.id)">-->
<!--                                <svg width="16px" height="16px">-->
<!--                                    <use v-bind="{'xlink:href': home_url + 'template/images/sprite.svg#cart-16'}"></use>-->
<!--                                </svg>-->
<!--                            </button>-->
<!--                        </div>-->
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:[
            'home_url',
        ],
        data: () => ({
            searchInput: '',
            searchResult: '',
            searchShow: false,
            authUser: window.authUser
        }),
        methods:{
            searchProduct(){
                console.log(this.searchInput);
                this.searchShow = true;
                axios.post(this.home_url + 'search/product', {
                    searchInput: this.searchInput,
                }).then(response => {
                    this.searchResult = response.data;
                    console.log(this.searchResult);
                    setTimeout(() => {
                        this.searchResult = '';
                        this.searchShow = false;
                    }, 15000)
                });
            },
            addToCart(product){
                if(this.authUser !== null){
                    axios.post(this.home_url + 'cart/create', {
                        product_id: product,
                    }).then(response => {
                        window.location.href = this.home_url + 'cart';
                    });
                }else{
                    this.$parent.ScrollToForm();
                }
            },
        }
    }
</script>
