import Vue from 'vue';
import App from './App.vue';
import router from './router.js';
import store from './store/index.js';

new Vue({
	el: '#app',
	router,
	store,
	template: '<app/>',
	components: {app: App},
});
