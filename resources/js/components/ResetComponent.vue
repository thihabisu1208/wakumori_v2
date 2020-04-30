<template>
	<p class="buttons">
		<a href="/" @click="restart">戻る</a>
	</p>
</template>

<script>
	export default {
		methods: {
			restart() {
				axios
					.post("/restartGame", 1)
					.then(response => {
						console.log(response);
					})
					.catch(error => {
						console.log(error);
					});
			}
		}
	};
</script>

<style lang="scss" scoped>
	p {
		font-size: 1.2rem;
		position: absolute;
        top: 25%;
		right: 2%;
	}
</style>
