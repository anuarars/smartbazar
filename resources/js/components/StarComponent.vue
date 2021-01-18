<template>
    <div class="stars">
        <star-rating 
            :star-size="20"
            :rating="rating"
            :read-only="true"
            :show-rating="false" 
        />
    </div>
</template>

<script>
    import StarRating from 'vue-star-rating'

    export default {
        props:[
            'rating'
        ],
        components: {
            StarRating
        },
    }
</script>