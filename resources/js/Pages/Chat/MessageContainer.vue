<template>
  <div>
    <div
      class="bg-white-200 my-2 overflow-hidden text-white"
      v-for="(message, index) in messages"
      :key="index"
      :class="{}"
    >
      <div style="width: 100%" class="my-2">
        <div>
          <MessageItem :message="message" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import MessageItem from "./MessageItem.vue";
export default {
  props: {
    messages: {
      type: Array,
      default: [],
    },
  },

  components: {
    MessageItem,
  },
};
</script>

<style lang="scss" scoped>
</style>
