<template>
  <main>
    
    <section>
      
      <h1 class="text-center">TITOLO CASA</h1>

      <div class="image-detalis">
        <div class="image-left float-left">
          
        </div>
        <div class="detalis-right float-left">
          <h3>Caratteristiche</h3>
          <ul>
            <li>
              3 Stanze
            </li>
            <li>
              7 letti
            </li>
            <li>
              2 bagni
            </li>
            <li>
              190 mq
            </li>
          </ul>
        </div>
      </div>

      <div class="features">
        <ul>
          <li>
            WiFi
          </li>
          <li>
            Cucina
          </li>
          <li>
            Vista Mare
          </li>
          <li>
            Piscina
          </li>
          <li>
            Aria Condizionata
          </li>
        </ul>
      </div>

      <div class="address-map">
        <div class="address-left float-left">
          <h3>Indirizzo</h3>
          <ul>
            <li>
              Via tal dei tali, 4
            </li>
            <li>
              Milano
            </li>
            <li>
              Italia
            </li>
            <li>
              CAP
            </li>
          </ul>
        </div>
        <div class="map-right float-left">
          
        </div>
      </div>
      
    </section>
    
  </main>
</template>

<script>

import Loader from '../components/Loader.vue';

export default {
  name: 'House',
  components: {
    Loader
  }
}

</script>

<style lang="scss" scoped>

$boolblue: #04459e;
$boolgreen: #00E165;

h1 {
  margin: 50px 0;
}

.image-detalis {
  width: 100%;
  .image-left, .detalis-right {
    height: 400px;
    width: 50%;
  }
  .image-left {
    background-image: url('https://d3rn6ixv8qant7.cloudfront.net/wp-content/uploads/2018/05/luxury-contemporary-villas-in-guadalmina-baja-1-7980e48d732b6fc85c14b43b94d2aa54.jpg');
    background-size: cover;
  }
  .detalis-right {
    background-color: black;
    color: white;
    text-align: center;
  }
}

.features {
  width: 100%;
  height: 100px;
  ul {
    height: 100%;
    list-style-type: none;
    display: flex;
    justify-content: space-around;
    align-items: center;
  }
}

.address-map {
  margin-top: 400px;
  width: 100%;
  .address-left, .map-right {
    height: 400px;
  }
  .address-left {
    width: 35%;
    background-color: $boolblue;
    color: white;
    text-align: center;
  }
  .map-right {
    width: 65%;
    background-image: url('https://images.wired.it/wp-content/uploads/2019/05/13123414/milano.jpg');
    background-size: cover;
  }
}

</style>