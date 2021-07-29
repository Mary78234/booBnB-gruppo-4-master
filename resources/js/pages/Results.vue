<template>
  <main>
    <section>
      <Search 
      @textToSearch = 'findLocation'
      />
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

          <div id="map" style="width: 400px; height: 400px;" class="right col-sm-12 col-md-12 col-lg-6">
          </div>
        </div>
      </div>
    </section>

  </main>
</template>

<script>
import Search from '../components/Search.vue';
import axios from 'axios';
export default {
  name: 'Results',
  components: {
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
                container: 'map',
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
 .contenedor-risultati{
   width: 100%;
   margin-top: 15px;
    .content-house-resultati{
      margin: 0;
      .left-risultati{
        padding: 20px 30px;
        margin-top: 30px;
        .risultati{
          width: 100%;
          margin-bottom: 30px;
          ul{
            list-style: none;
            li{
              width: 100%;
              margin-bottom: 10px;
              img{
                max-width: 300px;
                min-width: 247px;
                
                margin-bottom: 30px;
              }
              div{
                p{
                  text-align: justify;
                }
              }
            }
          }
        }
      }
      .right{
        padding: 20px 60px;
        margin-top: 30px;
        text-align: center;
      }
    }
  }

  @media (min-width: 998px) and (max-width: 1219px){
    .description{
      width: 450px;
    }
  }
   @media (min-width: 1219px) and (max-width: 1677px){
    .description{
      width: 580px;
    }
  }
</style>