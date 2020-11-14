const PostState = {
    posts: {}
};

const PostMutations = {
    setPosts(state, payload) {
        state.posts = {...payload.posts };
    },
    addPost(state, payload) {
        state.posts.data.splice(0, 0, payload.post);
    },
    destroyPost(state, payload) {
        state.posts.data = state.posts.data.filter((item) => {
            return item.id !== payload.post.id
        })
    }
};

const PostActions = {
    getPosts({ commit }) {
        return new Promise((resolve, reject) => {
            axios
                .get("/api/v1/post")
                .then(res => {
                    resolve(res);
                })
                .catch(err => {
                    reject(err);
                });
        });
    },
    getPost() {
        return new Promise((resolve, reject) => {});
    },
    storePost({ commit }, post) {
        return new Promise((resolve, reject) => {
            console.log(post);
            const access = {
                ...post,
                status: "PUBLISHED",
                title: "KTA POST",
                featured: 0
            };
            axios
                .post("/api/v1/post", access)
                .then(res => {
                    commit("addPost", {
                        post: res.data
                    });
                    resolve(res);
                })
                .catch(err => {
                    reject(err);
                });
        });
    },
    destroyPost({ commit }, post) {
        return new Promise((resolve, reject) => {
            let access = {
                _method: "delete"
            }
            axios
                .post(`/api/v1/post/${post.id}`, access)
                .then(res => {
                    commit('destroyPost', { post: res.data })
                    resolve(res)
                })
                .catch(err => {
                    reject(err)
                });
        });
    },
    likePost({ commit }, post) {
        return new Promise((resolve, reject) => {
            let access = {
                post_id: post.id
            }
            axios.post("/api/v1/postlike", access).then(res => {
                    resolve(res)
                })
                .catch(err => {
                    reject(err)
                });
        });
    },
    dislikePost({ commit }, post) {
        return new Promise((resolve, reject) => {
            let access = {
                _method: "delete"
            }
            axios.post(`/api/v1/postlike/${post.id}`, access).then(res => {
                    resolve(res)
                })
                .catch(err => {
                    reject(err)
                });
        });
    }
};

const PostGetters = {};

export { PostState, PostMutations, PostActions, PostGetters };