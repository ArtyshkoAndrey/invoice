<template>
  <div class="config">
    <vs-button
      shadow
    >
      Default
    </vs-button>

    <vs-switch v-model="active">
      <template #off>
        Light
      </template>
      <template #on>
        Dark
      </template>
    </vs-switch>
  </div>
</template>

<script>
import store from '~/store'

export default {
  name: 'Config',
  data: () => ({
    active: String(store.getters['theme/dark']) === 'true'
  }),
  watch: {
    active: function (newVal, oldVal) {
      console.log(this.active)
      store.dispatch('theme/saveTheme', newVal)
    }
  },
}
</script>

<style scoped>

</style>
