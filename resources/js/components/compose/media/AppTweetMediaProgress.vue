<template>
  <div class="w-full h-1 bg-gray-800">
    <div class="w-full h-1 bg-blue-800" :style="`width: ${progress}%;`"></div>
  </div>
</template>

<script>
  export default {
    props:{
      progress: {
        required: true,
        type: Number
      }
    }
  }
</script>
