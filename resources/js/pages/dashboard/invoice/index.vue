<template>
  <div>
    <transition appear mode="out-in" name="fade">
      <Loader v-if="$root.$loading.show" key="1" />

      <div v-else key="2">
        <HeaderFilterInfo ref="filter"
                          :filter="filter"
                          :title="$t('invoice.index.filter_title')"
                          :values="{}"
                          :view-length="viewLength"
                          @create="creating"
                          @get="get"
                          @setViewLength="setViewLength"
        />
        <div class="row mt-5 opacity-75 mx-0 d-lg-flex d-none" style="padding: 0rem 1rem;">
          <div class="col-lg-1 text-center">
            <h6 class="mb-0">
              №
            </h6>
          </div>
          <div class="col-lg-1">
            <p class="mb-0">
              Reference
            </p>
          </div>
          <div class="col-lg-2">
            <p class="mb-0 text-reset">
              Компания
            </p>
          </div>
          <div class="col-lg-4">
            <p class="mb-0 text-reset">
              Клиент
            </p>
          </div>
          <div class="col-lg-3">
            Трансфер
          </div>
        </div>
        <div class="row gy-3 mt-lg-0 mt-3">
          <div v-for="item in invoices.data" :key="item.id" class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row align-items-center mx-0">
                  <div class="col-lg-1 col-sm-1 col-2 text-center" style="cursor: pointer"
                       @click="$router.push({name: 'dashboard.invoice.show', params: { id: item.id } })"
                  >
                    <h6 class="mb-0">
                      {{ item.id }}
                    </h6>
                  </div>
                  <div class="col-lg-1 col-sm-3 col-5">
                    <p class="mb-0">
                      {{ item.company.code }}
                    </p>
                  </div>
                  <div class="col-lg-2 col-sm-3 col-5">
                    <p class="mb-0 text-reset">
                      "{{ item.company.name }}"
                    </p>
                  </div>
                  <div class="col-lg-3 col-sm-5 col-auto mt-3 mt-sm-0">
                    <p class="mb-0 text-reset">
                      {{ item.user_name }}
                    </p>
                  </div>
                  <div class="col-lg-3 col-sm-8 mt-lg-0 mt-sm-3 col-auto mt-3">
                    <p class="mb-0 text-reset">
                      <span class="opacity-50">Прибытие: </span>
                      {{ $formatDate(item.arrival_time) }} {{ $formatTime(item.arrival_time) }}
                    </p>
                    <p class="mb-0 text-reset">
                      <span class="opacity-50">Отбытие: </span>
                      {{ $formatDate(item.departure_time) }} {{ $formatTime(item.departure_time) }}
                    </p>
                  </div>

                  <div class="col-lg-2 col-sm-4 mt-lg-0 mt-sm-3 mt-3 d-inline-flex justify-content-end">
                    <vs-button border
                               circle
                               class="ms-1"
                               icon
                               primary
                               @click="openPdfNoCost(item.id)"
                    >
                      <em class="bx bxs-file-pdf h5 mb-0" />
                    </vs-button>
                    <vs-button border
                               circle
                               class="ms-2"
                               danger
                               icon
                               @click="openPdf(item.id)"
                    >
                      <em class="bx bxs-file-pdf h5 mb-0" />
                    </vs-button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
import HeaderFilterInfo from '~/components/HeaderFilterInfo.vue'
import Vue from 'vue'
import axios from "axios";

export default {
  metaInfo() {
    return {title: 'Главная страница'}
  },
  components: {
    HeaderFilterInfo
  },
  scrollToTop: true,
  data: () => ({
    title: window.config.appName,
    viewLength: 10,
    busCreatorInvoice: new Vue(),
    filter: new Vue(),
    invoices: {}
  }),
  mounted() {
    this.$root.$loading.finish()
  },
  methods: {
    /**
     * new view items count
     *
     * @param {number} newLength
     */
    setViewLength(newLength) {
      this.viewLength = newLength
    },

    creating() {
      this.$router.push({name: 'dashboard.invoice.create'})
    },
    openPdf(id) {
      window.open(window.config.pdfUrl + '/' + id, '_blank')
    },

    openPdfNoCost(id) {
      window.open(window.config.pdfUrlNoCost + '/' + id, '_blank')
    },

    /**
     * update new Date
     *
     * @param {object} settings
     * @param {number} settings.page
     * @param {string} settings.search
     */
    get(settings) {
      axios.get('/api/invoices', {
        params: {
          per_page: this.viewLength,
          page: settings.page,
          search: settings.search
        }
      })
        /**
         * @var {object} r
         * @var {object} r.data
         * @var {object} r.data.payload
         * @var {array} r.data.payload.invoices
         */
        .then(r => {
          this.invoices = r.data.payload.invoices
          this.filter.$emit('updateData', r.data.payload.invoices)
          console.log('new data', r.data)
        })

    },
  }
}
</script>

<style scoped>

</style>
