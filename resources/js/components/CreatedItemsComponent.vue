<template>
	<div>
		<span v-if="selectedItems">
			<div v-for="(selectedItem, index) in selectedItems" :key="index">{{ selectedItem }}</div>
		</span>
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
		created() {
			// Listen for the add items event and its payload.
			EventBus.$on("addSelectedItem", selectedItemList => {
				this.selectedItems = [];
				this.selectedItems.push(selectedItemList);
			});

			EventBus.$on("clearSelectedItem", selectedItems => {
				this.selectedItems = selectedItems;
			});
		}
	};
</script>

<style lang="scss" scoped>
</style>