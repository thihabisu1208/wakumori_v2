<template>
<div class="ifCover">
    <div v-if="usagicompleted[0].completed == 0" class="saruCover">
        <div class="overlay"></div>
        <div class="startSaru">
                <img class="helloSaruImages" src="/img/saru.png" alt="" />
                <p class="saruHello">
                こんにちは！一緒に旅に出てくれる人がいてうれしいよ
                {{ref}}
                </p>
        </div>
    </div>
    <div v-else class="elseSaruHello"></div>
</div>
</template>
<script>
	import { gsap } from "gsap";
	import { TextPlugin } from "gsap/TextPlugin.js";
    import { EventBus } from "../eventBus.js";
    
export default {
        props : ["usagicompleted"],
        data:{
            ref:null
        },
    methods:{
            helloSaru(){
            let tl = gsap.timeline();
            tl.to(".helloSaruImages, .saruHello", { duration: 1.5, ease: "elastic.out(1, 1)", y: 600,  delay: 2 });
            tl.to(".saruHello", { duration: 1, opacity: 1 });
            tl.to(".saruHello", { duration: 2, opacity: 1 });
            tl.to(".saruHello", { duration: 1, opacity: 0 });
            tl.to(".saruHello", {
					duration: 0,
					delay: 4.5,
					text: "困ってるうさぎさんを助けてあげよう"
                },3 );
                tl.to(".saruHello", { duration: 1, opacity: 1 });
                tl.to(".saruHello", { duration: 1, opacity: 1 });
                tl.to(".saruHello", { duration: 1, opacity: 0 });
            tl.to(".helloSaruImages, .saruHello", { duration: 1, x: 200,y: 1000 });
            tl.to(".overlay", {duration: 0.5 ,opacity: 0 });

            tl.to(".saruHello", {
					duration: 0,
					delay: 10,
					text: "うさぎさんのイラストにぼくを合わせて、助けるボタンを押してね"
                },3 );
                tl.to(".saruHello", { duration: 1, opacity: 1 })
                tl.to(".overlay", {duration: 1 ,display:"none" });;





                }
    },
    created() {
            this.ref = document.referrer;
            gsap.registerPlugin(TextPlugin);
        },
        mounted() {

            if(this.usagicompleted[0].completed == 0) {
                this.helloSaru();
            }
        }

}
</script>

