<template>
	<div>
		<p class="orderTitle">
			ここに入れて
			<span @click="clearSelectedItems">
				<i class="fas fa-sync-alt"></i>
			</span>
		</p>

		<!-- Usagi -->
		<p v-if="usagicreateditems">
			<img class="nabe nabe1" @click="createItem" src="/img/nabe.png" />
		</p>

		<!-- Kuma -->
		<p v-else-if="kumacreateditems">
			<!-- 縄を作る -->
			<a v-if="showRope == true" href="/createKumaItem1">
				<img class="nabe" src="/img/nabe.png" />
			</a>
			<!-- 板を作る -->
			<a v-else-if="showIta == true" href="/createKumaItem2">
				<img class="nabe" src="/img/nabe.png" />
			</a>
			<img v-else class="nabe" @click="createItem" src="/img/nabe.png" alt />
		</p>

		<!-- Risu -->
		<p v-else-if="risucreateditems">
			<!-- 火を作る -->
			<a href="/createrisuitem1" v-if="risuIshi == true">
				<img class="nabe" src="/img/nabe.png" />
			</a>
			<!-- 箱を作る -->
			<a href="/createrisuitem2" v-else-if="risuIta == true">
				<img class="nabe" src="/img/nabe.png" />
			</a>
			<img v-else class="nabe" @click="createItem" src="/img/nabe.png" />
		</p>
	</div>
</template>

<script>
	import { EventBus } from "../eventBus.js";

	export default {
		props: ["usagicreateditems", "kumacreateditems", "risucreateditems"],
		data() {
			return {
				selectedItems: null,
				kumaNuno: false,
				risuIshi: false,
				risuIta: false,
				risuNuno: false,
				showRope: false,
				showIta: false
			};
		},
		mounted() {
			EventBus.$on("showKumaHint1", () => {
				this.kumaItem1 = !this.kumaItem1;
			});

			EventBus.$on("showRope", () => {
				this.showRope = !this.showRope;
			});

			EventBus.$on("showIta", () => {
				this.showIta = !this.showIta;
			});

			EventBus.$on("nuno", () => {
				console.log("ok");
				this.kumaNuno = !this.kumaNuno;
			});

			EventBus.$on("ishi", () => {
				this.risuIshi = !this.risuIshi;
			});

			EventBus.$on("ita", () => {
				this.risuIta = !this.risuIta;
			});

			EventBus.$on("bignuno", () => {
				this.risuNuno = !this.risuNuno;
			});
		},
		methods: {
			clearSelectedItems() {
				this.selectedItems = [];
				EventBus.$emit("clearSelectedItem", this.selectedItems);
				location.reload();
			},
			createItem() {
				EventBus.$emit("createItem", "ok");
			},
		}
	};
</script>

<style lang="scss" scoped>
	.itemList {
		width: 50%;
		display: grid;
		grid-template-columns: repeat(3, 1fr);

		img {
			width: 50%;
		}

		p {
			text-align: center;
		}
	}
</style>