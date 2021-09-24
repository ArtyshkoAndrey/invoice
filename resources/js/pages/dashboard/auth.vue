<template>
  <transition name="fade" mode="out-in">
    <router-view />
  </transition>
</template>

<script>
export default {
  name: 'Auth',
  middleware: 'auth'
}
</script>

<style scoped>

</style>
