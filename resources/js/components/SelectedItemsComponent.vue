<template>
	<div>
		<p class="orderTitle">
			ここに入れて
			<span @click="clearSelectedItems" >
				<i class="fas fa-sync-alt"></i>
			</span>
		</p>

		<!-- Usagi -->
		<p v-if="usagicreateditems">
			<img class="nabe nabe1" @click="createItem" src="/img/nabe.png" />
		</p>

		<!-- Kuma -->
		<p v-else-if="kumacreateditems">
			<a
				v-if="kumaNuno != true && !kumacreateditems[3] && !kumacreateditems[4]"
				href="/createKumaItem1"
			>
				<img class="nabe" src="/img/nabe.png" />
			</a>
			<a
				v-else-if="kumaNuno != true && kumacreateditems[3] && !kumacreateditems[4]"
				href="/createKumaItem2"
			>
				<img class="nabe" src="/img/nabe.png" />
			</a>
			<img
				v-else-if="kumaNuno == true && kumacreateditems[3] && kumacreateditems[4]"
				class="nabe"
				@click="createItem"
				src="/img/nabe.png"
				alt
			/>
			<img
				v-else-if="kumaNuno != true && kumacreateditems[3] && kumacreateditems[4]"
				class="nabe"
				@click="createItem"
				src="/img/nabe.png"
				alt
			/>
		</p>

		<!-- Risu -->
		<p v-else-if="risucreateditems">
			<img v-if="risuIshi != true && risuNuno != true && !risucreateditems[6] && !risucreateditems[7] && !risucreateditems[8]" class="nabe" @click="createItem" src="/img/nabe.png" />
			<a href="/createrisuitem1" v-else-if="risuIshi == true && risuNuno != true && !risucreateditems[6] && !risucreateditems[7] && !risucreateditems[8]">
				<img class="nabe" src="/img/nabe.png" />
			</a>
			<a href="/createrisuitem2" v-else-if="risuIshi != true && risuNuno != true && risucreateditems[6] && !risucreateditems[7] && !risucreateditems[8]">
				<img class="nabe" src="/img/nabe.png" />
			</a>
			<a href="/createrisuitem3" v-else-if="risuIshi != true && risuNuno == true && risucreateditems[6] && risucreateditems[7] && !risucreateditems[8]">
				<img class="nabe" src="/img/nabe.png" />
			</a>
			<img v-if="risuIshi != true && risuNuno != true && risucreateditems[6] && risucreateditems[7]" class="nabe" @click="createItem" src="/img/nabe.png" />
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
				risuNuno: false
			};
		},
		mounted() {
			EventBus.$on("showKumaHint1", () => {
				this.kumaItem1 = !this.kumaItem1;
			});

			EventBus.$on("nuno", () => {
				console.log("ok");
				this.kumaNuno = !this.kumaNuno;
			});

			EventBus.$on("ishi", () => {
				console.log("ok");
				this.risuIshi = !this.risuIshi;
			});

			EventBus.$on("bignuno", () => {
				console.log("ok");
				this.risuNuno = !this.risuNuno;
			});
		},
		methods: {
			clearSelectedItems() {
				this.selectedItems = [];
				EventBus.$emit("clearSelectedItem", this.selectedItems);
				location.reload()
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