import axios from '../../../public/js/user';
<template>
    <header>
        <nav class="navbar-container">
            <div class="navbar">
                <div class="logo col-12">
                    <h1>
                        <router-link :to="{name: 'home'}">
                            BOOLBNB
                        </router-link>
                    </h1>
                </div>
                <div class="menu container col-12">
                    <ul>
                        <li>
                            <router-link :to="{name: 'home'}">Home</router-link>
                        </li>
                        <li>
                            <router-link :to="{name: 'advsearch'}">Ricerca Avanzata</router-link>
                        </li>
                        <li>
                             <a href="http://localhost:8000/user">Area Riservata</a>
                        </li>
                    </ul>
                </div>
                <div class="dropdown-menu responsive col-12 row">
                    <button class="dropdown-btn">
                        Menù
                    </button>
                    <div class="dropdown-content">

                        <router-link :to="{name: 'home'}" class="dropdown-item">Home</router-link>
                        <router-link :to="{name: 'advsearch'}" class="dropdown-item">Ricerca Avanzata</router-link>
                        <a href="http://localhost:8000/user" class="dropdown-item">Area Riservata</a>
                        
                    </div>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>


export default {
    name: 'Header',
    components: {

    },
    data(){
        return{
            
        }
    },
    methods:{
       
    },
    created(){
    }
}

</script>

<style lang="scss" scoped>

$boolblue: #04459e;
$boolgreen: #00E165;

.navbar-container{
    padding-top: 10px;
    padding-bottom: 10px;
    background-color: white;
    box-shadow: 2px 2px 5px rgba(200, 200, 200, 0.9);
    color: $boolblue;
    font-weight: 700;
    .logo {
        text-align: center;
        h1 {
            a {
                color: black;
            }
        }
    }
    .logo:hover {
        h1 {
            a {
                color: $boolblue;
            }
        }
    }
    .menu {
        text-align: center;
    }
    button.search-btn {
        width: 20%;
        margin: 0 10% 0 0;
        background-color: white;
        color: $boolblue;
        border: none;
        border-bottom: 2px solid $boolblue;
        font-weight: bold;
    }
    .search {
        display: flex;
        input {
            width: 70%;
            margin: 0 0 0 10%;
        }
    }
    a {
        text-decoration: none;
        color: $boolblue;
    }
    ul {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        padding-top: 4px;
        width: 100%;
        list-style: none;
        margin: 0;
        li {
            line-height: 50px;
            height: 50px;
            margin: 0 20px;
            a:hover {
                background-color: rgba(235, 233, 233, 0.9);
            }
        }
    }
    ul.row {
        margin: 0;
        padding: 0;
    }
    input {
        border: none;
        border-bottom: 2px solid $boolblue;
        width: 90%;
        outline: none;
        color: $boolblue;
        margin: 0 5%;
    }
    .menu-search {
        line-height: 50px;
        margin-bottom: 20px;
        text-align: center;
        display: flex;
        input {
            width: 70%;
            margin: 0 0 0 10%;
        }
    }
    .dropdown-menu {
        position: relative;
        display: inline-block;
        border: none;
        height: 50px;
        min-width: 0;
        top: 0;
        padding: 0;
        margin: 0;
        width: 100%;
        text-align: center;
        button.dropdown-btn {
            border: none;
            background-color: white;
            font-weight: 700;
            height: 50px;
            color: $boolblue;
            text-align: center;
            width: 100%;
            padding: 0;
            margin: 0;
        }
        .dropdown-content {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            display: none;
            z-index: 1;
            text-align: center;
            background-color: white;
        }
    }
    .dropdown-menu:active .dropdown-content,
    .dropdown-menu:hover .dropdown-content {
        display: block;
    }
    router-link.dropdown-item {
        background-color: white;
    }
}

@media (max-width: 991px) {
    .menu.container {
        display: none;
    }
}

@media (min-width: 992px) {
    .dropdown-menu.row.responsive {
        display: none;
    }
}

</style>