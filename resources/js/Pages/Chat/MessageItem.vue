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
            <span class="cursor-pointer" @click="showLargeImage()">
              <img :src="message.small_url" alt="" />
            </span>
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

      <LargeImage
        :isModalOpen="isModalOpen"
        :largeUrl="message.large_url"
        @modalClose="modalClose"
      />
    </div>
  </div>
</template>

<script>
import LargeImage from "./LargeImage.vue";
export default {
  components: { LargeImage },
  data() {
    return {
      isModalOpen: false,
    };
  },
  props: {
    message: {
      type: Object,
      default: {},
    },
  },
  methods: {
    showLargeImage() {
      this.isModalOpen = true;
    },
    modalClose() {
      this.isModalOpen = false;
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
