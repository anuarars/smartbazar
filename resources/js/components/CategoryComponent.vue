<template>
    <li>
        <div
            :class="{bold: isFolder}"
            @click="toggle"
        >
            {{ item.id }}
            <span v-if="isFolder">[{{ isOpen ? '-' : '+' }}]</span>
        </div>
        <ul v-show="isOpen" v-if="isFolder">
            <tree-item
                class="item"
                v-for="(child, index) in item.children"
                :key="index"
                :item="child"
            ></tree-item>
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
                return this.categories.children && this.categories.children.length;
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
            console.log("salam aleikumk");
        }
    }
</script>
