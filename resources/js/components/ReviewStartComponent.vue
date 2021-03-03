<template>
<div class="stars_review">
    <star-rating
        :star-size="30"
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



