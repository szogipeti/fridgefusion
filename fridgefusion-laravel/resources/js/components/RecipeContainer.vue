<template>
    <div class="recipe-container">
        <div class="row">
            <recipe-card
                v-for="recipe in recipes.slice((currentPage - 1) * recipePerPage, currentPage * recipePerPage)"
                :key="recipe.id" :name="recipe.name"
                :image="recipe.image" :publisher-id="recipe.publisher_id" :id="recipe.id" :can-be-edited="canBeEdited"/>
        </div>
        <div class="row">
            <div class="col">
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
            </div>
        </div>
    </div>

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
    recipes: [],
    canBeEdited: {
        type: Boolean,
        default: false
    }
})

function navigateToPage(pageNumber) {
    currentPage.value = pageNumber
    window.scrollTo(0, 0)
}

</script>

<style scoped>

</style>
