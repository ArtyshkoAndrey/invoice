<!--
  - Copyright (c) 2021.
  - This code is the property of the Fulliton developer.
  - Write all questions and suggestions on the Vkontakte social network https://vk.com/fulliton
  -->

<template>

  <div>
    <div class="row align-items-center justify-content-between mx-0">
      <div class="col-md-6 col-sm-10 col-12">
        <h4>{{ title }}</h4>
      </div>
      <div class="col-md-auto col-12">
        <vs-button block
                   class="px-5 py-1 fw-bold"
                   flat
                   success
        >
          {{ $t('header_filter.create_button') }}
        </vs-button>
      </div>
    </div>
    <div class="row mt-3 mx-0">
      <div class="col-lg-6 col-xl-4 d-flex align-items-center">
        <p class="mb-0">
          {{ $t('header_filter.length_label') }}
        </p>
        <vs-input v-model.number="length"
                  :value="viewLength"
                  class="w-auto ms-3"
                  dark
                  :placeholder="$t('header_filter.length_placeholder')"
                  shadow
                  type="number"
        />
      </div>
      <div class="col-lg-6 col-xl-4 mt-3 mt-lg-0">
        <vs-input v-model="value"
                  :loading="loading"
                  dark
                  icon-after
                  :placeholder="$t('header_filter.search_placeholder')"
                  shadow
                  @change="value !== '' ? loading = true : loading = false"
                  @click-icon="loading = true"
        >
          <template #icon>
            <i v-if="!loading" class="bx bx-search" aria-hidden="true" />
          </template>
        </vs-input>
      </div>
      <div class="col-lg-12 col-xl-4 mt-3 mt-xl-0 justify-content-center d-block justify-content-xl-end d-xl-flex">
        <transition name="slide-fade" mode="out-in">
          <vs-pagination v-if="maxPage > 1" v-model="page" :length="maxPage" :max="5" dark />
        </transition>
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
    },
    viewLength: {
      type: Number,
      required: true
    },
    title: {
      type: String,
      required: true
    }
  },
  data: () => ({
    loading: false,
    value: '',
    page: null,
    maxPage: null,
    length: null
  }),
  watch: {
    'page': function (newPage) {
      this.$emit('get', newPage)
    },
    'length': function (newLength) {
     if (newLength !== '') {
       this.$emit('setViewLength', newLength)
       if (this.page !== 1) {
         this.page = 1
       } else {
         this.$emit('get', this.page)
       }
     }
    }
  },
  created () {
    this.page = this.values.current_page
    this.maxPage = this.values.last_page
    this.length = this.viewLength
  }
}
</script>

<style scoped>

</style>
