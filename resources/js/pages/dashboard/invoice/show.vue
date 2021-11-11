<template>
  <div>
    <transition appear mode="out-in" name="fade">
      <Loader v-if="loading" key="1" />

      <div v-else key="2">
        <div class="row">
          <div class="col-12 col-md-10 col-lg-6 col-xl-4">
            <div class="row gy-4 p-0 m-0">
              <!-- Name user -->
              <div class="col-12 p-0">
                <div class="card">
                  <div class="card-title px-3 pt-3">
                    <h5 class="text-reset">
                      {{ $t('invoice.show.title.info_client') }}
                    </h5>
                  </div>
                  <div class="card-body px-3 pt-0">
                    <div class="row">
                      <div class="col-6">
                        <p class="opacity-50 fs-6 mb-0">
                          {{ $t('invoice.inputs.user.name') }}
                        </p>
                        <p class="fw-500">
                          {{ invoice.user_name }}
                        </p>
                      </div>
                      <div class="col-6">
                        <p class="opacity-50 fs-6 mb-0">
                          {{ $t('invoice.inputs.user.nationality') }}
                        </p>
                        <p class="fw-500">
                          {{ invoice.user_nationality }}
                        </p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <p class="opacity-50 fs-6 mb-0">
                          {{ $t('invoice.inputs.company_name') }}
                        </p>
                        <p class="fw-500">
                          {{ invoice.company.name }}
                        </p>
                      </div>
                      <div class="col-6">
                        <p class="opacity-50 fs-6 mb-0">
                          {{ $t('invoice.inputs.company_ref') }}
                        </p>
                        <p class="fw-500">
                          {{ invoice.company.code }}
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Name user -->

              <!-- Hotels -->
              <div class="col-12 p-0">
                <div class="card">
                  <div class="card-title px-3 pt-3">
                    <h5 class="text-reset">
                      <span v-if="invoice.bookings.length > 1">
                        {{ $t('invoice.show.title.info_hotels') }}
                      </span>
                      <span v-else>
                        {{ $t('invoice.show.title.info_hotel') }}
                      </span>
                    </h5>
                  </div>
                  <div class="card-body px-3 pt-0">
                    <!-- Hotel name -->
                    <div v-for="(booking, index) in invoice.bookings" :key="booking.id" class="row">
                      <div class="col-6">
                        <p class="opacity-50 fs-6 mb-0">
                          {{ $t('invoice.show.hotel') }}
                        </p>
                        <p class="fw-500">
                          {{ booking.hotel.name }}
                        </p>
                      </div>
                      <div class="col-6">
                        <p class="opacity-50 fs-6 mb-0">
                          {{ $t('invoice.show.room') }}
                        </p>
                        <p class="fw-500">
                          {{ booking.room.name }}
                        </p>
                      </div>

                      <div class="col-12">
                        <div class="row justify-content-between">
                          <div class="col-4">
                            <div class="px-2 py-1 booking_badge mb-2">
                              <span class="small">{{ $t('invoice.show.count') }}</span>
                              <p class="mb-0">
                                {{ booking.count }}
                              </p>
                            </div>
                          </div>

                          <div class="col-4">
                            <div class="px-2 py-1 booking_badge mb-2">
                              <span class="small">{{ $t('invoice.show.adults') }}</span>
                              <p class="mb-0">
                                {{ booking.adults }}
                              </p>
                            </div>
                          </div>

                          <div class="col-4">
                            <div class="px-2 py-1 booking_badge mb-2">
                              <span class="small">{{ $t('invoice.show.children') }}</span>
                              <p class="mb-0">
                                {{ booking.children }}
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-6">
                        <p class="opacity-50 fs-6 mb-0">
                          {{ $t('invoice.show.check_in') }}
                        </p>
                        <p class="fw-500">
                          {{ $formatDate(booking.check_in) }}
                        </p>
                      </div>
                      <div class="col-6">
                        <p class="opacity-50 fs-6 mb-0">
                          {{ $t('invoice.show.check_out') }}
                        </p>
                        <p class="fw-500">
                          {{ $formatDate(booking.check_out) }}
                        </p>
                      </div>

                      <div class="col-6">
                        <p class="opacity-50 fs-6 mb-0">
                          {{ $t('invoice.show.number_booking') }}
                        </p>
                        <p class="fw-500">
                          {{ booking.booking_number }}
                        </p>
                      </div>
                      <div class="col-6">
                        <p class="opacity-50 fs-6 mb-0">
                          Meal plan
                        </p>
                        <p class="fw-500">
                          {{ booking.bb }}
                        </p>
                      </div>
                      <div v-if="invoice.bookings.length > 1 && index + 1 !== invoice.bookings.length" class="col-12">
                        <div class="row justify-content-center">
                          <div class="col-11">
                            <hr>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Hotel name -->
                  </div>
                </div>
              </div>
              <!-- End Hotels -->

              <!--              Hot line-->
              <div class="col-12 p-0">
                <div class="card">
                  <div class="card-body px-3">
                    <div class="row">
                      <div class="col-6">
                        <p class="fw-bold fs-6">
                          {{ $t('invoice.show.title.hotline') }}
                        </p>
                        <p class="fw-500">
                          {{ invoice.hotline.phone }}
                        </p>
                      </div>
                      <div class="col-6">
                        <p class="fw-bold fs-6">
                          {{ $t('invoice.show.title.cost') }}
                        </p>
                        <p class="fw-500">
                          {{ invoice.hotline.cost }} $
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--              End hot line-->
            </div>
          </div>

          <div class="col-12 col-md-10 col-lg-6 col-xl-6">
            <div class="row gy-4  p-0 m-0">
              <div class="col-12 p-0">
                <div class="card">
                  <div class="card-title px-3 pt-3">
                    <h5 class="text-reset">
                      {{ $t('invoice.show.title.transfer') }}
                    </h5>
                  </div>
                  <div class="card-body px-3 pt-0">
                    <div class="row">
                      <div class="col-4">
                        <p class="opacity-50 fs-6 mb-0">
                          {{ $t('invoice.show.arrival_time') }}
                        </p>
                        <p class="fw-500">
                          {{ $formatDate(invoice.arrival_time) }} {{ $formatTime(invoice.arrival_time) }}
                        </p>
                      </div>
                      <div class="col-4">
                        <p class="opacity-50 fs-6 mb-0">
                          {{ $t('invoice.show.where') }}
                        </p>
                        <p class="fw-500">
                          {{ invoice.arrival_airport.name }}
                        </p>
                      </div>
                      <div class="col-4">
                        <p class="opacity-50 fs-6 mb-0">
                          {{ $t('invoice.show.flight_code') }}
                        </p>
                        <p class="fw-500">
                          {{ invoice.arrival_flight_code }}
                        </p>
                      </div>

                      <div class="col-4">
                        <p class="opacity-50 fs-6 mb-0">
                          {{ $t('invoice.show.departure_time') }}
                        </p>
                        <p class="fw-500">
                          {{ $formatDate(invoice.departure_time) }} {{ $formatTime(invoice.departure_time) }}
                        </p>
                      </div>
                      <div class="col-4">
                        <p class="opacity-50 fs-6 mb-0">
                          {{ $t('invoice.show.from') }}
                        </p>
                        <p class="fw-500">
                          {{ invoice.departure_airport.name }}
                        </p>
                      </div>
                      <div class="col-4">
                        <p class="opacity-50 fs-6 mb-0">
                          {{ $t('invoice.show.flight_code') }}
                        </p>
                        <p class="fw-500">
                          {{ invoice.departure_flight_code }}
                        </p>
                      </div>

                      <div class="col-4">
                        <p class="opacity-50 fs-6 mb-0">
                          {{ $t('invoice.show.transport') }}
                        </p>
                        <p class="fw-500">
                          {{ invoice.transport.name }}
                        </p>
                      </div>
                      <div class="col-4">
                        <p class="opacity-50 fs-6 mb-0">
                          {{ $t('invoice.show.count_sits') }}
                        </p>
                        <p class="fw-500">
                          {{ invoice.passengers }}
                        </p>
                      </div>
                      <div class="col-4">
                        <p class="opacity-50 fs-6 mb-0">
                          {{ $t('invoice.show.gid') }}
                        </p>
                        <p class="fw-500">
                          {{ invoice.gid ? 'Yas' : 'No' }}
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12 p-0">
                <div class="card">
                  <div class="card-title px-3 pt-3">
                    <h5 class="text-reset">
                      {{ $t('invoice.show.title.schedule') }}
                    </h5>
                  </div>
                  <div class="card-body px-3 pt-0">
                    <div class="row">
                      <div v-for="(day, index) in invoice.days" :key="day.id" class="col-4">
                        <p class="opacity-50 fs-6 mb-0">
                          {{ $t('invoice.show.day') }} {{ index + 1 }}
                        </p>
                        <p class="fw-500">
                          <span v-if="day.free">
                            Free day
                          </span>
                          <span v-else>
                            {{ day.resort.name }}
                          </span>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 mt-4 col-md-10 col-lg-auto col-xl-2">
            <div class="row">
              <div class="col-12">
                <vs-button class="w-100"
                           success
                           @click="edit"
                >
                  {{ $t('form.edit') }}
                </vs-button>
              </div>
              <div class="col-12">
                <vs-button class="w-100"
                           danger
                           @click="pdf"
                >
                  <em class="bx bxs-file-pdf h5 m-0" />
                </vs-button>
              </div>
              <div class="col-12">
                <vs-button class="w-100" primary @click="pdfNoCost">
                  <em class="bx bxs-file-pdf h5 m-0" />
                </vs-button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
import Loader from "~/components/Loader.vue"
import axios from "axios";
import i18n from "~/plugins/i18n";

export default {
  name: "Show",
  components: {
    Loader
  },
  metaInfo() {
    return {title: this.$t('invoice.index.title'),}
  },
  data: () => ({
    title: i18n.t('invoice.index.title'),
    loading: true,
    invoice: null
  }),
  computed: {
    id() {
      return this.$route.params.id
    }
  },
  mounted() {
    axios.get("/api/invoices/" + this.id)
      .then(r => {
        if (r.data.success)
          this.invoice = r.data.payload.invoice
        else
          this.$router.push({name: 'dashboard.invoice.index'})

        this.loading = false
        this.$root.$loading.finish()
      })
      .catch(e => {
        if (e.response.status === 404) {
          console.log(e.response.data)
          this.$vs.notification({
            title: 'Ошибка',
            text: e.response.data.message
          })

          this.$router.push({name: 'dashboard.invoice.index'})
        }
      })
  },
  methods: {
    edit() {
      this.$router.push({name: 'dashboard.invoice.edit', params: {id: this.id}})
    },
    pdf() {
      window.open(window.config.pdfUrl + '/' + this.id, '_blank')
    },
    pdfNoCost() {
      window.open(window.config.pdfUrlNoCost + '/' + this.id, '_blank')
    }
  }
}
</script>

<style scoped>

</style>