<template>
    <div class="container">
        <div class="clip-container main" v-if="!recipesLoaded || !ingredientsLoaded || !measuresLoaded">
            <clip-loader :size="'100px'" :color="'#117972'"/>
        </div>
        <div v-else class="row">
            <div class="col-12 col-lg-5 ingredient-container">
                <h4>Your ingredients so far</h4>
                <ingredient-box @addIngredient="addIngredient" @deleteIngredient="deleteIngredient" :owned-ingredients="ownedIngredients"
                                :ingredients="ingredients" :measures="measures"/>
            </div>
            <div class="col-12 col-lg-7">
                <div class="recipe-container">
                    <div class="row mb-3">
                        <div class="col">
                            <h1>Recipes for you</h1>
                        </div>
                    </div>
                    <div class="row">
                        <recipe-card
                            v-for="recipe in filterRecipes.slice((currentPage - 1) * recipePerPage, currentPage * recipePerPage)"
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
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import {onMounted, reactive, ref, computed} from "vue";
import {useRoute} from 'vue-router';
import IngredientBox from "../components/IngredientBox.vue";
import RecipeCard from "../components/RecipeCard.vue";
import Paginate from "vuejs-paginate-next";
import ClipLoader from 'vue-spinner/src/ClipLoader.vue';

const route = useRoute();

const recipes = reactive([]);
const filterRecipes = computed(() => {
    return filterByCategory(route.params['category']??'')
})
const ownedIngredients = reactive([]);
const ingredients = reactive([]);
const measures = reactive([]);

const recipePerPage = ref(12);
const pageCount = computed(() => {
    return Math.ceil(filterRecipes.value.length / recipePerPage.value)
});
const currentPage = ref(1);

const recipesLoaded = ref(false);
const ingredientsLoaded = ref(false);
const measuresLoaded = ref(false);

async function getAllRecipe() {
    const resp = await axios.get('api/recipes');
    for (const recipe of resp.data.data) {
        recipes.push(recipe);
    }
    orderRecipes();
    recipesLoaded.value = true;
}

async function getAllIngredient() {
    const resp = await axios.get("api/ingredients");
    for (const ingredient of resp.data.data) {
        ingredients.push(ingredient);
    }
    ingredientsLoaded.value = true;
}

async function getAllMeasure() {
    const resp = await axios.get("api/measures");
    for (const measure of resp.data.data) {
        measures.push(measure);
    }
    measuresLoaded.value = true;
}

function addIngredient(selectedIngredient, selectedMeasure, quantity) {
    if(!validateData(selectedIngredient, selectedMeasure, quantity)){
        return;
    }
    const ingredient = {
        ingredient: selectedIngredient,
        measure: selectedMeasure,
        quantity: quantity
    };
    let exists = false;
    for(const index in ownedIngredients){
        if(ownedIngredients[index].ingredient["id"] === selectedIngredient["id"]){
            ownedIngredients[index] = ingredient;
            exists = true;
            break;
        }
    }
    if(!exists){
        ownedIngredients.push(ingredient);
    }
    orderRecipes();
}

function validateData(selectedIngredient, selectedMeasure, quantity){
    if(selectedIngredient == null || selectedIngredient == undefined){
        window.alert("Ingredient has not been set!")
        return false;
    }
    if(selectedMeasure == null || selectedMeasure == undefined){
        window.alert("Measure has not been set!")
        return false;
    }
    if (selectedMeasure.name !== "to taste" && quantity <= 0) {
        window.alert(quantity + " " + selectedMeasure.name + " is not a valid measure!")
        return false;
    }
    return true;
}

function deleteIngredient(ingredientId){
    const index = ownedIngredients.findIndex(item => item["ingredient"]["id"] === ingredientId)
    ownedIngredients.splice(index, 1)
    orderRecipes();
}

function orderRecipes() {
    if(ownedIngredients.length === 0){
        recipes.sort((a, b) => sortByName(a, b));
    }
    for (const ownedIngredient of ownedIngredients.sort((a, b) => sortByStandardValue(a, b))) {
        recipes.sort((a, b) => sortByContainedIngredients(a, b, ownedIngredient))
    }
}

function sortByName(a, b){
    if(a.name < b.name){
        return -1;
    }
    if(a.name > b.name){
        return 1;
    }
    return 0;
}

function sortByContainedIngredients(a, b, ownedIngredient){
    const containsA = containsIngredient(a["ingredients"], ownedIngredient);
    const containsB = containsIngredient(b["ingredients"], ownedIngredient);

    if (containsB && !containsA) {
        return 1
    }
    if (containsA && !containsB) {
        return -1;
    }
    return 0;
}

function sortByStandardValue(a, b) {
    const measureA = a["measure"];
    const measureB = b["measure"];
    if (measureA["name"] === "to taste" && measureB["name"] !== "to taste") {
        return 1;
    }
    if (measureA["name"] !== "to taste" && measureB["name"] === "to taste") {
        return -1;
    }
    if (measureA["name"] === "to taste" && measureB["name"] === "to taste") {
        return 0;
    }
    if (measureA["standard_measure_id"] === measureB["standard_measure_id"]) {
        const standardA = a["quantity"] * measureA["conversion_rate"];
        const standardB = b["quantity"] * measureB["conversion_rate"];
        if (standardA < standardB) {
            return -1;
        }
        if (standardA > standardB) {
            return 1;
        }
    }
    return 0;
}

function filterByCategory(category){
    switch (category){
        case 'appetizer':
            return recipes.filter(x => { return x["category"] === 'Appetizer'})
        case 'soup':
            return recipes.filter(x => { return x["category"] === 'Soup'})
        case 'main_course':
            return recipes.filter(x => { return x["category"] === 'Main Dish'})
        case 'dessert':
            return recipes.filter(x => { return x["category"] === 'Dessert'})
        default:
            return recipes;
    }
}

function containsIngredient(recipeIngredients, ownedIngredient) {
    for (const recipeIngredient of recipeIngredients) {
        if (recipeIngredient["ingredient_id"] === ownedIngredient["ingredient"]["id"]) {
            return true;
        }
    }
    return false;
}

function navigateToPage(pageNumber) {
    currentPage.value = pageNumber
    window.scrollTo(0, 0)
}

onMounted(() => {
    getAllRecipe()
    getAllIngredient()
    getAllMeasure()
})
</script>

<style scoped>
@media only screen and (min-width: 992px){
    .ingredient-container{
        margin-top: 100px;
    }
}
</style>
