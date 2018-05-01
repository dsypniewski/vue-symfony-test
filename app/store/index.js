import Vue from 'vue';
import Vuex from 'vuex';
import breadcrumbs from './modules/breadcrumbs.js';

Vue.use(Vuex);

export default new Vuex.Store({
	modules: {
		breadcrumbs,
	},
});
