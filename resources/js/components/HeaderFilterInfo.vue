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
                   @click="$emit('create')"
        >
          {{ $t('header_filter.create_button') }}
        </vs-button>
      </div>
    </div>
    <div class="row mt-3 mx-0">
      <div class="col-lg-6 col-xl-4 d-flex align-items-center">
        <p class="mb-0 w-25">
          {{ $t('header_filter.length_label') }}
        </p>
        <vs-input v-model.number="length"
                  min="1"
                  max="20"
                  :value="viewLength"
                  class="w-75 ms-3"
                  dark
                  :loading="loadingValue"
                  :placeholder="$t('header_filter.length_placeholder')"
                  shadow
                  type="number"
        />
      </div>
      <div class="col-lg-6 col-xl-4 mt-3 mt-lg-0">
        <vs-input id="search"
                  v-model="value"
                  class="w-100"
                  :loading="loadingSearch"
                  dark
                  icon-after
                  :placeholder="$t('header_filter.search_placeholder')"
                  shadow
                  type="search"
        />
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

import Vue from "vue";

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
    },
    filter: {
      type: Vue,
      required: true
    }
  },
  data: () => ({
    loadingSearch: false,
    loadingValue: false,
    value: '',
    page: null,
    maxPage: null,
    length: null,
    searchable: false,
    handleValueSearch: null,
    handleLengthSearch: null
  }),
  watch: {
    'page': function (newPage) {
      this.$emit('get', {
        page: newPage,
        search: this.value
      })
    },
    'length': function () {
      this.loadingValue = true
      clearTimeout(this.handleLengthSearch)
      this.handleLengthSearch = setTimeout(this.setNewLength, 500)
    },
    'value': function () {
      this.loadingSearch = true
      clearTimeout(this.handleValueSearch)
      this.handleValueSearch = setTimeout(this.search, 500)
    }
  },
  created () {
    this.page = this.values.current_page
    this.maxPage = this.values.last_page
    this.length = this.viewLength

    this.filter.$on('updateData', this.getSuccess)
  },
  methods: {
    search () {
      if (this.page > 1) {
        this.page = 1
      } else {
        this.$emit('get', {
          page: this.page,
          search: this.value
        })
      }
    },
    setNewLength () {
      if (this.length !== '') {
        this.$emit('setViewLength', this.length)
        if (this.page !== 1) {
          this.page = 1
        } else {
          this.$emit('get', {
            page: this.page,
            search: this.value
          })
        }
      }
    },
    /**
     * @param {object} data
     * @param {number} data.last_page
     */
    getSuccess (data) {
      this.maxPage = data.last_page
      if (this.maxPage < this.page) {
        this.page = this.maxPage
      }
      this.loadingSearch = false
      this.loadingValue = false
    }
  }
}
</script>

<style scoped>

</style>
