<template>
  <transition name="fade" mode="out-in">
    <router-view class="mb-5 pb-5" />
  </transition>
</template>

<script>
export default {
  name: 'Auth',
  middleware: 'auth',
}
</script>

<style scoped>

</style>
