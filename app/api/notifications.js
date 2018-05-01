import axios from 'axios';
import config from '../config.js';

export default {
	getNotificationBlocks(id) {
		return axios.get(config.apiBaseUrl + '/draft/blocks/notification/' + id);
	},
	getAllNotifications() {
		return axios.get(config.apiBaseUrl + '/draft/notifications');
	},
	getAllowedBlocks(id) {
		return new Promise(resolve => {
			resolve({
				data: [
					{type: "text", label: "Text"},
					{type: "button", label: "Button"},
					{type: "banner", label: "Banner"},
				],
			});
		});
	},
	createBlock(notificationId, type) {
		return new Promise(resolve => {
			resolve({
				data: {
					id: Math.round(Math.random() * 100),
					properties: {
						global: {},
						pl: {},
					},
				},
			});
		});
	},
	getTranslations() {
		return new Promise(resolve => {
			resolve({
				data: [
					{
						base: 'Product',
						pl: 'Produkt',
						sk: '',
						hu: '',
						ro: '',
						ua: '',
					},
					{
						base: 'Order',
						pl: 'Zamówienie',
						sk: '',
						hu: '',
						ro: '',
						ua: '',
					},
				],
			});
		});
	},
	getFormHtml(formType) {
		return axios.get(config.apiBaseUrl + '/panel/form/' + formType);
	}
}
