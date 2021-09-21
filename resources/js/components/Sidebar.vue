<template>
  <vs-sidebar
    v-model="active"
    fixsed
    hover-expand
    open
    reduce
  >
    <template #logo>
      <!-- ...img logo -->
    </template>

    <vs-sidebar-item v-for="item in items.links"
                     :id="item.name"
                     :key="item.name"
                     :to="item.path"
    >
      <template #icon>
        <box-icon :name="item.icon.name"
                  :type="item.icon.type"
                  :color="color"
        />
      </template>
      {{ item.title }}
    </vs-sidebar-item>

    <template #footer>
      <vs-row justify="space-between">
        <vs-avatar>
          <img alt="" src="/avatars/avatar-5.png">
        </vs-avatar>
      </vs-row>
    </template>
  </vs-sidebar>
</template>

<script>
import items from '~/plugins/menu-items'
import store from '~/store'

export default {
  name: 'Sidebar',
  data: () => ({
    active: 'home',
    color: 'white',
    items
  }),
  mounted () {
    const unwatch = this.$watch(
      () => this.$route,
      (route, prevRoute) => {
        this.active = route.name
        unwatch()
      })
    console.log(store.state.theme.dark)
    if (String(store.state.theme.dark) === 'true') {
      this.color = 'white'
    } else {
      this.color = 'black'
    }

    store.watch(
      state => state.theme.dark,
      value => {
        if (String(value) === 'true') {
          this.color = 'white'
        } else {
          this.color = 'black'
        }
      }
    )
  }
}
</script>

<style scoped>

</style>
