<template>
<div>

 <multiselect v-model="value" :options="options" :searchable="false" :close-on-select="true" :show-labels="false" placeholder="Choose channel language"></multiselect>
<input name="language" type="hidden" v-model="value" />

</div>
</template>
 
<script>

export default {
  //Verify and remove duplicate names up the language object. Also move object to external file and import it here. Also try to find an api that fetches language and flag, preferably a google api
  data () {
    return {
      value: '',
      options: ['English', 'German', 'Spanish', 'Arabic']
    }
  },



}

</script>

<style>


</style>
