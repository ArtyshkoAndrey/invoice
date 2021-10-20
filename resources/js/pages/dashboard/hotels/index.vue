<template>
  <Loader v-if="$root.$loading.show" />

  <div v-else>
    <HeaderFilterInfo ref="filter"
                      :filter="filter"
                      :title="$t('hotels.index.filter_title')"
                      :values="hotels"
                      :view-length="viewLength"
                      @create="busCreateHotel.$emit('openModal')"
                      @get="get"
                      @setViewLength="setViewLength"
    />

    <div class="row gy-3 mt-3">
      <div v-for="item in hotels.data" :key="item.id" class="col-12">
        <ItemCardOneField :fields="inputs"
                          :item="item"
                          :update-modal-title="'hotels.edit-modal.title'"
                          @destroy="deleteItem"
                          @update="update"
        />
      </div>
    </div>

    <EditItemsModal :bus="busCreateHotel"
                    :fields="inputs"
                    :inputs="{}"
                    :title="'hotels.create-modal.title'"
    />
  </div>
</template>

<script>
import axios from 'axios'
import Loader from '~/components/Loader.vue'
import HeaderFilterInfo from '~/components/HeaderFilterInfo.vue'
import ItemCardOneField from '~/components/ItemCardOneField.vue'
import EditItemsModal from "~/components/EditItemsModal";
import Vue from "vue";
import i18n from "~/plugins/i18n";

export default {
  name: 'Index',
  components: {
    Loader,
    HeaderFilterInfo,
    ItemCardOneField,
    EditItemsModal
  },
  data: () => ({
    title: i18n.t('hotels.index.title'),
    viewLength: 10,
    hotels: {},
    filter: new Vue(),
    busCreateHotel: new Vue(),
    inputs: [
      'id', 'name'
    ]
  }),
  metaInfo: {
    title: i18n.t('hotels.index.title'),
  },
  async mounted() {
    await this.busCreateHotel.$on('save', this.store)

    await this.$root.$loading.set(50)
    await axios.get('/api/hotels', {
      params: {
        per_page: this.viewLength,
      }
    })
      .then(r => {
        console.log(r.data)
        this.hotels = r.data.payload.hotels
        this.$root.$loading.finish()
      })
      .catch(e => {
        console.log(e)
        this.$root.$loading.fail()
      })
  },
  methods: {
    /**
     * update new Date
     *
     * @param {object} settings
     * @param {number} settings.page
     * @param {string} settings.search
     */
    get(settings) {
      axios.get('/api/hotels', {
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
         * @var {array} r.data.payload.hotels
         */
        .then(r => {
          this.hotels = r.data.payload.hotels
          this.filter.$emit('updateData', r.data.payload.hotels)
          console.log('new data', r.data)
        })

    },

    /**
     * new view items count
     *
     * @param {number} newLength
     */
    setViewLength(newLength) {
      this.viewLength = newLength
    },

    /**
     * Delete select airport
     *
     * @param {number} id
     */
    deleteItem(id) {
      axios.delete('/api/hotels/' + id)
        /**
         * @var {object} r
         * @var {object} r.data
         * @var {object} r.data.payload
         * @var {object} r.data.payload.hotel
         */
        .then(r => {
          this.$vs.notification({
            duration: 2000,
            sticky: true,
            position: 'top-right',
            color: 'success',
            title: this.$t('notification.delete.success.title', {name: r.data.payload.hotel.name}),
            text: this.$t('notification.delete.success.text', {name: r.data.payload.hotel.name})
          })
          this.get({
            page: this.$refs.filter.page,
            search: this.$refs.filter.value
          })
        })
        .catch(e => {
          this.$vs.notification({
            duration: 2000,
            sticky: true,
            position: 'top-right',
            color: 'danger',
            title: this.$t('notification.delete.danger.title'),
            text: this.$t('notification.delete.danger.text')
          })
          this.get({
            page: this.$refs.filter.page,
            search: this.$refs.filter.value
          })
        })
    },

    /**
     *
     * @param {object} params
     * @var {function} params.callbackSuccess
     * @var {function} params.callbackError
     * @var {number} params.id
     * @var {string} params.name
     */
    update(params) {

      axios.put('/api/hotels/' + params.id, {
        name: params.name
      })
        .then(r => {
          if (r.data.success) {
            params.callbackSuccess()
            this.get({
              page: this.$refs.filter.page,
              search: this.$refs.filter.value
            })
          } else {
            params.callbackError('Не предвиденная ошибка')
          }
        })
        .catch(e => {
          if (e.response.data.errors) {
            params.callbackError(e.response.data.errors)
          } else {
            params.callbackError({
              message: e.response.data.message
            })
          }
        })
    },

    /**
     *
     * @param {object} params
     * @var {function} params.callbackSuccess
     * @var {function} params.callbackError
     * @var {null} params.id
     * @var {string} params.name
     */
    store(params) {
      axios.post('/api/hotels/', {
        name: params.name
      })
        .then(r => {
          if (r.data.success) {
            params.callbackSuccess()

            this.get({
              page: this.$refs.filter.page,
              search: this.$refs.filter.value
            })
          } else {
            params.callbackError('Server return Error')
          }
        })
        .catch(e => {
          if (e.response.data.errors) {
            params.callbackError(e.response.data.errors)
          } else {
            params.callbackError({
              message: e.response.data.message
            })
          }
        })
    }
  }
}
</script>

<style scoped>

</style>
