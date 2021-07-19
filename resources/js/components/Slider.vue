<template>
  <section>

    <Loader />

    <div class="container text-center">
      <h1>Questo è lo slider</h1>

      
    </div>
  </section>
</template>

<script>
import Loader from './Loader.vue';

export default {
  name: 'Slider',
  components: {
    Loader
  }
}
</script>

<style lang="scss" scoped>
section{
  background-color: bisque;
  min-height: 200px;
}
  
</style>