<template>
  <AppLayout title="Container">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Container
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div
            class="h-96 overflow-y-scroll hover:scroll-smooth pb-16"
            id="message-container"
          >
            <MessageContainer :messages="messages" />
          </div>
          <InputMessage :room="currentRoom" @messageSent="getMessage" />
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script>
import InputMessage from "./InputMessage.vue";
import MessageContainer from "./MessageContainer.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
export default {
  components: {
    AppLayout,
    MessageContainer,
    InputMessage,
  },

  data() {
    return {
      chatRooms: [],
      currentRoom: [],
      messages: [],
    };
  },

  created() {
    this.getRooms();
  },
  methods: {
    getRooms() {
      axios
        .get("/chat/rooms")
        .then((response) => {
          this.chatRooms = response.data;
          this.setRoom(response.data[0]);
        })
        .catch((error) => {
          console.log(error);
        });
    },

    setRoom(room) {
      this.currentRoom = room.id;
      this.getMessages();
    },

    getMessages() {
      axios
        .get(`chat/room/${this.currentRoom}/messages`)
        .then((response) => {
          this.messages = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },

    getMessage(message) {
      this.messages.push(message);
      this.scrollToEnd();
    },

    scrollToEnd() {
      let container = this.$el.querySelector("#message-container");
      container.scrollTop = container.scrollHeight;
    },
  },
};
</script>
