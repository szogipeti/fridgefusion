<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <router-link class="navbar-brand text-white" :to="{ name: 'home'}">Fridge Fusion</router-link>
            <div class="order-lg-1 d-flex justify-content-end align-items-center">
                <div class="d-flex align-items-center ms-auto ms-md-0">
                    <router-link id="loginBtn" v-if="!isLoggedInStore.isLoggedIn" to="/login" class="nav-link">Login</router-link>
                    <router-link id="profile" v-else to="/profile" class="d-flex justify-content-end align-items-center">
                        <p class="mx-1 my-auto mr-2 text-white">Your profile</p>
                        <img class="mx-1" src="/img/profile-icon.png" alt="">
                    </router-link>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse order-0" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <router-link class="nav-link active" aria-current="page" :to="{ name: 'home'}">Home</router-link>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu">
                            <li><router-link class="dropdown-item" :to="{ name: 'home', params: { category: 'appetizer'}}">Appetizers</router-link></li>
                            <li><router-link class="dropdown-item" :to="{ name: 'home', params: { category: 'soup'}}">Soups</router-link></li>
                            <li><router-link class="dropdown-item" :to="{ name: 'home', params: { category: 'main_course'}}">Main courses</router-link></li>
                            <li><router-link class="dropdown-item" :to="{ name: 'home', params: { category: 'dessert'}}">Desserts</router-link></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>
import {useLoggedInStore} from "../stores/isLoggedIn.js";
const isLoggedInStore = useLoggedInStore();
</script>

<style scoped>
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

.nav-item{
    margin: 0 10px;
}

.nav-link, .navbar-nav .show > .nav-link, .navbar-nav .nav-link.active, .nav-link:hover{
    color: white;
}
.nav-link:focus{
    color: #ddd;
}

.navbar-brand{
    font-size: 2rem;
    font-weight: 500;
    color: white;
    margin: 0 10px;
}

</style>
