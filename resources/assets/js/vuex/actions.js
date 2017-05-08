export const toggle = ({ commit }) => commit('toggle')

export const setTechnologyTypes = ({ commit, state } , payload) => {
    commit('setTechnologyTypes', payload)
    commit('setTechnologyAmounts')
}

export const updateTechnologyLevels = ({ commit, state }, payload) => {
    commit('updateTechnologyLevels', payload)
 }