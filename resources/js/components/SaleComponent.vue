    <template>
    <div class="section">
        <div class="section-body">
            <div class="row">

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        // props:[
        //     'user', 'home_url'
        // ],
        // data(){
        //     return{
        //         orders: [],
        //     }
        // },
        // methods:{
        //     acceptOrder: function(index){
        //         let id = this.orders[index].id;
        //         this.orders.splice(index, 1);
        //     },
        //     fetchOrders(){
        //         axios.post(this.home_url + 'packer/order/available').then(response => {
        //             // console.log(response.data);
        //             this.orders = response.data;
        //             console.log(this.orders);
        //         });
        //     }
        // },
        created(){
            this.fetchOrders();
            Echo.channel('sale-channel')
            .listen('.sale-event', (e) => {
                console.log(e);
                this.orders.push(e.order);
                Push.create("Новый заказ для фасовки", {
                    icon: 'https://via.placeholder.com/32x32',
                });
            });
        }
    }
</script>
