const CommentState = {
    Comments: []
}

const CommentMutations = {
    setComments(state, payload) {},
    addComment(state, payload) {},
    destroyComment(state, payload) {},
    likeComment(state, payload) {},
    dislikeComment(state, payload) {}
}

const CommentActions = {
    getComments({ commit }) {
        return new Promise((resolve, reject) => {})
    },
    getComment({ commit }) {
        return new Promise((resolve, reject) => {})
    },
    storeComment({ commit }, payload) {
        return new Promise((resolve, reject) => {
            const access = {
                post_id: payload.post.id,
                user_id: payload.user.id,
                value: payload.comment.value
            }
            axios
                .post("/api/v1/postcomment", access)
                .then(res => {
                    resolve(res)
                })
                .catch(err => {
                    reject(err)
                })
        })
    },
    destroyComment({ commit }) {
        return new Promise((resolve, reject) => {})
    },
    likeComment({ commit }, comment) {
        return new Promise((resolve, reject) => {
            const access = {
                comment_id: comment.id
            }
            axios
                .post("/api/v1/commentlike", access)
                .then(res => {
                    resolve(res)
                })
                .catch(err => {
                    reject(err)
                })
        })
    },
    dislikeComment({ commit }, comment) {
        return new Promise((resolve, reject) => {
            const access = {
                _method: "delete"
            }
            axios
                .post(`/api/v1/commentlike/${comment.id}`, access)
                .then(res => {
                    resolve(res)
                })
                .catch(err => {
                    reject(err)
                })
        })
    }
}

const CommentGetters = {}

export { CommentState, CommentMutations, CommentActions, CommentGetters }