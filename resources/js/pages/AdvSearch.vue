<template>
  <main>
    <Loader />

    <section>
      <div class="container text-center">
        <h1>Ricerca avanzata</h1>
        <router-link class="nav-link" :to="{name: 'house'}">House</router-link>

      </div>

    </section>

    
  </main>
</template>

<script>
import Loader from '../components/Loader.vue';

export default {
  name: 'AdvSearch',
  components: {
    Loader
  }
}
</script>

<style>

</style>