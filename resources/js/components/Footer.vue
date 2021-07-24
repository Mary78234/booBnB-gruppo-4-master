<template>
  <footer>

    <div class="container">

      <div class="footer-top row">

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <h3>CITIES</h3>
          <ul>
            <li>
              Milano
            </li>
            <li>
              Roma
            </li>
            <li>
              Venezia
            </li>
            <li>
              Bologna
            </li>
            <li>
              Palermo
            </li>
            <li>
              Napoli
            </li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <h3>MARE</h3>
          <ul>
            <li>
              Cattolica
            </li>
            <li>
              Lignano Sabbiadoro
            </li>
            <li>
              Ostia
            </li>
            <li>
              Pescara
            </li>
            <li>
              Tropea
            </li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <h3>ESTERO</h3>
          <ul>
            <li>
              Berlino
            </li>
            <li>
              Londra
            </li>
            <li>
              Parigi
            </li>
            <li>
              Barcellona
            </li>
            <li>
              Praga
            </li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <h3>CONTATTI</h3>
          <ul>
            <li>
              Alessandro
            </li>
            <li>
              Alessandro
            </li>
            <li>
              Alejandro
            </li>
            <li>
              Mary
            </li>
            <li>
              Nicola
            </li>
          </ul>
        </div>

      </div>

      <div class="footer-bottom row">

        <div class="footer-bottom-left col-sm-6 col-xs-12">
          &copy; 2021 BoolBnB, Inc. · Privacy · Terms · Sitemap
        </div>

        <div class="footer-bottom-right col-sm-6 col-xs-12 text-right">
          <i class="fas fa-globe"></i> Italiano (IT) · € EUR <i class="fab fa-facebook-f"></i> <i class="fab fa-twitter"></i> <i class="fab fa-instagram"></i>
        </div>

      </div>

    </div>

  </footer>
</template>

<script>
export default {
    name: 'Footer'
}
</script>

<style lang="scss" scoped>

$boolblue: #04459e;
$boolgreen: #00E165;

  footer {
  width: 100%;
  background-color: #EEEEEE;
  color: $boolblue;
  .footer-top {
    margin-top: 20px;
    h3 {
      font-size: 16px;
      font-weight: bold;
    }
    ul {
      padding-left: 0;
      li {
        font-size: 12px;
        list-style: none;
      }
    }
  }
  border-top: 1px solid #DDDDDD;
  .footer-bottom {
    font-size: 12px;
    padding: 20px 0;
    border-top: 1px solid #DDDDDD;
  }
}
</style>