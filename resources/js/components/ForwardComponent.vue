<template>
	<div>
		<p v-if="completedUsagi == true" class="moveBtn buttons">
			<a href="/completeGame">
				すすむ
				<i class="fas fa-arrow-right" style="padding-left: 10px;"></i>
			</a>
		</p>
		<p v-else-if="completedKuma == true" class="moveBtn buttons">
			<a href="/completeGame1">
				すすむ
				<i class="fas fa-arrow-right" style="padding-left: 10px;"></i>
			</a>
		</p>
		<p v-else-if="completedRisu == true" class="moveBtn buttons">
			<a href="/completeGame2">
				すすむ
				<i class="fas fa-arrow-right" style="padding-left: 10px;"></i>
			</a>
		</p>
	</div>
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
		}
	};
</script>

<style lang="scss" scoped>
</style>