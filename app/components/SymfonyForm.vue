<template>
	<form v-html="formHtml" @submit.prevent="sendData" :id="formId"></form>
</template>

<script>
	import axios from 'axios';
	import api from '../api/notifications.js';
	
	export default {
		props: ["formType", "action"],
		data() {
			return {
				formId: 'form-' + Math.round(Math.random() * 1000000),
				formHtml: '',
				changes: false,
			};
		},
		created() {
			this.updateHtml();
		},
		beforeRouteLeave(to, from , next) {
			if (!this.changes) {
				next();
				return;
			}
			
			const answer = window.confirm('Do you really want to leave? you have unsaved changes!');
			if (answer) {
				next();
			} else {
				next(false);
			}
		},
		methods: {
			updateHtml() {
				api.getFormHtml(this.formType)
					.then(response => this.formHtml = response.data);
			},
			sendData() {
				let data = new FormData(document.getElementById(this.formId));
				axios.post(this.action, data).then(response => console.log(response));
			},
		}
	}
</script>
