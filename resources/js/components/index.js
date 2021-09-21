import Vue from 'vue'
import loader from './loader'
import Child from './Child'
import Sidebar from './Sidebar'
import Config from './Config'
import Navbar from './Navbar';

[
  Child,
  Sidebar,
  loader,
  Config,
  Navbar
].forEach(Component => {
  Vue.component(Component.name, Component)
})
