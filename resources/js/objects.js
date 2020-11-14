const User = function() {
    return {
        id: null,
        name: '',
        avatar: 'users/default.png',
        user_activated_at: null,
        profile: {
            id: 0,
            user_id: null,
            school_place: '',
            home_address: '',
            nip: '',
            nik: '',
            contact: '',
            educational_level_id: '',
            unit_kerja: '',
            nama_kepala_satuan_pendidikan: '',
            nip_kepala_satuan_pendidikan: '',
            gender: '',
            birthdate: '',
            district: {
                name: ''
            },
            province: {
                name: ''
            },
            city: {
                name: ''
            }
        },
        payment: null,
        payments: [],
        events: []
    }
}

const Profile = function() {
    return {
        id: 0,
        user_id: null,
        school_place: '',
        home_address: '',
        nip: '',
        nik: '',
        contact: '',
        educational_level_id: '',
        unit_kerja: '',
        nama_kepala_satuan_pendidikan: '',
        nip_kepala_satuan_pendidikan: '',
        gender: '',
        birthdate: '',
        district: {
            name: ''
        },
        province: {
            name: ''
        },
        city: {
            name: ''
        }
    }
}

const Event = function() {
    return {
        id: null,
        user_id: null,
        image: null,
        name: '',
        description: '',
        start_at: new Date,
        users: []
    }
}

export {
    User,
    Profile,
    Event
}