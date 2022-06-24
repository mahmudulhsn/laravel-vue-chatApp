<template>
  <div class="flex justify-between">
    <div>{{ selected.name }} Chat Room</div>
    <div>
      <select v-model="selected" @change="$emit('roomChanged', selected)">
        <option v-for="(room, index) in rooms" :key="index" :value="room">
          {{ room.name }}
        </option>
      </select>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    rooms: {
      type: Array,
    },

    currentRoom: {
      type: Array,
    },
  },

  data() {
    return {
      selected: "",
    };
  },

  created() {
    console.log(this.rooms);
    this.selected = this.currentRoom;
  },
};
</script>

<style lang="scss" scoped>
</style>
