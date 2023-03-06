<template>
<div>
  <multiselect v-model="value" track-by="name" label="name" placeholder="Country" :options="options" :searchable="false" :allow-empty="false">
    <template slot="singleLabel" slot-scope="{ option }">{{ option.name }} </template>
  </multiselect>
 
</div>
</template>
 
<script>
export default {
  
  data () {
    return {
      value: '',
      options: []
    }
  },

    mounted() {
        this.getCountries();
    },

methods: {
     getCountries(){

          axios.get("https://restcountries.com/v2/all?fields=name").then(response => {
                    this.options = response.data;
                     //console.log(typeof this.countries); 
                }).catch(function(error){
                    //console.log('Error', error);
                }

                );
     }
    
}

}

</script>

<style>


</style>
