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

export const setTechnologyTypes = (state, payload) => {
    return state.technologyTypes = payload
}

export const setTechnologyInitia = (state) => {
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
    return state.technologyInitia
}

export const setTactics = (state, payload) => {
    return state.tactics = payload
}

export const setSkills = (state, payload) => {
    return state.skills = payload
}