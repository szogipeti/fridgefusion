<template>
    <nav class="nav">
        <a href="#" class="nav-brand">Fridge Fusion</a>
        <ul class="nav-menu" v-bind:class="{active: menuActive}">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Seasonal recipes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Weekly recipes</a>
            </li>
        </ul>
        <div class="d-flex align-items-center ms-auto ms-md-0">
                <router-link to="/login" class="nav-link">Login</router-link>
            <router-link to="/profile">
            <p class="mx-1 my-auto mr-2 text-white">Your profile</p>
            <img class="mx-1" src="/img/profile-icon.png" alt="">
            </router-link>
        </div>
        <div class="hamburger mx-2" v-bind:class="{active: menuActive}" @click="toggleMenu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>
</template>

<script setup>
import {ref} from "vue";

const menuActive = ref(false);
const toggleMenu = function(){
    menuActive.value = !menuActive.value;
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Julee&display=swap');
nav{
    background-color: #117972;
    font-family: 'Julee', cursive;
}
nav img{
    width: 40px;
    height: 40px;
}
li{
    list-style: none;
}
a{
    text-decoration: none;
}

.hamburger{
    display: none;
}

.bar{
    display: block;
    width: 25px;
    height: 3px;
    margin: 5px auto;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    background-color: white;
}

.nav{
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.5rem 0.25rem;
}

.nav-menu{
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0;
    margin: 0;
}

.nav-item{
    margin: 0 10px;
}

.nav-link, .nav-link:link, .nav-link:visited, .nav-link:hover, .nav-link:active{
    color: white;
}

.nav-brand{
    font-size: 2rem;
    font-weight: 500;
    color: white;
    margin: 0 10px;
}

@media only screen and (max-width: 768px){
    .nav-menu{
        position: fixed;
        left: -100%;
        top: calc(40px + 1.5rem);
        flex-direction: column;
        width: 100%;
        text-align: center;
        transition: left 0.3s;
        box-shadow: 0 10px 27px rgba(0,0,0,0.05);
        background-color: white
    }

    .nav-menu.active{
        left: 0;
        box-shadow: 0 0 0 max(100vh, 100vw) rgba(0, 0, 0, .3);
        -moz-transition: box-shadow 200ms;
        -webkit-transition: box-shadow 200ms;
        transition: box-shadow 200ms, left 200ms;
        position: sticky;
    }

    .nav-item{
        width: 100%;
    }

    .nav-link, .nav-link:link, .nav-link:visited, .nav-link:active{
        color: black;
    }

    .nav-item:hover{
        background-color: #56b1ab;
        transition: 0.3s
    }

    .hamburger{
        display: block;
        cursor: pointer;
    }

    .hamburger.active .bar:nth-child(2) {
        opacity: 0;
    }

    .hamburger.active .bar:nth-child(1) {
        transform: translateY(8px) rotate(45deg);
    }

    .hamburger.active .bar:nth-child(3) {
        transform: translateY(-8px) rotate(-45deg);
    }
}
</style>
