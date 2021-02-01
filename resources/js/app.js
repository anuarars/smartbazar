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

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('wishlist-component', require('./components/WishlistComponent.vue').default);
Vue.component('slider-component', require('./components/SliderComponent.vue').default);
Vue.component('star-component', require('./components/StarComponent.vue').default);
Vue.component('login-component', require('./components/LoginComponent.vue').default);
Vue.component('register-component', require('./components/RegisterComponent.vue').default);
Vue.component('product-component', require('./components/ProductComponent.vue').default);
Vue.component('modal-component', require('./components/ModalComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import VueTheMask from 'vue-the-mask'
Vue.use(VueTheMask)

const app = new Vue({
    el: '#app',
    data: {
        hiddenMenu: true,
        hiddenAuth: true,
        isLogin: true,
        searchFocused: false,
        wishlist: '',
        productNominal: '',
        productSum: '',
        productCount: '',
        authUser: window.authUser,
        signUp: false
    },
    methods: {
        registerUser(evt){
            evt.preventDefault();
            document.getElementById("registerUser").submit();
        },
        loginUser(evt){
            evt.preventDefault();
            document.getElementById("loginUser").submit();
        },
        addWishlist: function(product_id){
            axios.post('wishlist', {
                product_id: product_id,
            }).then(response => {
                console.log(response.data);
                this.countWishlist();
            });
        },
        countWishlist(){
            if(this.authUser != null){
                axios.get('http://bazar/public/wishlist/count').then((response) => {
                    this.wishlist = response.data;
                })
            }
        },
        addToCart: function(product_id){
            axios.post('cart/create', {
                product_id: product_id,
            }).then(response => {
                console.log(response.data);
                this.countCart();
            });
        },
        countCart(){
            if(this.authUser != null){
                axios.get('cart/count').then((response) => {
                    this.productSum = Number(response.data.sum).toLocaleString();
                    this.productNominal = response.data.products;
                    this.productCount = response.data.productsCount;
                })
            }
        }
    },
    created(){
        this.countWishlist();
        this.countCart();
    }
});
