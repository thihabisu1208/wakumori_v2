<template>
	<div class="saruBot">
		<img src="/img/saru.png" alt="saruBot" />
		<p v-if="gameusagi" class="saruText">
			うさぎを助けよう！
			<br />まずはひもを鍋のしたに追加しよう〜
		</p>
		<p v-else-if="gamekuma" class="saruText">くまさんがビルの上にのぼっておりられなくなったようだ！</p>
		<p v-else-if="gamerisu" class="saruText">
			りすを助けよう！
			<br />今回は自由にやってみよう！
		</p>
	</div>
</template>

<script>
	import { gsap } from "gsap";
	import { TextPlugin } from "gsap/TextPlugin.js";
	import { EventBus } from "../eventBus.js";

	export default {
		props: ["gameusagi", "gamekuma", "gamerisu", "kumacreateditems", "risucreateditems"],
		created() {
			gsap.registerPlugin(TextPlugin);
		},
		mounted() {
			if (this.gameusagi) {
				this.addUsagiAnimation1();

				EventBus.$on("showUsagiHint1", () => {
					this.addUsagiAnimation2();
				});

				EventBus.$on("showUsagiHint2", () => {
					this.addUsagiAnimation3();
				});

				EventBus.$on("showUsagiHint3", () => {
					this.addUsagiAnimation4();
				});
			}

			if (
				this.gamekuma &&
				!this.kumacreateditems[3] &&
				!this.kumacreateditems[4]
			) {
				this.addKumaAnimation1();

				EventBus.$on("showKumaHint1", () => {
					this.kumaAnimation2();
				});
			} else if (
				this.gamekuma &&
				this.kumacreateditems[3] &&
				!this.kumacreateditems[4]
			) {
				this.addKumaAnimation3();

				EventBus.$on("showKumaHint2", () => {
					this.kumaAnimation4();
				});
			} else if (
				this.gamekuma &&
				this.kumacreateditems[3] &&
				this.kumacreateditems[4]
			) {
				this.addKumaAnimation5();

				EventBus.$on("showKumaHint4", () => {
					this.kumaAnimation6();
				});
			}

			if (this.gamerisu) {
				this.addRisuAnimation1();

				setTimeout(() => {
					this.addRisuAnimation2();

					if(this.risucreateditems[6].name == "honou") {
						this.addRisuAnimation3();
					}
				}, 15000);
			}
		},
		data() {
			return {
				saruBot: gsap.timeline()
			};
		},
		methods: {
			// Usagi Game Animations
			addUsagiAnimation1() {
				this.saruBot.add(this.usagiAnimation1());
			},
			usagiAnimation1() {
				let tl = gsap.timeline();
				tl.to(".saruBot", { duration: 1, delay: 2, opacity: 1, y: 200 });
				tl.to(".saruText", { duration: 1, opacity: 1 });
				tl.to(".himo", { border: "5px solid #ff0000" });
				return tl;
			},
			addUsagiAnimation2() {
				this.saruBot.add(this.usagiAnimation2());
			},
			usagiAnimation2() {
				let tl = gsap.timeline();
				tl.to(".himo", { duration: 0.5, border: "transparent" });
				tl.to(".saruText", { duration: 1, opacity: 0 });
				tl.to(".saruText", { duration: 1, opacity: 1 });
				tl.to(".saruText", {
					duration: 0,
					delay: -1,
					text: "次はえだ２つ入れてみましょう！"
				});
				tl.to(".eda", { border: "5px solid #ff0000" });
				return tl;
			},
			addUsagiAnimation3() {
				// this.saruBot.add(this.end(), "-=2");
				this.saruBot.add(this.uagiAnimation3());
			},
			uagiAnimation3() {
				let tl = gsap.timeline();
				tl.to(".eda", { border: "transparent" });
				tl.to(".saruText", { duration: 1, opacity: 0 });
				tl.to(".saruText", { duration: 1, opacity: 1 });
				tl.to(".saruText", {
					duration: 0,
					delay: -1,
					text: "最後に鍋をクリックしてみて！"
				});
				tl.to(".nabe", { border: "5px solid #ff0000" });
				return tl;
			},
			addUsagiAnimation4() {
				// this.saruBot.add(this.end(), "-=2");
				this.saruBot.add(this.usagiAnimation4());
			},
			usagiAnimation4() {
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
					border: "5px solid #ff0000"
				});
			},
			// Kuma Game Animations
			addKumaAnimation1() {
				this.saruBot.add(this.kumaAnimation1());
			},
			kumaAnimation1() {
				let tl = gsap.timeline();
				tl.to(".saruBot", { duration: 1, delay: 2, opacity: 1, y: 200 });
				tl.to(".saruText", { duration: 1, opacity: 1 });
				tl.to(".saruText", { duration: 1, delay: 1, opacity: 0 });
				tl.to(".saruText", { duration: 1, opacity: 1 });
				tl.to(".saruText", {
					duration: 0,
					delay: -1,
					text: "うさぎさんの時より高さがあって、はしごでは届かなさそう…"
				});
				tl.to(".saruText", { duration: 1, delay: 2, opacity: 0 });
				tl.to(".saruText", { duration: 1, opacity: 1 });
				tl.to(".saruText", {
					duration: 0,
					delay: -1,
					text: "今ある道具じゃ、助けられるアイテムは作れないかも？"
				});
				tl.to(".saruText", { duration: 1, opacity: 0 });
				tl.to(".saruText", { duration: 1, opacity: 1 });
				tl.to(".saruText", {
					duration: 0,
					delay: -1,
					text: "同じアイテムを合わせたらもっと強い道具が作れるよ！ひもで試そう"
				});
				return tl;
			},
			addKumaAnimation2() {
				this.sarubot.add(this.kumaAnimation2());
			},
			kumaAnimation2() {
				let tl = gsap.timeline();
				// tl.to(".saruText", { duration: 1, opacity: 0 });
				// tl.to(".saruText", { duration: 1, opacity: 1 });
				// tl.to(".saruText", {
				// 	duration: 0,
				// 	delay: -1,
				// 	text: "同じアイテムを合わせたらもっと強い道具が作れるよ！ひもで試そう"
				// });
				return tl;
			},
			addKumaAnimation3() {
				// this.sarubot.add(this.kumaAnimation3());
				this.kumaAnimation3();
			},
			kumaAnimation3() {
				let tl = gsap.timeline();
				tl.to(".saruBot", { duration: 1, delay: 1, opacity: 1, y: 200 });
				tl.to(".saruText", { duration: 1, opacity: 1 });
				tl.to(".saruText", {
					duration: 1,
					delay: -2,
					text: "えだもひもと同じく二つ合わせると強くなるんだよ！"
				});
				// tl.to(".saruText", { duration: 3, opacity: 0 });
				// tl.to(".saruText", { duration: 1, opacity: 1 });
				// tl.to(".saruText", {
				// 	duration: 1,
				// 	delay: -2,
				// 	text: "えだもひもと同じく二つ合わせると強くなるんだよ！"
				// });
				return tl;
			},
			kumaAnimation4() {
				let tl = gsap.timeline();
				tl.to(".saruBot", { duration: 1, delay: 1, opacity: 1, y: 200 });
				tl.to(".saruText", { duration: 1, opacity: 1 });
				tl.to(".saruText", {
					duration: 0,
					delay: -1,
					text: "鍋をクリック！"
				});
				return tl;
			},
			addKumaAnimation5() {
				// this.sarubot.add(this.kumaAnimation3());
				this.kumaAnimation5();
			},
			kumaAnimation5() {
				let tl = gsap.timeline();
				tl.to(".saruBot", { duration: 1, delay: 1, opacity: 1, y: 200 });
				tl.to(".saruText", { duration: 1, opacity: 1 });
				tl.to(".saruText", {
					duration: 0,
					delay: -1,
					text: "作った新しいモノ２つを混ぜてみて！"
				});
			},
			// Risu Game Animations
			addRisuAnimation1() {
				this.saruBot.add(this.risuAnimation1());
			},
			risuAnimation1() {
				let tl = gsap.timeline();
				tl.to(".saruBot", { duration: 1, delay: 2, opacity: 1, y: 200 });
				tl.to(".saruText", { duration: 1, opacity: 1 });
				return tl;
			},
			addRisuAnimation2() {
				this.saruBot.add(this.risuAnimation2());
			},
			risuAnimation2() {
				let tl = gsap.timeline();
				tl.to(".saruText", { duration: 1, opacity: 0 });
				tl.to(".saruText", { duration: 1, text: "石で火が作れるよ！" });
				tl.to(".saruText", { duration: 1, opacity: 1 });
			},
			addRisuAnimation3() {
				this.saruBot.add(this.risuAnimation3());
			},
			risuAnimation3() {
				let tl = gsap.timeline();
				tl.to(".saruText", { duration: 1, opacity: 0 });
				tl.to(".saruText", { duration: 1, text: "気球ってどういう組み合わせで作れるのかな？" });
				tl.to(".saruText", { duration: 1, opacity: 1 });
			}
		}
	};
</script>