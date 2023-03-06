<template>
<div>
  
 <v-select multiple v-model="selected" :selectable="() => selected.length < 3" :options="options" placeholder="Enter your channel name" />
 <input name="competitive_channel[]" type="hidden" v-model="selected" />
  
</div>
</template>
 
<script>
export default {
  //fetch youtube api channel and to make maximum the number of tags be 3. Possibly with infinite scroll
  data () {
    return {
      selected: [],
      options: ['Web design','Graphic design', 'Video editing', 'Content writing']
    }
  }
}
</script>


<style>
/*My own style */
</style>