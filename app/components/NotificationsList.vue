<template>
	<div>
		<div class="row">
			<div class="col-12">
				<h1>Notifications</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Code</th>
							<th style="width: 200px;"></th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="notification in notifications">
							<td>{{ notification.name }}</td>
							<td>{{ notification.code }}</td>
							<td>
								<router-link :to="{name: 'notification-composer', params: {id: notification.id}}">
									<img :src="icons.pencil" class="icon"/>
								</router-link>
								<router-link :to="{name: 'notification-settings', params: {id: notification.id}}">
									<img :src="icons.cog" class="icon"/>
								</router-link>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</template>

<script>
	import axios from 'axios';
	import pencilIconSvg from 'open-iconic/svg/pencil.svg';
	import cogIconSvg from 'open-iconic/svg/cog.svg';
	
	export default {
		data() {
			return {
				notifications: [],
				icons: {
					pencil: pencilIconSvg,
					cog: cogIconSvg
				},
			};
		},
		created() {
			this.$store.commit('breadcrumbs', [
				'Notifications',
			]);
			axios.get('http://localhost:8080/index.php/api/data/notifications')
				.then(response => this.notifications = response.data);
		}
	}
</script>

<style>
	.icon {
		width: 1.25em;
		height: 1.25em;
		margin-left: 1em;
	}
</style>
