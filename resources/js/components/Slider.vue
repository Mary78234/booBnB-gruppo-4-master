<template>

  <section>

    <div class="top-slider mb-4">
      <h1 class="pt-5 text-center">Gli alloggi più popolari.</h1>
      <h4 class="pt-2 text-center">Affari speciali e Prenotazioni Last-Minute per un'esperienza irripetibile!</h4>
    </div>
    <div class="bottom-slider">
      <div class="box-house text-center">
        <div class="img-area mb-4">
          <img src="https://archello.s3.eu-central-1.amazonaws.com/images/2019/04/10/modern-house-in-moscow-1.1554930809.2534.jpg" alt="Appartamento Uno">
        </div>
        <div class="text-area">
          <h3>Villa Stile Liberty</h3>
          <p>Los Angeles</p>
          <a href="">Prenota</a>
        </div>
      </div>
      <div class="box-house text-center">
        <div class="img-area mb-4">
          <img src="https://cdn.vox-cdn.com/thumbor/6itLJS9BZ-B5gXPjM1AB_z-ZKVI=/0x0:3000x2000/1200x800/filters:focal(1260x760:1740x1240)/cdn.vox-cdn.com/uploads/chorus_image/image/65890203/iStock_1067331614.7.jpg" alt="Appartamento Due">
        </div>
        <div class="text-area">
          <h3>Appartamento di lusso</h3>
          <p>Frankfurt</p>
          <a href="">Prenota</a>
        </div>
      </div>
      
      <div class="box-house text-center">
        <div class="img-area mb-4">
          <img src="https://static.dezeen.com/uploads/2020/02/house-in-the-landscape-niko-arcjitect-architecture-residential-russia-houses-khurtin_dezeen_2364_hero.jpg" alt="Appartamento Tre">
        </div>
        <div class="text-area">
          <h3>Castello incantato</h3>
          <p>Transilvania</p>
          <a href="">Prenota</a>
        </div>
      </div>

    </div>
    
  

  </section>

 
</template>

<script>







export default {
  name: 'Slider',
  components: {
    
   
  }

  }

</script>

<style lang="scss" scoped>

section{
  min-height: 600px;
  background-color: white;
  .bottom-slider{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    .box-house{
      width: 300px;
      margin: 30px 30px;
      .img-area{
        width: 300px;
        height: 200px;
        img{
          width: 100%;
          height: 100%;
          box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.438);
        }
      }
      .text-area{
        a{
          font-size: 15px;
          background-color: rgb(71, 71, 192);
          border-radius: 10px;
          color: white;
          text-decoration: none;
          padding: 10px 20px;    
        }
        a:hover{
            background-color: rgb(50, 52, 151);

          }
      }

    }
  }
}


</style>