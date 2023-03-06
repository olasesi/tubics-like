<template>
<div>
 
<v-select taggable multiple push-tags v-model="selected" :selectable="() => selected.length < 10" :options="options" placeholder="Search or add a tag" />
 <input name="keyword[]" type="hidden" v-model="selected" />

</div>
</template>
 
<script>
export default {
  
   data () {
    return {
      selected: [],
      options: []
    }
  }

}
</script>


<style>
/*My own style */
</style>