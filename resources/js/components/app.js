/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('packer-component', require('./components/PackerComponent.vue').default);
Vue.component('wishlist-component', require('./components/WishlistComponent.vue').default);
Vue.component('slider-component', require('./components/Sale/SliderComponent.vue').default);
Vue.component('star-component', require('./components/StarComponent.vue').default);
Vue.component('rate-component', require('./components/RateComponent.vue').default);
Vue.component('login-component', require('./components/LoginComponent.vue').default);
Vue.component('register-component', require('./components/RegisterComponent.vue').default);
Vue.component('product-component', require('./components/ProductComponent.vue').default);
Vue.component('modal-component', require('./components/ModalComponent.vue').default);
Vue.component('search-component', require('./components/SearchComponent.vue').default);
Vue.component('mobile-search-component', require('./components/MobileSearchComponent.vue').default);
Vue.component('categories-component', require('./components/CategoryComponent.vue').default);
Vue.component('review-star-component', require('./components/ReviewStartComponent.vue').default);
Vue.component('dropdown-cart-component', require('./components/DropdownCartComponent.vue').default);
Vue.component('cart-component', require('./components/CartComponent.vue').default);
Vue.component('checkout-component', require('./components/CheckoutComponent.vue').default);
Vue.component('delivery-component', require('./components/DeliveryComponent.vue').default);
Vue.component('sale-component', require('./components/SaleComponent.vue').default);
Vue.component('add-to-cart-component', require('./components/AddToCartComponent.vue').default);
Vue.component('like-component', require('./components/LikeComponent.vue').default);
Vue.component('select-component', require('./components/Category/SelectComponent').default);
Vue.component('address-component', require('./components/AddressComponent').default);
Vue.component('create-category-component', require('./components/Category/CreateCategoryComponent').default);
Vue.component('images-upload-component', require('./components/Sale/ImagesUploadComponent').default);
Vue.component('item-quantity-component', require('./components/ItemQuantityComponent').default);
Vue.component('editor', require('./components/Sale/EditorComponent.vue').default);
Vue.component('create-product-component',require('./components/Sale/CreateProductComponent.vue').default);
Vue.component('home-slider-component', require('./components/HomeSliderComponent.vue').default);
Vue.component('carousel-component', require('./components/CarouselComponent.vue').default);
Vue.component('item-component', require('./components/ItemComponent.vue').default);
Vue.component('subscribe-component', require('./components/SubscribeComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import VueMask from 'v-mask'
Vue.use(VueMask);

import vClickOutside from 'v-click-outside'
import ItemQuantityComponent from "../js/components/ItemQuantityComponent";
import Vue from 'vue';

import Toaster from 'v-toaster';
Vue.use(Toaster, {timeout: 5000});
import 'v-toaster/dist/v-toaster.css';

const app = new Vue({
    el: '#app',
    directives: {
        clickOutside: vClickOutside.directive
    },
    components: {ItemQuantityComponent},
    data: {
        fee: 10,
        homeUrl: window.homeUrl,
        authUser: window.authUser,
        searchFocused: false,

        hiddenCategory: true,
        hiddenAuth: true,
        isLogin: true,
        // isFormOpen: false,
        wishlist: '',
        itemCount: '',
        isMove: false,
        isActive: true,
        cart:{
            items: '',
        },
        discount:{
            discountPercent: '',
            newPrice: '',
            discountPrice: '',
            discountText: '',
        },
        auth:{
            registerLogin: '',
            registerNumber: '',
            registerPassword: '',
            registerConfirm: '',
            loginNumber: '',
            loginPassword: ''
        },
        search:{
            searchInput: '',
            searchResult: '',
            searchShow: false
        },
    },
    methods: {
        searchProduct(){
            this.search.searchResult = '';
            this.search.searchShow = true;
            axios.post(this.homeUrl + 'search/product', {
                searchInput: this.search.searchInput,
            }).then(response => {
                this.search.searchResult = response.data;
                console.log(this.search.searchResult);
                setTimeout(() => {
                    this.search.searchResult = '';
                    this.search.searchShow = false;
                }, 10000)
            });
        },
        countWishlist(){
            if(this.authUser !== null){
                axios.get(this.homeUrl + 'wishlist/count').then((response) => {
                    this.wishlist = response.data;
                })
            }
        },
        countCart(){
            if(this.authUser !== null){
                axios.get(this.homeUrl + 'cart/count').then((response) => {
                    if(response.data == 0){
                        this.itemCount = 0;
                        this.cart.items = 0;
                    }else{
                        this.itemCount = response.data.length,
                        this.cart.items = response.data
                    }
                });
            }
        },
        hideAuth(){
            this.hiddenAuth=true
        },
        hideSearch(){
            this.searchFocused=false
        },
        priceAfterCalc(){
            var discountPrice = (this.discount.newPrice * this.discount.discountPercent)/100;
            var priceAfterDiscount = this.discount.newPrice - discountPrice;
            if(priceAfterDiscount > 0){
                this.discount.discountPrice = priceAfterDiscount;
                this.discount.discountText = 'Цена после скидки '+ this.discount.discountPrice +' тг.';
            }else{
                this.discount.discountPrice = 0;
            }
        },
        ScrollToForm(){
            window.scrollTo({top: 0, behavior: 'smooth'});
            // this.isFormOpen = true;
        }
    },
    created(){
        console.log(this.homeUrl)
        this.countWishlist();
        this.countCart();
    }
});