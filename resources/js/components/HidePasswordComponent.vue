<template>

<div class="columns">   
        <div class="field">
           <div class="control">
                <input v-if="showPassword" type="text" class="form-control" v-model="password" />
                <input v-else type="password" class="form-control" v-model="password">
           </div>
            <div class="control">
                <button class="form-control" @click="toggleShow"><span class="icon is-small is-right">
                <i class="fas" :class="{ 'fa-eye-slash': showPassword, 'fa-eye': !showPassword }"></i>
                </span>
                </button>
            </div>
          
        </div>
        
  </div>
  

   
</template>

<script>


  // MESS
export default {
        data() {
            return {
            showPassword: false,
            password: null
            };
        },
        computed: {
            buttonLabel() {
                return (this.showPassword) ? "Hide" : "Show";
            }
        },
        methods: {
            toggleShow() {
            this.showPassword = !this.showPassword;
            }
        }
};

      
</script>

<style scoped>
  .field{
    display: grid;
    grid-template-columns: 6fr 1fr ;
    position: relative;
  }

  .form-control{
      height: 100%;
  }

  
</style>