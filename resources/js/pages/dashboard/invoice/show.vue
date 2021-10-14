<template>
  <div>
    <transition name="fade" mode="out-in" appear>
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
                      Информация о клиенте
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
                        Данные отелей
                      </span>
                      <span v-else>
                        Данные отеля
                      </span>
                    </h5>
                  </div>
                  <div class="card-body px-3 pt-0">
                    <!-- Hotel name -->
                    <div v-for="(booking, index) in invoice.bookings" :key="booking.id" class="row">
                      <div class="col-6">
                        <p class="opacity-50 fs-6 mb-0">
                          Отель
                        </p>
                        <p class="fw-500">
                          {{ booking.hotel.name }}
                        </p>
                      </div>
                      <div class="col-6">
                        <p class="opacity-50 fs-6 mb-0">
                          Комната
                        </p>
                        <p class="fw-500">
                          {{ booking.room.name }}
                        </p>
                      </div>

                      <div class="col-12">
                        <div class="row justify-content-between">
                          <div class="col-4">
                            <div class="px-2 py-1 booking_badge mb-2">
                              <span class="small">Кол-во</span>
                              <p class="mb-0">{{ booking.count }}</p>
                            </div>
                          </div>

                          <div class="col-4">
                            <div class="px-2 py-1 booking_badge mb-2">
                              <span class="small">Взрослые</span>
                              <p class="mb-0">{{ booking.adults }}</p>
                            </div>
                          </div>

                          <div class="col-4">
                            <div class="px-2 py-1 booking_badge mb-2">
                              <span class="small">Дети</span>
                              <p class="mb-0">{{ booking.children }}</p>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-6">
                        <p class="opacity-50 fs-6 mb-0">
                          Чек ин
                        </p>
                        <p class="fw-500">
                          {{ $formatDate(booking.check_in) }}
                        </p>
                      </div>
                      <div class="col-6">
                        <p class="opacity-50 fs-6 mb-0">
                          Чек аут
                        </p>
                        <p class="fw-500">
                          {{ $formatDate(booking.check_out) }}
                        </p>
                      </div>

                      <div class="col-6">
                        <p class="opacity-50 fs-6 mb-0">
                          Номер брони
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
                          Хотлайн
                        </p>
                        <p class="fw-500">
                          + 7 (777) 777-77-77
                        </p>
                      </div>
                      <div class="col-6">
                        <p class="fw-bold fs-6">
                          Цена
                        </p>
                        <p class="fw-500">
                          10 000
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
                      Трансфер
                    </h5>
                  </div>
                  <div class="card-body px-3 pt-0">
                    <div class="row">
                      <div class="col-4">
                        <p class="opacity-50 fs-6 mb-0">
                          Время прилёта
                        </p>
                        <p class="fw-500">
                          {{ $formatDate(invoice.arrival_time) }} {{ $formatTime(invoice.arrival_time) }}
                        </p>
                      </div>
                      <div class="col-4">
                        <p class="opacity-50 fs-6 mb-0">
                          Куда
                        </p>
                        <p class="fw-500">
                          {{ invoice.arrival_airport.name }}
                        </p>
                      </div>
                      <div class="col-4">
                        <p class="opacity-50 fs-6 mb-0">
                          Код рейса
                        </p>
                        <p class="fw-500">
                          {{ invoice.arrival_flight_code }}
                        </p>
                      </div>

                      <div class="col-4">
                        <p class="opacity-50 fs-6 mb-0">
                          Время отлёта
                        </p>
                        <p class="fw-500">
                          {{ $formatDate(invoice.departure_time) }} {{ $formatTime(invoice.departure_time) }}
                        </p>
                      </div>
                      <div class="col-4">
                        <p class="opacity-50 fs-6 mb-0">
                          Откуда
                        </p>
                        <p class="fw-500">
                          {{ invoice.departure_airport.name }}
                        </p>
                      </div>
                      <div class="col-4">
                        <p class="opacity-50 fs-6 mb-0">
                          Код рейса
                        </p>
                        <p class="fw-500">
                          {{ invoice.departure_flight_code }}
                        </p>
                      </div>

                      <div class="col-4">
                        <p class="opacity-50 fs-6 mb-0">
                          Транспорт
                        </p>
                        <p class="fw-500">
                          {{ invoice.transport.name }}
                        </p>
                      </div>
                      <div class="col-4">
                        <p class="opacity-50 fs-6 mb-0">
                          Кол-во мест
                        </p>
                        <p class="fw-500">
                          {{ invoice.passengers }}
                        </p>
                      </div>
                      <div class="col-4">
                        <p class="opacity-50 fs-6 mb-0">
                          Гид
                        </p>
                        <p class="fw-500">
                          {{ invoice.gid ? 'Да' : 'Нет' }}
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
                      Расписание
                    </h5>
                  </div>
                  <div class="card-body px-3 pt-0">
                    <div class="row">
                      <div v-for="(day, index) in invoice.days" :key="day.id" class="col-4">
                        <p class="opacity-50 fs-6 mb-0">
                          День {{ index + 1 }}
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
                <vs-button success
                           class="w-100"
                           @click="edit"
                >
                  {{ $t('form.edit') }}
                </vs-button>
              </div>
              <div class="col-12">
                <vs-button danger
                           class="w-100"
                           @click="pdf"
                >
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
export default {
  name: "Show",
  components: {
    Loader
  },
  data: () => ({
    loading: true,
    invoice: null
  }),
  computed: {
    id () {
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
      this.$router.push({name: 'dashboard.invoice.edit', params:{id: this.id}})
    },
    pdf() {
      window.open(window.config.pdfUrl + '/' + this.id, '_blank')
    }
  }
}
</script>

<style scoped>

</style>