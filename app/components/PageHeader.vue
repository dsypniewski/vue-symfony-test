<template>
	<nav class="navbar navbar-light bg-light sticky-top">
		<div class="navbar-brand">
			<h2 class="mb-0">{{ title }}</h2>
		</div>
		<div class="btn-group">
			<slot></slot>
		</div>
	</nav>
</template>
<script>
	export default {
		props: ['title'],
		name: 'page-header',
	}
</script>
