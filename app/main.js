import Vue from 'vue';
import Vuex from 'vuex';
import router from './router.js';
import App from './App.vue';
import BootstrapVue from 'bootstrap-vue'

Vue.use(Vuex);
Vue.use(BootstrapVue);

const store = new Vuex.Store({
	state: {
		breadcrumbs: [],
	},
	mutations: {
		breadcrumbs: (state, value) => state.breadcrumbs = value,
	}
});

new Vue({
	el: '#app',
	router,
	store,
	template: '<app/>',
	components: {app: App},
});
