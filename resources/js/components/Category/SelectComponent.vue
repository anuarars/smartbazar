<template>
    <div>
        <treeselect
            name="category_id"
            placeholder="Выберите категорию"
            :clearable="true"
            :searchable="true"
            :open-on-click="true"
            :clear-on-select="true"
            :close-on-select="true"
            :options="items"
            :limit="3"
            :max-height="200"
            :value="value"
            :disabled="disabled"
        />
        <label class="custom-switch mt-2" v-show="isadmin">
            <input type="checkbox" name="active" class="custom-switch-input" v-model="disabled">
            <span class="custom-switch-indicator"></span>
            <span class="custom-switch-description">Сделать основателем</span>
        </label>
    </div>

</template>

<script>
// import the component
import Treeselect from '@riophae/vue-treeselect'
// import the styles
import '@riophae/vue-treeselect/dist/vue-treeselect.css'
export default {
    props: [
        'items', 'parent_id', 'home_url',
        'value', 'name', 'isadmin'
    ],
    data: function () {
        return {
            disabled: false
        }
    },
    components: {Treeselect},
}
</script>

<style scoped>
</style>

<!--<template>-->
<!--    <div>-->
<!--        <select v-model="selected" :id="'category_' + parent_id">-->
<!--            <option  v-for="item in items" :value="item">{{ item.title }}</option>-->
<!--        </select>-->

<!--        <select-component v-if="!!selected.id && children.length > 0" :parent_id="selected.id" :items="children" :home_url="home_url"></select-component>-->
<!--    </div>-->

<!--</template>-->

<!--<script>-->
<!--export default {-->
<!--    props: ['items', 'parent_id', 'home_url'],-->
<!--    data: function () {-->
<!--        return {-->
<!--            selected: {},-->
<!--            children: [{-->
<!--                created_at: null,-->
<!--                description: null,-->
<!--                id: 2,-->
<!--                image: null,-->
<!--                parent_id: 1,-->
<!--                title: "Бакалея",-->
<!--                updated_at: null,-->
<!--            }, {-->
<!--                created_at: null,-->
<!--                description: null,-->
<!--                id: 3,-->
<!--                image: null,-->
<!--                parent_id: 1,-->
<!--                title: "Напитки",-->
<!--                updated_at: null,-->
<!--            }],-->
<!--        }-->
<!--    },-->
<!--    watch: {-->
<!--        selected: function () {-->
<!--            this.setChildren();-->
<!--        }-->
<!--    },-->
<!--    methods: {-->
<!--        setChildren() {-->
<!--            if (this.selected.id != null) {-->
<!--                this.children = axios.get(this.home_url + 'company/category/' + this.selected.id)-->
<!--                    .then(function (response) {-->
<!--                        console.log(response.data);-->
<!--                        return response.data;-->
<!--                    });-->
<!--            }-->

<!--        }-->
<!--    }-->
<!--}-->
<!--</script>-->

<!--<style scoped>-->

<!--</style>-->