<template>
    <button class="btn btn-danger" v-on:click="generateForm()">add</button>
</template>

<script>
    export default {
        methods:{
            generateForm() { 
                var widget = new tp.TarlanPayments(); 
                widget.checkout( 
                { 
                    reference_id: 543819, // номер заказа 
                    request_url: 'https://site.kz/request', // адрес для перенаправления после платежа 
                    back_url: 'https://site.kz/back_url', // адрес для отправки коллбека 
                    description: 'оплата заказа', // описание платежа 
                    amount: 100, // сумма заказа 
                    merchant_id: 59, // номер мерчанта 
                    is_test: 1, // опция для тестовой оплаты 
                    secret_key: 'dzy95RSTjVZLf9U8TFgJ', // ключ выдданный для мерчанта 
                }, 
                function (data) { 
                    console.log(data);
                }, 
                function (err) { 
                    console.log(err);
                } 
                ); 
            }
        }
    }
</script>