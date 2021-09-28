import Vue from 'vue'
import loader from './loader'
import Child from './Child'
import Sidebar from './Sidebar'
import Config from './Config'
import Navbar from './Navbar';
import HeaderFilterInfo from "./HeaderFilterInfo";

[
  Child,
  Sidebar,
  loader,
  Config,
  Navbar,
  HeaderFilterInfo
].forEach(Component => {
  Vue.component(Component.name, Component)
})
