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
		getSortedUsers(context, params = context.state.params) {
			axios.get('ajax/users', {
				params: params
			})
            .then(response => {
            	context.commit('updateUsers', response.data.data);
            	context.commit('updatePaginationLinks', response.data);
            })

            context.commit('updateParams', params);
		},
		searchUsers(context, params) {
			axios.get('ajax/search', {
				params: params
			})
            .then(response => {
            	context.commit('updateUsers', response.data.data);
            	context.commit('updatePaginationLinks', response.data);
            })

			context.commit('updateParams', params);
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
