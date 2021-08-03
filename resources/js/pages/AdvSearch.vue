<template>
  <main>

    <section class="container">

      <div class="mb-5 mt-5">
        <div class="search-location">
        <input 
            type="text" 
            v-model="advSearch">
         <button
            @click="initMap(advSearch)"  >
            cerca
        </button>
        
    </div>
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
                    onKeyPress="if(this.value.length==2) return false;"
                    v-model="roomsNumber"
                    >
                  
                </li>
                <li>
                  <label for="letti">Letti</label>
                  <!-- <select id="letti" name="beds">
                    <option v-for="n in 30" :key="n">{{ n }}</option>
                  </select> -->
                  <input 
                    class="input-number" 
                    type="number" 
                    onKeyPress="if(this.value.length==2) return false;"
                    v-model="beds"
                    >
                </li>
                
                <li>
                  <label for="radius">Km</label>
                  <div class="d-flex">
                  <input type="range" min="1" max="40" step="1" v-model="radius"> 
                  <input class="ml-3" id="radius" type="text" v-model="radius"/>
                
                </div>
                  
                </li>
              </ul>
            </div>

            <div class="second-left">
              <h2>Caratteristiche</h2>
              <form action="/action_page.php">
                <ul>
                  <li>
                    <input type="checkbox" id="wifi" value="wifi" v-model="checkedInput">
                    <label for="wifi">Wi-Fi</label><br>
                  </li>
                  <li>
                    <input type="checkbox" id="posto macchina" value="posto macchina" v-model="checkedInput">
                    <label for="posto macchina">Posto Macchina</label><br>
                  </li>
                  <li>
                    <input type="checkbox" id="piscina" value="piscina" v-model="checkedInput">
                    <label for="piscina">Piscina</label><br>
                  </li>
                  <li>
                    <input type="checkbox" id="idromassagio" value="idromassagio" v-model="checkedInput">
                    <label for="idromassagio">Idromassagio</label><br>
                  </li>
                  <li>
                    <input type="checkbox" id="portineria" value="portineria" v-model="checkedInput">
                    <label for="portineria">Portineria</label><br>
                  </li>
                  <li>
                    <input type="checkbox" id="sauna" value="sauna" v-model="checkedInput">
                    <label for="sauna">Sauna</label><br>
                  </li>
                  <li>
                    <input type="checkbox" id="vista mare" value="vista mare" v-model="checkedInput">
                    <label for="vista mare">Vista Mare</label><br>
                  </li>
                  <li>
                    <input type="checkbox" id="aria condizionata" value="aria condizionata" v-model="checkedInput">
                    <label for="aria condizionata">Aria Condizionata</label><br>
                  </li>
                  <li>
                    <input type="checkbox" id="animali domestici ammesi" value="animali domestici ammesi" v-model="checkedInput">
                    <label for="animali domestici ammesi">Animali Ammesi</label><br>
                  </li>
                  <li>
                    <input type="checkbox" id="cucina" value="cucina" v-model="checkedInput">
                    <label for="cucina">Cucina</label><br>
                  </li>
                  <li>
                    <input type="checkbox" id="bagno privato" value="bagno privato" v-model="checkedInput">
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
                  :src="'/storage/' + house.image" 
                  alt="">
                  <div class="col-sm-12 col-md-12 col-lg-8 description">
                    <h3>{{ house.title }}</h3>
                    <h5>{{ house.city }}</h5>
                    <p class="description">{{house.description}}</p>
                    <router-link class="inline btn btn-outline-success m-3" :to="{name:'house',params:{ slug:house.slug }}">Vai ai Dettagli</router-link>
                    <p class="services">Stanze: {{house.rooms_number}} - Bagni: {{house.bathrooms}} - Letti: {{house.beds}}</p>
                    <div class="btn-services" v-for="service in house.services" :key="service.id">
                        <span class="badge m-1 badge-dark">{{service.name}}</span>
                    </div>
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
  props:{
    location: String,
  },
  data(){
    return{
      /* salvo la posizione con v-model per advsearch */
        advSearch: this.location,

        houseLocation : [],
          /* ricerca avanzata */
        roomsNumber : '1',
        radius: 20,
        /* valori degli input */
        checkedInput: [],
        beds: "1",
        /* dati TomTom */
        apiKey: 'EHA6jZsKzacvcupfIH5jId15dI3c5wGf',
        mymap: null,
        LngLat: null,
        otherLocation : {lng: -122.47483, lat: 37.80776},
        /* Axios dove salvo i dati che mi arrivano */
        firstData : [],
        /* array posizioni lat e long */
        
      
        
    }
  },
  methods:{
      /* ----------------------------Inizializzazione Mappa----------------------------------- */
      
        initMap(obj) {
                this.map = tt.map({
                    key: this.apiKey,
                    container: 'map-div',
                    center: this.otherLocation,
                    zoom: 13
                })
                this.map.addControl(new tt.FullscreenControl());
                this.map.addControl(new tt.NavigationControl());
                if (this.location || this.advSearch) {
                    this.initPointView(obj);
                    this.axiosCall(obj);
                };
            },

            /* ---------------------------- Ricerca Punto di interesse ----------------------------------- */

            initPointView(pos) {
                tt.services.fuzzySearch({
                        key: this.apiKey,
                        query: pos
                    })
                    .then((response) => {
                        this.map.setCenter(response.results[0].position);
                    });
            },
            
            addMarkers() {
                this.firstData.forEach(house => {
                     let title = house.title;
                     let city = house.city;
                     let address = house.address;
                     let location = [house.long, house.lat]; 
                     this.createMarker('accident.colors-white.svg', location, '#c30b82', title + ', ' + city )
                     console.log(house);
                })
            },

            createMarker(icon, position, color, popupText) {
                var markerElement = document.createElement('div');
                markerElement.className = 'marker';
                var markerContentElement = document.createElement('div');
                markerContentElement.className = 'marker-content';
                markerContentElement.style.backgroundColor = color;
                markerElement.appendChild(markerContentElement);
                var iconElement = document.createElement('div');
                iconElement.className = 'marker-icon';
                iconElement.style.backgroundImage =
                    'url(https://api.tomtom.com/maps-sdk-for-web/cdn/static/' + icon + ')';
                markerContentElement.appendChild(iconElement);
                var popup = new tt.Popup({
                    offset: 30
                }).setText(popupText);
                // add marker to map
                var marker= new tt.Marker({
                        /* element: markerElement, */
                        anchor: 'bottom'
                    })
                    .setLngLat(position)
                    .setPopup(popup)
                    .addTo(this.map);
                    console.log('marker---->',marker, this.map);
            },


            axiosCall(obj) {
                axios.get('http://localhost:8000/api/houses/advsearch', {
                        params: {
                            city: obj,
                            radius: this.radius,
                            beds: this.beds,
                            rooms_number: this.roomsNumber,
                            service_name: this.checkedInput

                        }
                    })
                    .then(res => {
                        this.firstData = [];
                        this.firstData = res.data.houses;
                        console.log(this.firstData);
                        this.addMarkers();
                    })
                    .catch(err => {
                        console.log(err);
                    })
            },



  },
  mounted(){
    /* ---------- Avvio Mappa tramite props -------- */
    this.initMap(this.location)
   
    
  },
  created(){

    
  },
  computed: {
     
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
          width: 130px;
          margin-bottom: 10px;
          select{
            width: 65px;
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
#radius{
  border: none;
  outline: none;
  background: none;
  display: inline;
}

.search-location {
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

.marker-icon {
            background-position: center;
            background-size: 22px 22px;
            border-radius: 50%;
            height: 22px;
            left: 4px;
            position: absolute;
            text-align: center;
            top: 3px;
            transform: rotate(45deg);
            width: 22px;
        }
        .marker {
            height: 30px;
            width: 30px;
        }
        .marker-content {
            background: #c30b82;
            border-radius: 50% 50% 50% 0;
            height: 30px;
            left: 50%;
            margin: -15px 0 0 -15px;
            position: absolute;
            top: 50%;
            transform: rotate(-45deg);
            width: 30px;
        }
        .marker-content::before {
            background: #ffffff;
            border-radius: 50%;
            content: "";
            height: 24px;
            margin: 3px 0 0 3px;
            position: absolute;
            width: 24px;
        }

</style>