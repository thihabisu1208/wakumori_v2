<template>
  <div class="welcomeGsap">

    <img class="bird" src="/img/hato_mure.png" alt="とり">
    <img class="bird2" src="/img/hato_mure.png" alt="とり">

    <img class="welcomeSaru" src="/img/saru.png" alt="さる">

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
                    tlbird.to(".bird2", {duration:14, delay: -7, y:-900, x:-2800});

                    setTimeout(() => {
                            tlbird.repeat(-1);
                            }, 8000);
                    }, 2000);
            setTimeout(() => {
                var tlsaru = gsap.timeline({repeat:1, yoyo:true});
                    tlsaru.to(".welcomeSaru", { duration: 0.7, ease: "back.out(3)", y: -200 });
                    tlsaru.to(".welcomeSaru", { duration: 3, ease: "back.out(3)", y: -200 });


                    }, 5000);


        }



    },
    mounted(){
        this.welcome();
    }


}
</script>