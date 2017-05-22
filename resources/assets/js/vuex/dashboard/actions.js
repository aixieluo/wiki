export const setFormData = ({commit}, data) => {
    commit('createForm', data)
}

export const resetForm = ({commit}, label) => {
    commit('resetForm', label)
}