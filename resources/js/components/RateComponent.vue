<template>
<div class="col-12">
    <div v-if="!isReviewed">
        <div class="form-row">
            <div class="form-group col-md-4">
                <h4>Оцените: </h4>
            </div>
            <div class="form-group col-md-4">
                <div class="stars">
                    <star-rating
                        v-if="!rate"
                        active-color="#ff2626"
                        :star-size="30"
                        :show-rating="false"
                        @rating-selected="setRating"
                    />
                    </star-rating>
                    <star-rating
                        v-else
                        :star-size="30"
                        active-color="#ff2626"
                        :read-only = "true"
                        :rating = "rate"
                        :show-rating="false"
                    />
                    </star-rating>
                </div>
            </div>
        </div>
        <div>
            <div class="form-group">
                <label for="review-text">Отзыв</label>
                <textarea class="form-control" id="review-text" rows="6" v-model="description"></textarea>
            </div>
            <div class="form-group mb-0 text-center">
                <button class="btn btn-primary btn-lg" v-on:click="addReview">Оставить отзыв</button>
            </div>
        </div>
    </div>
    <div v-else>
        <h4>Спасибо за ваш отзыв!</h4>
    </div>
</div>
</template>

<script>
    import StarRating from 'vue-star-rating'
    export default {
        components: {
            StarRating
        },
        props:[
            'home_url', 'item', 'order_id', 'reviewed'
        ],
        mounted() {
            this.isReviewed = !!this.reviewed;
            },
        data(){
            return{
                rate: '',
                description: '',
                review_id: '',
                isReviewed: ''
            }
        },
        methods:{
            setRating: function(rating) {
                this.rate = rating;
            },
            addReview(){
                axios.post(this.home_url + 'review/store', {
                    rate: this.rate,
                    item_id: this.item.id,
                    description: this.description,
                    order_id: this.order_id
                }).then(response => {
                    console.log(response.data)
                    this.review_id = response.data
                    this.isReviewed = true;
                });
            }
        }
    }
</script>
