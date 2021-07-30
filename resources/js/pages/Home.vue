<template>
    <main>

        <!-- <Loader /> -->

        <section class="jumbotron">
        
            
            <div class="container text-center">

              <div>

                <h1>Qui inizia la tua avventura!</h1>
                <h5>Esperienze uniche in luoghi magnifici.</h5>
                <h5 class="mb-5">Entra nel magico mondo di BoolBnB.</h5>

            </div>
               <!--  <Search @textToSearch = 'findLocation'/> -->
              <div class="homesearch">
                  <input 
                    type="text" 
                     v-model="textToSearch"
                    @keyup.enter="gotoAdvSearch()"
                     placeholder="Cerca...">
                   <button
                      @click="$emit('textToSearch',{text:textToSearch}), $router.push('/advsearch')">
                      Cerca 
               </button>
            </div>
            

          </div>

        </section>

        <!-- slider con le sponsorizzazioni -->
        <Slider />

    </main>
</template>

<script>
import Slider from '../components/Slider.vue';
import Loader from '../components/Loader.vue';
import Search from '../components/Search.vue';
import axios from 'axios';
export default {
    name: 'Home',
    components: {
        Slider,
        Loader,
        Search
    },
     data(){
    return{
        firstData:[],
        houseLocation : [],
        allData: []
    }
  },
  methods:{

    resetResult(){
      this.houseLocation = []
    },

     findLocation(obj){
       this.getLocations(obj.text);
       const apiKey = 'EHA6jZsKzacvcupfIH5jId15dI3c5wGf';
       const APPLICATION_NAME = 'BoolBnB';
       const APPLICATION_VERSION = '1.0';
       let outerthis = this;
       tt.setProductInfo(APPLICATION_NAME, APPLICATION_VERSION);
        


        tt.services.fuzzySearch({
         key: apiKey,
         query: obj.text
       })

       .then(function(response) {
                let mymap = tt.map({
                key: apiKey,
                container: 'map-div',
                style: 'https://api.tomtom.com/style/1/style/21.1.0-*?map=basic_main&poi=poi_main',
                center: response.results[0].position,
                zoom: 15
              });  
                outerthis.houseLocation.forEach(child=>{
                new tt.Marker().setLngLat(child).addTo(mymap);
              })       
       })
       
        
     },
    
     getLocations(obj){
       this.resetResult()
       axios.get('http://localhost:8000/api/houses?',{
         params:{
           city : obj
         }
       })
            .then(res=>{
              this.firstData = res.data.houses;
              /* console.log(this.firstData), */
                 console.log(this.firstData);
              this.firstData.forEach(house => {
                    this.houseLocation.push(
                      {
                            lat: house.lat,
                            lng: house.long
                      }
                    )
                    
            },
                
            );  
            })
            .catch(err=>{
              console.log(err);
            })
     },
     
  },
  mounted(){
   
   
    
  },
  
}
</script>

<style lang="scss" scoped>

section.jumbotron{
    color: white;
    background-image: url("https://i.pinimg.com/originals/e9/62/97/e96297cf9fdf03ccdef1fab87bda06e4.jpg");
    background-size: cover;
    background-position-y: center;
    background-position-x:center;
    box-shadow:inset 0 0 0 50vw rgba(0, 0, 0, 0.596);
    min-height: 700px;
    margin-bottom: 0px;
    position: relative;
    border-radius: 0px;
    display:flex;
    justify-content: center;
    align-items: center;
    h1 {
      margin-top: 100px;
    }
$boolblue: #04459e;

.homesearch {
    display: flex;
    input {
        border: none;
        border-bottom: 2px solid $boolblue;
        outline: none;
        color: $boolblue;
        width: 70%;
        margin: 0 0 0 10%;
        padding: 10px 20px;
        border-radius: 20px 0 0 20px;
    }
    button {
        width: 20%;
        margin: 0 10% 0 0;
        background-color: white;
        color: $boolblue;
        border: none;
        border-bottom: 2px solid $boolblue;
        font-weight: bold;
        border-radius: 0 20px 20px 0;
    }
}
}

</style>