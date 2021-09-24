<template>
  <div>
    <div class="row align-items-center justify-content-between">
      <div class="col-md-6 col-sm-10 col-12">
        <h4>История</h4>
      </div>
      <div class="col-md-auto col-12">
        <vs-button block
                   class="px-5 py-1 fw-bold"
                   flat
                   success
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
        <vs-input v-model="value" class="w-auto ms-3" dark placeholder="Кол-во" shadow type="number"/>
      </div>
      <div class="col-lg-6 col-xl-4 mt-3 mt-lg-0">
        <vs-input v-model="value"
                  :loading="loading"
                  dark
                  icon-after
                  placeholder="Поиск"
                  shadow
                  @change="value !== '' ? loading = true : loading = false"
                  @click-icon="loading = true"
        >
          <template #icon>
            <i v-if="!loading" class="bx bx-search" aria-hidden="true"/>
          </template>
        </vs-input>
      </div>
      <div class="col-lg-12 col-xl-4 mt-3 mt-xl-0">
        <vs-pagination v-model="page" :length="20" :max="5" dark/>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  middleware: 'auth',
  metaInfo () {
    return { title: 'Главная страница' }
  },
  scrollToTop: false,
  data: () => ({
    title: window.config.appName,
    loading: false,
    value: '',
    page: 1
  })
}
</script>

<style scoped>

</style>
