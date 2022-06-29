<template>
  <div>
    <div class="grid grid-cols-1 text-sm text-gray-500 px-4 italic">
      <!-- name section -->
      <div>
        <div
          class="text-yellow-600"
          :class="{
            'text-right mr-6': message.user_id == this.$page.props.user.id,
            'text-left ml-6': message.user_id !== this.$page.props.user.id,
          }"
        >
          <span class="text-right">{{ message.user.name }}</span>
        </div>
      </div>
      <!-- name section -->

      <!-- message section -->
      <div>
        <div
          style="width: 80%"
          :class="{
            'float-right': message.user_id == this.$page.props.user.id,
          }"
        >
          <div
            class="
              w-fit
              rounded-2xl
              px-3
              py-2
              mx-5
              text-lg text-white
              not-italic
            "
            :class="{
              'bg-green-600': message.user_id !== this.$page.props.user.id,
              'bg-gray-600': message.user_id == this.$page.props.user.id,
              'float-right': message.user_id == this.$page.props.user.id,
            }"
          >
            <img :src="message.small_url" alt="" />
            <span v-if="message.message !== ''">{{ message.message }}</span>
          </div>
        </div>
      </div>
      <!-- message section -->

      <!-- time -->
      <div>
        <div
          :class="{
            'text-right mr-6': message.user_id == this.$page.props.user.id,
            'text-left ml-6': message.user_id !== this.$page.props.user.id,
          }"
        >
          {{ message.created_at }}
        </div>
      </div>
      <!-- time -->
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
  created() {
    console.log(this.message);
  },
};
</script>

<style lang="scss" scoped>
</style>
