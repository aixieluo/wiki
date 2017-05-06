export const toggle = ({ commit }) => commit('toggle')

export const setTechnologyTypes = ({ commit, state } , payload) => {
    commit('setTechnologyTypes', payload)
    commit('setTechnologyInitia')
}