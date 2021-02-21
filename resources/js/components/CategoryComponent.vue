<template>

    <li>
        <div
            class="bold"
            :class="{headline: isFolder}"
            id="category"
        >
            <a @click="submit(item.id)">{{ item.title }}</a>

            <span v-if="isFolder" class="item" @click="toggle">[{{ isOpen ? '-' : '+' }}]</span>
        </div>
        <ul class="categories-tree-list" v-show="isOpen" v-if="isFolder">
            <categories-component

                v-for="(child, index) in item.grandchildren"
                :key="index"
                :item="child"
            ></categories-component>
        </ul>
    </li>

</template>

<script>
    export default {
        props: {
            item: Object
        },
        data: function () {
            return {
                isOpen: false,
                selected: 0,
            };
        },
        computed: {
            isFolder: function () {
                return this.item.grandchildren && this.item.grandchildren.length;
            },

        },

        methods: {
            toggle: function () {
                if (this.isFolder) {
                    this.isOpen = !this.isOpen;
                }
            },
            submit: function (id) {
                this.selected = id;
                var field = document.createElement("input");
                field.setAttribute("name", 'category');
                field.setAttribute("value", this.selected);
                var form = document.getElementById('index-filters-form');
                form.appendChild(field);
                form.submit();
            }
        },

    }
</script>

<style scoped>

    .item {
        cursor: pointer;
    }

    .categories-tree-list{
        padding-left: 1em;
        line-height: 1.5em;
        list-style-type: dot;
    }

</style>
