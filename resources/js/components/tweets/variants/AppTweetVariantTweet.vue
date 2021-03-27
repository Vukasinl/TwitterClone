<template>
  <div class="flex w-full">
    <img
      class="w-12 h-12 mr-3 rounded-full"
      :src="tweet.user.avatar"
      :alt="tweet.user.name"
    />

    <div class="flex-grow">
      <app-tweet-username :user="tweet.user" />

      <div v-if="tweet.replying_to" class="text-gray-600 mb-2">
        Replying to <a href="#">@{{ tweet.replying_to }}</a>
      </div>

      <app-tweet-body :tweet="tweet" />

      <div class="flex flex-wrap mb-4 mt-4" v-if="images.length">
        <div
          class="w-6/12 flex-grow"
          v-for="(image, index) in images"
          :key="index"
        >
          <img :src="image.url" class="rounded-lg">
        </div>
      </div>

      <div class="mb-4 mt-4" v-if="video">
        <video :src="video.url" controls class="rounded-lg"></video>
      </div>

      <app-tweet-action-group :tweet="tweet" />
    </div>
  </div>
</template>

<script>
import AppTweetActionGroup from '../actions/AppTweetActionGroup.vue';
export default {
  components: { AppTweetActionGroup },
  props: {
    tweet: {
      required: true,
      type: Object
    }
  },

  computed: {
    images() {
      return this.tweet.media.data.filter(m => m.type === 'image');
    },
    video() {
      return this.tweet.media.data.filter(m => m.type === 'video')[0];
    }
  }
};
</script>
