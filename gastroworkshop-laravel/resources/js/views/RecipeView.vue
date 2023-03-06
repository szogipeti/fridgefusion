<template>
<div class="clip-container main" v-if="!recipeLoaded">
    <clip-loader :size="'100px'" :color="'#117972'"/>
</div>
<div v-else class="container p-3">
    <div class="row">
        <div class="col-12 col-lg-6 my-3 d-flex flex-column align-items-center justify-content-center">
            <h1 class="text-center recipe-title">{{recipe.name}}</h1>
            <h4 class="text-muted recipe-title text-center">{{recipe.category}}</h4>
            <div class="details">
                <div class="row">
                    <div class="col">
                        <p class="bubble-title">Total time</p>
                    </div>
                    <div class="col">
                        <p class="bubble-title">Serving</p>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <div class="bubble m-auto">
                            <p>{{recipe.total_time}}</p>
                            <p>min</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="bubble m-auto">
                            <p>{{recipe.serving}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="publisher align-self-end mt-5">
                <p>Publisher:</p>
                <p>{{recipe.publisher}}</p>
            </div>
        </div>
        <div class="col-12 col-lg-6 my-3">
            <img :src="recipe.imageUrl" alt="">
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6 my-3">
            <h3>Ingredients</h3>
            <div class="clip-container mt-5" v-if="!ingredientsLoaded">
                <clip-loader :size="'40px'" :color="'#117972'"/>
            </div>
            <ul v-else>
                <li v-for="ingredient in ingredients" :key="ingredient">{{createIngredientText(ingredient)}}</li>
            </ul>
        </div>
        <div class="col-12 col-lg-6 my-3">
            <h3>Method</h3>
            <ol>
                <li v-for="method in recipe.method" :key="method">{{method}}</li>
            </ol>
        </div>
    </div>
</div>
</template>

<script setup>
import {http} from '@/utils/http';
import {useRoute} from 'vue-router';
import {ref, onMounted, reactive} from "vue";
import ClipLoader from 'vue-spinner/src/ClipLoader.vue';


const route = useRoute();
const recipe = reactive({})
const ingredients = reactive([])
const recipeLoaded = ref(false);
const ingredientsLoaded = ref(false);

const getRecipe = async function(){
    const resp = (await http.get('/recipes/' +  route.params['id'])).data.data;
    recipe.id = resp["id"];
    recipe.name = resp["name"];
    recipe.method = resp["method"];
    recipe.category = resp["category"];
    recipe.publisher = resp["publisher"];
    recipe.image = resp["image"];
    recipe.imageUrl = `img/${recipe["image"]}`
    recipe.total_time = resp["total_time"];
    recipe.serving = resp["serving"];

    recipeLoaded.value = true;

    for (const ingredient of resp["ingredients"]){
        const ingredientDetails = (await getIngredient(ingredient["ingredient_id"]));
        const measureDetails = (await getMeasure(ingredient["measure_id"]));
        ingredients.push({
            'ingredient': ingredientDetails,
            'measure': measureDetails,
            'quantity': ingredient.quantity
        })
    }

    ingredientsLoaded.value = true;
}

const getIngredient = async function(id){
    const resp = (await http.get('ingredients/' + id)).data.data;
    return resp;
}

const getMeasure = async function(id){
    const resp = (await http.get('measures/' + id)).data.data;
    return resp;
}

const createIngredientText = function(ingredient){
    if(ingredient["measure"]["name"] === "to taste"){
        return `${ingredient["ingredient"]["name"]} ${ingredient["measure"]["name"]}`
    }
    return `${ingredient["quantity"]} ${ingredient["measure"]["name"]}(s) of ${ingredient["ingredient"]["name"]}`
}

onMounted(() => {
    getRecipe();
})
</script>

<style scoped>
.bubble{
    background: #C74545;
    border-radius: 100%;
    height: 50px;
    width: 50px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

p{
    margin: 0;
}

.bubble p{
    color: white;
    text-align: center;
    vertical-align: center;
}

.bubble-title{
    width: 100px;
    text-align: center;
}

img{
    object-fit: cover;
    object-position: center;
    width: 100%;
    height: 400px;
}

.bubble, .recipe-title{
    font-family: 'Julee', cursive;
}

</style>
