<template>
	<div>
		<div v-if="usagiitems">
			<draggable
				class="itemList"
				:options="options"
				:group="{ name: 'usagiitems', pull: 'clone', put: false }"
			>
				<div class="item" v-for="(item, index) in usagiitems" :key="index">
					<p>
						<img class="itemsToSelect" :class="item.name" :src="'/img/item/' + item.path" />
					</p>
					<!-- <p>{{ item.name }}</p> -->
				</div>
			</draggable>
			<draggable class="itemList itemList2 " :options="options" group="usagiitems" @add="onAdd"></draggable>
		</div>
		<div v-else-if="kumaitems">
			<draggable
				class="itemList"
				:options="options"
				:group="{ name: 'kumaitems', pull: 'clone', put: false }"
			>
				<div class="item" v-for="(item, index) in kumaitems" :key="index">
					<p>
						<img class="itemsToSelect" :class="item.name" :src="'/img/item/' + item.path" />
					</p>
					<!-- <p>{{ item.name }}</p> -->
				</div>
			</draggable>
			<draggable class="itemList itemList2" :options="options" group="kumaitems" @add="onAdd"></draggable>
		</div>
		<div v-else-if="risuitems">
			<draggable
				class="itemList"
				:options="options"
				:group="{ name: 'risuitems', pull: 'clone', put: false }"
			>
				<div class="item" v-for="(item, index) in risuitems" :key="index">
					<p>
						<img class="itemsToSelect" :class="item.name" :src="'/img/item/' + item.path" />
					</p>
					<!-- <p>{{ item.name }}</p> -->
				</div>
			</draggable>
			<draggable class="itemList itemList2" :options="options" group="risuitems" @add="onAdd"></draggable>
		</div>
	</div>
</template>

<script>
	import draggable from "vuedraggable";
	import { EventBus } from "../eventBus.js";

	export default {
		props: ["usagiitems", "kumaitems", "risuitems"],
		components: {
			draggable
		},
		data() {
			return {
				selectedItemList: [],
				selectedItems: [],
				clickCount: 0,
				options: {
					animation: 200,
					sort: false
				}
			};
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
			onAdd(event) {
				// console.log(e.oldIndex + 1);
				this.selectedItemList.push({
					id: event.oldIndex + 1,
					class: "select"
				});
				this.addSelectedItems();
			}
		},
		watch: {
			selectedItemList: {
				handler(val) {
					EventBus.$emit("checkAddedItems");
				},
				deep: true
			},
			items: {
				handler(val1, val2) {
					console.log(val1);
					console.log(val2);
				},
				deep: true
			}
		}
	};
</script>

<style lang="scss" scoped>
</style>