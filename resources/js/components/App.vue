<template>
  <div id="app">
    <loading ref="loading"/>

    <transition name="page" mode="out-in">
      <component :is="layout" v-if="layout"/>
    </transition>
  </div>
</template>

<script>
import Loading from './Loading'
import store from '~/store'
// Load layout components dynamically.
const requireContext = require.context('~/layouts', false, /.*\.vue$/)
const layouts = requireContext.keys()
  .map(file =>
    [file.replace(/(^.\/)|(\.vue$)/g, ''), requireContext(file)]
  )
  .reduce((components, [name, component]) => {
    components[name] = component.default || component
    return components
  }, {})

export default {
  el: '#app',
  components: {
    Loading
  },

  data: () => ({
    layout: null,
    defaultLayout: 'default'
  }),

  metaInfo () {
    const { appName } = window.config
    return {
      title: appName,
      titleTemplate: `%s · ${appName}`
    }
  },
  mounted () {
    this.$loading = this.$refs.loading
    console.warn(store.state.theme.dark)
    if (String(store.getters['theme/dark']) === 'true') {
      this.$vs.setTheme('dark')
    } else {
      this.$vs.setTheme('light')
    }
    store.watch(
      state => state.theme.dark,
      value => {
        if (String(value) === 'true') {
          this.$vs.setTheme('dark')
        } else {
          this.$vs.setTheme('light')
        }
      }
    )
  },
  methods: {
    /**
     * Set the application layout.
     *
     * @param {String} layout
     */
    setLayout (layout) {
      if (!layout || !layouts[layout]) {
        layout = this.defaultLayout
      }
      this.layout = layouts[layout]
    }
  }
}
</script>

