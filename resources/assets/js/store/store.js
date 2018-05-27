import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
	state: {
		users: [],
		sort: 'name',
		order: 'asc',
		prevPageUrl: '',
		nextPageUrl: ''
	},
	mutations: {
		updateSorting(state, payload) {
			state.sort = payload.sort;
			state.order = payload.order;
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
			axios.get('ajax/users?sort=' + context.state.sort + '&order=' + context.state.order)
            .then(response => {
            	context.commit('updateUsers', response.data.data);
            	context.commit('updatePaginationLinks', response.data);
            })
		},
		getPrevUsers(context) {
			axios.get(context.state.prevPageUrl + '&sort=' + context.state.sort + '&order=' + context.state.order)
            .then(response => {
            	context.commit('updateUsers', response.data.data);
            	context.commit('updatePaginationLinks', response.data);
            })
		},
		getNextUsers(context) {
			axios.get(context.state.nextPageUrl + '&sort=' + context.state.sort + '&order=' + context.state.order)
            .then(response => {
            	context.commit('updateUsers', response.data.data);
            	context.commit('updatePaginationLinks', response.data);
            })
		},
	}
})
