<!--
  - Copyright (c) 2021.
  - This code is the property of the Fulliton developer.
  - Write all questions and suggestions on the Vkontakte social network https://vk.com/fulliton
  -->

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
        <vs-input v-model="viewLength" class="w-auto ms-3" dark placeholder="Кол-во" shadow type="number"/>
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
      <div class="col-lg-12 col-xl-4 mt-3 mt-xl-0 justify-content-center d-block justify-content-xl-end d-xl-flex">
        <vs-pagination v-model="page" :length="maxPage" :max="5" dark/>
      </div>
    </div>
  </div>

</template>

<script>

export default {
  name: 'HeaderFilterInfo',
  props: {
    values: {
      type: Object,
      required: true
    }
  },
  data: () => ({
    loading: false,
    value: '',
    page: null,
    maxPage: null,
    maxLength: null
  }),
  created () {
    this.page = this.values.current_page
    this.maxPage = this.values.last_page
    this.viewLength = this.values.per_page
  }
}
</script>

<style scoped>

</style>
