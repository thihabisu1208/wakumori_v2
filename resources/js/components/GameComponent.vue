<template>
	<div>
		<draggable
			class="itemList"
			:options="options"
			:group="{ name: 'items', pull: 'clone', put: false }"
		>
			<div class="item" v-for="(item, index) in items" :key="index">
				<p>
					<img :class="item.name" :src="'/img/item/' + item.path" />
				</p>
				<!-- <p>{{ item.name }}</p> -->
			</div>
		</draggable>
		<draggable class="itemList itemList2" :options="options" group="items" @add="onAdd"></draggable>
	</div>
</template>

<script>
	import draggable from "vuedraggable";
	import { EventBus } from "../eventBus.js";

	export default {
		props: ["items"],
		components: {
			draggable
		},
		data() {
			return {
				selectedItemList: [],
				selectedItems: [],
				clickCount: 0,
				options: {
					animation: 200
				}
			};
		},
		computed: {
			filteredItems() {
				return this.items.reduce((result, item) => [...result, item.id], []);
			}
		},
		created() {
			// Listen for the i-got-clicked event and its payload.
			EventBus.$on("clearSelectedItem", selectedItems => {
				this.selectedItemList = selectedItems;
			});
		},
		methods: {
			addSelectedItems() {
				// this.selectedItems.push(this.filteredItems)
				EventBus.$emit("addSelectedItem", this.selectedItemList);
			},
			onAdd(e) {
				// console.log(e.oldIndex + 1);
				this.selectedItemList.push({
					id: e.oldIndex + 1
				});
				this.addSelectedItems();
			}
		}
	};
</script>

<style lang="scss" scoped>
</style>