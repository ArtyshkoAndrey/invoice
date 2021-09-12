<template>
  <vs-sidebar
      absolute
      reduce
      v-model="active"
      open
      hover-expand
    >
      <template #logo>
        <!-- ...img logo -->
      </template>

      <vs-sidebar-item :id="item.name" v-for="item in menuItems">
        <template #icon>
          <box-icon :type="item.icon.type"
                    :name="item.icon.name"
                    color="white"
          ></box-icon>
        </template>
        {{ item.title}}
      </vs-sidebar-item>

      <template #footer>
        <vs-row justify="space-between">
          <vs-avatar>
            <img src="/avatars/avatar-5.png" alt="">
          </vs-avatar>

        </vs-row>
      </template>
</vs-sidebar>
</template>

<script>
import menuItems from '~/plugins/menu-items'
export default {
  name: "Sidebar",
  data:() => ({
    active: 'home',
    menuItems
  })
}
</script>

<style scoped>

</style>
