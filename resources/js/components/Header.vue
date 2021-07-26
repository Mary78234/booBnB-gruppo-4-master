<template>
    <!-- <header>
        <div class="container text-center">

            <h1>Questo è l header</h1>
            <router-link class="nav-link" :to="{name: 'home'}">Torna alla home</router-link>
            <router-link class="nav-link" :to="{name: 'results'}">Search</router-link>
            <a href="http://localhost:8000/user">Login</a>
            <a href="http://localhost:8000/register">Register</a>

        </div>
    </header>  -->

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
                <div class="menu col-12">
                    <ul class="row">
                        <li class="col-offset-3 col-1">
                            <router-link :to="{name: 'home'}">Home</router-link>
                        </li>
                        <li class="col-4">
                            <input type="text" placeholder="Cerca...">
                        </li>
                        <li class="col-1 col-offset-3">
                            <div class="dropdown-menu">
                                <button class="dropdown-btn">
                                    Account
                                </button>
                                <div class="dropdown-content">
                                    <a href="http://localhost:8000/user" class="dropdown-item">Login</a>
                                    <a href="http://localhost:8000/register" class="dropdown-item">Register</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="menu-search col-12">
                    <input type="text" placeholder="Cerca...">
                </div>
                <div class="dropdown-menu responsive col-12 row">
                    <button class="dropdown-btn">
                        Menù
                    </button>
                    <div class="dropdown-content">
                        <router-link :to="{name: 'home'}" class="dropdown-item">Home</router-link>
                        <a href="http://localhost:8000/user" class="dropdown-item">Login</a>
                        <a href="http://localhost:8000/register" class="dropdown-item">Register</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: 'Header'
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
    .menu-search {
        text-align: center;
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
            a:hover {
                border-radius: 50px;
                background-color: rgba(235, 233, 233, 0.9);
            }
        }
    }
    input {
        border: none;
        border-bottom: 2px solid $boolblue;
        width: 100%;
        outline: none;
        color: $boolblue;
    }
    .dropdown-menu {
        position: relative;
        text-align: center;
        display: inline-block;
        border: none;
        width: 100%;
        button {
            border: none;
            background-color: white;
            font-weight: 700;
            color: $boolblue;
            height: 100%;
            width: 100%;
        }
        .dropdown-content {
            position: absolute;
            left: 50%;
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
}

@media (max-width: 767px) {
    .menu {
        display: none;
    }
}

@media (min-width: 768px) {
    .dropdown-menu.row.responsive, .menu-search {
        display: none;
    }
}

</style>