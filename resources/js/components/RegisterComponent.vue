<template>
    <div class="register_inputs_wrap">
        <input type="text" 
            placeholder="Логин" 
            name="login" 
            required
            autofocus
        >
        <input type="text" 
            placeholder="Телефон"
            name="phone"
            required
            v-mask="'+7 (###) ### ####'"
        >
        <input type="password" 
            placeholder="Пароль"
            name="password"
            required
            autocomplete="new-password"
        >
        <input type="password" 
            placeholder="Подтверждение пароля"
            name="password_confirmation" 
            required 
            autocomplete="new-password"
        >
    </div>
</template>

<script>
    import {TheMask} from 'vue-the-mask'
    export default {
        components: {TheMask}
    }
</script>