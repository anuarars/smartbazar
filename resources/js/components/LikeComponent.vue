<template>
    <button class="toggle-favorite" @click="toggle">
        <FavoriteIcon
            class="toggle-favorite__icon"
            :class="iconClasses"
            @animationend.native="onIconAnimationEnds"
        />
        <transition name="favorite-particles-transition">
            <div v-if="animating" class="toggle-favorite__particles"></div>
        </transition>
    </button>

</template>

<script>
import FavoriteIcon from "./FavoriteIcon";

export default {
    props: ['product', 'favorited', 'home_url'],
    components: {
        FavoriteIcon
    },
    data: function() {
        return {
            isFavorited: '',
            animating: false,
        }
    },
    mounted() {
        this.isFavorited = !!this.isFavorite;
    },
    computed: {
        iconClasses() {
            return {
                "toggle-favorite__icon--favorited": this.isFavorited,
                "toggle-favorite__icon--animate": this.animating
            };
        },
        isFavorite() {
            return this.favorited;
        },
    },
    methods: {
        toggle() {
            // Only animate on favoriting.
            if (!this.isFavorited) {
                this.animating = true;
                this.favorite(this.product);
            } else {
                this.unFavorite(this.product);
            }
        },
        onIconAnimationEnds() {
            this.animating = false;
        },
        favorite(product) {
            axios.post(this.home_url + 'wishlist/' + product)
                .then(response => {
                    this.isFavorited = true;
                    this.$parent.countWishlist();
                });
        },

        unFavorite(product) {
            axios.delete(this.home_url + 'wishlist/unlike/' + product)
                .then(response => {
                    this.isFavorited = false;
                    this.$parent.countWishlist();
                });
        }
    }
}
</script>




<style lang="scss" scoped>

$particles-animation-duration: 0.8s;
$icon-animation-duration: 0.48s;
$icon-color: #47991f;
$icon-border-color: #47991f;

button {
    background: none;
    border: none;
    padding: 0;
    outline: inherit;
    cursor: pointer;
}
@keyframes favorite-icon-animation {
    0% {
        opacity: 1;
        transform: scale(0.1);
    }

    50% {
        opacity: 1;
        transform: scale(1.1);
    }

    80% {
        opacity: 1;
        transform: scale(0.9);
    }

    100% {
        opacity: 1;
        transform: scale(1);
    }
}

@keyframes favorite-particles-animation {
    0% {
        background-position: left center;
    }
    100% {
        background-position: right center;
    }
}

.favorite-particles-transition-enter-active {
    background-image: url("/public/img/animation/particle-sprite.png");
    background-size: 2500% auto;
    background-position: left center;
    background-repeat: no-repeat;

    animation-duration: $particles-animation-duration;
    animation-timing-function: steps(24);
    animation-name: favorite-particles-animation;
}

.toggle-favorite {
    font-size: 30px;
    position: relative;

    &__icon {
        height: 1em;
        width: 1em;

        transition: fill-opacity 0.2s, stroke 0.2s;
        fill: $icon-color;
        fill-opacity: 0;
        stroke: $icon-border-color;

        &--favorited {
            fill-opacity: 1;
            stroke: $icon-color;
        }

        &--animate {
            opacity: 0;
            transform: scale(0);

            animation-duration: $icon-animation-duration;
            animation-delay: $particles-animation-duration - $icon-animation-duration;
            animation-name: favorite-icon-animation;
        }
    }

    &__particles {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 3em;
        height: 3em;
    }

}
</style>