<template>
    <div class="login_inputs_wrapper">
        <the-mask 
            :mask="['+7(###)###-####', '+7(###)###-####']"
            plceholder="+7(777)777-77-77"
            type="tel"
        />
        <!-- <input type="text" placeholder="Телефон"> -->
        <input type="text" placeholder="Пароль">
    </div>
</template>

<script>
    import {TheMask} from 'vue-the-mask'

    export default {
        components: {TheMask}
    }
</script>