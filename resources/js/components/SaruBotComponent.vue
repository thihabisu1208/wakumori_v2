<template>
	<div class="saruBot">
		<img src="/img/saru.png" alt="saruBot" />
		<p v-if="gameusagi" class="saruText">
			うさぎを助けよう！
			<br />まずはひもを鍋に追加しよう〜
		</p>
		<p v-else-if="gamekuma" class="saruText">
			くまを助けよう！
			<br />まずは丈夫なひもを作ろう！
		</p>
		<p v-else-if="gamerisu" class="saruText">
			りすを助けよう！
			<br />まずは丈夫なひもを作ろう！
		</p>
	</div>
</template>

<script>
	import { gsap } from "gsap";
	import { TextPlugin } from "gsap/TextPlugin.js";
	import { EventBus } from "../eventBus.js";

	export default {
		props: ["gameusagi", "gamekuma", "gamerisu"],
		created() {
			gsap.registerPlugin(TextPlugin);
		},
		mounted() {
			this.addStart();

			EventBus.$on("showHint", () => {
				this.addMiddle();
			});

			EventBus.$on("showHint2", () => {
				this.addEnd();
			});

			EventBus.$on("addHint", () => {
				this.addEnd2();
			});
		},
		data() {
			return {
				saruBot: gsap.timeline()
			};
		},
		methods: {
			addStart() {
				this.saruBot.add(this.start());
			},
			start() {
				let tl = gsap.timeline();
				tl.to(".saruBot", { duration: 1, delay: 2, opacity: 1, y: 200 });
				tl.to(".saruText", { duration: 1, opacity: 1 });
				tl.to(".himo", { border: "5px solid #000" });
				return tl;
			},
			addMiddle() {
				this.saruBot.add(this.middle());
			},
			middle() {
				let tl = gsap.timeline();
				tl.to(".himo", { duration: 0.5, border: "transparent" });
				tl.to(".saruText", { duration: 1, opacity: 0 });
				tl.to(".saruText", { duration: 1, opacity: 1 });
				tl.to(".saruText", {
					duration: 0,
					delay: -1,
					text: "次はえだ２つ入れてみましょう！"
				});
				tl.to(".eda", { border: "5px solid #000" });
				return tl;
			},
			addEnd() {
				// this.saruBot.add(this.end(), "-=2");
				this.saruBot.add(this.end());
			},
			end() {
				let tl = gsap.timeline();
				tl.to(".eda", { border: "transparent" });
				tl.to(".saruText", { duration: 1, opacity: 0 });
				tl.to(".saruText", { duration: 1, opacity: 1 });
				tl.to(".saruText", {
					duration: 0,
					delay: -1,
					text: "最後に鍋をクリックしてみて！"
				});
				tl.to(".nabe", { border: "5px solid #000" });
				return tl;
			},
			addEnd2() {
				// this.saruBot.add(this.end(), "-=2");
				this.saruBot.add(this.end2());
			},
			end2() {
				let tl = gsap.timeline({ onComplete: this.hashigo });
				tl.to(".nabe", { border: "transparent" });
				tl.to(".saruText", { duration: 1, opacity: 0 });
				tl.to(".saruText", { duration: 1, opacity: 1 });
				tl.to(".saruText", {
					duration: 0,
					delay: -1,
					text: "はしごをタップしてみて！"
				});
				return tl;
			},
			hashigo() {
				gsap.to(".hashigo_wood", {
					duration: 1,
					border: "5px solid #000"
				});
			}
		}
	};
</script>