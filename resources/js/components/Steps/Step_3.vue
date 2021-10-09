<template>
  <div class="card">
    <div class="card-title px-3 pb-2 pt-4">
      <h6 class="fw-light text-reset">Шаг 3 из 5 <span class="fw-bolder">Данные отеля</span></h6>
    </div>

    <div v-if="!loading" class="card-body p-0 pb-3">
      <div class="mx-3 my-2">
        <div v-for="(hotel, index) in h" class="row">
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
              <div class="d-none d-md-block col-auto">
                <vs-button danger @click="removeHotel(index)">
                  {{ $t('form.delete') }}
                </vs-button>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-12 col-md-6 col-lg-3">
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
              <div class="col col-md-6 col-lg-3">
                <vs-input type="number" inputmode="numeric" pattern="[0-9]*"
                          v-model.number="hotel.count"
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
                <vs-input type="number" inputmode="numeric" pattern="[0-9]*"
                          v-model.number="hotel.adults"
                          :placeholder="$t('invoice.inputs.adults')"
                />
              </div>
              <div class="col-12 col-md-4 col-lg-3">
                <vs-input type="number" inputmode="numeric" pattern="[0-9]*"
                          v-model.number="hotel.children"
                          :placeholder="$t('invoice.inputs.children')"
                />
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-12 col-md-6 col-lg-4">
                <vs-select :placeholder="$t('invoice.inputs.bb')"
                           v-model="hotel.bb"
                >
                  <vs-option value="BB" label="BB">
                    {{ $t('invoice.inputs.bb') }}
                  </vs-option>
                </vs-select>
              </div>
            </div>
            <div class="row mt-5 mb-4">
              <div class="col-12">
                <h6 class="text-reset">{{ $t('invoice.create.step_3.date_title') }}</h6>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-6 col-md-4 col-lg-3">
                <vs-input type="date"
                          :label="$t('invoice.inputs.check_in')"
                          v-model="hotel.check_in"
                >

                </vs-input>
              </div>
              <div class="col-6 col-md-4 col-lg-3">
                <vs-input type="date"
                          :label="$t('invoice.inputs.check_out')"
                          v-model="hotel.check_out"
                >

                </vs-input>
              </div>

            </div>
            <div class="row mt-3">
              <div class="col-12 col-md-4 col-lg-3">
                <vs-input v-model="hotel.booking_number"
                          :placeholder="$t('invoice.inputs.booking_number')"
                >

                </vs-input>
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
          <div class="col-12" v-if="h.length > 1 && index !== h.length - 1  ">
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
            <vs-button>
              {{ $t('invoice.buttons.next') }}
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
    await this.createNewHotel()
  },
  methods: {
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

    removeHotel (index) {
      this.h.splice(index, 1)
    }
  }
}
</script>

<style scoped>

</style>