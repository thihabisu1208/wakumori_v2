<template>
                <div class="contentGamesContent" :class="gameid+'touch'">
                    <div class="contentGame contentGame1">
                        <div class="contentGameContent">
                            <img :src="'/img/teacher/'+ gameid +'.png'" />
                            <h3>{{ gametitle }}</h3>
                        </div>
                    </div>
                    <div class="contentGame contentGame2">
                        <div class="contentGameContent">
                            <p>{{ gamedescription }}。</p>
                            <!-- <p class="buttons">
                                <a hrefcompletedGameUsagi="{{ $game.path }}">やってみる</a>
                            </p> -->

                            <button-component :completedgameusagi="completedgameusagi" :completedgamekuma="completedgamekuma" :completedgamerisu="completedgamerisu" :gamepath="gamepath" :gameid="gameid"></button-component>
                        </div>
                    </div>
                </div>
</template>
<script>
export default {
    props: ["gameid", "gametitle", "gamedescription" ,"gamepath", "completed", "completedgamekuma", "completedgameusagi", "completedgamerisu"]
}
</script>