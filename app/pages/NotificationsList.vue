<template>
	<div>
		<page-header title="Notifications"></page-header>
		<table class="table">
			<thead>
				<tr>
					<th>
						<input type="text" placeholder="Name" v-model="filter" class="form-control form-control-sm"/>
					</th>
					<th>Code</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="notification in notifications">
					<template v-if="filter.length === 0 || notification.name.toLowerCase().indexOf(filter.toLowerCase()) > -1">
						<td>{{ notification.name }}</td>
						<td>{{ notification.code }}</td>
						<td>
							<router-link :to="{name: 'notification-edit', params: {id: notification.id}}">
								<img :src="icons.pencil" class="icon"/>
							</router-link>
							<router-link :to="{name: 'notification-settings', params: {id: notification.id}}">
								<img :src="icons.cog" class="icon"/>
							</router-link>
						</td>
					</template>
				</tr>
			</tbody>
		</table>
	</div>
</template>

<script>
	import api from '../api/notifications.js';
	import pencilIconSvg from 'open-iconic/svg/pencil.svg';
	import cogIconSvg from 'open-iconic/svg/cog.svg';
	import PageHeader from '../components/PageHeader.vue';
	
	export default {
		data() {
			return {
				notifications: [],
				icons: {
					pencil: pencilIconSvg,
					cog: cogIconSvg
				},
				filter: '',
			};
		},
		created() {
			this.$store.commit('breadcrumbs/set', ['Notifications']);
			api.getAllNotifications()
				.then(response => this.notifications = response.data);
		},
		components: {
			PageHeader,
		},
	}
</script>

<style>
	.icon {
		width: 1.25em;
		height: 1.25em;
		margin-left: 1em;
	}
	
	.loading {
		position: relative;
	}
	
	.loading::after {
		content: ' ';
		position: absolute;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;
		background: rgba(0, 0, 0, 0.25);
	}
</style>
