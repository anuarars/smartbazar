<template>
    <div class="container">
        <vueper-slides progress autoplay>
            <vueper-slide
                v-for="(slide, i) in slides"
                :key="i"
                :image="slide.image"
                :title="slide.title"
                :content="slide.content"
            />
        </vueper-slides>
    </div>
</template>

<script>
    import { VueperSlides, VueperSlide } from 'vueperslides'
    import 'vueperslides/dist/vueperslides.css'

    export default {
    components: { VueperSlides, VueperSlide },
    data: () => ({
        slides: [
            {
            title: 'El Teide Volcano, Spain',
            content: 'Photo by Max Rive',
            image: 'https://via.placeholder.com/1000x500'
            },
            {
            title: 'Slide #2',
            content: 'Slide content2.',
            image: 'https://cdn.pixabay.com/photo/2020/03/14/21/59/lighthouse-4931925_960_720.jpg'
            },
            {
            title: 'Slide #3',
            content: 'Slide content3.',
            image: 'https://cdn.pixabay.com/photo/2014/12/16/22/25/woman-570883_960_720.jpg'
            }
        ]
    })
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