<template>
    <div class="container">
        <div class="clip-container main" v-if="!recipesLoaded || !ingredientsLoaded || !measuresLoaded">
            <clip-loader :size="'100px'" :color="'#117972'"/>
        </div>
        <div v-else class="row">
            <div class="col-12 col-lg-5 ingredient-container">
                <h4>Your ingredients so far</h4>
                <ingredient-box @addIngredient="addIngredient" @deleteIngredient="deleteIngredient" :value="ownedIngredients"
                                :ingredients="ingredients" :measures="measures"/>
            </div>
            <div class="col-12 col-lg-7">
                <recipe-container :recipes="orderRecipes" />
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import {onMounted, reactive, ref, computed} from "vue";
import {useRoute} from 'vue-router';
import IngredientBox from "../components/IngredientBox.vue";

import ClipLoader from 'vue-spinner/src/ClipLoader.vue';
import RecipeContainer from "../components/RecipeContainer.vue";

const route = useRoute();

const recipes = reactive([]);
const filterRecipes = computed(() => {
    return filterByCategory(route.params['category']??'')
})
const orderRecipes = computed(() => {
    return filterRecipes.value.sort((a, b) => {
        const matchingSort = sortByMatchingIngredients(a, b);
        if(matchingSort !== 0){
            return matchingSort;
        }
        for (const ownedIngredient of ownedIngredients.sort((ingredientA, ingredientB) => sortByStandardMeasure(ingredientA, ingredientB))){
            const containedIngredientSort = sortByContainedIngredients(a, b, ownedIngredient)
            if(containedIngredientSort !== 0){
                return containedIngredientSort;
            }
        }
        return sortByName(a, b)
    })
})
const ownedIngredients = reactive([]);
const ingredients = reactive([]);
const measures = reactive([]);



const recipesLoaded = ref(false);
const ingredientsLoaded = ref(false);
const measuresLoaded = ref(false);

function sortByMatchingIngredients(recipeA, recipeB){
    let matchingCountA = 0;
    let matchingCountB = 0;
    for(const ingredient of recipeA["ingredients"]){
        if(ownedIngredients.findIndex(x => x["ingredient"]["id"] === ingredient["ingredient_id"]) !== -1){
            matchingCountA++;
        }
    }
    for(const ingredient of recipeB["ingredients"]){
        if(ownedIngredients.findIndex(x => x["ingredient"]["id"] === ingredient["ingredient_id"]) !== -1){
            matchingCountB++;
        }
    }
    if(matchingCountA > matchingCountB){
        return -1;
    }
    if(matchingCountA < matchingCountB){
        return 1;
    }
    return 0;
}

async function getAllRecipe() {
    const resp = await axios.get('api/recipes');
    for (const recipe of resp.data.data) {
        recipes.push(recipe);
    }
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
        ingredient: {
            id: selectedIngredient.id,
            name: selectedIngredient.name,
            category: selectedIngredient.category,
            validMeasures: selectedIngredient.validMeasures
        },
        measure:{
            id: selectedMeasure.id,
            name: selectedMeasure.name,
            standard_measure_id: selectedMeasure.standard_measure_id,
            conversion_rate: selectedMeasure.conversion_rate
        },
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

function sortByStandardMeasure(a, b) {
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
            return 1;
        }
        if (standardA > standardB) {
            return -1;
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
