<template>
  <ul class="flex mt-4">
    <li class="w-3/12">
      <app-tweet-like-action />
    </li>
    <li class="w-3/12">
      <app-tweet-retweet-action />
    </li>
    <li class="w-3/12">
      <app-tweet-reply-action />
    </li>
  </ul>
</template>

<script>
import AppTweetLikeAction from './AppTweetLikeAction.vue'
import AppTweetReplyAction from './AppTweetReplyAction.vue'
import AppTweetRetweetAction from './AppTweetRetweetAction.vue'
export default {
  components: { AppTweetLikeAction, AppTweetRetweetAction, AppTweetReplyAction },

}
</script>
