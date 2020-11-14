window.Vue = require("vue");
import multiguard from "vue-router-multiguard";
const moment = require("moment");
import VueRouter from "vue-router";
import store from "../store";

Vue.use(VueRouter);

// middleware list
// cek apakah user sudah bayar apa belum sekaligus update auth
const actived = (to, from, next) => {
    const user = store.getters.user;
    if (user.user_activated_at) {
        const monthDifference = moment(new Date()).diff(
            new Date(user.user_activated_at),
            "months",
            true
        );
        //   console.log('jeda bulan', monthDifference)
        if (
            user &&
            user.user_activated_at != null
            // &&
            // monthDifference < 6
        ) {
            next();
        } else {
            next("payment");
        }
    } else {
        store.dispatch("auth").then(res => {
            const monthDifference = moment(new Date()).diff(
                new Date(res.data.user_activated_at),
                "months",
                true
            );
            //   console.log('jeda bulan', monthDifference)
            if (
                res.data &&
                res.data.user_activated_at != null
                // &&
                // monthDifference < 6
            ) {
                next();
            } else {
                next("payment");
            }
        });
    }
};

const rule = (to, from, next) => {
        next('attention')
            // next('payment')
    }
    // --------------

// vue router only
const routes = [{
        path: "/",
        name: "home",
        component:require("../components/questionnary/Home.vue").default,
        props:true
    },
    {
        path: "/create",
        name: "createsurvey",
        component:require("../components/questionnary/Create.vue").default,
        props:true
    },
    {
        path: "/dashboard",
        name: "dashboard",
        beforeEnter: multiguard([rule, actived]),
        component: require("../components/vuetify/DiscussionPage.vue").default
    },
    {
        path: "/comment",
        name: "postcomment",
        beforeEnter: multiguard([rule, actived]),
        component: require("../components/vuetify/CommentPage.vue").default,
        props: true
    },
    {
        path: "/murottal",
        name: "murottal",
        beforeEnter: multiguard([rule, actived]),
        component: require("../components/vuetify/MurottalPage.vue").default,
        props: true
    },
    {
        path: "/event",
        name: "event",
        beforeEnter: multiguard([rule, actived]),
        component: require("../components/vuetify/EventPage.vue").default
    },
    {
        path: "/eventguest",
        name: "eventguest",
        beforeEnter: multiguard([rule, actived]),
        component: require("../components/vuetify/EventGuestPage.vue").default,
        props: true
    },
    {
        path: "/profile",
        name: "profile",
        beforeEnter: multiguard([rule, actived]),
        component: require("../components/vuetify/ProfilePage.vue").default
    },
    {
        path: "/editprofile",
        name: "editprofile",
        beforeEnter: multiguard([rule, actived]),
        component: require("../components/vuetify/EditProfilePage.vue").default
    },
    {
        path: "/barcode",
        name: "barcode",
        beforeEnter: multiguard([rule, actived]),
        component: require("../components/vuetify/BarcodePage.vue").default
    },
    {
        path: "/information",
        name: "information",
        beforeEnter: multiguard([rule, actived]),
        component: require("../components/vuetify/InformationPage.vue").default
    },
    {
        path: "/contribution",
        name: "contribution",
        beforeEnter: multiguard([rule, actived]),
        component: require("../components/vuetify/ContributionPage.vue").default
    },
    {
        path: "/createevent",
        name: "createevent",
        beforeEnter: multiguard([rule, actived]),
        component: require("../components/vuetify/CreateEventPage.vue").default
    },
    {
        path: "/makeabsent",
        name: "makeabsent",
        beforeEnter: multiguard([rule, rule, actived]),
        component: require("../components/vuetify/MakeAbsentPage.vue").default,
        props: true
    },
    {
        path: "/membercard",
        name: "membercard",
        beforeEnter: multiguard([rule, actived]),
        component: require("../components/vuetify/MemberCardPage.vue").default
    },
    {
        path: "/searchuser",
        name: "searchuser",
        beforeEnter: multiguard([rule, actived]),
        component: require("../components/vuetify/SearchUserPage.vue").default
    },
    {
        path: "/chatgroup",
        name: "chatgroup",
        beforeEnter: multiguard([rule, actived]),
        component: require("../components/vuetify/ChatGroupPage.vue").default
    },
    {
        path: "/payment",
        name: "payment",
        component: require("../components/vuetify/PaymentPage.vue").default
    },
    {
        path: "/attention",
        name: "attention",
        component: require("../components/vuetify/AttentionPage.vue").default
    }
];

const router = new VueRouter({ routes });

export default router;
// --------------