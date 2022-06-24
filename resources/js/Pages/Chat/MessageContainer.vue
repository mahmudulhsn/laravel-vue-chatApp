<template>
  <div>
    <div
      class="bg-gray-200 my-2 rounded px-3 py-2 mx-5 overflow-hidden text-white"
      v-for="(message, index) in messages"
      :key="index"
      :class="{
        'bg-green-600': message.user_id !== this.$page.props.user.id,
        'bg-gray-600': message.user_id == this.$page.props.user.id,
      }"
    >
      {{ message.message }}
    </div>
  </div>
</template>

<script>
export default {
  props: {
    messages: {
      type: Array,
      default: [],
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
