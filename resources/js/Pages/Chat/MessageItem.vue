<template>
  <div>
    {{ message.message }}
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
