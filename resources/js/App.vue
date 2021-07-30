<template>
  <div>

    <Header />
    
    <router-view
    @textToSearch = 'getlocation'
    :location = location
    ></router-view>
                 
    <Footer />

  </div>
</template>

<script>
import axios from 'axios';
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