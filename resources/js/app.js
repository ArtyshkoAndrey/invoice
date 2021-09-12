import Vue from 'vue'
import App from './components/App';
import Router from 'vue-router';
import Vuesax from 'vuesax'
import 'boxicons';
import '~/plugins'
import store from '~/store'
import router from '~/router'
import '~/components'

Vue.use(Vuesax);
Vue.use(Router);

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  store,
  router,
  ...App
})
