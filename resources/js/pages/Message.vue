<template>
  <main>
    
    <Loader />

    <section>
      <div class="container text-center">
        <h1>Questa è la pagina messaggi</h1>

      </div>
    </section>
  </main>
</template>

<script>
import Loader from '../components/Loader.vue';

export default {
  name: 'Message',
  components: {
    Loader
  }
}
</script>

<style lang="scss" scoped>

</style>