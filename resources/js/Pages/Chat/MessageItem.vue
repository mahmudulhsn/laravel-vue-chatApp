<template>
  <div class="text-sm text-gray-500 px-4 italic">
    <div
      :class="{ 'float-right': message.user_id == this.$page.props.user.id }"
    >
      <div class="text-yellow-600">
        <span class="text-right">{{ message.user.name }}</span>
      </div>
      <div
        class="w-fit rounded-2xl px-3 py-2 mx-5 text-lg text-white not-italic"
        :class="{
          'bg-green-600': message.user_id !== this.$page.props.user.id,
          'bg-gray-600': message.user_id == this.$page.props.user.id,
        }"
      >
        {{ message.message }}
      </div>
      <div>{{ message.created_at }}</div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    message: {
      type: Object,
      default: {},
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
