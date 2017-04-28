export const toggle = state => {
    return state.sidebar.opened = !state.sidebar.opened
}

export const setDancerInfo = (state, payload) => {
    state.type = payload.type
    state.rarity = payload.rarity
    state.attributes = payload.attributes
    state.grow_attributes = payload.grow_attributes
    state.equipment_number = payload.equipment_number
    return
}

export const setEquipment = (state, payload) => {
    return state.equipment = payload
}

export const setTechnologies = (state, payload) => {
    return state.technologies = payload
}

export const setTactics = (state, payload) => {
    return state.tactics = payload
}

export const setSkills = (state, payload) => {
    return state.skills = payload
}