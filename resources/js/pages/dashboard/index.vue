<template>
  <div>
<!--    <HeaderFilterInfo :values="['123', '12333']" />-->
  </div>
</template>

<script>
export default {
  middleware: 'auth',
  metaInfo () {
    return { title: 'Главная страница' }
  },
  scrollToTop: false,
  data: () => ({
    title: window.config.appName,
  }),
  mounted() {
    this.$root.$loading.finish()
  }
}
</script>

<style scoped>

</style>
