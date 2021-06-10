<template>

    <div class="input_password">
      <div class="field">
           <div class="control">
              <input type="text" v-if="showPassword" @input="checkPassword" v-model="password" autocomplete="off" id="password" class="form-control" name="password" required
              />
              <input type="password" v-else @input="checkPassword" v-model="password" autocomplete="off" id="password" class="form-control" name="password"
              />
           </div>
           <div class="control">
                <span type="button" class="form-control" @click="toggleShow"><span class="icon is-small is-right">
                <i class="fas" :class="{ 'fa-eye-slash': showPassword, 'fa-eye': !showPassword }"></i>
                </span>
                </span>
            </div>

      </div>
      <div class="input_container" v-show="show">
        <ul>
          <li v-bind:class="{ is_valid: contains_eight_characters }">Содержит 8 символов</li>
          <li v-bind:class="{ is_valid: contains_number }">Содержит число</li>
          <li v-bind:class="{ is_valid: contains_uppercase }">Содержит заглавную</li>
          <li v-bind:class="{ is_valid: contains_special_character }">Содержит специальный символ</li>
        </ul>

        <div class="checkmark_container" v-bind:class="{ show_checkmark: valid_password }">
          <svg width="50%" height="50%" viewBox="0 0 140 100">
            <path class="checkmark" v-bind:class="{ checked: valid_password }" d="M10,50 l25,40 l95,-70" />
          </svg>
        </div>
      </div>
    </div>




</template>

<script>


  // MESS
export default {
        data: function () {
            return {
                password: null,
                password_length: 0,
                contains_eight_characters: false,
                contains_number: false,
                contains_uppercase: false,
                contains_special_character: false,
                valid_password: false,
                show: false,
                showPassword: false

            };
        },

        methods: {
            checkPassword() {

              this.password_length = this.password.length;
              if(this.password === '') {
                this.show = false;
                return
              }
              this.show = true;
              const format = /[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;

              this.contains_eight_characters = this.password_length > 8;

              this.contains_number = /\d/.test(this.password);
              this.contains_uppercase = /[A-Z]/.test(this.password);
              this.contains_special_character = format.test(this.password);

              if (this.contains_eight_characters === true &&
                  this.contains_special_character === true &&
                  this.contains_uppercase === true &&
                  this.contains_number === true) {
                    this.valid_password = true;
              } else {
                this.valid_password = false;
              }
            },

            toggleShow() {
                this.showPassword = !this.showPassword;
            }


        }

    }


</script>

<style scoped>
.password {
    width: 50%;
    margin: 25px auto;
}

.field{
    display: grid;
    grid-template-columns: 6fr 1fr ;
    position: relative;
}

.form-control{
    height: 100%;
}

ul {
    padding-left: 20px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

li {
    margin-bottom: 8px;
    color: #525f7f;
    position: relative;
    list-style-type:none ;
}

li:before {
    content: "";
    width: 0%; height: 2px;
    background: #2ecc71;
    position: absolute;
    left: 0; top: 50%;
    display: block;
    transition: all .6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}


.input_container {
    position: relative;
    padding: 8px;
    box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
    border-radius: 6px;
    background: #FFF;
}

input[type="password"] {
    line-height: 1.5;
    display: block;
    color: rgba(136, 152, 170, 1);
    font-weight: 300;
    width: 100%;
    height: calc(2.75rem + 2px);
    padding: .625rem .75rem;
    border-radius: .25rem;
    background-color: #fff;
    transition: border-color .4s ease;
    border: 1px solid #cad1d7;
    outline: 0;
}

input[type="password"]:focus {
    border-color: rgba(50, 151, 211, .45);
}


/* Checkmark & Strikethrough --------- */

.is_valid { color: rgba(136, 152, 170, 0.8); }
.is_valid:before { width: 100%; }

.checkmark_container {
    border-radius: 50%;
    position: absolute;
    top: 8px;
    right: 5px;
    background: #2ecc71;
    width: 25px; height: 25px;
    visibility: hidden;
    opacity: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: opacity .4s ease;
}

.show_checkmark {
    visibility: visible;
    opacity: 1;
}

.checkmark {
    width: 100%;
    height: 100%;
    fill: none;
    stroke: white;
    stroke-width: 15;
    stroke-linecap: round;
    stroke-dasharray: 180;
    stroke-dashoffset: 180;
}

.checked { animation: draw 0.5s ease forwards; }

@keyframes draw {
    to { stroke-dashoffset: 0; }
}
dl, ol, ul {
    margin-bottom: 0;
}
</style>
