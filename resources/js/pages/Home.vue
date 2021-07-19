<template>
    <main>

        <Loader />

        <section>

            <div class="container text-center">
                <h1>QUESTA E' LA HOME</h1>

                <router-link class="nav-link" :to="{name: 'advsearch'}">Ricerca avanzata</router-link>
                <h3>Questo è jumbotron</h3>
            </div>

        </section>

        <!-- slider con le sponsorizzazioni -->
        <Slider />

    </main>
</template>

<script>
import Slider from '../components/Slider.vue';
import Loader from '../components/Loader.vue';

export default {
    name: 'Home',
    components: {
        Slider,
        Loader
    }
}
</script>

<style lang="scss" scoped>

</style>