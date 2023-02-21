<template>
    <div class="flex-wrapper">
        <main>
            <nav-bar />
            <router-view />
        </main>
        <recipe-footer />
    </div>
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

<style scoped>
.flex-wrapper{
    display: flex;
    min-height: 100vh;
    flex-direction: column;
    justify-content: space-between;
}
</style>
