<template>
    <main>

        <!-- <Loader /> -->

        <section class="jumbotron">

            <div class="container text-center">
                <h1>Qui inizia la tua avventura!</h1>
                <h5>Esperienze uniche in luoghi magnifici.</h5>
                <h5 class="mb-5">Entra nel magico mondo di BoolBnB.</h5>

                <router-link class="nav-link" :to="{name: 'advsearch'}">
                   <span>Ricerca Avanzata</span>
                </router-link>
                
            </div>

        </section>

        <!-- slider con le sponsorizzazioni -->
        <!-- <Slider />
        <Error404 />
        <MessageConfirmation /> -->
        

    </main>
</template>

<script>
/* import Slider from '../components/Slider.vue';
import Loader from '../components/Loader.vue';
import Error404 from './Error404.vue';
import MessageConfirmation from '../components/MessageConfirmation.vue'; */

export default {
    name: 'Home',
    components: {
        /* Slider,
        Loader,
        Error404,
        MessageConfirmation */
    }
}
</script>

<style lang="scss" scoped>

section.jumbotron{
    color: white;
    background-image: url("https://i.pinimg.com/originals/e9/62/97/e96297cf9fdf03ccdef1fab87bda06e4.jpg");
    background-size: cover;
    background-position-y: center;
    background-position-x:center;
    box-shadow:inset 0 0 0 50vw rgba(0, 0, 0, 0.596);
    min-height: 700px;
    margin-bottom: 0px;
    position: relative;
    border-radius: 0px;
    display:flex;
    justify-content: center;
    align-items: center;
    .nav-link span{
        background-color: white;
        padding: 10px 50px;
        border-radius: 10px;   
        transition:0.5s; 
    }
    .nav-link span:hover{
            box-shadow: 0px 0px 15px rgba(204, 204, 204, 0.884);
            color: rgb(31, 31, 255);
    }
}





</style>