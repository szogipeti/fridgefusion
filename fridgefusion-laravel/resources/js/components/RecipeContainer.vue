<template>
    <div class="recipe-container">
        <div class="row mb-3">
            <div class="col">
                <h1>Recipes for you</h1>
            </div>
        </div>
        <div class="row">
            <recipe-card
                v-for="recipe in recipes.slice((currentPage - 1) * recipePerPage, currentPage * recipePerPage)"
                :key="recipe.id" :name="recipe.name"
                :image="recipe.image" :publisher="recipe.publisher" :id="recipe.id"/>
        </div>
    </div>
    <paginate
        :page-count="pageCount"
        :prev-text="'Prev'"
        :next-text="'Next'"
        :container-class="'paginate'"
        :page-class="'page-item'"
        :prev-class="'prev'"
        :next-class="'next'"
        :click-handler="navigateToPage"
    />
</template>

<script setup>
import RecipeCard from "../components/RecipeCard.vue";
import Paginate from "vuejs-paginate-next";
import {computed, ref} from "vue";

const recipePerPage = ref(12);
const pageCount = computed(() => {
    return Math.ceil(props.recipes.length / recipePerPage.value)
});
const currentPage = ref(1);

const props = defineProps({
    recipes: []
})

function navigateToPage(pageNumber) {
    currentPage.value = pageNumber
    window.scrollTo(0, 0)
}

</script>

<style scoped>

</style>
