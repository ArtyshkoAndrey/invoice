<template>
  <div>
    <div
      :ref="'box1'"
      class="box-loading" />
  </div>
</template>

<script>
export default {
  name: 'Loader',
  mounted() {
    this.$vs.loading({
      target: this.$refs['box1'],
      text: this.$t('config.loading'),
      type: 'default'
    })
  }
}
</script>

<style>
</style>
