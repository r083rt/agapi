const stateQuestionnary = {
    status: '',
    user: JSON.parse(localStorage.getItem('user')) || {},
    storageUrl: 'https://storage.cloud.google.com/agpaiidigital.org',
    users: [],
}

const mutationsQuestionnary = {
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

const actionsQuestionnary = {
    submitQuestionnary({state}, payload){
        return new Promise((resolve,reject)=>{
            axios.post(`/questionnary`, payload).then(res => {
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    }
}

const gettersQuestionnary = {
    authStatus: state => state.status,
    user: state => state.user
}

export {
    stateQuestionnary,
    mutationsQuestionnary,
    actionsQuestionnary,
    gettersQuestionnary
}