<template>
  <div>
    <div class="row align-items-center justify-content-between">
      <div class="col-md-6 col-sm-10 col-12">
        <h4>История</h4>
      </div>
      <div class="col-md-auto col-12">
        <vs-button success
                   block
                   flat
                   class="px-5 py-1 fw-bold"
        >
          Создать
        </vs-button>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-lg-6 col-xl-4 d-flex align-items-center">
        <p class="mb-0">
          Показать по
        </p>
        <vs-input v-model="value" dark shadow class="w-auto ms-3" type="number" placeholder="Кол-во" />
      </div>
      <div class="col-lg-6 col-xl-4 mt-3 mt-lg-0">
        <vs-input shadow
                  v-model="value"
                  icon-after
                  dark
                  :loading="loading"
                  @change="value !== '' ? loading = true : loading = false"
                  @click-icon="loading = true"
                  placeholder="Поиск">
          <template #icon>
            <i class="bx bx-search"></i>
          </template>
        </vs-input>
      </div>
      <div class="col-lg-12 col-xl-4 mt-3 mt-xl-0">
        <vs-pagination v-model="page" dark :length="20" :max="5" />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  metaInfo () {
    return { title: 'Главная страница' }
  },
  scrollToTop: false,
  data: () => ({
    title: window.config.appName,
    loading: false,
    value: '',
    page: 1
  }),
}
</script>

<style scoped>

</style>
