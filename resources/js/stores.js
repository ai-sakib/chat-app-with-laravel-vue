import axios from 'axios'
axios.defaults.baseURL = '/pro-chat'

export default {
	state:{
		users:[],
	},
	getters:{
		getUsers(state){
			return state.users
		},
		
	},
	actions:{
		getUsers(context){
			axios.get('/api/user')
				.then((response)=>{
					context.commit('getUsers', response.data.users)
				})
		},
		
	},
	mutations:{
		getUsers(state, data){
			return state.users = data
		},
	}
}