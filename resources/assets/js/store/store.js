import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
	state: {
		defaultSorting: 'sort=name&order=asc'
	}
})
