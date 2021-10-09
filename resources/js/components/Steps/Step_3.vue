<template>
  <div class="card">
    <div class="card-title px-3 pb-2 pt-4">
      <h6 class="fw-light text-reset">Шаг 3 из 5 <span class="fw-bolder">Данные отеля</span></h6>
    </div>

    <div v-if="!loading" class="card-body p-0 pb-3">
      <div class="mx-3 my-2">
        <div v-for="hotel in h" class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-4">
                <vs-select :placeholder="$t('invoice.inputs.hotel_name')"
                           class="mw-100"
                           v-model="hotel.hotel_id"
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
            </div>
            <div class="row mt-3">
              <div class="col-12 col-md-6 col-lg-4">
                <vs-select :placeholder="$t('invoice.inputs.room_type')"
                           class="mw-100"
                           v-model="hotel.room_type_id"
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
              <div class="col-12 col-md-6 col-lg-3">
                <vs-input shadow
                          :placeholder="$t('invoice.inputs.count')"
                          v-model="hotel.count" />
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-end">
          <div class="col-auto">
            <vs-button>
              {{ $t('invoice.buttons.next')}}
            </vs-button>
          </div>
        </div>
      </div>
    </div>

    <div v-else class="card-body">
      <Loader/>
    </div>
  </div>
</template>

<script>
import Loader from "~/components/Loader"
import axios from "axios"
export default {
  name: "Step_3",
  components: {
    Loader
  },
  data: () =>({
    hotels: [],
    rooms: [],
    loading: true,
    h: []
  }),
  async mounted () {
    await this.getHotels()
    await this.getRooms()
    this.createNewHotel()
  },
  methods: {
    getHotels () {
      axios.get("/api/hotels")
        .then (r => {
          if (r.data.success) {
            this.hotels = r.data.payload.hotels
            this.loading = false
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
    getRooms () {
      axios.get("/api/room_types")
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

    createNewHotel () {
      this.h.push({
        hotel_id: '',
        room_type_id: '',
        count: null,
        extra_bed: false,
        adults: null,
        children: null,
        bb: 'BB',
        check_in: null,
        check_out: null,
        booking_number: null
      })
    }
  }
}
</script>

<style scoped>

</style>