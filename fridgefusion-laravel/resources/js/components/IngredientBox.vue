<template>
    <div class="ingredient-box container">
        <div class="row new-ingredient">
            <div class="input col-12 col-md-6 p-0">
                <label for="ingredient" class="form-label">Ingredient</label>
                <search-select @setSelectedInput="setSelectedIngredient" :items="ingredients.sort(sortByName)"
                               :category="'ingredient'" :default-label="'Select Ingredient'"/>
            </div>
            <div class="input col-12 col-md-6 p-0">
                <label for="quantity" class="form-label">Quantity</label>
                <input placeholder="Quantity" type="number" name="quantity" id="quantity" class="form-control"
                       v-model="quantity">
            </div>
            <div class="input col-12 col-md-6 p-0">
                <label for="measure" class="form-label">Measure</label>
                <search-select ref="measureSelect" @setSelectedInput="setSelectedMeasure"
                               :items="validMeasures"
                               :category="'measure'" :default-label="'Select Measure'"/>
            </div>
            <div class="col-12 col-md-6 p-0">
                <button class="btn w-100"
                        @click="$emit('addIngredient', selectedIngredient, selectedMeasure, quantity)">
                    Add ingredient
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col p-0">
                <ul class="ingredient-list">
                    <li class="ingredient-item" v-for="ingredient in value" :key="ingredient.ingredient.id">
                        <p>{{ createIngredientText(ingredient) }}</p>
                        <font-awesome-icon class="icon-btn" @click="$emit('deleteIngredient', ingredient.ingredient.id)"
                                           icon="fa-solid fa-x"/>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script setup>
import SearchSelect from "./SearchSelect.vue";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {reactive, toRef, ref, watch} from "vue";
import {useField} from "vee-validate";

const props = defineProps(
    {
        value: Array,
        name: {
            type: String,
            required: true
        },
        ingredients: Array,
        measures: Array
    }
)

const validMeasures = reactive([])
const quantity = ref(0)
const selectedIngredient = reactive({});
const selectedMeasure = reactive({});
const resetSelected = ref(false);

const measureSelect = ref(null);

const name = toRef(props, 'name');

const {
    ownedIngredients: inputValue,
    errorMessage,
    meta,
} = useField(name, undefined, {
    initialValue: props.value
})

const getValidMeasures = function () {
    for (const validMeasure of props["ingredients"].find(item => item.id === selectedIngredient.id)["validMeasures"]) {
        validMeasures.push(props["measures"].find(item => item.id === validMeasure));
    }
}

const setSelectedIngredient = function (selectedId) {
    console.log(props["ownedIngredients"])
    console.log(selectedIngredient)
    const ingredient = props["ingredients"].find(item => item.id == selectedId);
    selectedIngredient.id = ingredient.id;
    selectedIngredient.name = ingredient.name;
    selectedIngredient.category = ingredient.category;
    selectedIngredient.validMeasures = ingredient.validMeasures;
    getValidMeasures();
    resetSelected.value = true;
    console.log(props["ownedIngredients"])
    console.log(selectedIngredient)
}

const setSelectedMeasure = function (selectedId = -1) {
    if (selectedId === -1) {
        Object.assign(selectedMeasure, null)
    } else {
        const measure = props["measures"].find(item => item.id == selectedId);
        selectedMeasure.id = measure.id;
        selectedMeasure.name = measure.name;
        selectedMeasure.standard_measure_id = measure.standard_measure_id;
        selectedMeasure.conversion_rate = measure.conversion_rate;
    }
}

const sortByName = function (a, b) {
    if (a.name > b.name) {
        return 1
    } else if (a.name < b.name) {
        return -1
    } else {
        return 0
    }
}

const createIngredientText = function (ingredient) {
    let ingredientText = ""
    if (ingredient.measure.name === "to taste") {
        ingredientText = ingredient.ingredient.name + " - " + ingredient.measure.name;
    } else {
        ingredientText = ingredient.ingredient.name + " - " + ingredient.quantity + " " + ingredient.measure.name + "(s)"
    }
    return ingredientText;
}

watch(selectedIngredient, () =>{
    measureSelect.value.resetSelected();
});

defineEmits([
    'addIngredient',
    'deleteIngredient'
])
</script>

<style scoped>
.ingredient-box {
    background-color: #ebebbc;
    border: 1px solid black;
    width: 100%;
    min-height: 400px;
    margin-bottom: 20px;
    overflow: auto;
}

.select-box, button {
    height: 40px;
    border-radius: 0;
}

button.btn, button.btn:link, button.btn:visited, button.btn:hover, button.btn:active {
    height: 100%;
    border-radius: 0;
    color: white;
    background: #117972;
}

.new-ingredient {
    border-bottom: 1px solid black;
    background-color: white;
}

label {
    padding-left: 5px;
    margin: 0;
}

.form-control, .form-control:focus {
    border: none;
    box-shadow: none;
}

.input {
    border: 1px solid #CCC;
}

.ingredient-list {
    padding: 0;
    margin: 20px;
}

.ingredient-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #8cb09e;
}

.ingredient-item p {
    margin-top: auto;
    margin-bottom: auto;
}
</style>
