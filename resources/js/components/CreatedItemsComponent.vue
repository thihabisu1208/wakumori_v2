<template>
	<div>
		<span v-if="selectedItems" @change="filterItems">
			<div v-for="(selectedItem, index) in selectedItems" :key="index">{{ selectedItem }}</div>
		</span>
		{{ allItems }}
		<div v-if="allItems.id1 === 2 && allItems.id2 === 1" class="showItem">
			<img src="/img/item/hashigo_wood.png" alt />
		</div>
	</div>
</template>

<script>
	import { EventBus } from "../eventBus.js";

	export default {
		data() {
			return {
				selectedItems: null,
				allItems: {},
				filteredItems: null
			};
		},
		created() {
			// Listen for the add items event and its payload.
			EventBus.$on("addSelectedItem", selectedItemList => {
				this.selectedItems = [];
				console.log(this.selectedItems);
				this.selectedItems.push(selectedItemList);
				if (
					this.allItems[
						"id" + this.selectedItems[0][this.selectedItems[0].length - 1].id
					]
				) {
					this.allItems[
						"id" + this.selectedItems[0][this.selectedItems[0].length - 1].id
					] += 1;
				} else {
					this.allItems[
						"id" + this.selectedItems[0][this.selectedItems[0].length - 1].id
					] = 1;
				}
				console.log(this.allItems);
			});

			EventBus.$on("clearSelectedItem", selectedItems => {
				this.selectedItems = selectedItems;
				this.allItems = selectedItems;
			});
		},
		methods: {
			filterItems() {
				this.filteredItems = { ...this.selectedItems };
			}
		}
	};
</script>

<style lang="scss" scoped>
</style>