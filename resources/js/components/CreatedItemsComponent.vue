<template>
	<div>
		<span v-if="selectedItems" @change="filterItems">
			<div v-for="(selectedItem, index) in selectedItems" :key="index">{{ selectedItem }}</div>
		</span>
		{{ allItems }}
		<transition name="slide-fade">
			<modal-component class="modal backHasigo" id="itemModal" :showing="itemModal" v-if="createditems">
				<div class="itemModal" v-for="(createditem, index) in createditems" :key="index">
					<i @click="itemModal = !itemModal; clearSelectedItems()" class="fas fa-times"></i>
					<img class="hasigo" :src="'/img/item/' + createditem.path" alt="">
					<p class="itemtextmodal">はしごができました！</p>
				</div>
			</modal-component>
		</transition>
	</div>
</template>

<script>
	import { EventBus } from "../eventBus.js";

	export default {
		props: ["createditems"],
		data() {
			return {
				selectedItems: null,
				allItems: {},
				filteredItems: null,
				itemModal: false
			};
		},
		created() {
			// Listen for the add items event and its payload.
			EventBus.$on("addSelectedItem", selectedItemList => {
				this.selectedItems = [];
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
			});

			EventBus.$on("clearSelectedItem", selectedItems => {
				this.selectedItems = selectedItems;
				this.allItems = selectedItems;
			});

			EventBus.$on("createItem", () => {
				if(this.allItems.id1 == 2 && this.allItems.id2 == 1) {
					this.itemModal = !this.itemModal;
				}
			})
		},
		methods: {
			filterItems() {
				this.filteredItems = { ...this.selectedItems };
			},
			clearSelectedItems() {
				// window.location.reload();
			},
		}
	};
</script>

<style lang="scss" scoped>
</style>