<template>
  <Loader v-if="$root.$loading.show" />

  <div v-else>
    <HeaderFilterInfo ref="filter"
                      :values="resorts"
                      :view-length="viewLength"
                      :title="$t('invoice.history')"
                      :filter="filter"
                      @get="get"
                      @setViewLength="setViewLength"
    />

    <div class="row gy-3 mt-3">
      <div v-for="item in resorts.data" :key="item.id" class="col-12">
        <ItemCardOneField :name="item.name" />
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import Loader from '~/components/loader.vue'
import HeaderFilterInfo from '~/components/HeaderFilterInfo.vue'
import ItemCardOneField from '~/components/ItemCardOneField.vue'
import Vue from "vue";
export default {
  name: 'Index',
  components: {
    Loader,
    HeaderFilterInfo,
    ItemCardOneField
  },
  data: () => ({
    title: 'Список курортов',
    viewLength: 10,
    resorts: {},
    filter: new Vue()
  }),
  metaInfo: {
    title: 'Список курортов'
  },
  async mounted () {
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
    }
  }
}
</script>

<style scoped>
.fruit-list-item {
  transition: all 1s;
}
.fruit-list-enter,
.fruit-list-leave-to {
  max-height: 0px;
  padding-top: 0px !important;
  padding-bottom: 0px !important;
  overflow: hidden;
}
.fruit-list-enter-to,
.fruit-list-leave {
  max-height: 80px;
}

.fruit-table-item {
  transition: all 1s;
}
.fruit-table-item > * {
  transition: all 1s;
  overflow: hidden;
}
.fruit-table-enter,
.fruit-table-leave-to {
  line-height: 0;
}
.fruit-table-enter > *,
.fruit-table-leave-to > * {
  padding-top: 0px !important;
  padding-bottom: 0px !important;
}
</style>
