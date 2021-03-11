<template>
  <form class="flex " method="POST" @submit.prevent="submit">
    <div class="mr-3">
        <img class="w-12 rounded-full" :src="$user.avatar">
    </div>
    <div class="flex-grow">
      <app-tweet-compose-textarea
        v-model="form.body"
      />

      <div class="flex justify-between">
        <div>

        </div>

        <div>
          <button
            type="submit"
            class="bg-blue-500 rounded-full text-gray-300 text-center px-4 py-3 font-bold leading-none"
          >
            Tweet
          </button>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
import axios from 'axios';
import AppTweetComposeTextarea from './AppTweetComposeTextarea.vue';

export default {
  components: { AppTweetComposeTextarea },
  data() {
    return {
      form: {
        body: ''
      }
    }
  },

  methods: {
    async submit() {
      await axios.post('/api/tweets', this.form);

      this.form.body = '';
    }
  },
}
</script>
