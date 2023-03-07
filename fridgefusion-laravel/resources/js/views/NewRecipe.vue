<template>
    <div class="container-fluid">
        <form @submit="submitForm">
            <label for="name">Name:</label>
            <input type="text" name="name" v-model="name" class="form-control width-100"/>
            <label for="ingredients">Ingredients:</label>
            <textarea name="ingredients" v-model="ingredients" class="form-control"></textarea>
            <label for="instructions">Instructions:</label>
            <textarea name="instructions" v-model="instructions" class="form-control"></textarea>
            <label for="category">Category:</label>
            <select name="category" v-model="category" class="form-control">
                <option value="appetizer">Appetizer</option>
                <option value="soup">Soup</option>
                <option value="main">Main Dish</option>
                <option value="dessert">Dessert</option>
            </select>
            <label for="image">Image URL:</label>
            <input type="text" name="image" v-model="image" class="form-control"/>
            <label for="servings">Servings:</label>
            <div id="servings">
                <h1>{{ servings }}</h1>
                <button @click='incServings()'>+</button>
                <button @click='decServings()'>-</button>
            </div>
            <label for="totalTime">Total Time (minutes):</label>
            <div id="totalTime">
                <h1>{{ totalTime }}</h1>
                <button @click='incTotalTime()'>+</button>
                <button @click='decTotalTime()'>-</button>
            </div>
            <button type="submit">Create Recipe</button>
        </form>
    </div>
</template>

<script setup>
import { createApp, ref } from 'vue';

const name = ref('')
const ingredients = ref('')
const instructions = ref('')
const category = ref('appetizer')
const image = ref('')
const servings = ref(1)
const totalTime = ref(0)

const incServings = () => {
    servings.value++
}

const decServings = () => {
    if (servings.value > 1) {
        servings.value--
    }
}

const incTotalTime = () => {
    totalTime.value++
}
</script>
