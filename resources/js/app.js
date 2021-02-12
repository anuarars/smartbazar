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
import VueMask from 'v-mask'
Vue.use(VueMask);

import vClickOutside from 'v-click-outside'

const app = new Vue({
    el: '#app',
    directives: {
        clickOutside: vClickOutside.directive
    },
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
        loginNumber: '',
        loginPassword: '',
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
            registerConfirm: ''
        }
    },
    methods: {
        validateLogin(){
            this.errors.login.phoneRequired = '';
            this.errors.login.passwordRequired = '';
            this.errors.login.loginMatch = '';
            axios.post('login', {
                phone: this.loginNumber,
                password: this.loginPassword
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
            this.errors.register.phoneRequired = '';
            this.errors.register.passwordRequired = '';
            this.errors.register.loginRequired = '';
            axios.post('register', {
                phone: this.auth.registerNumber,
                login: this.auth.registerLogin,
                password: this.auth.registerPassword,
                password_confirmation: this.auth.registerConfirm
            }).then(response => {
                console.log(response.data);
                // this.errors.login.phoneRequired = response.data.phone;
                // this.errors.login.passwordRequired = response.data.password;
                // this.errors.login.loginMatch = response.data.errors;
                // if(!this.errors.login.phoneRequired && !this.errors.login.passwordRequired && !this.errors.login.loginMatch){
                //     document.getElementById("loginUser").submit();
                // }
            });
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
        },
        hideAuth(){
            this.hiddenAuth=true
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
    }
});
