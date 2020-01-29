<template>
	<p class="moveBtn buttons">
		<a href="/completeGame" v-if="completedUsagi == true">
			すすむ
			<i class="fas fa-arrow-right" style="padding-left: 10px;"></i>
		</a>
		<a href="/completeGame1" v-else-if="completedKuma == true">
			すすむ
			<i class="fas fa-arrow-right" style="padding-left: 10px;"></i>
		</a>
		<a href="/completeGame2" v-else-if="completedRisu == true">
			すすむ
			<i class="fas fa-arrow-right" style="padding-left: 10px;"></i>
		</a>
	</p>
</template>

<script>
	import { EventBus } from "../eventBus.js";

	export default {
		props: ["completedgameusagi", "completedgamekuma", "completedgamerisu"],
		data() {
			return {
				completedUsagi: false,
				completedKuma: false,
				completedRisu: false
			};
		},
		mounted() {
			EventBus.$on("completedUsagi", () => {
				this.completedUsagi = true;
			});

			EventBus.$on("completedKuma", () => {
				this.completedKuma = true;
			});
		}
	};
</script>

<style lang="scss" scoped>
</style>