require("./bootstrap");

window.Vue = require("vue");

Vue.component(
    "modal-component",
    require("./components/ModalComponent.vue").default
);

Vue.component(
    "game-component",
    require("./components/GameComponent.vue").default
);

const game = new Vue({
    el: "#game",
    data: {
        game1Modal: false
    }
});
