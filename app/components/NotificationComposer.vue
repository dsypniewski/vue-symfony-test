<template>
	<div>
		<div class="row">
			<div class="col-12">
				<h1>Notification composer</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-2">
				<h4>Available blocks</h4>
				<draggable v-model="allowedBlocks" :options="{sort: false,  group: {name: 'allowedBlocks', pull: 'clone', put: false}}" @start="drag=true" @end="drag=false" class="row">
					<div v-for="block in allowedBlocks" class="col-12 btn btn-primary">{{ block.label }}</div>
				</draggable>
			</div>
			<div class="col-4">
				<h4>Notification blocks</h4>
				<label>
					<input type="checkbox" v-model="disabled"/>
					Disable sort and publication
				</label>
				<table class="table">
					<thead>
						<tr>
							<th>Type</th>
							<th>PL</th>
							<th>SK</th>
							<th>RO</th>
							<th>HU</th>
							<th>UA</th>
							<th></th>
						</tr>
					</thead>
					<draggable element="tbody" v-model="notificationBlocks" :options="{sort: !disabled, group: {name: 'blocks', pull: false, put: ['allowedBlocks']}}" @start="drag=true" @end="drag=false" v-on:change="updateBlocks">
						<tr v-for="block in notificationBlocks" :key="block.type">
							<td>
								{{ block.type }}
							</td>
							<td>
								<input type="checkbox" :disabled="disabled"/>
							</td>
							<td>
								<input type="checkbox" :disabled="disabled"/>
							</td>
							<td>
								<input type="checkbox" :disabled="disabled"/>
							</td>
							<td>
								<input type="checkbox" :disabled="disabled"/>
							</td>
							<td>
								<input type="checkbox" :disabled="disabled"/>
							</td>
							<td>
								<a href="#">
									<img :src="icons.pencil" class="icon"/>
								</a>
								<a href="#">
									<img :src="icons.x" class="icon"/>
								</a>
							</td>
						</tr>
					</draggable>
				</table>
			</div>
			<div class="col-6">
				<h4>Preview</h4>
				{{ notificationBlocks | json }}
			</div>
		</div>
	</div>
</template>

<script>
	import axios from 'axios';
	import draggable from 'vuedraggable';
	import pencilIconSvg from 'open-iconic/svg/pencil.svg';
	import xIconSvg from 'open-iconic/svg/x.svg';

	export default {
		data() {
			return {
				allowedBlocks: [
					{type: "text", label: "Text2"},
					{type: "button", label: "Button"},
					{type: "banner", label: "Banner"}
				],
				notificationBlocks: [],
				icons: {
					pencil: pencilIconSvg,
					x: xIconSvg
				},
				disabled: true,
			};
		},
		created() {
			this.$store.commit('breadcrumbs', [
				{text: 'Notifications', to: {name: 'notifications-list'}},
				'Compose'
			]);
			axios.get('http://localhost:8080/index.php/api/data/blocks/' + this.$route.params.id)
				.then(response => this.notificationBlocks = response.data);
		},
		components: {
			draggable,
		},
		methods: {
			updateBlocks: function (event) {
				if (event.added) {
					console.log("Added");
					console.log(event.added);
				} else if (event.moved) {
					console.log("Moved");
					console.log(event.moved);
				} else if (event.removed) {
					console.log("Removed");
					console.log(event.removed);
				}
			},
		},
	};
</script>

<style>
	.icon {
		width: 1.25em;
		height: 1.25em;
		margin-left: 1em;
	}
</style>
