<template>
	<div>
		<h1>Form</h1>
		<form v-html="formHtml" @submit.prevent="sendData"></form>
	</div>
</template>

<script>
	import axios from 'axios';
	export default {
		props: ["formKey"],
		data() {
			return {
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
				axios.get('http://localhost:8080/index.php/api/form/footer')
					.then(response => this.formHtml = response.data);
			},
			sendData(event) {
				console.log(event);
			},
		}
	}
</script>
