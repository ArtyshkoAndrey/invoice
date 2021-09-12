import Vue from 'vue'
import loader from "./loader";
import Child from "./Child";
import Sidebar from "./Sidebar";


[
  Child,
  Sidebar,
  loader
].forEach(Component => {
  Vue.component(Component.name, Component)
})
