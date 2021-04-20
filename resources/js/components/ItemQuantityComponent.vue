<template>
    <td class="cart-table__column cart-table__column--quantity" data-title="Кол-во">
        <strong>{{ item.product.measure.code }}</strong>
        <div class="input-number">
            <input class="form-control input-number__input" type="number" min="0" v-model="item.pivot.count">
            <div class="input-number__add" @click="addQuantity(item)"></div>
            <div class="input-number__sub" @click="subQuantity(item)"></div>
        </div>
    </td>
</template>

<script>
export default {
    name: "ItemQuantityComponent",
    props: [
        'item',
        'home_url'
    ],
    methods: {
        addQuantity: function(item){
            if (item.product.measure_id === 1) {
                item.pivot.count = (item.pivot.count * 10 + 0.5 * 10) / 10;
            } else {
                item.pivot.count++;
            }
            axios.post(this.home_url + 'cart/update', {
                item_id: item.id,
                count: item.pivot.count
            }).then(response => {
                console.log(response.data);
            });
            item.total = item.pivot.count * item.price;
        },
        subQuantity: function(item){
            if(item.pivot.count >= 0){
                if (item.product.measure_id === 1) {
                    item.pivot.count = (item.pivot.count * 10 - 0.5 * 10) / 10;
                } else {
                    item.pivot.count--;
                }
                axios.post(this.home_url + 'cart/update', {
                    item_id: item.id,
                    count: item.pivot.count
                }).then(response => {
                    console.log(response.data);
                });
                item.total = item.pivot.count * item.price;
            }
        }
    }
}
</script>