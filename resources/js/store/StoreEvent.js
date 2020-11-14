import Axios from "axios";

const EventState = {
    events: {}
}

const EventMutations = {
    setEvents(state, payload) {
        state.events = {...payload.events }
    }
}

const EventActions = {
    getEvents({ commit }) {
        return new Promise((resolve, reject) => {
            axios.get('/api/v1/event').then(res => {
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
    storeEvent({ commit }, event) {
        return new Promise((resolve, reject) => {
            axios.post("/api/v1/event", event).then(res => {
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
    getEvent({ commit }, event) {
        return new Promise((resolve, reject) => {
            axios.get(`/api/v1/event/${event.id}`).then(res => {
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
    attendance({ commit }, access) {
        return new Promise((resolve, reject) => {
            axios.post("/api/v1/attendance", access).then(res => {
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    }
}

const EventGetters = {}

export { EventState, EventMutations, EventActions, EventGetters }