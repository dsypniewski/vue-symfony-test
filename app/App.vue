<template>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<top-nav></top-nav>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<router-view :key="$route.fullPath"></router-view>
			</div>
		</div>
	</div>
</template>

<script>
	import 'bootstrap/dist/css/bootstrap.min.css';
	import TopNav from './components/TopNav.vue';
	
	export default {
		components: {
			TopNav,
		},
	}
</script>
