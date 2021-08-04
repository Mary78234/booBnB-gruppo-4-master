<template>
  <div>

    <Header />
    <!-- <div class="carousel">
       <div class="card-container">
         <h3>prova</h3>
         <p>città</p>
         <div>foto</div>
       </div>
      </div> -->
    <router-view
    @textToSearch = 'getlocation'
    :location = location
    ></router-view>
                 
    <Footer />

  </div>
</template>

<script>

import Header from './components/Header.vue';
import Footer from './components/Footer.vue';

export default {
  name: 'App',
  components: {
    Header,
    Footer
  },
  data() {
        return {
        location : '',
    }
  },
    methods:{
      getlocation(obj){
        this.location = obj.text;
        console.log(this.location);
      }
      
        
    },
    created(){
      
    },
    mounted(){

    },
    computed:{
     
    }

}
</script>

<style lang="scss">
@import "../sass/frontoffice/global";

</style>