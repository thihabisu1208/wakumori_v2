<template>
    <div ref="saru" class="saruBot">
            <img src="/img/saru.png" alt="saruBot">
            <p class="saruText">ウサギを助けよう！ <br>まずはひもを鍋に追加しよう〜</p>
        </div>
</template>

<script>
	import { gsap } from 'gsap';
    import { TextPlugin } from "gsap/TextPlugin.js";

    export default {
        created() {
            gsap.registerPlugin(TextPlugin);
        },
        mounted(){
            var tl = gsap.timeline({
                onComplete: this.congratulations
                });
            tl.to(".saruBot", {duration:1,opacity:1, y:200});
            tl.to(".saruBot",{rotation:360, duration:1, delay:-0.25} );
            tl.to(".saruText",{duration:2, opacity: 1} );
            tl.to(".saruText",{duration:1, opacity: 0});
            tl.to(".saruText",{duration:0, text: "次はえだ２つ入れてみましょう！"} );
            tl.to(".saruText",{duration:1, opacity: 0} );
            tl.to(".saruText",{duration:2, opacity: 1, delay:-1} );
            tl.to(".saruText",{duration:1, opacity: 1} );
            tl.to(".saruText",{duration:1, opacity: 0});
            tl.to(".saruText",{duration:0, text: "最後に鍋をクリックしてみて！"} );
            tl.to(".saruText",{duration:1, opacity: 0} );
            tl.to(".saruText",{duration:2, opacity: 1, delay:-1} );
        },
        methods: {
            congratulations() {
                alert('ウサギさんを助けることができた！');
            }
        }
    }
</script>