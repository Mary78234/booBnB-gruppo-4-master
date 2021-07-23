<template>
  <section>

    <Loader />
     <h1 class="text-center">Slider</h1>

   

  </section>
</template>

<script>
import Loader from './Loader.vue';






export default {
  name: 'Slider',
  components: {
    Loader,
   
  },

  }

</script>

<style lang="scss" scoped>

section{
  background-color: rgb(255, 255, 255);
  min-height: 200px;
}


  
</style>