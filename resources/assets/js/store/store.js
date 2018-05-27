import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
	state: {
		sort: 'name',
		order: 'asc',
		users: []
	},
	mutations: {
		changeSorting(state, payload) {
			state.sortBy = payload.sortBy;
			state.order = payload.order;
		},
		users(state, payload) {
			state.users = payload;
		}
	},
	actions: {
		sort(context) {
			axios.get('ajax/users?sort=' + context.state.sort + '&order=' + context.state.order)
            .then(response => context.commit('users', response.data.data))
		}
	}
})
