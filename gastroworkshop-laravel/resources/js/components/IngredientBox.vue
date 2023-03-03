<template>
    <div class="ingredient-box container">
        <div class="row new-ingredient">
            <div class="input col-12 col-md-6 p-0">
                <label for="ingredient" class="form-label">Ingredient</label>
                <search-select @setSelectedInput="this.setSelectedIngredient" :items="ingredients.sort(this.sortByName)"
                               :category="'ingredient'" :default-label="'Select Ingredient'" />
            </div>
            <div class="input col-12 col-md-6 p-0">
                <label for="quantity" class="form-label">Quantity</label>
                <input placeholder="Quantity" type="number" name="quantity" id="quantity" class="form-control"
                       v-model="quantity">
            </div>
            <div class="input col-12 col-md-6 p-0">
                <label for="measure" class="form-label">Measure</label>
                <search-select ref="measureSelect" @setSelectedInput="this.setSelectedMeasure"
                               :items="validMeasures"
                               :category="'measure'" :default-label="'Select Measure'" />
            </div>
            <div class="col-12 col-md-6 p-0">
                <button class="btn w-100" @click="addIngredient">Add ingredient</button>
            </div>
        </div>
        <div class="row py-3">
            <div class="col">
                <ul>
                    <li v-for="ingredient in ownedIngredients" :key="ingredient.id">
                        {{ this.createIngredientText(ingredient) }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import SearchSelect from "./SearchSelect.vue";

export default {
    components: {
        SearchSelect,
    },
    props:{
        ownedIngredients: Array,
        ingredients: Array,
        measures: Array
    },
    data() {
        return {
            validMeasures: [],
            quantity: 0,
            selectedIngredient: null,
            selectedMeasure: null,
            resetSelected: false
        }
    },
    methods: {
        getValidMeasures() {
            this.validMeasures = [];
            for (const validMeasure of this.ingredients.find(item => item.id === this.selectedIngredient.id)["validMeasures"]) {
                this.validMeasures.push(this.measures.find(item => item.id === validMeasure));
            }
        },

        setSelectedIngredient(selectedId) {
            this.selectedIngredient = this.ingredients.find(item => item.id == selectedId);
            this.getValidMeasures();
            this.resetSelected = true;
        },
        setSelectedMeasure(selectedId = -1) {
            if(selectedId === -1){
                this.selectedMeasure = {};
            }
            this.selectedMeasure = this.measures.find(item => item.id == selectedId);
        },
        addIngredient() {
            this.$emit('addIngredient', this.selectedIngredient, this.selectedMeasure, this.quantity)
        },
        sortByName(a, b) {
            if (a.name > b.name) {
                return 1
            } else if (a.name < b.name) {
                return -1
            } else {
                return 0
            }
        },
        createIngredientText(ingredient) {
            let ingredientText = ""
            if (ingredient.measure.name === "to taste") {
                ingredientText = ingredient.ingredient.name + " - " + ingredient.measure.name;
            } else {
                ingredientText = ingredient.ingredient.name + " - " + ingredient.quantity + " " + ingredient.measure.name + "(s)"
            }
            return ingredientText;
        }
    },
    watch:{
        selectedIngredient(){
            this.$refs.measureSelect.resetSelected();
        }
    },
    emits:[
        'addIngredient'
    ],
}
</script>

<style scoped>
.ingredient-box {
    background-color: white;
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
}

label{
    padding-left: 5px;
    margin: 0;
}

.form-control, .form-control:focus{
    border: none;
    box-shadow: none;
}

.input{
    border: 1px solid #CCC;
}
</style>
