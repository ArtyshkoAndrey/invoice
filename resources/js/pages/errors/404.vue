<template>
  <div class="row text-center">
    <h3>Ошибка</h3>
  </div>
</template>

<script>
export default {
  metaInfo () {
    return { title: 'Главная страница' }
  },
  scrollToTop: false,
  data: () => ({
    title: window.config.appName
  })
}
</script>

<style scoped>

</style>
