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
Vue.component('delivery-component', require('./components/DeliveryComponent.vue').default);
Vue.component('sale-component', require('./components/SaleComponent.vue').default);
Vue.component('add-to-cart-component', require('./components/AddToCartComponent.vue').default);
Vue.component('like-component', require('./components/LikeComponent.vue').default);
Vue.component('payment-component', require('./components/PaymentComponent.vue').default);
Vue.component('select-component', require('./components/Category/SelectComponent').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import VueMask from 'v-mask'
Vue.use(VueMask);

import vClickOutside from 'v-click-outside'

const app = new Vue({
    el: '#app',
    directives: {
        clickOutside: vClickOutside.directive
    },
    data: {
        homeUrl: window.homeUrl,
        authUser: window.authUser,
        hiddenCategory: true,
        hiddenAuth: true,
        isLogin: true,
        searchFocused: false,
        wishlist: '',
        productCount: '',
        isMove: false,
        isActive: true,
        errors:{
            login:{
                phoneRequired: '',
                passwordRequired: '',
                loginMatch: ''
            },
            register:{
                loginRequired: '',
                passwordRequired: '',
                phoneRequired: ''
            }
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
        cart:{
            products: '',
        }
    },
    methods: {
        validateLogin(){
            this.errors.login.phoneRequired = '';
            this.errors.login.passwordRequired = '';
            this.errors.login.loginMatch = '';
            axios.post(this.homeUrl + 'login', {
                phone: this.auth.loginNumber,
                password: this.auth.loginPassword
            }).then(response => {
                this.errors.login.phoneRequired = response.data.phone;
                this.errors.login.passwordRequired = response.data.password;
                this.errors.login.loginMatch = response.data.errors;
                if(!this.errors.login.phoneRequired && !this.errors.login.passwordRequired && !this.errors.login.loginMatch){
                    document.getElementById("loginUser").submit();
                }
            });
        },
        validateRegister(){
            this.errors.register.phoneRequired == '';
            this.errors.register.passwordRequired == '';
            this.errors.register.loginRequired == '';
            axios.post('register', {
                phone: this.auth.registerNumber,
                login: this.auth.registerLogin,
                password: this.auth.registerPassword,
                password_confirmation: this.auth.registerConfirm
            }).then(response => {
                this.errors.register.phoneRequired = response.data.phone;
                this.errors.register.passwordRequired = response.data.password;
                this.errors.register.loginRequired = response.data.login;

                if(!this.errors.register.phoneRequired && !this.errors.register.passwordRequired && !this.errors.register.loginRequired){
                    document.getElementById("register").submit();
                }
            });
        },
        searchProduct(){
            this.search.searchResult = '';
            this.search.searchShow = true;
            axios.post(this.homeUrl + 'search/product', {
                searchInput: this.search.searchInput,
            }).then(response => {
                this.search.searchResult = response.data;
                setTimeout(() => {
                    this.search.searchResult = '';
                    this.search.searchShow = false;
                }, 10000)
            });
        },
        addWishlist: function(product_id){
            axios.post('wishlist', {
                product_id: product_id,
            }).then(response => {
                this.countWishlist();
            });
        },
        countWishlist(){
            if(this.authUser != null){
                axios.get(this.homeUrl + 'wishlist/count').then((response) => {
                    this.wishlist = response.data;
                })
            }
        },
        addToCart: function(product_id){
            axios.post(this.homeUrl + 'cart/create', {
                product_id: product_id,
            }).then(response => {
                this.countCart();
            });
        },
        countCart(){
            if(this.authUser != null){
                axios.get(this.homeUrl + 'cart/count').then((response) => {
                    if(response.data == 0){
                        this.productCount = 0;
                        this.cart.products = 0;
                    }else{
                        this.productCount = response.data.length,
                        this.cart.products = response.data
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
        slideRegister(){
            this.isMove = true;
            this.isActive = false;
        },
        slideLogin(){
            this.isMove = false;
            this.isActive = true;
        }
    },
    created(){
        this.countWishlist();
        this.countCart();
    },
    filters:{
        NumFormat:function(value){
    if(!value) return '0.00';
    var intPart = Number(value).toFixed(0);
    var intPartFormat = intPart.toString().replace(/(\d)(?=(?:\d{3})+$)/g, '$1,'); 
    var floatPart = ".00"; 
    var value2Array = value.split(".");
    if(value2Array.length == 2) {
      floatPart = value2Array[1].toString();
      if(floatPart.length == 1) {
        return intPartFormat + "." + floatPart + '0';
      } else {
        return intPartFormat + "." + floatPart;
      }
    } else {
      return intPartFormat + floatPart;
    }
   }
}
});
