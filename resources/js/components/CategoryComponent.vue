<template>

    <li>
        <div
            class="bold"
            :class="{headline: isFolder}"

        >
            {{ item.title }}
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
            };
        },
        computed: {
            isFolder: function () {
                return this.item.grandchildren && this.item.grandchildren.length;
            }
        },
        methods: {
            toggle: function () {
                if (this.isFolder) {
                    this.isOpen = !this.isOpen;
                }
            },
        },
        created() {
            console.log(this.item);
        }
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
