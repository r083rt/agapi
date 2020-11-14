const ChatState = {
    chats: []
}

const ChatMutations = {
    addChat(state, payload) {
        state.chats.push(payload.chat)
    },
    setChats(state, payload) {
        // state.chats = payload.chats
        state.chats = [...payload.chats]
            // payload.chats.forEach((chat, c) => {
            //     state.chats.push(chat)
            // })
    }
}

const ChatActions = {
    addChat({ commit }, chat) {
        return new Promise((resolve, reject) => {
            const access = commit('addChat', { chat: chat })
            resolve(access)
        })
    },
    setChats({ commit }, chats) {
        return new Promise((resolve, reject) => {
            const access = commit('setChats', { chats: chats })
            resolve(access)
        })
    }
}

const ChatGetters = {
    chats: state => state.chats
}

export {
    ChatState,
    ChatMutations,
    ChatActions,
    ChatGetters
}