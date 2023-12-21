import { createStore, createLogger } from 'vuex'
import { ToastTypes } from '../common/constants'

const debug = process.env.NODE_ENV !== 'production'

let globalKeyCounter = 1

// initial state
const state = {
  toasts: [],
}

// getters
const getters = {
}

// actions
const actions = {
  createErrorToast ({ commit }, { header, body }) {
    commit('createToast', { header, body, type: ToastTypes.ERROR });
  },
  createSuccessToast ({ commit }, { header, body }) {
    commit('createToast', { header, body, type: ToastTypes.SUCCESS });
  },

}

// mutations
const mutations = {
  createToast(state, data) {
    state.toasts.push({...data, key: globalKeyCounter++})
  },
  removeToast(state, key) {
    console.log('onToastClose', console.log(key))
    const idx = state.toasts.findIndex(it => it.key === key)
    state.toasts.splice(idx, 1);
  }
}

export default createStore({
  state,
  getters,
  actions,
  mutations,
  strict: debug,
  plugins: debug ? [createLogger()] : []
})