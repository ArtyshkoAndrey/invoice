import Vue from 'vue'
import App from './components/App'
import Router from 'vue-router'
import Vuesax from 'vuesax'
import i18n from '~/plugins/i18n'
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

Vue.prototype.$formatDate = function (str) {
  str = new Date(str)
  return ((str.getDate() < 10) ? '0' : '') +
    str.getDate() +
    '.' +
    ((str.getMonth() < 9) ? '0' : '') +
    (str.getMonth() + 1) +
    '.' +
    str.getFullYear()
}

Vue.prototype.$formatTime = function (str) {
  str = new Date(str)
  return ((str.getUTCHours() < 10) ? '0' : '') + str.getUTCHours() + ':' + ((str.getUTCMinutes() < 9) ? '0' : '') + str.getUTCMinutes()
}

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  i18n,
  store,
  router,
  ...App
})
