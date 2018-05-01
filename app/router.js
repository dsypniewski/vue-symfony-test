import Vue from 'vue';
import Router from 'vue-router';
import NotificationsList from './pages/NotificationsList.vue';
import NotificationEdit from './pages/NotificationEdit.vue';
import NotificationSettings from './pages/NotificationSettings.vue';
import Header from './pages/HeaderForm.vue';
import Footer from './pages/FooterForm.vue';
import BlockEdit from './pages/BlockEdit.vue';
import Translations from './pages/Translations.vue';

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
			component: Header,
			props: {formKey: "header"}
		},
		{
			path: '/footer',
			name: 'footer-settings',
			component: Footer,
			props: {formKey: "footer"}
		},
		{
			path: '/notification/:id/blocks',
			name: 'notification-edit',
			component: NotificationEdit
		},
		{
			path: '/notification/:id/settings',
			name: 'notification-settings',
			component: NotificationSettings,
		},
		{
			path: '/block/:id',
			name: 'block-edit',
			component: BlockEdit
		},
		{
			path: '/translations',
			name: 'translations',
			component: Translations
		},
	]
});
