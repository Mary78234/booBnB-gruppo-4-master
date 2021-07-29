<template>
  <main>
    
    <section class="container-fluid">
      
      <h1>TITOLO CASA</h1>

      <div class="image-details row">
        <div class="image-left col-md-6 col-sm-12">
          
        </div>
        <div class="details-right col-md-6 col-sm-12">
          <h3>Caratteristiche</h3>
          <ul>
            <li>
              Numero di stanze: <strong>3</strong>
            </li>
            <li>
              Numero di letti: <strong>8</strong>
            <li>
              Numero di bagni: <strong>2</strong>
            </li>
            <li>
              Superficie totale: <strong>190mq</strong>
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

      <div class="address-map row">
        <div class="address-left col-md-6 col-sm-12">
          <h3>Indirizzo</h3>
          <p>Viale Tal dei Tali, 47, Milano (MI), Italia</p>
        </div>
        <div class="map-right col-md-6 col-sm-12">
          
        </div>
      </div>

      <MessageForm />
      
    </section>
    
  </main>
</template>

<script>
import MessageForm from '../components/MessageForm.vue';

export default {
  name: 'House',
  components: {
    MessageForm
  }
}

</script>

<style lang="scss" scoped>

$boolblue: #04459e;
$boolgreen: #00E165;

h1 {
  margin: 50px 0;
  text-align: center;
}

ul {
    list-style-type: none;
}

.image-details {
  .image-left, .details-right {
    height: 400px;
  }
  .image-left {
    background-image: url('https://d3rn6ixv8qant7.cloudfront.net/wp-content/uploads/2018/05/luxury-contemporary-villas-in-guadalmina-baja-1-7980e48d732b6fc85c14b43b94d2aa54.jpg');
    background-size: cover;
  }
  .details-right {
    background-color: black;
    color: white;
    padding: 50px;
    ul li {
      margin-bottom: 10px;
    }
    h3 {
      text-align: center;
      margin-bottom: 20px;
    }
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
  margin-bottom: 50px;
  .address-left, .map-right {
    height: 400px;
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
  .map-right {
    background-image: url('https://images.wired.it/wp-content/uploads/2019/05/13123414/milano.jpg');
    background-size: cover;
  }
}

</style>