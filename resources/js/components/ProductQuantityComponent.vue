<template>
    <td class="cart-table__column cart-table__column--quantity" data-title="Кол-во">
        <strong>{{ product.measure.name }}</strong>
        <div class="input-number">
            <input class="form-control input-number__input" type="number" min="0" v-model="count">
            <div class="input-number__add" @click="addQuantity"></div>
            <div class="input-number__sub" @click="subQuantity"></div>
        </div>
    </td>
</template>

<script>
export default {
    name: "ProductQuantityComponent",
    props: [
        'product',
        'home_url'
    ],
    data() {
        return {
            count: 1
        }
    },
    mounted() {
        // if there is no product pivot
        if (typeof this.product.pivot !== "undefined") {
            this.count = this.product.pivot.count;
        }
    },
    methods: {
        addQuantity: function(){
            if (this.product.measure_id === 1) {
                this.count = (this.count * 10 + 0.1 * 10) / 10;
            } else {
                this.count++;
            }
            axios.post(this.home_url + 'cart/update', {
                product_id: this.product.id,
                count: this.count
            }).then(response => {
                console.log(response.data);
            });
            this.product.total = this.count * this.product.price;
        },
        subQuantity: function(){

            if(this.count >= 0){
                if (this.product.measure_id === 1) {
                    this.count = (this.count * 10 - 0.1 * 10) / 10;
                } else {
                    this.count--;
                }
                axios.post(this.home_url + 'cart/update', {
                    product_id: this.product.id,
                    count: this.count
                }).then(response => {
                    console.log(response.data);
                });
                this.product.total = this.count * this.product.price;
            }
        },
    }
}
</script>

<style scoped>

</style>
