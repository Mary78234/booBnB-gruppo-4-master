<template>
    <main>

        <Loader />

        <section class="jumbotron">
        
            
            <div class="container text-center">
                <Search @textToSearch = 'findLocation'/>
                
                 <div class="contenedor-risultati">
                 <div class="content-house-resultati row ">
                 <div class="left-risultati col-sm-12 col-md-12 col-lg-6">
                 <div class="risultati">
                <ul>
                <li class="row"
                   v-for="house in firstData" :key="house.id">
                  <img class="col-sm-12 col-md-6 col-lg-4" :src="'http://localhost:8000/storage/' + house.image" alt="">
                  <div class="col-sm-12 col-md-12 col-lg-8 description">
                    <h3>{{ house.title }}</h3>
                    <p class="description">{{house.description}}</p>
                    
                  </div>
                </li>
              </ul>
            </div>
          </div>
                 <div id="map-div" style="width: 400px; height: 400px;" class="right col-sm-12 col-md-12 col-lg-6">
          </div>
        </div>
      </div>




                <div>

                    <h1>Qui inizia la tua avventura!</h1>
                <h5>Esperienze uniche in luoghi magnifici.</h5>
                <h5 class="mb-5">Entra nel magico mondo di BoolBnB.</h5>

                <router-link class="nav-link" :to="{name: 'advsearch'}">
                    <span>Ricerca Avanzata</span>
                </router-link>


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
   
    this.findLocation(this.place);
    
  },
  created(){

    axios.get('http://localhost:8000/api/houses')
            .then(res=>{
              this.allData = res.data.houses;
              /* console.log(this.firstData), */
                 console.log(this.firstData);
              this.allData.forEach(house => {
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
  }
  

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
    .nav-link span{
        background-color: white;
        padding: 10px;
        border-radius: 10px;    
    }
    .nav-link span:hover{
            background-color: rgba(0, 0, 0, 0.212); 
    }

}



</style>