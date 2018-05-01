<template>
	<nav class="navbar navbar-expand navbar-light bg-light">
		<div class="navbar-collapse">
			<ol class="navbar-nav">
				<li v-for="item in nav">
					<router-link class="nav-item nav-link" active-class="active" :to="item.route" exact>{{ item.title }}</router-link>
				</li>
			</ol>
		</div>
		<div>
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item" v-for="item in breadcrumbs">{{ item }}</li>
			</ol>
		</div>
	</nav>
</template>

<script>
	import { mapGetters } from 'vuex';
	export default {
		data() {
			return {
				'nav': [
					{title: "Notifications", route: {name: "notifications-list"}},
					{title: "Header", route: {name: "header-settings"}},
					{title: "Footer", route: {name: "footer-settings"}},
					{title: "Translations", route: {name: "translations"}},
				],
			};
		},
		computed: {
			...mapGetters({breadcrumbs: 'breadcrumbs/get'}),
		},
	}
</script>
