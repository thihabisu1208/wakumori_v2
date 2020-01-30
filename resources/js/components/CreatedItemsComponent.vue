<template>
	<div>
		<!-- {{ usagicreateditems }} -->
		<div v-if="showItem" class="fadeIn">
			<div class="createdItems" v-for="(createditem, index) in usagicreateditems" :key="index">
				<a @click="completeUsagi">
					<img :class="createditem.path" :src="'/img/item/' + createditem.path + '.png'" alt />
				</a>
			</div>
		</div>
		<div v-if="showItem2" class="fadeIn">
			<div class="createdItems">
				<a @click="completeKuma1">
					<img src="/img/item/kagu_cushion.png" alt />
				</a>
			</div>
		</div>
		<div v-if="showItem3" class="fadeIn">
			<div class="createdItems">
				<a @click="completeKuma2">
					<img src="/img/item/elevator_door_close.png" alt />
				</a>
			</div>
		</div>

		<div v-if="risuShowItem1" class="fadeIn">
			<div class="createdItems">
				<a @click="incompleteRisu">
					<img src="/img/item/hashigo_wood.png" alt />
				</a>
			</div>
		</div>

		<div v-if="risuShowItem2" class="fadeIn">
			<div class="createdItems">
				<a @click="incompleteRisu2">
					<img src="/img/item/kagu_cushion.png" alt />
				</a>
			</div>
		</div>

		<div v-if="risuShowItem3" class="fadeIn">
			<div class="createdItems">
				<a @click="incompleteRisu3">
					<img src="/img/item/elevator_door_close.png" alt />
				</a>
			</div>
		</div>

		<div v-if="risuShowItem4" class="fadeIn">
			<div class="createdItems">
				<a @click="incompleteRisu4">
					<img src="/img/item/fusen.png" alt />
				</a>
			</div>
		</div>

		<div v-if="risuShowItem5" class="fadeIn">
			<div class="createdItems">
				<a @click="completeRisu1">
					<img src="/img/item/kikyuu.png" alt />
				</a>
			</div>
		</div>

		<div v-if="risuShowItem6" class="fadeIn">
			<div class="createdItems">
				<a @click="completeRisu2">
					<img src="/img/item/airplane_ornithopter.png" alt />
				</a>
			</div>
		</div>
		<!-- <div v-if="kumaItemModal2" class="fadeIn">
			<div class="createdItems">
				<a @click="completeKuma">
				<a>
					<img src="/img/item/dougu_board_wood.png" alt />
				</a>
			</div>
		</div>-->
		<transition name="slide-fade">
			<modal-component
				class="modal backHasigo"
				id="itemModal"
				:showing="itemModal"
				v-if="usagicreateditems"
			>
				<div class="itemModal" v-for="(createditem, index) in usagicreateditems" :key="index">
					<i @click="itemModal = !itemModal" class="fas fa-times"></i>
					<img
						@click="itemModal = !itemModal; showUsagiHint3(); "
						class="hashigo"
						:src="'/img/item/' + createditem.path + '.png'"
						alt
					/>
					<p class="itemtextmodal">はしごができました！</p>
				</div>
			</modal-component>
		</transition>
		<transition name="slide-fade">
			<modal-component
				class="modal backHasigo"
				id="itemModal"
				:showing="kumaItemModal1"
				v-if="kumacreateditems"
			>
				<div class="itemModal">
					<i @click="kumaItemModal1 = !kumaItemModal1" class="fas fa-times"></i>
					<img
						@click="kumaItemModal1 = !kumaItemModal1; showKumaHint3(); "
						class="hashigo"
						src="/img/item/kagu_cushion.png"
						alt
					/>
					<p class="itemtextmodal">クッションができました！</p>
				</div>
			</modal-component>
		</transition>
		<transition name="slide-fade">
			<modal-component
				class="modal backHasigo"
				id="itemModal"
				:showing="kumaItemModal2"
				v-if="kumacreateditems"
			>
				<div class="itemModal">
					<i @click="kumaItemModal2 = !kumaItemModal2" class="fas fa-times"></i>
					<img
						@click="kumaItemModal2 = !kumaItemModal2; showKumaHint4(); "
						class="hashigo"
						src="/img/item/elevator_door_close.png"
						alt
					/>
					<p class="itemtextmodal">エレベーターができました！</p>
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
		<transition name="slide-fade">
			<modal-component class="modal" :showing="clearModal2">
				<div class="modalData">
					<h1>くまさんを助けることできた！</h1>
					<div class="modalContent">
						<div class="saruModal">
							<img src="/img/saruModal.png" alt />
						</div>
						<div>
							<h1>おめでとう！</h1>
						</div>
						<div class="usagiModal">
							<img src="/img/kumaModal.png" alt />
						</div>
					</div>
				</div>
			</modal-component>
		</transition>
		<transition name="slide-fade">
			<modal-component class="modal" :showing="clearModal3">
				<div class="modalData">
					<h1>りすさんを助けることできた！</h1>
					<div class="modalContent">
						<div class="saruModal">
							<img src="/img/saruModal.png" alt />
						</div>
						<div>
							<h1>おめでとう！</h1>
						</div>
						<div class="usagiModal">
							<img src="/img/risuModal.png" alt />
						</div>
					</div>
				</div>
			</modal-component>
		</transition>
		<transition name="slide-fade">
			<modal-component class="modal" :showing="unclearModal">
				<div class="modalData">
					<h1>りすさんを助けることできなかった。。</h1>
					<div class="modalContent">
						<div class="saruModal">
							<img src="/img/saruModal2.png" alt />
						</div>
						<div>
							<h1>残念！</h1>
						</div>
						<div class="usagiModal">
							<img src="/img/risuModal2.png" alt />
						</div>
					</div>
					<p class="buttons">
						<a @click="refresh">もう一度やってみる</a>
					</p>
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
		props: [
			"nowgame",
			"usagicreateditems",
			"kumacreateditems",
			"risucreateditems"
		],
		data() {
			return {
				selectedItems: null,
				allItems: {},
				filteredItems: null,
				itemModal: false,
				showItem: false,
				showItem2: false,
				showItem3: false,
				clearModal: false,
				clearModal2: false,
				clearModal3: false,
				kumaItemModal1: false,
				kumaItemModal2: false,
				unclearModal: false,
				risuShowItem1: false,
				risuShowItem2: false,
				risuShowItem3: false,
				risuShowItem4: false,
				risuShowItem5: false,
				risuShowItem6: false
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

				if (this.allItems.id2 == 2) {
					EventBus.$emit("createKumaItem1");
				}

				if (this.allItems.id4 == 1 && this.allItems.id5 == 1) {
					this.kumaItemModal2 = !this.kumaItemModal2;
				}

				if (this.allItems.id3 == 2) {
					this.kumaItemModal1 = !this.kumaItemModal1;
				}

				if (this.risucreateditems) {
					if(this.allItems.id1 == 2 && this.allItems.id2 == 1) {
						this.risuShowItem1 = !this.risuShowItem1;
					}

					if(this.allItems.id3 == 2) {
						this.risuShowItem2 = !this.risuShowItem2;
					}

					if(this.allItems.id4 == 1 && this.allItems.id5 == 1) {
						this.risuShowItem3 = !this.risuShowItem3;
					}

					if(this.allItems.id2 == 2 && this.allItems.id3 == 1) {
						this.risuShowItem4 = !this.risuShowItem4;
					}

					if(this.allItems.id7 == 1 && this.allItems.id8 == 1 && this.allItems.id9 == 1) {
						this.risuShowItem5 = !this.risuShowItem5;
					}

					if(this.allItems.id4 == 1 && this.allItems.id7 == 1 && this.allItems.id9 == 1) {
						this.risuShowItem6 = !this.risuShowItem6;
					}
				}
			});

			EventBus.$on("checkAddedItems", () => {
				let nabe = document.querySelector('.nabe');
				nabe.classList.add('nabeMove');
				setTimeout(() => {
					nabe.classList.remove('nabeMove');
				}, 500)

				if (this.usagicreateditems) {
					if (this.allItems.id2 == 1) {
						EventBus.$emit("showUsagiHint1");
						if (this.allItems.id1 == 2) {
							EventBus.$emit("showUsagiHint2");
							// setTimeout(() => {
							// 	EventBus.$emit("showUsagiHint3");
							// }, 5000);
						}
					}
				}

				if (this.kumacreateditems) {
					if (this.allItems.id2 == 2) {
						EventBus.$emit("showKumaHint1");
					}

					if (this.allItems.id1 == 2) {
						EventBus.$emit("showKumaHint2");
					}

					if (this.allItems.id3 == 2) {
						EventBus.$emit("nuno");
					}
				}

				if (this.risucreateditems) {
					if (this.allItems.id6 == 2) {
						EventBus.$emit("ishi");
					}

					if (this.allItems.id3 == 3) {
						EventBus.$emit("bignuno");
					}
				}
			});
		},
		methods: {
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

				axios.post('/completeUsagiGame', 1)
					.then(response => {
						console.log(response)
					})
					.catch(error => {
						console.log(error);
					})
			},
			showUsagiHint3() {
				this.showItem = !this.showItem;
				if (this.showItem !== null) {
					EventBus.$emit("showUsagiHint3");
				}
			},
			incompleteKuma() {
				let tl = gsap.timeline();
				// tl.to(".himo", {duration: 0.5, border: "transparent"});
				tl.to(".hashigoTop", { duration: 1, opacity: 1, top: "70%" });
				tl.to(".hashigo_wood", { duration: 1, border: "transparent" });
				tl.to(".saru", { duration: 2, left: "48%" });
				tl.to(".saru", { duration: 1.5, top: "45%" });
				setTimeout(() => {
					this.unclearModal = true;
					this.clearSelectedItems();
					setTimeout(() => {
						this.unclearModal = false;
					}, 3000);
				}, 6000);

			},
			completeKuma1() {
				let tl = gsap.timeline();
				// tl.to(".himo", {duration: 0.5, border: "transparent"});
				tl.to(".cushion", { duration: 1, opacity: 1 });
				tl.to(".saru", { duration: 2, left: "65%" });
				tl.to("#kuma", { duration: 1, scaleX: -1 });
				tl.to("#kuma", { duration: 0.5, top: "-50px"});
				tl.to("#kuma", { duration: 1.5, right: "-10%", top: "200px"});
				setTimeout(() => {
					this.clearModal2 = true;
					this.clearSelectedItems();
					EventBus.$emit("completedKuma");
					setTimeout(() => {
						this.clearModal2 = false;
					}, 3000);
				}, 6000);

				axios.post('/completeKumaGame', 1)
					.then(response => {
						console.log(response)
					})
					.catch(error => {
						console.log(error);
					})
			},
			completeKuma2() {
				let tl = gsap.timeline();
				// tl.to(".himo", {duration: 0.5, border: "transparent"});
				tl.to(".elevatorOpen", { duration: 1, opacity: 1 });
				tl.to(".saru", { duration: 2, left: "50%" });
				tl.to(".elevatorOpen", { duration: 0, opacity: 0 });
				tl.to(".saru", { duration:0, zIndex: 1 });
				tl.to(".elevatorClose", { duration: 0, opacity: 1, zIndex: 2 });
				tl.to(".goUp", { duration: 1.5, top: "40%" });
				tl.to(".elevatorClose", { duration: 0, opacity: 0 });
				tl.to(".elevatorOpen", { duration: 0, opacity: 1, zIndex: 1 });
				tl.to(".saru", { duration:1, zIndex: 2 });
				setTimeout(() => {
					this.clearModal2 = true;
					this.clearSelectedItems();
					EventBus.$emit("completedKuma");
					setTimeout(() => {
						this.clearModal2 = false;
					}, 3000);
				}, 6000);

				axios.post('/completeKumaGame', 1)
					.then(response => {
						console.log(response)
					})
					.catch(error => {
						console.log(error);
					})
			},
			showKumaHint3() {
				this.showItem2 = !this.showItem2;
				if (this.showItem2 !== null) {
					EventBus.$emit("showKumaHint3");
				}
			},
			showKumaHint4() {
				this.showItem3 = !this.showItem3;
				if (this.showItem3 !== null) {
					EventBus.$emit("showKumaHint4");
				}
			},
			incompleteRisu() {
				let tl = gsap.timeline();
				// tl.to(".himo", {duration: 0.5, border: "transparent"});
				tl.to(".hashigoTop", { duration: 1, opacity: 1, top: "58%" });
				tl.to(".saru", { duration: 2, left: "48%" });
				tl.to(".saru", { duration: 1.5, top: "55%" });
				setTimeout(() => {
					this.unclearModal = true;
					this.clearSelectedItems();
				}, 5000);
			},
			incompleteRisu2() {
				let tl = gsap.timeline();
				// tl.to(".himo", {duration: 0.5, border: "transparent"});
				tl.to(".cushion", { duration: 1, opacity: 1 });
				tl.to(".cushion", { duration: 1.5, top: "300%" });
				setTimeout(() => {
					this.unclearModal = true;
					this.clearSelectedItems();
				}, 3000);
			},
			incompleteRisu3() {
				let tl = gsap.timeline();
				tl.to(".elevatorOpen", { duration: 1, opacity: 1 });
				tl.to(".saru", { duration: 2, left: "45%" });
				tl.to(".elevatorOpen", { duration: 0, opacity: 0 });
				tl.to(".saru", { duration:0, zIndex: 1 });
				tl.to(".elevatorClose", { duration: 0, opacity: 1, zIndex: 2 });
				tl.to(".goDown", { duration: 2, ease: "elastic.out(1.75, 0.5)", top: "70%" });
				tl.to(".saru", { duration:1, zIndex: 2 });
				setTimeout(() => {
					this.unclearModal = true;
					this.clearSelectedItems();
				}, 5000);
			},
			completeRisu1() {
				let tl = gsap.timeline();
				tl.to(".kikyuu", { duration: 1, opacity: 1 });
				tl.to(".saru", { duration: 2, left: "45%" });
				tl.to(".saru", { duration: 0, opacity: 0 });
				tl.to(".fly", { duration: 2, top: "30%" });
				tl.to(".saru", { duration: 1, opacity: 1 });
				setTimeout(() => {
					this.clearModal3 = true;
					this.clearSelectedItems();
					EventBus.$emit("completedRisu");
					setTimeout(() => {
						this.clearModal3 = false;
					}, 3000);
				}, 6000);
			},
			completeRisu2() {
				let tl = gsap.timeline();
				tl.to(".koukyuu", { duration: 1, opacity: 1 });
				tl.to(".saru", { duration: 2, left: "20%" });
				tl.to(".saru", { duration: 0, opacity: 0 });
				tl.to(".fly", { duration: 2, top: "30%", left: "50%" });
				tl.to(".saru", { duration: 1, opacity: 1 });
				setTimeout(() => {
					this.clearModal3 = true;
					this.clearSelectedItems();
					EventBus.$emit("completedRisu");
					setTimeout(() => {
						this.clearModal3 = false;
					}, 3000);
				}, 6000);
			},
			refresh() {
				window.location.reload();
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