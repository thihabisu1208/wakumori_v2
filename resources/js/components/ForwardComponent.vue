<template>
	<p class="moveBtn buttons">
		<!-- Usagi Forward -->
		<span v-if="completedgameusagi">
			<a href="/home" v-if="completedUsagi == true">
				すすむ
				<i class="fas fa-arrow-right" style="padding-left: 10px;"></i>
			</a>
			<span v-else="completedUsagi == false">
				<i class="fas fa-hammer"></i>作れるもの : 1
			</span>
		</span>

		<!-- Kuma Forward -->
		<span v-else-if="completedgamekuma">
			<a href="/home" v-if="completedKuma == true">
				すすむ
				<i class="fas fa-arrow-right" style="padding-left: 10px;"></i>
			</a>
			<span v-else="completedKuma == false">
				<i class="fas fa-hammer"></i>作れるもの : 2
			</span>
		</span>

		<!-- Risu Forward -->
		<span v-else-if="completedgamerisu">
			<a href="/home" v-if="completedRisu == true">
				すすむ
				<i class="fas fa-arrow-right" style="padding-left: 10px;"></i>
			</a>
			<span v-else="completedRisu == false">
				<i class="fas fa-hammer"></i>作れるもの : 探してみよう
			</span>
		</span>
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

			EventBus.$on("completedRisu", () => {
				this.completedRisu = true;
			});
		}
	};
</script>

<style lang="scss" scoped>
</style>