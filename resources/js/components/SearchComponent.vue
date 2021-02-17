<template>
    <ul>
        <li v-for="result in search">
            <div class="searchResult">{{result.title}}</div>
            <div class="searchPrice">
                <span class="mr-2 font-weight-bold">{{result.price}}</span>
                <img src="icons/red_basket.svg" alt="red_basket" class="searchImg">
            </div>
        </li>
    </ul>
</template>

<script>
    export default {
        props:[
            'search'
        ],
        data: () => ({

        }),
        mounted(){
            console.log(this.search);
        }
    }
</script>