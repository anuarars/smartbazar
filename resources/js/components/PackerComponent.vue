    <template>
    <div class="section">
        <div class="section-body">
            <div class="row">
                <div v-for="(order, index) in orders" class="col-12 col-md-4 col-lg-4">
                    <div class="card card-primary">
                    <div class="card-header">
                        <h4>Заказ # {{order.id}}</h4>
                    </div>
                    <div class="card-body text-center">
                        <a :href="home_url + 'packer/order/accept/' + order.id" class="btn btn-success" v-on:click="acceptOrder(index)">Принять</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:[
            'user', 'home_url'
        ],
        data(){
            return{
                orders: [],
            }
        },
        methods:{
            acceptOrder: function(index){
                let id = this.orders[index].id;
                this.orders.splice(index, 1);
            },
            fetchOrders(){
                axios.post(this.home_url + 'packer/order/available').then(response => {
                    // console.log(response.data);
                    this.orders = response.data;
                    console.log(this.orders);
                });
            }
        },
        created(){
            this.fetchOrders();
            Echo.channel('packer-channel')
            .listen('.packer-event', (e) => {
                this.orders.push(e.order);
                Push.create("Новый заказ для фасовки", {
                    icon: 'https://via.placeholder.com/32x32',
                });
            });
        }
    }
</script>
