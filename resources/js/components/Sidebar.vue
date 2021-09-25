<template>
  <vs-sidebar
    v-if="user"
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
      {{ $t(item.title) }}
    </vs-sidebar-item>

    <template #footer>
      <vs-row justify="space-between">
        <vs-avatar>
          <img :alt="user.name" :src="user.photo_url">
        </vs-avatar>
      </vs-row>
    </template>
  </vs-sidebar>
</template>

<script>
import items from '~/plugins/menu-items'
import { mapGetters } from 'vuex'

export default {
  name: 'Sidebar',
  data: () => ({
    active: 'dashboard.home',
    color: 'white',
    items
  }),
  computed: {
    ...mapGetters({
      user: 'auth/user',
      theme: 'theme/dark'
    })
  },
  watch: {
    theme: function (newVal) {
      if (newVal) {
        this.color = 'white'
      } else {
        this.color = 'black'
      }
    }
  },
  mounted () {
    console.log(this.theme)
    const unwatch = this.$watch(
      () => this.$route,
      (route) => {
        this.active = route.name
        unwatch()
      })

    if (this.theme) {
      this.color = 'white'
    } else {
      this.color = 'black'
    }

  }
}
</script>

<style scoped>

</style>
