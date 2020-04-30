<template>
	<div class="welcomeBackgroundGsap">
		<img src="/img/kumo.png" alt="くも" class="WelcomeKumo" />
		<img src="/img/kumo.png" alt="くも" class="WelcomeKumo2" />
	</div>
</template>

<script>
	import { gsap } from "gsap";
	import { TextPlugin } from "gsap/TextPlugin.js";
	export default {
		methods: {
			welcome() {
				var tlkumo = gsap.timeline();
				if (window.innerWidth > 1024) {
					tlkumo.to(".WelcomeKumo", { duration: 20, x: window.innerWidth + 500 });
					tlkumo.to(".WelcomeKumo2", {
						duration: 20,
						delay: -7,
						x: -window.innerWidth - 500
					});
				} else if (window.innerWidth <= 1024) {
					tlkumo.to(".WelcomeKumo", { duration: 20, x: window.innerWidth + 400 });
					tlkumo.to(".WelcomeKumo2", {
						duration: 20,
						delay: -7,
						x: -window.innerWidth - 400
					});
				}
				setTimeout(() => {
                    var repeat = tlkumo.repeat();
					tlkumo.repeat(-1);
				}, 1000);
			}
		},
		mounted() {
			this.welcome();
		}
	};
</script>