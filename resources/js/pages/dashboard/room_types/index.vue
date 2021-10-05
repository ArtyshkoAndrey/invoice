<template>
  <Loader v-if="$root.$loading.show" />

  <div v-else>
    <HeaderFilterInfo ref="filter"
                      :values="room_types"
                      :view-length="viewLength"
                      :title="$t('room_types.index.filter_title')"
                      :filter="filter"
                      @create="busCreateRoomTypes.$emit('openModal')"
                      @get="get"
                      @setViewLength="setViewLength"
    />

    <div class="row gy-3 mt-3">
      <div v-for="item in room_types.data" :key="item.id" class="col-12">
        <ItemCardOneField :item="item"
                          :fields="inputs"
                          :updateModalTitle="'room_types.edit-modal.title'"
                          @update="update"
                          @destroy="deleteItem"
        />
      </div>
    </div>

    <EditItemsModal :bus="busCreateRoomTypes"
                    :title="'room_types.create-modal.title'"
                    :fields="inputs"
                    :inputs="{}"
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
    title: i18n.t('room_types.index.title'),
    viewLength: 10,
    room_types: {},
    filter: new Vue(),
    busCreateRoomTypes: new Vue(),
    inputs: [
      'id', 'name'
    ]
  }),
  metaInfo: {
    title: i18n.t('room_types.index.title'),
  },
  async mounted () {
    await this.busCreateRoomTypes.$on('save', this.store)

    await this.$root.$loading.set(50)
    await axios.get('/api/room_types', {
      params: {
        per_page: this.viewLength,
      }
    })
      .then(r => {
        console.log(r.data)
        this.room_types = r.data.payload.room_types
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
    get (settings) {
      axios.get('/api/room_types', {
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
         * @var {array} r.data.payload.room_types
         */
        .then(r => {
          this.room_types = r.data.payload.room_types
          this.filter.$emit('updateData', r.data.payload.room_types)
          console.log('new data', r.data)
        })

    },

    /**
     * new view items count
     *
     * @param {number} newLength
     */
    setViewLength (newLength) {
      this.viewLength = newLength
    },

    /**
     * Delete select airport
     *
     * @param {number} id
     */
    deleteItem (id) {
      axios.delete('/api/room_types/' + id)
        /**
         * @var {object} r
         * @var {object} r.data
         * @var {object} r.data.payload
         * @var {object} r.data.payload.room_type
         */
        .then(r => {
          this.$vs.notification({
            duration: 2000,
            sticky: true,
            position: 'top-right',
            color: 'success',
            title: this.$t('notification.delete.success.title', {name: r.data.payload.room_type.name}),
            text: this.$t('notification.delete.success.text', {name: r.data.payload.room_type.name})
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
    update (params) {

      axios.put('/api/room_types/' + params.id, {
        name: params.name
      })
        .then(r => {
          if(r.data.success) {
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
    store (params) {
      axios.post('/api/room_types/', {
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
