<template>
  <main>

    <Loader />

    <section>
      <div class="container text-center">

        <router-link class="nav-link" :to="{name: 'advsearch'}">Vai a ricerca avanzata</router-link>

        <h1>Questi sono i risultati della ricerca</h1>

        <ul>
          <li>
            <router-link class="nav-link" :to="{name: 'house'}">House</router-link>
          </li>
          <li>
            <router-link class="nav-link" :to="{name: 'house'}">House</router-link>
          </li>
          <li>
            <router-link class="nav-link" :to="{name: 'house'}">House</router-link>
          </li>
        </ul>

      </div>
    </section>

  </main>
</template>

<script>
import Loader from '../components/Loader.vue';

export default {
  name: 'Results',
  components: {
    Loader
  }
}
</script>

<style>

</style>