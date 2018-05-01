<template>
	<div>
		<page-header title="Edit notification"></page-header>
		<div class="row">
			<div class="col-3">
				<h4>Available blocks</h4>
				<draggable element="div" class="row" v-model="allowedBlocks" :options="{sort: false, draggable: '.notification-block', group: {name: 'allowedBlocks', pull: 'clone', put: false}}" :clone="cloneBlock">
					<div v-for="block in allowedBlocks" class="col-6 notification-block" :class="'block-' + block.type">
						<div class="placeholder">
							<div class="type">{{ block.label }}</div>
						</div>
					</div>
				</draggable>
			</div>
			<div class="col-3">
				<h4>Notification blocks</h4>
				<label>
					<input type="checkbox" v-model="editDisabled"/>
					Disable sort and publication
				</label>
				<draggable element="div" class="row no-gutters" v-model="notificationBlocks" :options="{sort: !editDisabled, draggable: '.notification-block', group: {name: 'blocks', pull: false, put: ['allowedBlocks']}}" @change="updateBlock">
					<div v-for="block in notificationBlocks" class="col-12 notification-block" :class="'block-' + block.type" :key="block.id">
						<div class="placeholder">
							<div class="type">{{ block.type }}</div>
							<div class="controls">
								<router-link :to="{name: 'block-edit', params: {id: block.id}}">
									<img :src="icons.pencil" class="icon"/>
								</router-link>
								<a @click.prevent="deleteBlock">
									<img :src="icons.x" class="icon"/>
								</a>
							</div>
						</div>
						<div class="row">
							<div class="col" v-for="lang in languages">
								<label>
									<input type="checkbox" :data-id="block.id" :data-lang="lang" :disabled="editDisabled"/>
									{{ lang.toUpperCase() }}
								</label>
							</div>
						</div>
					</div>
				</draggable>
			</div>
			<div class="col-6">
				<h4>Preview</h4>
				{{ notificationBlocks | json }}
			</div>
		</div>
	</div>
</template>

<script>
	import api from '../api/notifications.js';
	import draggable from 'vuedraggable';
	import pencilIconSvg from 'open-iconic/svg/pencil.svg';
	import xIconSvg from 'open-iconic/svg/x.svg';
	import config from '../config.js';
	import PageHeader from '../components/PageHeader.vue';

	export default {
		data() {
			return {
				allowedBlocks: [],
				notificationBlocks: [],
				icons: {
					pencil: pencilIconSvg,
					x: xIconSvg
				},
				editDisabled: true,
				languages: config.languages,
				notificationId: this.$route.params.id,
			};
		},
		created() {
			this.$store.commit('breadcrumbs/set', ['Notifications', 'Edit']);
			api.getAllowedBlocks(this.notificationId)
				.then(response => this.allowedBlocks = response.data);
			api.getNotificationBlocks(this.notificationId)
				.then(response => this.notificationBlocks = response.data);
		},
		components: {
			draggable,
			PageHeader,
		},
		methods: {
			updateBlock(event) {
				if (event.added) {
					api.createBlock(this.notificationId, event.added.element.type)
						.then(response => event.added.element.id = response.data.id);
				} else if (event.moved) {
					console.log("Moved");
					console.log(event.moved);
				} else if (event.removed) {
					console.log("Removed");
					console.log(event.removed);
				}
			},
			deleteBlock() {
				confirm('Are you sure you want to delete this block?');
			},
			cloneBlock(block) {
				return {
					id: 0,
					type: block['type'],
					properties: {},
				};
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

	.notification-block {
		outline: 1px dashed red;
		margin-bottom: 10px;
	}
	
	.notification-block > .placeholder {
		width: 100%;
		height: auto;
		padding-top: 25%;
		background-size: contain;
		background-repeat: no-repeat;
		position: relative;
	}
	
	.notification-block > .placeholder {
		background-image: url('//placehold.it/400x100');
	}
	
	.notification-block.block-text > .placeholder {
		background-image: url('//placehold.it/400x100?text=Text');
	}
	
	.notification-block.block-button > .placeholder {
		background-image: url('//placehold.it/400x100?text=Button');
	}
	
	.notification-block.block-banner > .placeholder {
		background-image: url('//placehold.it/400x100?text=Banner');
	}
	
	.notification-block > .placeholder > .type {
		position: absolute;
		top: 3px;
		left: 5px;
	}
	
	.notification-block > .placeholder > .controls {
		position: absolute;
		top: 3px;
		right: 5px;
	}
</style>
