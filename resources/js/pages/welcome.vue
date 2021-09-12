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
      <div class="col d-flex align-items-center">
        <p class="mb-0">Показать по</p>
        <vs-input shadow class="w-auto ms-3" v-model="value" placeholder="Кол-во" />
      </div>
      <div class="col">
        <vs-input shadow
                  v-model="value"
                  icon-after
                  :loading="loading"
                  @change="value !== '' ? loading = true : loading = false"
                  @click-icon="loading = true"
                  placeholder="Поиск">
          <template #icon>
            <box-icon v-if="!loading" name="search" color="white"></box-icon>
          </template>
        </vs-input>
      </div>
      <div class="col">
        <div class="center">
          <vs-pagination v-model="page" :length="20" />
        </div>
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
