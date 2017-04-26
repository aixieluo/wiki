export const toggle = state => {
    return state.sidebar.opened = !state.sidebar.opened
}

export const setDancerInfo = (state, payload) => {
    return state.dancer = payload
}

export const setEquipment = (state, payload) => {
    return state.equipment = payload
}