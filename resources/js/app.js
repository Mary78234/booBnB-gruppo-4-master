window.Vue = require('vue');

import App from './App.vue';
import router from './routes';

const app = new Vue({
    el: '#app',
    router,
    render: h => h(App)
});


const APIKEY = 'EHA6jZsKzacvcupfIH5jId15dI3c5wGf';
            const GOLDEN_GATE_BRIDGE = {lng: -122.47483, lat: 37.80776};
 
            var map = tt.map({
             key: APIKEY,
            container: 'map',
            center: GOLDEN_GATE_BRIDGE,
            zoom: 12
            });

