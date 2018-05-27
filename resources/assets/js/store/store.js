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
		updateSorting(state, payload) {
			state.sort = payload.sort;
			state.order = payload.order;
		},
		updateUsers(state, payload) {
			state.users = payload;
		}
	},
	actions: {
		getUsers(context) {
			axios.get('ajax/users?sort=' + context.state.sort + '&order=' + context.state.order)
            .then(response => context.commit('updateUsers', response.data.data))
		}
	}
})
