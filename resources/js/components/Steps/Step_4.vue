<template>
  <div class="card">
    <div class="card-title px-3 pb-2 pt-4">
      <h6 class="fw-light text-reset">
        Шаг 4 из 5 <span class="fw-bolder">Трансфер</span>
      </h6>
    </div>

    <div v-if="!loading" class="card-body p-0 pb-3">
      <div class="mx-3 my-2">
        <div class="row">
          <div class="col-12 col-md-4 col-lg-3">
            <vs-input
              v-model="transfer.arrival_time"
              :placeholder="$t('invoice.inputs.arrival_time')"
              type="date"
            />
          </div>
          <div class="col-12 col-md-4 col-lg-3">
            <vs-select v-model="transfer.arrival_airport_id"
                       :placeholder="$t('invoice.inputs.airport')"
                       class="mw-100"
            >
              <vs-option
                v-for="airport in airports"
                :key="airport.id"
                :label="airport.name"
                :value="airport.id"
              >
                {{ airport.name }}
              </vs-option>
            </vs-select>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-12 col-md-3 col-lg-2">
            <vs-input
              v-model="transfer.arrival_flight_code"
              :placeholder="$t('invoice.inputs.arrival_flight_code')"
            />
          </div>
        </div>

        <div class="row mt-5">
          <div class="col-12 col-md-4 col-lg-3">
            <vs-input
              v-model="transfer.departure_time"
              :placeholder="$t('invoice.inputs.departure_time')"
              type="date"
            />
          </div>
          <div class="col-12 col-md-4 col-lg-3">
            <vs-select
              v-model="transfer.departure_airport_id"
              :placeholder="$t('invoice.inputs.airport')"
              class="mw-100"
            >
              <vs-option
                v-for="airport in airports"
                :key="airport.id"
                :label="airport.name"
                :value="airport.id"
              >
                {{ airport.name }}
              </vs-option>
            </vs-select>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-12 col-md-3 col-lg-2">
            <vs-input
              v-model="transfer.departure_flight_code"
              :placeholder="$t('invoice.inputs.departure_flight_code')"
            />
          </div>
        </div>

        <div class="row mt-5">
          <div class="col-12 col-md-4 col-lg-3">
            <vs-select
              v-model="transfer.transport_id"
              :placeholder="$t('invoice.inputs.transport')"
              class="mw-100"
            >
              <vs-option v-for="transport in transports"
                         :key="transport.id"
                         :label="transport.name"
                         :value="transport.id"
              >
                {{ transport.name }}
              </vs-option>
            </vs-select>
          </div>

          <div class="col-12 col-md-4 col-lg-3">
            <vs-input
              v-model="transfer.driver_number"
              :placeholder="$t('invoice.inputs.driver_number')"
            />
          </div>
          <div class="col-12 col-md-4 col-lg-3">
            <vs-input
              v-model="transfer.driver_name"
              :placeholder="$t('invoice.inputs.driver_name')"
            />
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-12 col-md-4 col-lg-3">
            <vs-input
              v-model="transfer.passengers"
              :placeholder="$t('invoice.inputs.passengers')"
              type="number"
            />
          </div>
        </div>
        <div class="row mt-3">
          <vs-checkbox v-model="transfer.gid">
            {{ $t('invoice.inputs.gid') }}
          </vs-checkbox>
        </div>
        <div class="row justify-content-end">
          <div class="col-auto">
            <vs-button
              :disabled="disabledNext"
              @click="next"
            >
              {{ $t('invoice.buttons.next') }}
            </vs-button>
          </div>
        </div>
      </div>
    </div>

    <div v-else class="card-body">
      <Loader />
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Loader from "~/components/Loader.vue"

export default {
  name: "Step4",
  comments: {
    Loader
  },
  props: {
    transferData: {
      required: false,
      type: Object,
      default: null
    }
  },
  data: () => ({
    airports: [],
    transports: [],
    loading: true,
    transfer: {
      arrival_time: '',
      transport_id: '',
      arrival_airport_id: '',
      arrival_flight_code: '',
      departure_time: '',
      departure_airport_id: '',
      departure_flight_code: '',
      driver_number: '',
      driver_name: '',
      passengers: '',
      gid: false
    }
  }),
  computed: {
    disabledNext() {
      let status = false

      Object.entries(this.transfer).forEach(([key, value]) => {
        console.log(`${key} ${value}`)
        if (value === '') {
          status = true
        }
      });

      return status
    }
  },
  async mounted() {

    if (this.transferData !== null) {
      this.transfer = this.transferData
    }

    await axios.get('/api/airports')
      .then(r => {
        if (r.data.success) {
          this.airports = r.data.payload.airports
        } else {
          this.$router.push({name: 'dashboard.invoice.index'})
        }
      })
      .catch(e => {
        this.$router.push({name: 'dashboard.invoice.index'})
      })
    await axios.get("/api/transports")
      .then(r => {
        if (r.data.success) {
          this.transports = r.data.payload.transports
          this.loading = false
        } else {
          this.$router.push({name: 'dashboard.invoice.index'})
        }
      })
      .catch(e => {
        this.$router.push({name: 'dashboard.invoice.index'})
      })
  },
  methods: {
    next() {
      this.$parent.next(() => {
        this.$parent.form.transfer = this.transfer
      })
    }
  }
}
</script>

<style scoped>

</style>