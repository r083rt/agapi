import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
import { AuthState, AuthMutations, AuthActions, AuthGetters } from './StoreAuth'
import { PostState, PostMutations, PostActions, PostGetters } from './StorePost'
import { CommentState, CommentMutations, CommentActions, CommentGetters } from './StoreComment'
import { EventState, EventMutations, EventActions, EventGetters } from './StoreEvent'
import { EducationalLevelState, EducationalLevelMutations, EducationalLevelActions, EducationalLevelGetters } from './StoreEducationalLevel'
import { RegionState, RegionMutations, RegionActions, RegionGetters } from './StoreRegion'
import { ChatState, ChatMutations, ChatActions, ChatGetters } from './StoreChat'
import { MurottalState, MurottalMutations, MurottalActions, MurottalGetters } from './StoreMurottal'
import { stateQuestionnary, mutationsQuestionnary, actionsQuestionnary, gettersQuestionnary } from './Questionnary'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        ...AuthState,
        ...PostState,
        ...CommentState,
        ...EventState,
        ...EducationalLevelState,
        ...RegionState,
        ...ChatState,
        ...MurottalState,
        ...stateQuestionnary
    },
    mutations: {
        ...AuthMutations,
        ...PostMutations,
        ...CommentMutations,
        ...EventMutations,
        ...EducationalLevelMutations,
        ...RegionMutations,
        ...ChatMutations,
        ...MurottalMutations,
        ...mutationsQuestionnary
    },
    actions: {
        ...AuthActions,
        ...PostActions,
        ...CommentActions,
        ...EventActions,
        ...EducationalLevelActions,
        ...RegionActions,
        ...ChatActions,
        ...MurottalActions,
        ...actionsQuestionnary
    },
    getters: {
        ...AuthGetters,
        ...PostGetters,
        ...CommentGetters,
        ...EventGetters,
        ...EducationalLevelGetters,
        ...RegionGetters,
        ...ChatGetters,
        ...MurottalGetters,
        ...gettersQuestionnary
    }
})