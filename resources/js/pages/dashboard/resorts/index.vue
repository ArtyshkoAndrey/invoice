<template>

  <Loader v-if="$root.$loading.show"/>

  <div v-else>
    <HeaderFilterInfo ref="filter" :values="resorts"/>
  </div>
</template>

<script>
import axios from 'axios'
import Loader from '~/components/loader.vue'
import HeaderFilterInfo from '~/components/HeaderFilterInfo.vue'
export default {
  name: 'Index',
  data: () => ({
    title: 'Список курортов',
    viewLength: 10,
    resorts: {}
  }),
  metaInfo: {
    title: 'Список курортов'
  },
  components: {
    Loader,
    HeaderFilterInfo
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
    get () {
      this.$root.$loading.start().set(50)
      axios.get('/api/resorts', {
        params: {
          per_page: this.viewLength,
          page: this.current_page
        }
      })
      .then(r => {
        this.resorts = r.data.payload.resorts
        this.$root.$loading.set(80).finish()
      })

    }
  }
}
</script>

<style scoped>

</style>
