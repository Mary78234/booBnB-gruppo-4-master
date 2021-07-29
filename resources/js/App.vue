<template>
  <div>
    
    <Header />
    
    <router-view></router-view>
                 
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
            FindLocation : ''
    }
  },
    methods:{

     
        
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