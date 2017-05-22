import Form from '../../core/Form'

export const createForm = (state, data) => {
    state.form = new Form(data)
}

export const resetForm = (state, label) => {
    state.form.reset(label)
}