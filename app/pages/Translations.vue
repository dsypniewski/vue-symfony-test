<template>
	<div>
		<page-header title="Translations">
			<button class="btn btn-sm btn-outline-success">Save</button>
			<button class="btn btn-sm btn-outline-danger">Cancel</button>
		</page-header>
		<table class="table">
			<thead>
				<tr>
					<th>Phrase</th>
					<th v-for="language in languages">{{ language.toUpperCase() }}</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="translation in translations">
					<td>{{ translation['base'] }}</td>
					<td v-for="language in languages" data-edit="false">
						<input type="text" v-model="translation[language]" class="form-control form-control-sm"/>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>
<script>
	import api from '../api/notifications.js';
	import config from '../config.js';
	import PageHeader from '../components/PageHeader.vue';

	export default {
		created() {
			this.$store.commit('breadcrumbs/set', ['Notifications', 'Translations']);
			api.getTranslations()
				.then(response => this.translations = response.data);
		},
		data() {
			return {
				translations: [],
				languages: config.languages,
			};
		},
		methods: {
			edit(data) {
				data.edit = true;
			},
			save(data) {
				data.edit = false;
			},
			cancel(data) {
				data.edit = false;
			},
		},
		components: {
			PageHeader,
		},
	};
</script>
