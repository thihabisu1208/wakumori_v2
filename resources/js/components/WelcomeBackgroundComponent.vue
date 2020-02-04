<template>
  <div class="welcomeBackgroundGsap">

    <img src="/img/kumo.png" alt="くも" class="WelcomeKumo">
    <img src="/img/kumo.png" alt="くも" class="WelcomeKumo2">

  </div>
</template>

<script>
    import { gsap } from "gsap";
    import { TextPlugin } from "gsap/TextPlugin.js";

export default {
    methods:{
        welcome(){

            var tlkumo = gsap.timeline();
                tlkumo.to(".WelcomeKumo", {duration:25, x:1800});
                tlkumo.to(".WelcomeKumo2", {duration:25, x:-1800});
                setTimeout(() => {
                            tlkumo.repeat(-1);
                            }, 1000);
        }



    },
    mounted(){
        this.welcome();
    }


}
</script>