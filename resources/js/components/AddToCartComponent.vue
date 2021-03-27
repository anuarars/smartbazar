<template>
    <button class="cart-button" v-bind:class="this.isAdded ? 'clicked' : ' '" @click="toggle">
        <span class="add-to-cart">В корзину</span>
        <span class="added">Добавлено</span>
        <i class="fas fa-shopping-cart"></i>
        <i class="fas fa-box"></i>
    </button>
</template>

<script>
export default {
    name: "AddToCartComponent",
    props: [
        'cart',
        'product',
        'home_url'
    ],
    data: function () {
        return {
            isAdded: '',
            authUser: window.authUser,
        }
    },
    mounted() {
        this.isAdded = !!this.inCart;
    },
    computed: {
        inCart() {
            return this.cart;
        }
    },
    methods: {
        toggle(){
            if (!this.isAdded) {
                    this.addToCart(this.product);
                    this.$parent.countCart();
                } else {
                    this.removeFromCart(this.product);
                    this.isAdded = !this.isAdded;
                    this.$parent.countCart();
            }
        },
        addToCart(product){
            if(this.authUser !== null){
                axios.post(this.home_url + 'cart/create', {
                    product_id: product,
                }).then(response => {
                    console.log(response.data);
                });
                this.isAdded = !this.isAdded;
            }else{
                this.$parent.ScrollToForm();
                this.$parent.isFormOpen = true;
            }
        },
        removeFromCart(product) {
            axios.post(this.home_url + 'cart/unlike/' + product)
                .then(response => {
                    console.log(response.data);
                });
      }
    }
}
</script>

<style>
    .blue{
        background: blue;
    }

    .green{
        background: green;
    }
</style>