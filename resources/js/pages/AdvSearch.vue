<template>
  <main>
    <Loader />

    <section>
      <div class="contenedor-search-av">

        <div class="search">
          <h2>Cerca Citta</h2>
          <input type="search">
        </div>
        <div class="content-house-search row ">
          <div class="left col-sm-12 col-md-12 col-lg-6">
            <div class="first-left">
              <h1>Casa</h1>
              <ul>
                <li>
                  <label for="stanze">Stanze</label>
                  <select id="stanze" name="rooms">
                    <option value="letto1">1</option>
                    <option value="letto2">2</option>
                    <option value="letto3">3</option>
                    <option value="letto4">4</option>
                  </select>
                </li>
                <li>
                  <label for="letti">Letti</label>
                  <select id="letti" name="beds">
                    <option value="letto1">1</option>
                    <option value="letto2">2</option>
                    <option value="letto3">3</option>
                    <option value="letto4">4</option>
                  </select>
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
              <h1>Caratteristiche</h1>
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
                    <label for="animali domestici ammesi">Animali Domestici Ammesi</label><br>
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

          <div class="right col-sm-12 col-md-12 col-lg-6">
            <img class="img-fluid" src="https://via.placeholder.com/600x400" alt="">
          </div>
        </div>
        
        <router-link class="nav-link" :to="{name: 'house'}">House</router-link>
      </div>

    </section>

    
  </main>
</template>

<script>
import Loader from '../components/Loader.vue';

export default {
  name: 'AdvSearch',
  components: {
    Loader
  }
}
</script>

<style lang="scss" scoped>
 .contenedor-search-av{
   width: 100%;
   margin-top: 15px;
   
    .search  {
     width: 40%;
     margin: auto;
     h2{
       margin-left: 5px;
     }
     input{
       width: 100%;
       font-style: none;
       outline: none;
       border-radius: 50px;
       padding-left: 15px;
      }
    }

    .content-house-search{
      margin: 0;
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
      }

    }
    
  }
</style>