<template>

 <div class="channel-box mb-3">

<div> 
   <label for="exampleFormControlInput1" class="form-label">Select your YouTube channel</label>
     <input type="text" class="form-control" id="exampleFormControlInput1" v-model="search" name="youtube_channel" @keyup="getChannel(); open()" />

<div class="scroll" v-if="seen" >
    <div v-for="channel in channels.items" :key="channel.id">
                    <div class="channel-wrapper" @click="chooseChannel(channel.snippet.title)">  
                    <div class="channel-thumbnail"><img v-bind:src = channel.snippet.thumbnails.default.url /></div>
                    <div class="channel-subscribers">{{channel.snippet.title}}</div>
            </div>

    </div> 
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
                seen: false,
               
            }
        },
       
        methods: {
           getChannel(){
            this.axios.get(`https:youtube.googleapis.com/youtube/v3/search?part=snippet&maxResults=5&q=${this.search}&type=channel&key=AIzaSyDOMtfi1bF4YpFgN8JPfnn7kjVf91-MkOA&fields=items(id(channelId),snippet(title,thumbnails(default)))`).then(response => {
                    this.channels = response.data;
                }).catch(function(error){
                    console.log('Error', error);
                }

                );
             

           },
           open(){
               if(this.seen == false){
                   this.seen = true;
               }
         
           },
            close(){
               if(this.seen == true){
                   this.seen = false;
               }
         
           },
           chooseChannel(tit){
        this.search = tit;
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
.channel-wrapper{
    cursor:pointer;
}

 table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 0px solid #ddd;
        }
          
        th,
        td {
            text-align: left;
            padding: 8px;
        }
  
        /* width */        
        ::-webkit-scrollbar {
            width: 10px;
        }
  
        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
  
        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
        }
  
        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
          
        .scroll {
            display: block; 
            width: 90%;
            height: 200px;
            overflow-y: scroll;
            position:absolute;
           border-radius:2px;
           margin-top:4px;
            background:white;
            z-index: 999;

            box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;

        }
</style>
