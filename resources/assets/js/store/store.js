import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
	state: {
		users: [],
		params: {
			sort: 'name',
			order: 'asc'
		},
		prevPageUrl: '',
		nextPageUrl: ''
	},
	mutations: {
		updateParams(state, payload) {
			state.params = payload;
		},
		updateUsers(state, payload) {
			state.users = payload;
		},
		updatePaginationLinks(state, payload) {
			state.prevPageUrl = payload.prev_page_url;
			state.nextPageUrl = payload.next_page_url;
		}
	},
	actions: {
		getUsers(context) {
			axios.get('ajax/users', {
				params: context.state.params
			})
            .then(response => {
            	context.commit('updateUsers', response.data.data);
            	context.commit('updatePaginationLinks', response.data);
            })
		},
		getPrevUsers(context) {
			axios.get(context.state.prevPageUrl, {
				params: context.state.params
			})
            .then(response => {
            	context.commit('updateUsers', response.data.data);
            	context.commit('updatePaginationLinks', response.data);
            })
		},
		getNextUsers(context) {
			axios.get(context.state.nextPageUrl, {
				params: context.state.params
			})
            .then(response => {
            	context.commit('updateUsers', response.data.data);
            	context.commit('updatePaginationLinks', response.data);
            })
		},
	}
})
