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
            image: 'https://cdn24.img.ria.ru/images/156381/70/1563817003_0:159:3077:1889_1920x0_80_0_0_bffbfcee94bcaad9b340e3ccddea373f.jpg'
            },
            {
            title: 'Slide #2',
            content: 'Slide content2.',
            image: 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/assortment-of-colorful-ripe-tropical-fruits-top-royalty-free-image-995518546-1564092355.jpg'
            },
            {
            title: 'Slide #3',
            content: 'Slide content3.',
            image: 'https://koloro.ua/media/upload/images/Andrii%20Gorulko.jpg'
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
    .vueper-slide{
        background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
        -webkit-background-size: cover;
        -moz-background-size:  cover;
        -o-background-size: cover;
        background-size: cover;
    }

</style>