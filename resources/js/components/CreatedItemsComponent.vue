<template>
	<div>
		<div v-if="showItem" class="fadeIn">
			<div class="createdItems" v-for="(createditem, index) in createditems" :key="index">
				<a @click="completeUsagi">
					<img :class="createditem.path" :src="'/img/item/' + createditem.path + '.png'" alt />
				</a>
			</div>
		</div>
		<transition name="slide-fade">
			<modal-component
				class="modal backHasigo"
				id="itemModal"
				:showing="itemModal"
				v-if="createditems"
			>
				<div class="itemModal" v-for="(createditem, index) in createditems" :key="index">
					<i @click="itemModal = !itemModal" class="fas fa-times"></i>
					<img
						@click="itemModal = !itemModal; addHint(); "
						:src="'/img/item/' + createditem.path + '.png'"
						alt
					/>
					<p class="itemtextmodal">はしごができました！</p>
				</div>
			</modal-component>
		</transition>
		<transition name="slide-fade">
			<modal-component class="modal" :showing="clearModal">
				<div class="modalData">
					<h1>うさぎを助けることできた！</h1>
					<div class="modalContent">
						<div class="saruModal">
							<img src="/img/saruModal.png" alt />
						</div>
						<div>
							<h1>おめでとう！</h1>
						</div>
						<div class="usagiModal">
							<img src="/img/usagiModal.png" alt />
						</div>
					</div>
				</div>
			</modal-component>
		</transition>
	</div>
</template>

<script>
	import { gsap } from "gsap";
	import { TextPlugin } from "gsap/TextPlugin.js";
	import { EventBus } from "../eventBus.js";

	export default {
		props: ["nowgame", "createditems"],
		data() {
			return {
				selectedItems: null,
				allItems: {},
				filteredItems: null,
				itemModal: false,
				showItem: false,
				clearModal: false
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
				if (this.allItems.id1 == 2 && this.allItems.id2 == 1) {
					this.itemModal = !this.itemModal;
					// EventBus.$emit("addedItem");
				}
			});

			EventBus.$on("checkAddedItems", () => {
				if (this.allItems.id2 == 1) {
					EventBus.$emit("showHint");
					if (this.allItems.id1 == 2) {
						EventBus.$emit("showHint2");
						setTimeout(() => {
							EventBus.$emit("showHint3");
						}, 5000);
					}
				}
			});
		},
		methods: {
			filterItems() {
				this.filteredItems = { ...this.selectedItems };
			},
			clearSelectedItems() {
				gsap.to(".nabe", { duration: 1, border: "transparent" });
				gsap.to(".saruBot", { duration: 1, opacity: 0 });
				gsap.to(".saruText", { duration: 1, opacity: 0 });
				// window.location.reload();
			},
			completeUsagi() {
				let tl = gsap.timeline();
				// tl.to(".himo", {duration: 0.5, border: "transparent"});
				tl.to(".hashigoTop", { duration: 1, opacity: 1, top: "70%" });
				tl.to(".hashigo_wood", { duration: 1, border: "transparent" });
				tl.to(".saru", { duration: 2, left: "48%" });
				tl.to(".saru", { duration: 1.5, top: "45%" });
				setTimeout(() => {
					this.clearModal = true;
					this.clearSelectedItems();
					EventBus.$emit("completedUsagi");
					setTimeout(() => {
						this.clearModal = false;
					}, 3000);
				}, 6000);
			},
			addHint() {
				this.showItem = !this.showItem;
				if (this.showItem !== null) {
					EventBus.$emit("addHint");
				}
			}
		},
		watch: {
			selectedItems: {
				handler(val) {
					if (val && val[0].length > 3) {
						this.selectedItems = [];
						this.allItems = {};
						EventBus.$emit();
					}
				},
				deep: true
			}
		}
	};
</script>

<style lang="scss" scoped>
</style>