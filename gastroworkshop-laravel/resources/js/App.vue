<template>
    <nav-bar />
    <router-view />
    <recipe-footer />
</template>

<script>
    import { RouterView } from 'vue-router';
    import NavBar from "./components/NavBar.vue"
    import RecipeFooter from "./components/RecipeFooter.vue";
    export default{
        components:{
            RecipeFooter,
            RouterView,
            NavBar
        }
    }
</script>
