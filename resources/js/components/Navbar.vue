<template>
  <vs-navbar
    center-collapsed
    fixed
    square
    shadow
    class="py-2"
  >
    <template #left>
      <vs-navbar-item id="guide" @click="$router.push({name: 'dashboard.invoice.index'})">
        Главная
      </vs-navbar-item>
    </template>

    <template v-if="user" #right>
      <vs-row justify="space-between" class="pointer" align="center" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="fw-bolder me-3">{{ appName }}</span>
        <vs-avatar>
          <img alt="" :src="user.photo_url">
        </vs-avatar>
      </vs-row>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" @click="logout">{{ $t('auth.logout') }}</a></li>
      </ul>
    </template>
    <template v-else #right>
      <vs-row justify="" align="center">
        <router-link class="login-link" :to="{ name: 'login' }">
          {{ $t('auth.login') }}
        </router-link>
      </vs-row>
    </template>
  </vs-navbar>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
  name: 'Navbar',
  computed: {
    ...mapGetters({
      user: 'auth/user'
    }),
    appName () {
      return window.config.appName
    }
  },
  methods: {
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout')
      // Redirect to login.
      this.$router.push({ name: 'login' })
    }
  }
}
</script>

<style lang="scss" scoped>
  .login-link {
    color: rgb(var(--vs-text));
    text-decoration: none;
    margin-right: 50px;
  }
  .pointer, .dropdown-menu {
    cursor: pointer;
  }
</style>
