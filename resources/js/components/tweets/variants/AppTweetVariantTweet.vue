<template>
  <div class="flex w-full">
    <div class="mr-3">
      <img
        class="w-12 rounded-full"
        :src="tweet.user.avatar"
        :alt="tweet.user.name"
      />
    </div>
    <div class="flex-grow">
      <app-tweet-username :user="tweet.user" />

      <p class="text-gray-300 whitespace-pre-wrap">{{ tweet.body }}</p>

      <app-tweet-action-group />
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
  }
};
</script>
