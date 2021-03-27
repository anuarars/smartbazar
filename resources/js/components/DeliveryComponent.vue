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
                        <a :href="home_url + 'delivery/order/accept/' + order.id" class="btn btn-success" v-on:click="acceptOrder(index)">Принять</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import * as PusherPushNotifications from "@pusher/push-notifications-web"
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
                axios.post(this.home_url + 'delivery/order/available').then(response => {
                    this.orders = response.data;
                    console.log(this.orders);
                });
            }
        },
        created(){
            this.fetchOrders();
            Echo.channel('delivery-channel')
            .listen('.delivery-event', (e) => {
                this.orders.push(e.order);
            });

            const tokenProvider = new PusherPushNotifications.TokenProvider({
                url: this.home_url + 'push/pusher/beams-auth',
            })

            const beamsClient = new PusherPushNotifications.Client({
                instanceId: '41acbae0-ec93-4866-bce7-937bff9c4d27',
            })

            beamsClient.start()
                .then(() => beamsClient.setUserId(this.user.id.toString(), tokenProvider))
                .catch(console.error);
        }
    }
</script>
