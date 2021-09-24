
<template>
  <div class="theme-container" :style="!user ? 'margin-left: 0' : ''">
    <Navbar />
    <Sidebar />
    <Config />
    <main class="container">
      <Child />
    </main>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
  name: 'Default',
  components: {
  },
  data: () => {
    return {
    }
  },
  computed: mapGetters({
    user: 'auth/user'
  }),
}
</script>

<style>
</style>
