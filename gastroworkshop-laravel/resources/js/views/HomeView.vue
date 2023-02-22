<template>
    <category-nav-bar />
    <div class="container">
        <div class="row">
            <div class="col-5">
                <h4>Your ingredients so far</h4>
                <ingredient-box :ingredients="ownedIngredients" />
            </div>
            <div class="col-7">

            </div>
        </div>
    </div>
</template>

<script setup>
import CategoryNavBar from "../components/CategoryNavBar.vue"
import axios from "axios";
import {onMounted, reactive} from "vue";
import IngredientBox from "../components/IngredientBox.vue";
const recipes = reactive([]);
const ownedIngredients = reactive([]);

async function getAllRecipe(){
    const resp = await axios.get('api/recipes');
    recipes["data"] = resp.data.data;
}
onMounted(() => { getAllRecipe()})
</script>
