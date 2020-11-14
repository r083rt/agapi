import Axios from "axios"

const RegionState = {
    provinces: [],
    cities: [],
    districts: []
}

const RegionMutations = {
    setProvinces(state, payload) {
        state.provinces = [...payload.provinces]
    },
    setCities(state, payload) {
        state.cities = [...payload.cities]
    },
    setDistricts(state, payload) {
        state.districts = [...payload.districts]
    }
}

const RegionActions = {
    getProvinces({ commit }) {
        return new Promise((resolve, reject) => {
            Axios.get('/api/v1/province').then(res => {
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
    getCities({ commit }, provinceId) {
        return new Promise((resolve, reject) => {
            Axios.get(`/api/v1/province/${provinceId}`).then(res => {
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
    getDistricts({ commit }, cityId) {
        return new Promise((resolve, reject) => {
            Axios.get(`/api/v1/city/${cityId}`).then(res => {
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    }
}

const RegionGetters = {}

export { RegionState, RegionMutations, RegionActions, RegionGetters }