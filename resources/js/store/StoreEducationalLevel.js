const EducationalLevelState = {
    educationallevels: []
};

const EducationalLevelMutations = {
    setEducationalLevels(state, payload) {
        state.educationallevels = [...payload.educationallevels]
    }
};

const EducationalLevelActions = {
    getEducationalLevels({ commit }) {
        return new Promise((resolve, reject) => {
            axios.get('/api/v1/educationallevel').then(res => {
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    }
};

const EducationalLevelGetters = {};

export { EducationalLevelState, EducationalLevelMutations, EducationalLevelActions, EducationalLevelGetters };