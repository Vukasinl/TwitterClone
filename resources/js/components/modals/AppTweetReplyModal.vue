<template>
  <div>
    <component
      v-if="tweet"
      class="mb-4"
      :is="`app-tweet-variant-${tweet.type}`"
      :tweet="tweet"
    />

    <app-tweet-reply-compose
      v-if="tweet"
      :tweet="tweet"
      @success="$emit('close')"
    />
  </div>
</template>

<script>
  export default {
    props: {
      tweet: {
        required: true,
        type: Object
      }
    }
  }
</script>
