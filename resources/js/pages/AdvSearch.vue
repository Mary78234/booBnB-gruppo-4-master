<template>
  <main>
<<<<<<< HEAD
    
=======
>>>>>>> ale-colonna

    <section class="container">

      <div class="mb-5 mt-5">
        <Search @textToSearch = 'findLocation'/>
      </div>

      <div class="contenedor-risultati">
        <div class="content-house-resultati row">

          <div class="left col-sm-12 col-md-12 col-lg-6">
            <div class="first-left">
              <h2>Casa</h2>
              <ul>
                <li>
                  <label for="stanze">Stanze</label>
                  <!-- <select id="stanze" name="rooms">
                    <option v-for="n in 10" :key="n">{{ n }}</option>
                  </select> -->
                  <input 
                    class="input-number" 
                    type="number" 
                    onKeyPress="if(this.value.length==2) return false;">
                </li>
                <li>
                  <label for="letti">Letti</label>
                  <!-- <select id="letti" name="beds">
                    <option v-for="n in 30" :key="n">{{ n }}</option>
                  </select> -->
                  <input 
                    class="input-number" 
                    type="number" 
                    onKeyPress="if(this.value.length==2) return false;">
                </li>
                <li>
                  <label for="raggio">Raggio</label>
                  <select id="raggio" name="raggio">
                    <option value="raggio">1km</option>
                    <option value="raggio">2km</option>
                    <option value="raggio">5km</option>
                    <option value="raggio">10km</option>
                    <option value="raggio">20km</option>
                  </select>
                </li>
              </ul>
            </div>

            <div class="second-left">
              <h2>Caratteristiche</h2>
              <form action="/action_page.php">
                <ul>
                  <li>
                    <input type="checkbox" id="wifi" name="wifi" value="wifi">
                    <label for="wifi">Wifi</label><br>
                  </li>
                  <li>
                    <input type="checkbox" id="posto macchina" name="posto macchina" value="posto macchina">
                    <label for="posto macchina">Posto Macchina</label><br>
                  </li>
                  <li>
                    <input type="checkbox" id="piscina" name="piscina" value="piscina">
                    <label for="piscina">Piscina</label><br>
                  </li>
                  <li>
                    <input type="checkbox" id="idromassagio" name="idromassagio" value="idromassagio">
                    <label for="idromassagio">Idromassagio</label><br>
                  </li>
                  <li>
                    <input type="checkbox" id="portineria" name="portineria" value="portineria">
                    <label for="portineria">Portineria</label><br>
                  </li>
                  <li>
                    <input type="checkbox" id="sauna" name="sauna" value="sauna">
                    <label for="sauna"> Sauna</label><br>
                  </li>
                  <li>
                    <input type="checkbox" id="vista mare" name="vista mare" value="vista mare">
                    <label for="vista mare">Vista Mare</label><br>
                  </li>
                  <li>
                    <input type="checkbox" id="aria condizionata" name="aria condizionata" value="aria condizionata">
                    <label for="aria condizionata">Aria Condizionata</label><br>
                  </li>
                  <li>
                    <input type="checkbox" id="animali domestici ammesi" name="animali domestici ammesi" value="animali domestici ammesi">
                    <label for="animali domestici ammesi">Animali Ammesi</label><br>
                  </li>
                  <li>
                    <input type="checkbox" id="cucina" name="cucina" value="cucina">
                    <label for="cucina">Cucina</label><br>
                  </li>
                  <li>
                    <input type="checkbox" id="bagno privato" name="bagno privato" value="bagno privato">
                    <label for="bagno privato">Bagno privato</label><br>
                  </li>
                </ul>
              </form>
            </div>
          </div>

          <div id="map-div" style="width: 400px; height: 500px;" class="right col-sm-12 col-md-12 col-lg-6">
          </div>

          <div class="left-risultati col-sm-12 col-md-12 col-lg-12">
            <div class="risultati">
              <ul>
                <li 
                class="row"
                v-for="house in firstData" :key="house.id">
                  <img 
                  class="col-sm-12 col-md-6 col-lg-4" 
                  :src="'http://localhost:8000/storage/' + house.image" 
                  alt="">
                  <div class="col-sm-12 col-md-12 col-lg-8 description">
                    <h3>{{ house.title }}</h3>
                    <p class="description">{{house.description}}</p>
                    <p class="services">Stanze: {{house.rooms_number}} - Bagni: {{house.bathrooms}} - Letti: {{house.beds}}</p>
                  </div>
                </li>
              </ul>
            </div>
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
  name: 'AdvSearch',
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

$boolblue: #04459e;

section {
  min-height: 500px;
  width: 100%;
  margin-top: 15px;
  .left{
    padding: 20px 60px;
    margin-top: 30px;
    .first-left{
      width: 100%;
      margin-bottom: 30px;
      ul{
        list-style: none;
        display: flex;
        flex-wrap: wrap;
        li{
          width: 200px;
          margin-bottom: 10px;
          select{
            width: 65px;
            margin-left: 10px;
          }
          label{
            width: 65px;
          }
        }
      }
    }
    .second-left{
      ul{
        list-style: none;
        display: flex;
        flex-wrap: wrap;
        margin-top: 25px;
        li{
          width: 200px;
          margin-bottom: 10px;
        }
      }
    }
  }
  .right{
    padding: 20px 60px;
    margin-top: 30px;
    text-align: center;
    width: 300px;
    height: 300px;
    min-height: 300px;
  }
  .risultati {
    li {
      width: 80%;
      margin: 10% auto;
      img {
        max-height: 100px;
        max-width: 200px;
      }
      p.description {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        width: 100%;
      }
    }
  }
  input.input-number {
    width: 100px;
    border: 1px solid $boolblue;
    outline: none;
    color: $boolblue;
    padding: 5px 10px;
    border-radius: 5px;
  }
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }
  input[type=number] {
    -moz-appearance: textfield;
  }
  select {
    width: 100px;
    border: 1px solid $boolblue;
    outline: none;
    color: $boolblue;
    padding: 5px 10px;
    border-radius: 5px;
  }
  ul {
    padding-left: 0;
  }
}

</style>