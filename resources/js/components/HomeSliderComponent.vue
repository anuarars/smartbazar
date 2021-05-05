<template>
    <div class="container">
        <vueper-slides progress autoplay>
            <vueper-slide
                v-for="(slide, i) in slides"
                :key="i"
                :image="slide.image"
                :title="slide.title"
                :content="slide.content"  />
            <div slot="slideContent">
                <button v-on:click="">VOTE</button>
            </div>

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
            title: 'Широкий ассортимент товаров.',
            content: 'Все необходимые товары можете найти здесь',
            image: 'https://cdn24.img.ria.ru/images/156381/70/1563817003_0:159:3077:1889_1920x0_80_0_0_bffbfcee94bcaad9b340e3ccddea373f.jpg',
            },
            {
            title: 'У нас работает доставка ежедневно! ',
            content: 'В любую черту города!',
            image: 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/assortment-of-colorful-ripe-tropical-fruits-top-royalty-free-image-995518546-1564092355.jpg'
            },
            {
            title: 'Гарантия свежих продуктов!',
            content: 'Продукты в вашем доме быстро и надежно',
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
    .vueperslide__content-wrapper:not(.vueperslide__content-wrapper--outside-top):not(.vueperslide__content-wrapper--outside-bottom){
        color: white;
    }
</style>
