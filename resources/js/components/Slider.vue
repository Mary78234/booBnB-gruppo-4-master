<template>

  <section>

    <div class="top-slider mb-4">
      <h1 class="pt-5 text-center">Gli alloggi più popolari.</h1>
      <h4 class="pt-2 text-center">Affari speciali e Prenotazioni Last-Minute per un'esperienza irripetibile!</h4>
    </div>
   
    <div  class="bottom-slider">
      <div v-for="house in sponsoredArray" :key="house.id" class="box-house text-center">
        <div class="img-area mb-4">
          <img :src="'http://localhost:8000/storage/' + house.image"  alt="Appartamento Uno">
        </div>
        <div class="text-area">
          <h3>{{house.title}}</h3>
          <p>{{house.city}}</p>
          <router-link class="button" :to="{name:'house',params:{ slug:house.slug }}">
                      Vai ai Dettagli
                    </router-link>
        </div>

      </div>
    </div>      
    
  

  </section>

 
</template>

<script>
import axios from 'axios';
export default {
  name: 'Slider',
  components: {
  
  },
  data(){
    return{
        allHouse : [],
        sponsoredArray : [],
        sponsoredNow: [],
        dateNow : null,
    }
  },
  methods:{

    getSponsored(){
      this.allHouse.forEach(house => {
        if(house.sponsors.length > 0){
          this.sponsoredArray.push( house );
        }
       
      });
     
    },

    formatDate(){
            let d = new Date();
            let dy = d.getDate();
            let m = d.getMonth() + 1;
            let y = d.getFullYear();

            if(dy < 10) dy = '0' + dy;
            if(m < 10) m = '0' + m;

            this.dateNow = `${y}/${m}/${dy}`;
        },
  
    compareDate(){
      this.sponsoredArray.forEach(house => {
        house.sponsors.forEach(sponsor => {
          console.log('now----->',this.dateNow);
             console.log('end----->',sponsor.pivot.end_date);
           if(sponsor.pivot.end_date < this.dateNow){
             this.sponsoredNow.push(house);
           }
        }
        );
        
      })
      console.log(this.sponsoredNow);
    },



   /*  <script type="text/javascript"language="javascript">
      function CompareDate() {
        var todayDate = new Date(); //Today Date.
        var dateOne = new Date(2010, 11, 25);
        if (todayDate > dateOne) {
        alert("Today Date is greater than Date One.");
      }else { */



   axiosCall() {
       axios.get('http://localhost:8000/api/houses/sponsored')
      .then(res => {
         this.allHouse = res.data.houses;
         this.getSponsored();
         this.formatDate();
         this.compareDate();

       
                      })
          .catch(err => { 
         console.log(err);
     })
 },
      

  },
  mounted(){
    this.axiosCall();
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