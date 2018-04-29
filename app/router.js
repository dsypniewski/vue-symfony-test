import Vue from 'vue';
import Router from 'vue-router';
import NotificationsList from '@components/NotificationsList.vue';
import NotificationComposer from '@components/NotificationComposer.vue';
import SymfonyForm from '@components/SymfonyForm.vue';

Vue.use(Router);

export default new Router({
	routes: [
		{
			path: '/',
			name: 'notifications-list',
			component: NotificationsList
		},
		{
			path: '/header',
			name: 'header-settings',
			component: SymfonyForm,
			props: {formKey: "header"}
		},
		{
			path: '/footer',
			name: 'footer-settings',
			component: SymfonyForm,
			props: {formKey: "footer"}
		},
		{
			path: '/notification/:id/blocks',
			name: 'notification-composer',
			component: NotificationComposer
		},
		{
			path: '/notification/:id/settings',
			name: 'notification-settings',
			component: SymfonyForm
		}
		// {
		// 	path: '/block/:id',
		// 	name: 'block-settings',
		// 	component: BlockSettings
		// }
	]
});
