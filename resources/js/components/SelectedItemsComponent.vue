<template>
	<div>
        {{ selectedItems }}
        <p class="orderTitle">
            ここに入れて 
            <span @click="clearSelectedItems"><i class="fas fa-sync-alt"></i></span>
        </p>
        <p>
            <img src="/img/nabe.png"/>
        </p>
	</div>
</template>

<script>
    import { EventBus } from '../eventBus.js';

	export default {
        data() {
            return {
                selectedItems: []
            }
        },
        created() {
            // Listen for the i-got-clicked event and its payload.
            EventBus.$on('addSelectedItem', selectedItemList => {
                // console.log(selectedItemList);
                this.selectedItems = [];
                this.selectedItems.push(selectedItemList);
            });
        },
        methods: {
            clearSelectedItems(){
                this.selectedItems = [];
                EventBus.$emit('clearSelectedItem', this.selectedItems);
            }
        }
	};
</script>

<style lang="scss" scoped>
.itemList {
    width: 50%;
    display: grid;
    grid-template-columns: repeat(3, 1fr);

    img{
        width: 50%;
    }

    p{
        text-align: center;
    }
}
</style>