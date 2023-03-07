<template>
    <div class="clip-container main" v-if="!ingredientsLoaded || !measuresLoaded">
        <clip-loader :size="'100px'" :color="'#117972'"/>
    </div>
    <div v-else class="container-fluid">
        <Form @submit="createRecipe" :validation-schema="Schema">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" v-model="name" class="form-control width-100"/>
                <error-message name="name"></error-message>
            </div>
            <div class="form-group">
                <label for="ingredients">Ingredients:</label>
                <ingredient-box @addIngredient="addIngredient" @deleteIngredient="deleteIngredient" :owned-ingredients="ownedIngredients"
                                :ingredients="ingredients" :measures="measures"/>
                <error-message name="ingredient"></error-message>
            </div>
            <div class="form-group">
                <label for="instructions">Instructions:</label>
                <textarea name="instructions" v-model="instructions" class="form-control"></textarea>
                <error-message name="instructions"></error-message>
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <select name="category" v-model="category" class="form-control">
                    <option value="appetizer">Appetizer</option>
                    <option value="soup">Soup</option>
                    <option value="main">Main Dish</option>
                    <option value="dessert">Dessert</option>
                </select>
                <error-message name="category"></error-message>
            </div>
            <div class="form-group">
                <label for="image">Image URL:</label>
                <input type="text" name="image" v-model="image" class="form-control"/>
                <error-message name="image"></error-message>
            </div>
            <div class="form-group">
                <label for="servings">Servings:</label>
                <input type="number" id="servings" v-model="servings">
                <error-message name="servings"></error-message>
            </div>
            <div class="form-group">
                <label for="totalTime">Total Time (minutes):</label>
                <input type="number" id="totalTime" v-model="totalTime">
                <error-message name="totalTime"></error-message>
            </div>
            <input type="submit" value="Create Recipe">
        </Form>
    </div>
</template>

<script setup>
import {createApp, onMounted, reactive, ref} from 'vue';
import IngredientBox from "../components/IngredientBox.vue";
import axios from "axios";
import ClipLoader from 'vue-spinner/src/ClipLoader.vue';
import {Form,Field,ErrorMessage} from 'vee-validate';
import * as yup from "yup";
const Schema = yup.object({
    name: yup.string().max(50).required(),
    ownedIngredients: yup.array().required(),
    instructions: yup.array().required(),
    category: yup.string().max(25).required(),
    image: yup.string().max(25).required(),
    servings: yup.number().required(),
    totalTime: yup.number().required()
});

const ownedIngredients = reactive([]);
const ingredients = reactive([]);
const measures = reactive([]);

const name = ref('')
const instructions = ref('')
const category = ref('appetizer')
const image = ref('')
const servings = ref(1)
const totalTime = ref(0)

const measuresLoaded = ref(false);
const ingredientsLoaded = ref(false);


const getAllIngredient = async function () {
    const resp = await axios.get("api/ingredients");
    for (const ingredient of resp.data.data) {
        ingredients.push(ingredient);
    }
    ingredientsLoaded.value = true;
}

const getAllMeasure = async function () {
    const resp = await axios.get("api/measures");
    for (const measure of resp.data.data) {
        measures.push(measure);
    }
    measuresLoaded.value = true;
}

const addIngredient = function (selectedIngredient, selectedMeasure, quantity) {
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
}

const validateData = function (selectedIngredient, selectedMeasure, quantity){
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

const deleteIngredient = function (ingredientId){
    const index = ownedIngredients.findIndex(item => item["ingredient"]["id"] === ingredientId)
    ownedIngredients.splice(index, 1)
}

const createRecipe = async function (){

}

onMounted(() => {
    getAllMeasure();
    getAllIngredient();
})

</script>
