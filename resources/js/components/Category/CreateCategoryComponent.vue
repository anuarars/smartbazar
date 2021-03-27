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
            :options="categories"
            :limit="3"
            :max-height="200"
            v-model="value"
    />
    </div>
</template>

<script>
  // import the component
  import Treeselect from '@riophae/vue-treeselect'
  // import the styles
  import '@riophae/vue-treeselect/dist/vue-treeselect.css'

  export default {
      props:['categories', 'parent_id'],
    components: { Treeselect },
  data: () => ({
    value: [],
    options: [ {
      id: 'fruits',
      label: 'Fruits',
      children: [ {
        id: 'apple',
        label: 'Apple 🍎',
        isNew: true,
      }, {
        id: 'grapes',
        label: 'Grapes 🍇',
      }, {
        id: 'pear',
        label: 'Pear 🍐',
      }, {
        id: 'strawberry',
        label: 'Strawberry 🍓',
      }, {
        id: 'watermelon',
        label: 'Watermelon 🍉',
      } ],
    }, {
      id: 'vegetables',
      label: 'Vegetables',
      children: [ {
        id: 'corn',
        label: 'Corn 🌽',
      }, {
        id: 'carrot',
        label: 'Carrot 🥕',
      }, {
        id: 'eggplant',
        label: 'Eggplant 🍆',
      }, {
        id: 'tomato',
        label: 'Tomato 🍅',
      } ],
    } ],
  }),
  created(){
      console.log(this.options)
      console.log(this.categories)
  }
}
</script>