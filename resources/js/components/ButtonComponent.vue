<template>
    <div>
        <div v-if="gameid == 1">
            <p class="buttons">
                <a :href="gamepath">助ける</a>
            </p>
        </div>
        <div v-else-if="gameid == 2">
            <p v-if="completedgameusagi[0].completed == 1" class="buttons">

                <a :href="gamepath">助ける</a>
            </p>
            <p v-else class="elsebuttons">
                <a>うさぎを助けよう</a>
            </p>
        </div>
            <div v-else-if="gameid == 3">
            <p v-if="completedgameusagi[0].completed == 1 && completedgamekuma[0].completed == 1" class="buttons">
                <a :href="gamepath">助ける</a>
            </p>
            <p v-else class="elsebuttons">
                <a>くまを助けよう</a>
            </p>
        </div>

    </div>
</template>

<script>
export default {
    props: ["completedgamekuma","completedgameusagi","completedgamerisu","gamepath", "gameid"]
}
</script>