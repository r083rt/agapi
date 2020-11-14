import axios from 'axios'
// State object
const state = {
    users: [],
}

// Mutations
const mutations = {
    setUsers(state, payload) {
        state.users = {...payload.users }
    },
}

// Actions
const actions = {
    getUsers({ commit }, url) {
        return new Promise((resolve, reject) => {
            axios.get(url).then(res => {
                resolve(res)
            }).catch(err => [
                reject(err)
            ])
        })
    },
    getUser({ commit }, id) {
        return new Promise((resolve, reject) => {
            axios.get(`/api/v1/user/${id}`).then(res => {
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
    updateUser({ commit }, user) {
        return new Promise((resolve, reject) => {
            axios.put(`/api/v1/user/${user.id}`, user).then(res => {
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
    searchUsers({ commit }, key) {
        return new Promise((resolve, reject) => {
            axios.get(`/api/v1/users/search/${key}`).then(res => {
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    }
}

// Getter functions
const getters = {

}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}