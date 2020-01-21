<template>
	<div>
		<p class="orderTitle">
			ここに入れて
			<span @click="clearSelectedItems">
				<i class="fas fa-sync-alt"></i>
			</span>
		</p>
		<p>
			<img class="nabe" @click="createItem" src="/img/nabe.png" />
		</p>
	</div>
</template>

<script>
	import { EventBus } from "../eventBus.js";

	export default {
		data() {
			return {
				selectedItems: null
			};
		},
		methods: {
			clearSelectedItems() {
				this.selectedItems = [];
				EventBus.$emit("clearSelectedItem", this.selectedItems);
			},
			createItem() {
				EventBus.$emit("createItem", "ok");
			}
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