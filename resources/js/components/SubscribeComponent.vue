<template>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <img :src="home_url + 'icons/banner_phone.svg'" alt="banner_phone">    
        </div>
        <div class="col-md-6">
            <div class="h-100 d-flex flex-column justify-content-center align-items-center product-card__buttons" v-if="!isSubscribed">
                <h5>Покупать легко со SmartBazar.kz!</h5>
                <p>Подпишитесь на рассылку об акциях и скидках</p>
                <input type="email" placeholder="Введите ваш email адрес" class="m-2" v-model="email">
                <button class="m-2 btn-subscribe" v-on:click="subscribe()">Подпишитесь</button>
            </div>
            <div class="h-100 d-flex flex-column justify-content-center align-items-center product-card__buttons" v-else>
                <p class="text-success">Спасибо за подписку!</p>
            </div>
        </div>
        <div class="col-md-3">
            <img :src="home_url + 'icons/banner_basket.svg'" alt="banner_phone"> 
        </div>
    </div>
</div>
</template>

<script>
    export default {
        props:[
            'home_url'
        ],
        data: () => ({
            email: '',
            isSubscribed: false,
        }),
        methods:{
            subscribe(){
                axios.post(this.home_url + 'subscribe',{
                    email: this.email
                }).then(response => {
                    console.log(response.data);
                    if(response.data == 'created'){
                        this.isSubscribed = true;
                    }
                    if(response.data == 'exist'){
                        this.isSubscribed = false;
                    }
                });
            }
        }
    }
</script>

<style>

</style>