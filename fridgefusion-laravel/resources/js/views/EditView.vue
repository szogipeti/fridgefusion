<template>
    <div class="clip-container main" v-if="!ingredientsLoaded || !measuresLoaded || !recipeLoaded">
        <clip-loader :size="'100px'" :color="'#117972'"/>
    </div>
    <div v-else class="container-fluid">
        <Form @submit="createRecipe" :validation-schema="Schema">
            <div class="form-group">
                <label class="form-label" for="name">Name:</label>
                <Field type="text" name="name" id="name" class="form-control width-100" v-model="name"/>
                <error-message name="name"></error-message>
            </div>
            <div class="form-group">
                <label class="form-label" for="ingredients">Ingredients:</label>
                <ingredient-box data-vv-validate-on="none" @addIngredient="addIngredient"
                                @deleteIngredient="deleteIngredient" :value="ownedIngredients"
                                :ingredients="ingredients" :measures="measures" name="ingredients" id="ingredients"/>
                <error-message name="ingredient"></error-message>
            </div>
            <div class="form-group">
                <label class="form-label" for="instructions">Instructions:</label>
                <step-box data-vv-validate-on="none" @addStep="addStep" @deleteStep="deleteStep" :value="instructions"
                          name="instructions" id="instructions"/>
                <error-message name="instructions"></error-message>
            </div>
            <div class="form-group">
                <label class="form-label" for="category">Category:</label>
                <Field class="form-select" name="category" as="select" id="category" v-model="category">
                    <option v-bind:value="'appetizer'">Appetizer</option>
                    <option v-bind:value="'soup'">Soup</option>
                    <option v-bind:value="'main'">Main Dish</option>
                    <option v-bind:value="'dessert'">Dessert</option>
                </Field>
                <error-message name="category"></error-message>
            </div>
            <div class="form-group">
                <label class="form-label" for="image">Image URL:</label>
                <Field class="form-control" type="text" name="image" id="image" v-model="image"/>
                <error-message name="image"></error-message>
            </div>
            <div class="form-group">
                <label class="form-label" for="serving">Servings:</label>
                <Field class="form-control" type="number" id="serving" name="serving" v-model="serving"/>
                <error-message name="servings"></error-message>
            </div>
            <div class="form-group">
                <label class="form-label" for="totalTime">Total Time (minutes):</label>
                <Field class="form-control" type="number" id="totalTime" name="totalTime" v-model="totalTime"/>
                <error-message name="totalTime"></error-message>
            </div>
            <input type="submit" value="Edit Recipe">
        </Form>
    </div>
</template>

<script setup>
import {createApp, onMounted, reactive, ref} from 'vue';
import IngredientBox from "../components/IngredientBox.vue";
import axios from "axios";
import ClipLoader from 'vue-spinner/src/ClipLoader.vue';
import {Form, Field, ErrorMessage} from 'vee-validate';
import * as yup from "yup";
import {useRoute, useRouter} from 'vue-router';
import StepBox from "../components/StepBox.vue";
import {http} from "../utils/http";

const route = useRoute();
const router = useRouter();

const Schema = yup.object({
    name: yup.string().max(50).required(),
    ownedIngredients:
        yup.array()
            .of(
                yup.object().shape({
                    ingredient: yup.object().shape({
                        id: yup.number().required(),
                    }),
                    measure: yup.object().shape({
                        id: yup.number().required()
                    }),
                    quantity: yup.number().required()
                })
            ),
    instructions:
        yup.array()
            .of(
                yup.object().shape({
                    name: yup.string().required()
                })
            ).required(),
    category: yup.string().max(25).required(),
    image: yup.string().max(25).required(),
    serving: yup.number().required(),
    totalTime: yup.number().required()
});

const ownedIngredients = reactive([]);
const ingredients = reactive([]);
const measures = reactive([]);

const user = reactive({});

const name = ref('')
const instructions = reactive([])
const category = ref('appetizer')
const publisher = ref('')
const image = ref('')
const serving = ref(1)
const totalTime = ref(0)

const measuresLoaded = ref(false);
const ingredientsLoaded = ref(false);
const recipeLoaded = ref(false)


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

const getRecipe = async function () {
    const resp = (await axios.get("api/recipes/" + route.params["id"])).data.data;
    name.value = resp.name;
    for (const instruction of resp.method) {
        instructions.push({name: instruction});
    }
    switch (resp.category) {
        case "Appetizer":
            category.value = "appetizer";
            break;
        case "Soup":
            category.value = "soup";
            break;
        case "Main Dish":
            category.value = "main";
            break;
        case "Dessert":
            category.value = "dessert";
    }
    category.value = resp.category;
    image.value = resp.image;
    totalTime.value = resp.total_time;
    serving.value = resp.serving;
    for (const recipeIngredient of resp.ingredients) {
        const ingredient = await getIngredient(recipeIngredient["ingredient_id"])
        const measure = await getMeasure(recipeIngredient["measure_id"])
        const quantity = recipeIngredient["quantity"]
        ownedIngredients.push({
            "ingredient": ingredient,
            "measure": measure,
            "quantity": quantity
        })
    }
    recipeLoaded.value = true;
}

const getIngredient = async function (id) {
    const resp = (await axios.get('api/ingredients/' + id)).data.data;
    return resp;
}

const getMeasure = async function (id) {
    const resp = (await axios.get('api/measures/' + id)).data.data;
    return resp;
}


const addIngredient = function (selectedIngredient, selectedMeasure, quantity) {
    if (!validateData(selectedIngredient, selectedMeasure, quantity)) {
        return;
    }
    const ingredient = {
        ingredient: {
            id: selectedIngredient.id,
            name: selectedIngredient.name,
            category: selectedIngredient.category,
            validMeasures: selectedIngredient.validMeasures
        },
        measure: {
            id: selectedMeasure.id,
            name: selectedMeasure.name,
            standard_measure_id: selectedMeasure.standard_measure_id,
            conversion_rate: selectedMeasure.conversion_rate
        },
        quantity: quantity
    };
    let exists = false;
    for (const index in ownedIngredients) {
        if (ownedIngredients[index].ingredient["id"] === selectedIngredient["id"]) {
            ownedIngredients[index] = ingredient;
            exists = true;
            break;
        }
    }
    if (!exists) {
        ownedIngredients.push(ingredient);
    }
}

const validateData = function (selectedIngredient, selectedMeasure, quantity) {
    if (selectedIngredient == null || selectedIngredient == undefined) {
        window.alert("Ingredient has not been set!")
        return false;
    }
    if (selectedMeasure == null || selectedMeasure == undefined) {
        window.alert("Measure has not been set!")
        return false;
    }
    if (selectedMeasure.name !== "to taste" && quantity <= 0) {
        window.alert(quantity + " " + selectedMeasure.name + " is not a valid measure!")
        return false;
    }
    return true;
}

const deleteIngredient = function (ingredientId) {
    const index = ownedIngredients.findIndex(item => item["ingredient"]["id"] === ingredientId)
    ownedIngredients.splice(index, 1)
}

const addStep = function () {
    instructions.push({name: ''})
}

const deleteStep = function (index) {
    instructions.splice(index, 1)
}

async function getUserData() {
    const userdata = await http.get("profile",{headers: {Authorization: `Bearer ${localStorage.getItem('token')}`}})
    for (const key in userdata.data) {
        user[key] = userdata.data[key]
    }
}

const createRecipe = function (recipe) {
    const recipeData = {
        name: recipe.name,
        method: [],
        category: recipe.category,
        publisher_id: user.id,
        image: recipe.image,
        total_time: recipe.totalTime,
        serving: recipe.serving,
        ingredients: []
    }
    for (const instruction of recipe.instructions) {
        recipeData.method.push(instruction.name);
    }
    for (const ingredient of recipe.ingredients) {
        recipeData.ingredients.push({
            ingredient_id: ingredient.ingredient.id,
            measure_id: ingredient.measure.id,
            quantity: ingredient.quantity
        })
    }
    axios.put("/api/recipes/" + route.params["id"], recipeData, {headers: {'Authorization': 'Bearer ' + localStorage.getItem('token')}});
    router.push({name: "profile"})
}

onMounted(() => {
    getUserData();
    getAllMeasure();
    getAllIngredient();
    getRecipe();
})

</script>

<style scoped>
input{
    border-radius: 0;
    border: 2px solid #18afa5;
}
input[type=submit]{
margin-top: 20px;
margin-bottom: 10px;
width: 100%;
padding-top: 5px;
padding-bottom: 5px;
color: white;
background-color: #117972;
border: 3px solid #117972;
}
input[type=submit]:hover{
background-color: white;
color: black;
}
.form-select{
    border-radius: 0;
    border: 2px solid #18afa5;
}
</style>