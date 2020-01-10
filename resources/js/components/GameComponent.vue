<template>
	<div>
		<draggable  class="itemList"
      >
        <div
          v-for="element in list"
          :key="element.name"
        >
          {{ element.name }}
        </div>
      </draggable>
	</div>
</template>

<script>
 import draggable from 'vuedraggable'
	export default {
		props: ["usagi"],
		data() {
            return {
            list: [
                { name: "yes", id: 0 },
                { name: "no", id: 1 },
                { name: "okay", id: 2 }
            ],
            };
        },
        components: {
            draggable
        }
	};
</script>

<style lang="scss" scoped>
.itemList {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    font-size: 50px;
}
</style>