<template>
<!--placeholder="Enter your channel name"-->
 <div class="channel-box mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Select your YouTube channel</label>
                  <input
                    type="text"
                    class="form-control"
                    id="exampleFormControlInput1"
                    v-model="search"
                    name="youtube_channel" @keyup="getChannel"/>

<div class="bigger-channel-wrapper">
    <div v-for="channel in channels.items" :key="channel.id.channelId">

            <div class="channel-wrapper" @click="chooseChannel(channel.snippet.title)">  
                    <div class="channel-thumbnail"><img v-bind:src = channel.snippet.thumbnails.default.url /></div>
                    <div class="channel-subscribers">{{channel.snippet.channelTitle}}</div>
            </div>
                <!--  <b-icon icon="check2" class="rounded bg-primary p-1" variant="light" style="font-size: 4rem;"></b-icon>-->
    
    </div> 
</div>

<div>
<div class="">{{thumbnail}}</div>
<div class="">{{subscribersnumber}}</div>
<b-icon icon="check2" class="rounded bg-primary p-1" variant="light" @click="removeChannel(channel.snippet.title)" style="font-size: 4rem;"></b-icon>
</div>
          
</div>
    

</template>
 
<script>
    export default {
        name: "FetchChannelComponent",
        data() {
            return {
                channels: [],
                search: "",
                thumbnail: "",
                subscribersnumber: "",
                channelname:""
            }
        },
       
        methods: {
           getChannel(){

this.axios.get(`https:youtube.googleapis.com/youtube/v3/search?part=snippet&maxResults=25&q=${this.search}&type=channel&key=AIzaSyDOMtfi1bF4YpFgN8JPfnn7kjVf91-MkOA`).then(response => {
                    this.channels = response.data;
                }).catch(function(error){
                    console.log('Error', error);
                }

                );

           },
           chooseChannel(tit){
        this.subscribersnumber = tit;
           },
          
            removeChannel(index) {
                //demo.items.$remove(0)
                //this.items.splice(index, 1);
            } 

        }
    }
  
   //Sorry, we could not find any result. Please try another input
   //`https://647dbf1f-77e2-4ad2-b12c-b85ead94cc0b.mock.pstmn.io/youtubechannel?part=snippet&maxResults=25&q=${this.search}&type=channel`
//https://youtube.googleapis.com/youtube/v3/search?part=snippet&maxResults=25&q='+this.search+'&type=channel&key=AIzaSyDOMtfi1bF4YpFgN8JPfnn7kjVf91-MkOA
</script>

<style scoped lang="scss">
.channel-box{
    position:relative;
display:block;
   


    .bigger-channel-wrapper{
        
       /*overflow:auto;
        height: 100px;
        z-index:999;*/

        .channel-wrapper {
        display:flex;
        justify-content: space-between;
        align-items: center;
        cursor:pointer;
        
        

        .channel-thumbnail{
            flex:1;
           
        }

        .channel-subscribers{
            flex:1;
           
        }

    }
    }
}

</style>
