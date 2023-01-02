<template>

 <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Select your YouTube channel</label>
                  <input
                    type="text"
                    class="form-control"
                    id="exampleFormControlInput1"
                    v-model="search"
                    placeholder="Enter your channel name"
                    name="youtubechannel" @keyup="getchannel"
                  />

<div v-for="channel in channels.items" :key="channel.id">
    <div>
        {{channel.snippet.title}}
    </div>
</div>                
</div>
    

</template>
 
<script>
    export default {
        name: "FetchChannelComponent",
        data() {
            return {
                channels: [],
                search: ""
            }
        },
       
        methods: {
           getchannel(){
if(this.search != "" ){
this.axios.get('https://647dbf1f-77e2-4ad2-b12c-b85ead94cc0b.mock.pstmn.io/youtubechannel?part=snippet&maxResults=25&q='+this.search+'&type=channel').then(response => {
                    this.channels = response.data;
                }).catch(function(error){
                    console.log('Error', error);
                }

                );

           }
           }
        },
         created() {
             
            this.getchannel();
         
        }
    }
  
   //Sorry, we could not find any result. Please try another input
//https://youtube.googleapis.com/youtube/v3/search?part=snippet&maxResults=25&q='+this.search+'&type=channel&key=AIzaSyDOMtfi1bF4YpFgN8JPfnn7kjVf91-MkOA
</script>