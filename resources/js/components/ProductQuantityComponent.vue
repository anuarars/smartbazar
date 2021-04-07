<template>
    <td class="cart-table__column cart-table__column--quantity" data-title="Кол-во">
        <strong>{{ product.measure.id }}</strong>
        <div class="input-number">
            <input class="form-control input-number__input" type="number" min="0" v-model="product.pivot.count">
            <div class="input-number__add" @click="addQuantity(product)"></div>
            <div class="input-number__sub" @click="subQuantity(product)"></div>
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
    methods: {
        addQuantity: function(product){
            let count = product.pivot.count;
            if (product.measure_id === 1) {
                product.pivot.count = (count * 10 + 0.1 * 10) / 10;
            } else {
                product.pivot.count++;
            }
            axios.post(this.home_url + 'cart/update', {
                product_id: product.id,
                count: count
            }).then(response => {
                console.log(response.data);
            });
            product.total = product.pivot.count * product.price;
        },
        subQuantity: function(product){
            let count = product.pivot.count;
            if(count >= 0){
                if (product.measure_id === 1) {
                    product.pivot.count = (count * 10 - 0.1 * 10) / 10;
                } else {
                    product.pivot.count--;
                }
                axios.post(this.home_url + 'cart/update', {
                    product_id: product.id,
                    count: count
                }).then(response => {
                    console.log(response.data);
                });
                product.total = product.pivot.count * product.price;
            }
        },
    }
}
</script>

<style scoped>

</style>
