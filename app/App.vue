<template>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<b-breadcrumb :items="breadcrumbs"/>	
			</div>
		</div>
		<div class="row">
			<div class="col-2">
				<sidebar></sidebar>
			</div>
			<div class="col-10">
				<router-view :key="$route.fullPath"></router-view>
			</div>
		</div>
	</div>
</template>

<script>
	import { mapState } from 'vuex'
	import 'bootstrap/dist/css/bootstrap.min.css';
	import Sidebar from '@components/Sidebar.vue';
	
	export default {
		components: {
			sidebar: Sidebar
		},
		name: 'app',
		computed: mapState(["breadcrumbs"]),
	}
</script>
