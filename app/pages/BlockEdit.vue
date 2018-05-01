<template>
	<div>
		<page-header title="Edit block"></page-header>
		<symfony-form form-type="block" :action="formAction"></symfony-form>
	</div>
</template>
<script>
	import SymfonyForm from '../components/SymfonyForm.vue';
	import PageHeader from '../components/PageHeader.vue';
	
	export default {
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
