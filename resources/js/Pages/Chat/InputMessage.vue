<template>
  <div>
    <div class="border-t border-gray-500 py-2 px-5">
      <div class="flex justify-between">
        <input
          type="text"
          class="
            w-11/12
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
