<template>
  <div>
   <transition name="fade" appear mode="out-in">
     <Loader v-if="$root.$loading.show" />

     <div v-else>
       <HeaderFilterInfo ref="filter"
                         :values="{}"
                         :view-length="viewLength"
                         :title="$t('invoice.index.filter_title')"
                         :filter="filter"
                         @create="busCreatorInvoice.$emit('openModal')"
                         @get="get"
                         @setViewLength="setViewLength"
       />
     </div>
   </transition>
  </div>
</template>

<script>
import Loader from '~/components/Loader.vue'
import HeaderFilterInfo from '~/components/HeaderFilterInfo.vue'
import Vue from 'vue'
export default {
  metaInfo() {
    return {title: 'Главная страница'}
  },
  components: {
    Loader,
    HeaderFilterInfo
  },
  scrollToTop: true,
  data: () => ({
    title: window.config.appName,
    viewLength: 10,
    busCreatorInvoice: new Vue()
  }),
  mounted() {
    this.$root.$loading.finish()
  },
  methods: {
    /**
     * new view items count
     *
     * @param {number} newLength
     */
    setViewLength (newLength) {
      this.viewLength = newLength
    },
  }
}
</script>

<style scoped>

</style>
