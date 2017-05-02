export const toggle = ({ commit }) => commit('toggle')

export const setTechnologyTypes = ({ commit, state } , payload) => {
    commit('setTechnologyTypes', payload)
    state.technologyTypes.forEach((v)=>{
        state.technologyInitia[v.content]={
            lv1: 0,
            get1: 0,
            amount1: v.amount1,
            lv2: 0,
            get2: 0,
            amount2: v.amount2,
            lv3: 0,
            get3: 0,
            amount3: v.amount3,
        }
    })
}