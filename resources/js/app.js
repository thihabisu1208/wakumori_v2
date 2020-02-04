require("./bootstrap");

window.Vue = require("vue");

Vue.component(
    "welcome-component",
    require("./components/WelcomeComponent.vue").default
);

Vue.component(
    "modal-component",
    require("./components/ModalComponent.vue").default
);

Vue.component(
    "game-component",
    require("./components/GameComponent.vue").default
);

Vue.component(
    "created-items-component",
    require("./components/CreatedItemsComponent.vue").default
);

Vue.component(
    "selected-items-component",
    require("./components/SelectedItemsComponent.vue").default
);

Vue.component(
    "sarubot-component",
    require("./components/SaruBotComponent.vue").default
);

Vue.component(
    "button-component",
    require("./components/ButtonComponent.vue").default
);

Vue.component(
    "forward-component",
    require("./components/ForwardComponent.vue").default
);

Vue.component(
    "content-game-component",
    require("./components/ContentGameComponent.vue").default
);

Vue.component(
    "hello-saru-component",
    require("./components/HelloSaruComponent.vue").default
);

const game = new Vue({
    el: "#game",
    data: {
        game1Modal: false,
        itemModal: false
    }
});
