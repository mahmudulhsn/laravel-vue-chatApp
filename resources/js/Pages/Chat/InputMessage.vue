<template>
  <div>
    <div class="border-t border-gray-500 py-2 px-5">
      <div class="flex justify-between">
        <div class="w-1/12">
          <div class="flex justify-center items-center w-full">
            <label
              for="dropzone-file"
              class="
                flex flex-col
                justify-center
                items-center
                w-full
                h-14
                mr-2
                bg-gray-50
                rounded-lg
                border-2 border-gray-300 border-dashed
                cursor-pointer
                dark:hover:bg-bray-800 dark:bg-gray-700
                hover:bg-gray-100
                dark:border-gray-600
                dark:hover:border-gray-500
                dark:hover:bg-gray-600
              "
            >
              <div class="flex flex-col justify-center items-center pt-5 pb-6">
                <svg
                  class="mb-1 w-10 h-4 text-gray-400"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                  ></path>
                </svg>
                <p class="text-sm text-gray-500 dark:text-gray-400">Image</p>
              </div>
              <input id="dropzone-file" type="file" class="hidden" />
            </label>
          </div>
        </div>
        <input
          type="text"
          class="
            w-10/12
            focus:outline-0 focus:border-none
            border-none
            outline-0
            rounded
            py-3
            bg-gray-200
          "
          placeholder="Say something..."
          @keyup.enter="sendMessage"
          v-model="message"
        />
        <button
          class="w-1/12 bg-green-800 rounded-r text-white"
          @click="sendMessage"
        >
          Send
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    room: {
      type: Object,
    },
  },
  data() {
    return {
      message: "",
    };
  },
  methods: {
    sendMessage() {
      if (this.message.trim() == "") {
        return;
      }

      axios
        .post("chat/room/" + this.room.id + "/message", {
          message: this.message,
        })
        .then((response) => {
          this.message = "";
          this.$emit("messageSent", response.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
