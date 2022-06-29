<template>
  <div
    v-show="isModalOpen"
    class="
      bg-black bg-opacity-50
      fixed
      inset-0
      overflow-x-hidden
      justify-center
      items-center
      text-white text-center
      z-50
    "
  >
    <div class="w-1/2 mx-auto mt-10">
      <div class="bg-gray-800 px-4 py-6 rounded shadow-2xl">
        <div
          class="
            w-full
            flex
            justify-between
            items-center
            space-x-4
            border-b-2 border-gray-400
            pb-5
          "
        >
          <h4 class="font-bold text-2xl">Image</h4>
          <span
            @click="closeModal"
            class="cursor-pointer px-3 py-1 bg-red-700 rounded hover:bg-red-900"
          >
            <i class="fa-solid fa-xmark"></i>
          </span>
        </div>
        <div class="w-full px-5">
          <div class="from-group w-full">
            <div class="col-md-5 offset-md-1">
              <div class="form-group">
                <div class="border p-2 mt-3">
                  <img :src="largeUrl" class="img-fluid" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    isModalOpen: {
      type: Boolean,
    },

    largeUrl: {
      type: String,
    },
  },

  methods: {
    // close modal
    closeModal() {
      this.$emit("modalClose");
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
