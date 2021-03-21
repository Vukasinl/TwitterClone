<template>
  <form class="flex " method="POST" @submit.prevent="submit">
    <img class="w-12 h-12 mr-3 rounded-full" :src="$user.avatar">

    <div class="flex-grow">
      <app-tweet-compose-textarea
        v-model="form.body"
        placeholder="Tweet your reply"
      />

      <app-tweet-media-progress class="mb-4" :progress="media.progress" v-if="media.progress" />

      <app-tweet-image-preview
        :images="media.images"
        v-if="media.images.length"
        @removed="removeImage"
      />

      <app-tweet-video-preview
        :video="media.video"
        v-if="media.video"
        @removed="removeVideo"
      />

      <div class="flex justify-between">
        <ul class="flex items-center">
          <li class="mr-4">
            <app-tweet-compose-media-button
              id="media-compose-reply"
              @selected="handleMediaSelected"
            />
          </li>
        </ul>

        <div class="flex items-center justify-end">
          <div>
            <app-tweet-compose-limit
              class="mr-2"
              :body="form.body"
            />
          </div>
          <button
            type="submit"
            class="bg-blue-500 rounded-full text-gray-300 text-center px-4 py-3 font-bold leading-none"
          >
            Reply
          </button>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
import axios from 'axios';
import compose from '../../mixins/compose';

export default {
  mixins: [
    compose
  ],

  props: {
    tweet: {
      required: true,
      type: Object
    }
  },

  methods: {
    async post() {
      // todo
    }
  }
}
</script>
