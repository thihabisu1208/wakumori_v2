<template>
  <div class="welcomeGsap">

    <img class="bird" src="/img/item/hato_olive.png" alt="">
    <img class="bird2" src="/img/item/hato_olive.png" alt="">


    <img class="welcomeSaru" src="/img/saru.png" alt="">

  </div>
</template>

<script>
    import { gsap } from "gsap";
    import { TextPlugin } from "gsap/TextPlugin.js";
    
export default {
    methods:{
        welcome(){
            setTimeout(() => {
                var tlbird = gsap.timeline();
                    tlbird.to(".bird", {duration:7, y:-1000, x:-1800});
                    tlbird.to(".bird2", {duration:7, delay: -7, y:-900, x:-2500});
                    setTimeout(() => {
                            tlbird.repeat(-1);
                            }, 10000);
                    }, 2000);
            setTimeout(() => {
                var tlsaru = gsap.timeline({repeat:1, yoyo:true});
                    tlsaru.to(".welcomeSaru", { duration: 0.7, ease: "back.out(3)", y: -100 });
                    tlsaru.to(".welcomeSaru", { duration: 3, ease: "back.out(3)", y: -100 });


                    }, 5000);



        }



    },
    mounted(){
        this.welcome();
    }


}
</script>