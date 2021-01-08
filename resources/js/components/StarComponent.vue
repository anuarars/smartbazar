<template>
    <div class="stars">
        <star-rating 
            :star-size="15"
            :show-rating="false" 
        />
    </div>
</template>

<script>
    import StarRating from 'vue-star-rating'

    export default {
        components: {
            StarRating
        }
    }
</script>