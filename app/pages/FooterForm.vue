<template>
	<div>
		<page-header title="Footer"></page-header>
		<symfony-form form-type="footer" :action="formAction"></symfony-form>
	</div>
</template>
<script>
	import SymfonyForm from '../components/SymfonyForm.vue';
	import PageHeader from '../components/PageHeader.vue';
	
	export default {
		created() {
			this.$store.commit('breadcrumbs/set', ['Notifications', 'Footer']);
		},
		data() {
			return {
				formAction: 'http://localhost:8080/api.php/api/v1/dump',
			};
		},
		components: {
			SymfonyForm,
			PageHeader,
		},
	}
</script>
