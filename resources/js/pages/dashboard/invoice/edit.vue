<template>
  <transition appear mode="out-in" name="fade">
    <Loader v-if="$root.$loading.show" key="1" />

    <div v-else id="groupCollapse" key="2">
      <div class="row justify-content-center mb-5">
        <div class="col-12 col-mg-8 col-lg justify-content-center">
          <Stepper :bus="bus" :count="6" :successfully="true" />
        </div>
      </div>

      <div class="row mx-0">
        <div class="col-12">
          <transition appear mode="out-in" name="slide-fade">
            <Step_1 v-if="stepForm === 1" key="1" :companies="companies" />
            <Step_2 v-if="stepForm === 2" key="2" />
            <Step_3 v-if="stepForm === 3" key="3" :hotels-own="form.hotels" />
            <Step_4 v-if="stepForm === 4" key="4" :transfer-data="form.transfer" />
            <Step_5 v-if="stepForm === 5" key="5" :sample="{days: form.sample}" />
            <Step_6 v-if="stepForm === 6" key="6" :hotline="form.hotline" />
          </transition>
        </div>
      </div>
    </div>
  </transition>
</template>
<script>
import Vue from 'vue'
import axios from 'axios'
import Stepper from '~/components/Stepper.vue'
import Step_1 from "~/components/Steps/Step_1.vue"
import Step_2 from "~/components/Steps/Step_2.vue"
import Step_3 from "~/components/Steps/Step_3.vue"
import Step_4 from "~/components/Steps/Step_4.vue"
import Step_5 from "~/components/Steps/Step_5.vue"
import Step_6 from "~/components/Steps/Step_6.vue";
import Loader from "~/components/Loader.vue"
import moment from 'moment'

export default {
  name: "Create",
  components: {
    Stepper,
    Step_1,
    Step_2,
    Step_3,
    Step_4,
    Step_5,
    Step_6,
    Loader
  },
  data: () => ({
    stepForm: 1,
    bus: new Vue(),
    companies: [],
    form: {
      company: '',
      user: {
        name: '',
        nationality: ''
      },
      hotels: [],
      transfer: null,
      sample: null,
      hotline: {}
    }
  }),
  computed: {
    id() {
      return this.$route.params.id
    },
    step: {
      get: function () {
        return this.stepForm
      },

      set: function (value) {
        console.log("Пришло на set", value)
        if (value < 0 || value > 6) {
          this.$vs.notification({
            duration: 2000,
            sticky: true,
            position: 'top-right',
            color: 'danger',
            title: 'Ошибка!',
            text: 'Вы ушли за границу данных'
          })
        } else {
          this.stepForm = value
          console.log("Сохранило в set", value)
        }
      }
    },

    companyError() {
      if (this.form.company === '' || this.form.company === null) {
        return this.$t('invoice.errors.company')
      }

      return false
    },

    userNameError() {
      if (this.form.user.name === '' || this.form.user.name === null) {
        return this.$t('invoice.errors.user.name')
      }

      return false
    },
    userNationalityError() {
      if (this.form.user.nationality === '' || this.form.user.nationality === null) {
        return this.$t('invoice.errors.user.nationality')
      }

      return false
    }
  },
  async mounted() {

    this.bus.$on('changeStep', this.changeStep)

    await axios.get('/api/companies')
      .then(r => {
        this.companies = r.data.payload.companies
      })
      .catch(e => {
        this.$vs.notification({
          title: this.$t('notification.get.danger.title'),
          text: this.$t('notification.get.danger.text')
        })
      })

    await axios.get('/api/invoices/' + this.id)
      .then(r => {
        if (r.data.success) {
          // form: {
          //   company: '',
          //     user: {
          //     name: '',
          //       nationality: ''
          //   },
          //   hotels: [],
          //     transfer: null,
          //     sample: null
          // }
          let invoice = r.data.payload.invoice

          invoice.bookings.forEach(b => {
            b.check_in = moment(b.check_in).format('YYYY-MM-DD')
            b.check_out = moment(b.check_out).format('YYYY-MM-DD')
          })

          this.form = {
            company: invoice.company.id,
            user: {
              name: invoice.user_name,
              nationality: invoice.user_nationality,
            },
            hotels: invoice.bookings,
            transfer: {
              arrival_time: moment(invoice.arrival_time).format('YYYY-MM-DD'),
              transport_id: invoice.transport.id,
              arrival_airport_id: invoice.arrival_airport.id,
              arrival_flight_code: invoice.arrival_flight_code,
              departure_time: moment(invoice.departure_time).format('YYYY-MM-DD'),
              departure_airport_id: invoice.departure_airport.id,
              departure_flight_code: invoice.departure_flight_code,
              driver_number: invoice.driver_number,
              driver_name: invoice.driver_name,
              passengers: invoice.passengers,
              gid: invoice.gid,
            },
            sample: invoice.days,
            hotline: invoice.hotline
          }
        }
      })

    await this.$root.$loading.finish()
  },
  methods: {
    changeStep(index) {
      console.log('changeStep', index)
      this.step = index
    },

    notifyError() {
      this.$vs.notification({
        duration: 2000,
        sticky: true,
        position: 'top-right',
        color: 'danger',
        title: this.$t('invoice.errors.validateInputs.title'),
        text: this.$t('invoice.errors.validateInputs.text')
      })
    },

    next(callback) {
      if (this.step === 1) {
        if (this.companyError) {
          this.notifyError()

          return false
        }
        this.bus.$emit('setStatus', {
          step: this.step,
          status: 'success'
        })
      } else if (this.step === 2) {
        if (this.userNationalityError || this.userNameError) {
          this.notifyError()

          return false
        }
        this.bus.$emit('setStatus', {
          step: this.step,
          status: 'success'
        })
      } else if (this.step === 3) {
        this.bus.$emit('setStatus', {
          step: this.step,
          status: 'success'
        })
      } else if (this.step === 4) {
        this.bus.$emit('setStatus', {
          step: this.step,
          status: 'success'
        })
      } else if (this.step === 5) {
        this.bus.$emit('setStatus', {
          step: this.step,
          status: 'success'
        })
      } else if (this.step === 6) {
        this.createInvoice()
      }
      if (typeof callback === 'function') {
        callback()
      }
    },

    createInvoice() {
      this.loading = true
      axios.put("/api/invoices/" + this.id, {
        ...this.form
      })
        .then(r => {
          if (r.data.success) {
            this.$router.push({name: 'dashboard.invoice.show', params: {id: r.data.payload.invoice.id}})
          } else {
            this.notifyError()
          }
        })
        .catch(e => {
          if (e.response.status === 422) {
            this.$vs.notification({
              title: 'Ошибка',
              text: e.response.data.message
            })

            Object.keys(e.response.data.errors).forEach((key) => {
              this.$vs.notification({
                title: key.capitalize(),
                text: e.response.data.errors[key]
              })
            })
          } else if (e.response.status === 404) {
            this.$vs.notification({
              title: 'Ошибка',
              text: e.response.data.message
            })
          }
        })
    }
  }
}
</script>

<style scoped>
/* Анимации появления и исчезновения могут иметь */
/* различные продолжительности и динамику.       */
.slide-fade-enter-active {
  transition: all .3s ease;
}

.slide-fade-leave-active {
  transition: all .3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}

.slide-fade-enter, .slide-fade-leave-to
  /* .slide-fade-leave-active до версии 2.1.8 */
{
  transform: translateX(10px);
  opacity: 0;
}
</style>