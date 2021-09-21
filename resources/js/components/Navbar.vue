<template>
  <vs-navbar
    center-collapsed
    fixed
    square
    shadow
    class="py-2"
  >
    <template #left>
      <vs-navbar-item id="guide">
        Главная
      </vs-navbar-item>
    </template>

    <template #right>
      <vs-row justify="space-between" align="center" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="fw-bolder me-3">Название компании</span>
        <vs-avatar>
          <img alt="" src="/avatars/avatar-5.png">
        </vs-avatar>
      </vs-row>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="#">Выйти</a></li>
      </ul>
    </template>
  </vs-navbar>
</template>

<script>
export default {
  name: 'Navbar'
}
</script>

<style scoped>

</style>
