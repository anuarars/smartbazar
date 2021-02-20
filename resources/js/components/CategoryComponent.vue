<template>
    <li>
        <div
            :class="{bold: isFolder}"
            @click="toggle">
            {{ item.name }}
            <span v-if="isFolder">[{{ isOpen ? '-' : '+' }}]</span>
        </div>
        <ul v-show="isOpen" v-if="isFolder">
<!--            <categories-component-->
<!--                class="item"-->
<!--                v-for="(child, index) in item.children"-->
<!--                :key="index"-->
<!--                :item="child"-->
<!--            ></categories-component>-->
        </ul>
    </li>
</template>

<script>
    export default {
        props: [
            'item'
        ],
        data: function () {
            return {
                isOpen: false,
            };
        },
        computed: {
            isFolder: function () {
                return this.item.children && this.item.children.length;
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
