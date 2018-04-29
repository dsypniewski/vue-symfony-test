<template>
	<ul class="nav nav-pills flex-column">
		<li class="nav-item" v-for="item in nav">
			<router-link :to="item.route" class="nav-link" active-class="active" exact>{{ item.title }}</router-link>
		</li>
	</ul>
</template>

<script>
	export default {
		data() {
			return {
				'nav': [
					{title: "Notifications", route: {name: "notifications-list"}},
					{title: "Header", route: {name: "header-settings"}},
					{title: "Footer", route: {name: "footer-settings"}}
				]
			};
		}
	}
</script>
