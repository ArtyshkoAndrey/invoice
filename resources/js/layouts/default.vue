
<template>
  <div class="theme-container">
    <Navbar />
    <Sidebar />
    <Config />
    <main class="container">
      <Child />
    </main>
  </div>
</template>

<script>
export default {
  name: 'Default',
  components: {
  },
  data: () => {
    return {
    }
  }
}
</script>

<style>
</style>
