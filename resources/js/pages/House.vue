<template>
  <main>
    <!-- immagine = house.image -->
    <section class="container-fluid">
      
      <h1>{{house.title}}</h1>

      <div class="image-details row">
        <div
          v-if="house.image === null"
          class="image-left placeholder col-md-6 col-sm-12"
          style="background-image: url('http://localhost:8000/storage/placeholder/house.jpg')" 
          alt="house-placeholder">
          <h3>
            Immagini non presenti
          </h3>
        </div>
        <div
          v-else
          class="image-left col-md-6 col-sm-12"
          :style="{ 'background-image': 'url(' + house.image + ')' }"
          alt="">
        </div>
        <div class="details-right col-md-6 col-sm-12">
          <h3>Descrizione</h3>
          <ul>
            <li>
              Stanze: <strong>{{house.rooms_number}}</strong>
            </li>
            <li>
              Letti: <strong>{{house.beds}}</strong>
            </li>
            <li>
              Bagni: <strong>{{house.bathrooms}}</strong>
            </li>
            <li>
              Superficie totale: <strong>{{house.square_metre}}</strong>
            </li>
          </ul>
        </div>
      </div>

      <div
        v-if="house.features === empty"
        class="features">
        <h3>
          Nessun servizio aggiuntivo
        </h3>
      </div>
      <div
        v-else
        class="features">
        <ul>
            <li v-for="service in house.services" :key="service.pivot.service_id">
              <span class="btn btn-dark m-3">{{service.name}}</span>
            </li>
        </ul>
      </div>

      <div class="address-map row">
        <div class="address-left col-md-6 col-sm-12">
          <h3>Indirizzo</h3>
          <p>{{house.city}}, {{ house.address }}, {{house.house_number}}, {{house.postal_code}}, {{house.country}}</p>
        </div>
        <div class="description-right col-md-6 col-sm-12">
          <h3>Descrizione</h3>
          <p><strong>{{house.description}}</strong></p>
        </div>
      </div>

      <MessageForm 
      :house_id = house.id
      />
      
    </section>
    
  </main>
</template>

<script>
import MessageForm from '../components/MessageForm.vue';
import axios from 'axios';
export default {
  name: 'House',
  components: {
    MessageForm
  },
  data(){
    return{
        house: {},
        houseLocation: {}
    }
  },
  mounted(){
    console.log(this.$route.params.slug);
    axios.get('http://localhost:8000/api/houses/'+ this.$route.params.slug)
          .then(res => {
            console.log(res.data);
            if(res.data.success){
                  this.house = res.data.result;
                  
            }else{
              this.$router.push({name: 'error404'})
            };
            this.houseLocation.push(
                  {
                            lat: house.lat,
                            lng: house.long
                  }
            );
          })
          .catch(err =>{
            console.log(err);
          })

        

    
      
       const apiKey = 'EHA6jZsKzacvcupfIH5jId15dI3c5wGf';
       const APPLICATION_NAME = 'BoolBnB';
       const APPLICATION_VERSION = '1.0';
       let outerthis = this;
       tt.setProductInfo(APPLICATION_NAME, APPLICATION_VERSION);

        tt.services.fuzzySearch({
         key: apiKey,
         query: outerthis.houseLocation
       })

       .then(function(response) {
                let mymap = tt.map({
                key: apiKey,
                container: 'map-div',
                style: 'https://api.tomtom.com/style/1/style/21.1.0-*?map=basic_main&poi=poi_main',
                center: response.results[0].position,
                zoom: 15
              });
                
                new tt.Marker().setLngLat(outerthis.houseLocation).addTo(mymap);
              
       })
       
        
     
  }
}

</script>

<style lang="scss" scoped>

$boolblue: #04459e;
$boolgreen: #00E165;

h1 {
  margin: 50px 0;
  text-align: center;
  text-transform: uppercase;
}

ul {
    list-style-type: none;
}

.image-details {
  .image-left, .details-right {
    height: 400px;
  }
  .image-left {
    background-size: cover;
    background-position: center;
  }
  .image-left.placeholder {
    text-align: center;
    opacity: 0.5;
    h3 {
      line-height: 400px;
      color: black;
    }
  }
  .details-right {
    background-color: black;
    color: white;
    padding: 50px 100px;
    ul {
      li {
        margin-bottom: 10px;
      }
    }
    h3 {
      text-align: center;
      margin-bottom: 20px;
    }
  }
}

.features {
  width: 100%;
  text-align: center;
  min-height: 100px;
  h3 {
    color: black;
    line-height: 100px;
  }
  ul {
    height: 100%;
    list-style-type: none;
    display: flex;
    justify-content: space-around;
    align-items: center;
  }
}

.address-map {
  margin-bottom: 50px;
  .address-left, .description-right {
    min-height: 200px;
  }
  .address-left {
    background-color: $boolblue;
    color: white;
    text-align: center;
    padding: 50px;
    h3 {
      margin-bottom: 20px;
    }
  }
  .description-right {
    padding: 50px;
    text-align: center;
    background-color: $boolgreen;
    h3 {
      margin-bottom: 20px;
    }
  }
}

</style>