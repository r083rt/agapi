const AuthState = {
    status: '',
    user: JSON.parse(localStorage.getItem('user')) || {},
    storageUrl: 'https://storage.cloud.google.com/agpaiidigital.org',
    users: [],
}

const AuthMutations = {
    logout(state) {
        state.user = ''
    },
    setUser(state, payload) {
        state.user = payload.user
        localStorage.setItem('user', JSON.stringify(payload.user))
    },
    setUsers(state, payload) {
        state.users = {...payload.users }
    },
}

const AuthActions = {
    auth({ commit }) {
        return new Promise((resolve, reject) => {
            axios.get('/api/user').then(res => {
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
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

const AuthGetters = {
    authStatus: state => state.status,
    user: state => state.user
}

export {
    AuthState,
    AuthMutations,
    AuthActions,
    AuthGetters
}