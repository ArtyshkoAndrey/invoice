import Vue from 'vue'
import Loader from './Loader'
import Child from './Child'
import Sidebar from './Sidebar'
import Config from './Config'
import Navbar from './Navbar';
import HeaderFilterInfo from "./HeaderFilterInfo";

[
  Child,
  Sidebar,
  Loader,
  Config,
  Navbar,
  HeaderFilterInfo
].forEach(Component => {
  Vue.component(Component.name, Component)
})
