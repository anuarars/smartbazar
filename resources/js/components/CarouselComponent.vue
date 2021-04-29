<template>
    <div class="container">
        <vueper-slides class="no-shadow"
        :visible-slides="5"
        :slide-ratio="1 / 4"
        :dragging-distance="70">

        <vueper-slide
                v-for="(item, index) in items"
                :key="index"
            />
            <slot>Отправить</slot>
        </vueper-slides>
    </div>
</template>

<script>
    import { VueperSlides, VueperSlide } from 'vueperslides'
    import 'vueperslides/dist/vueperslides.css'
    export default {
    components: { VueperSlides, VueperSlide },
    props:['items'],
    data: () => ({

    }),
    created(){
        console.log(this.items);
    }
    }
</script>

<style >
    .container{
        padding: 0;
    }
    .vueperslides__progress {
        background: rgba(0, 0, 0, 0.25);
        color: #ea4967;
    }
</style>