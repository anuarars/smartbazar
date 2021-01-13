<template>
    <div class="login_inputs_wrapper">
        <the-mask :mask="['+7(###)###-####', '+7(###)###-####']" />
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