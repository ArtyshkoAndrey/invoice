<template>
  <div class="card">
    <div class="card-title px-3 pb-2 pt-4">
      <h6 class="fw-light text-reset">
        Шаг 3 из 5 <span class="fw-bolder">Данные отеля</span>
      </h6>
    </div>

    <div v-if="!loading" class="card-body p-0 pb-3">
      <div class="mx-3 my-2">
        <div v-for="(hotel, index) in h" class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-4">
                <vs-select v-model="hotel.hotel_id"
                           :placeholder="$t('invoice.inputs.hotel_name')"
                           class="mw-100"
                >
                  <vs-option v-for="some_hotel in hotels"
                             :key="some_hotel.id"
                             :value="some_hotel.id"
                             :label="some_hotel.name"
                  >
                    {{ some_hotel.name }}
                  </vs-option>
                </vs-select>
              </div>
              <div class="d-none d-md-block col-auto">
                <vs-button danger
                           @click="removeHotel(index)"
                >
                  {{ $t('form.delete') }}
                </vs-button>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-12 col-md-6 col-lg-3">
                <vs-select v-model="hotel.room_type_id"
                           :placeholder="$t('invoice.inputs.room_type')"
                           class="mw-100"
                >
                  <vs-option v-for="room in rooms"
                             :key="room.id"
                             :value="room.id"
                             :label="room.name"
                  >
                    {{ room.name }}
                  </vs-option>
                </vs-select>
              </div>
              <div class="col col-md-6 col-lg-3">
                <vs-input v-model.number="hotel.count"
                          type="number"
                          inputmode="numeric"
                          pattern="[0-9]*"
                          :placeholder="$t('invoice.inputs.countable')"
                />
              </div>
              <div class="col-auto">
                <vs-checkbox v-model="hotel.extra_bed">
                  {{ $t('invoice.inputs.extra_bed') }}
                </vs-checkbox>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-12 col-md-4 col-lg-3">
                <vs-input v-model.number="hotel.adults"
                          type="number"
                          inputmode="numeric"
                          pattern="[0-9]*"
                          :placeholder="$t('invoice.inputs.adults')"
                />
              </div>
              <div class="col-12 col-md-4 col-lg-3">
                <vs-input v-model.number="hotel.children"
                          type="number"
                          inputmode="numeric"
                          pattern="[0-9]*"
                          :placeholder="$t('invoice.inputs.children')"
                />
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-12 col-md-6 col-lg-4">
                <vs-select v-model="hotel.bb"
                           :placeholder="$t('invoice.inputs.bb')"
                >
                  <vs-option value="BB" label="BB">
                    {{ $t('invoice.inputs.bb') }}
                  </vs-option>
                </vs-select>
              </div>
            </div>
            <div class="row mt-5 mb-4">
              <div class="col-12">
                <h6 class="text-reset">
                  {{ $t('invoice.create.step_3.date_title') }}
                </h6>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-6 col-md-4 col-lg-3">
                <vs-input v-model="hotel.check_in"
                          type="date"
                          :label="$t('invoice.inputs.check_in')"
                />
              </div>
              <div class="col-6 col-md-4 col-lg-3">
                <vs-input v-model="hotel.check_out"
                          type="date"
                          :label="$t('invoice.inputs.check_out')"
                />
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-12 col-md-4 col-lg-3">
                <vs-input v-model="hotel.booking_number"
                          :placeholder="$t('invoice.inputs.booking_number')"
                />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="d-block d-md-none col-12">
              <vs-button danger @click="removeHotel(index)">
                {{ $t('form.delete') }}
              </vs-button>
            </div>
          </div>
          <div v-if="h.length > 1 && index !== h.length - 1 " class="col-12">
            <hr>
          </div>
        </div>

        <div class="row justify-content-start mt-5">
          <div class="col-auto">
            <vs-button success @click="createNewHotel">
              {{ $t('invoice.buttons.add_hotel') }}
            </vs-button>
          </div>
        </div>

        <div class="row justify-content-end">
          <div class="col-auto">
            <vs-button :disabled="disabledNext" @click="next">
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
import Loader from "~/components/Loader"
import axios from "axios"
export default {
  name: "Step3",
  components: {
    Loader
  },
  props: {
    hotelsOwn: {
      type: Array,
      require: false,
      default: null
    }
  },
  data: () =>({
    hotels: [],
    rooms: [],
    loading: true,
    h: []
  }),
  computed: {
    disabledNext () {
      let status = false

      this.h.length === 0 ? status = true : null;

      this.h.forEach(hotel => {
        if (hotel.hotel_id === '' ||
            hotel.room_type_id === '' ||
            hotel.count === '' ||
            hotel.adults === '' ||
            hotel.children === '' ||
            hotel.check_in === '' ||
            hotel.check_out === '' ||
            hotel.booking_number === ''
        ) {
          status = true
        }
      })

      return status
    }
  },
  async mounted () {
    await this.getHotels()
    await this.getRooms()
    if (this.hotelsOwn instanceof Array) {
      if (this.hotelsOwn.length > 0) {
        this.h = this.hotelsOwn
        this.loading = false
      } else {
        await this.createNewHotel()
      }
    } else {
      await this.createNewHotel()
    }
  },
  methods: {
    /**
     * Get all Hotels in project
     *
     * @returns {Promise<void>}
     */
    async getHotels () {
      await axios.get("/api/hotels")
        .then (r => {
          if (r.data.success) {
            this.hotels = r.data.payload.hotels
          } else {
            this.$vs.notification({
              title: this.$t('notification.get.danger.title'),
              text: this.$t('notification.get.danger.text')
            })
            this.$router.push({name: 'dashboard.invoices.index'})
          }
        })
        .catch(e => {
          this.$vs.notification({
            title: this.$t('notification.get.danger.title'),
            text: this.$t('notification.get.danger.text')
          })
        })
    },
    /**
     * get all Rooms in project
     *
     * @returns {Promise<void>}
     */
    async getRooms () {
      await axios.get("/api/room_types")
        .then (r => {
          if (r.data.success) {
            this.rooms = r.data.payload.room_types
          } else {
            this.$vs.notification({
              title: this.$t('notification.get.danger.title'),
              text: this.$t('notification.get.danger.text')
            })
            this.$router.push({name: 'dashboard.invoices.index'})
          }
        })
        .catch(e => {
          this.$vs.notification({
            title: this.$t('notification.get.danger.title'),
            text: this.$t('notification.get.danger.text')
          })
        })
    },

    /**
     * Create a new empty Booking
     *
     */
    createNewHotel () {
      this.h.push({
        hotel_id: '',
        room_type_id: '',
        count: '',
        extra_bed: false,
        adults: '',
        children: '',
        bb: 'BB',
        check_in: '',
        check_out: '',
        booking_number: ''
      })

      this.loading = false
    },

    /**
     * Remove one Booking
     *
     * @param index
     */
    removeHotel (index) {
      this.h.splice(index, 1)
    },

    next () {
      this.$parent.next(() => {
        this.$parent.form.hotels = this.h
      })
    }
  }
}
</script>

<style scoped>

</style>