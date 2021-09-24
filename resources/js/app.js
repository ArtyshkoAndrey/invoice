import Vue from 'vue'
import App from './components/App'
import Router from 'vue-router'
import Vuesax from 'vuesax'
import 'boxicons'
import '~/plugins'
import store from '~/store'
import router from '~/router'
import '~/components'
import 'bootstrap'

// eslint-disable-next-line no-extend-native
String.prototype.capitalize = function () {
  return this.charAt(0).toUpperCase() + this.slice(1)
}

Vue.use(Vuesax)
Vue.use(Router)

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  store,
  router,
  ...App
})
