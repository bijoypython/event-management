import { createStore } from 'vuex'
import createPersistedState from 'vuex-persistedstate'
// import auth from '@/store/auth'
import router from '../router'
import axios from 'axios'
const auth={
    namespaced: true,
    state:{
        auth:false,
        user:{}
    },
    mutations:{
        SET_AUTH (state, value) {
            state.auth = value
        },
        SET_USER (state, value) {
            state.user = value
        }
    },
    actions:{
        login({commit}){
         axios.get('/api/user')
            .then(({data})=>{
                commit('SET_USER',data)
            })
            commit('SET_AUTH', true)
            router.push({name:'dashboard'})
        },
        async logout({commit}){
            await axios.get('/sanctum/csrf-cookie')
            await axios.post('/logout')
            .then (({data})=>{
                console.log(data)
                commit('SET_AUTH', false)
                commit('SET_USER', {})
                router.push({name:'login'})
            })
        }
    }
}
const store = createStore({
    plugins:[
        createPersistedState()
    ],
    modules:{
        auth
    }
})

export default store