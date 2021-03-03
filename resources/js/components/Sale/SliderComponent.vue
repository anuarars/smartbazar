<template>
    <hooper>
        <slide v-for="(gallery, index) in galleries" :key="index">
            <img :src="home_url + gallery.image" class="inslide" alt="">
        </slide>
    </hooper>
</template>

<script>
import { Hooper, Slide } from 'hooper';
import 'hooper/dist/hooper.css';

export default {
    name: 'App',
    components: {
        Hooper,
        Slide
    },
    props:[
        'galleries', 'home_url'
    ],
    methods:{
        
    },
    created(){
        console.log(this.home_url);
    }
};
</script>

<style>
    img.inslide{
        width: 100%;
        height: 100%;
    }
</style>