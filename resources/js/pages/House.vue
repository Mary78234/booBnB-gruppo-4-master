<template>
  <main>
    
    <Loader />

    <section>
      <div class="container text-center">
        <h1>Pagina dettaglio appartamento</h1>
        <router-link class="nav-link" :to="{name: 'message'}">Message</router-link>

      </div>
    </section>
    
  </main>
</template>

<script>
import Loader from '../components/Loader.vue';

export default {
  name: 'House',
  components: {
    Loader
  }
}
</script>

<style>

</style>