import Cookies from 'js-cookie'

export const state = {
  dark: !(Cookies.get("dark") === 'false')
}

// getters
export const getters = {
  dark: state => state.dark
}

// mutations
export const mutations = {
  setTheme (state, dark) {
    state.dark = dark
    Cookies.set('dark', dark, 365)
  }
}

// actions
export const actions = {
  saveTheme ({ commit, dispatch }, payload) {
    commit('setTheme', payload)
  }
}
