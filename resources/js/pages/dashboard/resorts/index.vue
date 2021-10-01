<template>
  <Loader v-if="$root.$loading.show" />

  <div v-else>
    <HeaderFilterInfo ref="filter"
                      :values="resorts"
                      :view-length="viewLength"
                      :title="$t('resorts.index.filter_title')"
                      :filter="filter"
                      @create="busCreateResort.$emit('openModal')"
                      @get="get"
                      @setViewLength="setViewLength"
    />

    <div class="row gy-3 mt-3">
      <div v-for="item in resorts.data" :key="item.id" class="col-12">
        <ItemCardOneField :id="item.id" :name="item.name" :updateModalTitle="'resorts.edit-modal.title'" @update="update" @destroy="deleteItem" />
      </div>
    </div>

    <EditItemsModal :bus="busCreateResort"
                    :title="'resorts.create-modal.title'"
    />

  </div>
</template>

<script>
import axios from 'axios'
import Loader from '~/components/loader.vue'
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
    title: i18n.t('resorts.index.title'),
    viewLength: 10,
    resorts: {},
    filter: new Vue(),
    busCreateResort: new Vue()
  }),
  metaInfo: {
    title: i18n.t('resorts.index.title'),
  },
  async mounted () {
    await this.busCreateResort.$on('save', this.store)

    await this.$root.$loading.set(50)
    await axios.get('/api/resorts', {
      params: {
        per_page: this.viewLength,
      }
    })
    .then(r => {
      console.log(r.data)
      this.resorts = r.data.payload.resorts
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
      axios.get('/api/resorts', {
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
         * @var {array} r.data.payload.resorts
         */
      .then(r => {
        this.resorts = r.data.payload.resorts
        this.filter.$emit('updateData', r.data.payload.resorts)
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
     * Delete select resort
     *
     * @param {number} id
     */
    deleteItem (id) {
      axios.delete('/api/resorts/' + id)
        /**
         * @var {object} r
         * @var {object} r.data
         * @var {object} r.data.payload
         * @var {object} r.data.payload.resort
         */
      .then(r => {
        this.$vs.notification({
          duration: 2000,
          sticky: true,
          position: 'top-right',
          color: 'success',
          title: this.$t('notification.delete.success.title', {name: r.data.payload.resort.name}),
          text: this.$t('notification.delete.success.text', {name: r.data.payload.resort.name})
        })
        this.get({
          page: this.$refs.filter.page,
          search: this.$refs.filter.value
        })
      })
      .catch(e => {
        console.log(e)
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

      axios.put('/api/resorts/' + params.id, {
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
        if (e.response.data.errors.name) {
          params.callbackError(e.response.data.errors.name[0])
        } else {
          params.callbackError(e.response.data.message)
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
      axios.post('/api/resorts/', {
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
          params.callbackError(e.response.data.errors.name[0])
        } else {
          params.callbackError('Server return Error')
        }
      })
    }
  }
}
</script>

<style scoped>

</style>
