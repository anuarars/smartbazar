<template>
    <button :class="classes" @click="click(data)" title="View">
        <span>
            <i class="fa fa-pen" aria-hidden="true"></i>
        </span>
        &nbsp;
        {{ name }}
    </button>
</template>

<script>
export default {
    name: "ViewButton",
    props: {
        data: {},
        name: {},
        click: {
            type: Function,
            default: () => {}
        },
        classes: {
            type: Object,
            default: () => ({
                'btn': true,
                'btn-info': true,
                'btn-sm': true,
            }),
        },
    }
}
</script>

<style scoped>

</style>
