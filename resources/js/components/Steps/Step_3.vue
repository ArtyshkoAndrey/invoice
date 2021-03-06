<template>
  <div class="card">
    <div class="card-title px-3 pb-2 pt-4">
      <h6 class="fw-light text-reset">
        {{ $t('invoice.create.words.step') }} 3 {{ $t('invoice.create.words.in') }} 6 <span
          class="fw-bolder"
        >{{ $t('invoice.create.step_3.title') }}</span>
      </h6>
    </div>

    <div v-if="!loading" class="card-body p-0 pb-3">
      <div class="mx-3 my-2">
        <div v-for="(hotel, index) in h" :key="index" class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-4">
                <vs-select v-model="hotel.hotel_id"
                           :placeholder="$t('invoice.inputs.hotel_name')"
                           class="mw-100"
                >
                  <vs-option v-for="some_hotel in hotels"
                             :key="some_hotel.id"
                             :label="some_hotel.name"
                             :value="some_hotel.id"
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
                             :label="room.name"
                             :value="room.id"
                  >
                    {{ room.name }}
                  </vs-option>
                </vs-select>
              </div>
              <div class="col col-md-6 mt-2 mt-md-0 col-lg-3">
                <vs-input v-model.number="hotel.count"
                          :placeholder="$t('invoice.inputs.countable')"
                          inputmode="numeric"
                          pattern="[0-9]*"
                          type="number"
                />
              </div>
              <div class="col-auto mt-2 mt-md-0">
                <vs-checkbox v-model="hotel.extra_bed">
                  {{ $t('invoice.inputs.extra_bed') }}
                </vs-checkbox>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-12 mt-2 mt-md-0 col-md-4 col-lg-3">
                <vs-input v-model.number="hotel.adults"
                          :placeholder="$t('invoice.inputs.adults')"
                          inputmode="numeric"
                          pattern="[0-9]*"
                          type="number"
                />
              </div>
              <div class="col-12 col-md-4 mt-2 mt-md-0 col-lg-3">
                <vs-input v-model.number="hotel.children"
                          :placeholder="$t('invoice.inputs.children')"
                          inputmode="numeric"
                          pattern="[0-9]*"
                          type="number"
                />
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-12 col-md-6 col-lg-4">
                <vs-select v-model="hotel.bb"
                           :placeholder="$t('invoice.inputs.bb')"
                >
                  <vs-option label="BB" value="BB">
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
                          :label="$t('invoice.inputs.check_in')"
                          type="datetime-local"
                />
              </div>
              <div class="col-6 col-md-4 col-lg-3">
                <vs-input v-model="hotel.check_out"
                          :label="$t('invoice.inputs.check_out')"
                          type="datetime-local"
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
  data: () => ({
    hotels: [],
    rooms: [],
    loading: true,
    h: []
  }),
  computed: {
    disabledNext() {
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
  async mounted() {
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
    async getHotels() {
      await axios.get("/api/hotels")
        .then(r => {
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
    async getRooms() {
      await axios.get("/api/room_types")
        .then(r => {
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
    createNewHotel() {
      this.h.push({
        hotel_id: '',
        room_type_id: '',
        count: '',
        extra_bed: false,
        adults: '1',
        children: '0',
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
    removeHotel(index) {
      this.h.splice(index, 1)
    },

    next() {
      this.$parent.next(() => {
        this.$parent.form.hotels = this.h
      })
    }
  }
}
</script>

<style scoped>

</style>