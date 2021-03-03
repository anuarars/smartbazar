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
                } else {
                    this.removeFromCart(this.product);
            }
        },
        addToCart(product){
            axios.post(this.home_url + 'cart/create', {
                product_id: product,
            }).then(response => {
                this.$parent.countCart();
            });
        },
        removeFromCart(product) {
            axios.post(this.home_url + 'cart/unlike/' + product)
                .then(response => {
                    this.isAdded = false;
                    this.$parent.countCart();
                });
      }
    }
}
</script>
