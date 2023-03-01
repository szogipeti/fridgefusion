<template>
    <div class="ingredient-box container">
        <div class="row new-ingredient">
            <div class="input col-12 col-md-6 p-0 form-floating">
                <label for="ingredient" class="py-2">Ingredient</label>
                <select class="form-control" name="ingredient" id="ingredient" @change="selectedIngredientChanged"
                        v-model="this.selectedIngredient">
                    <option v-for="ingredient in ingredients.sort(this.sortByName)" :key="ingredient.id"
                            v-bind:value="ingredient.id">{{ ingredient.name }}
                    </option>
                </select>
                <!--<v-select class="form-control" placeholder="Ingredient" id="ingredient" v-bind="this.selectedIngredient" label="name" :options="ingredients" />-->
            </div>
            <div class="input col-12 col-md-6 p-0 form-floating">
                <label for="quantity" class="py-2">Quantity</label>
                <input placeholder="Quantity" class="form-control" type="number" name="quantity" id="quantity"
                       v-model="quantity">
            </div>
            <div class="input col-12 col-md-6 p-0 form-floating">
                <label for="measure" class="py-2">Measure</label>
                <select class="form-control" name="measure" id="measure" v-model="selectedMeasure">
                    <option v-for="measure in validMeasures.sort(this.sortByName)"
                            :key="measure.id" v-bind:value="measure.id">{{ measure.name }}
                    </option>
                </select>
                <!--<v-select class="form-control" placeholder="Measure" id="measure" label="name" :options="measures.filter((x) => {return x.name === this.selectedIngredient})" />-->
            </div>
            <div class="input col-12 col-md-6 p-0">
                <button class="btn btn-secondary w-100" @click="addIngredient">Add ingredient</button>
            </div>
        </div>
        <div class="row py-3">
            <div class="col">
                <ul>
                    <li v-for="ingredient in ownedIngredients" :key="ingredient.id">
                        {{this.createIngredientText(ingredient)}}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import vSelect from 'vue-select';

export default {
    components: {
        vSelect
    },
    data() {
        return {
            ingredients: [],
            ownedIngredients: [],
            measures: [],
            validMeasures: [],
            quantity: 0,
            selectedIngredient: null,
            selectedMeasure: null
        }
    },
    methods: {
        async getAllIngredient() {
            this.ingredients = [];
            const resp = await axios.get("api/ingredients");
            this.ingredients = resp.data.data;
        },
        async getValidMeasures() {
            this.validMeasures = [];
            for (const validMeasure of this.ingredients.find(item => item.id === this.selectedIngredient)["validMeasures"]) {
                this.validMeasures.push(this.measures.find(item => item.id === validMeasure));
            }
        },
        async getAllMeasures() {
            this.measures = [];
            const resp = await axios.get("api/measures");
            this.measures = resp.data.data;
        },
        addIngredient() {
            const ingredientName = this.ingredients.find(item => item.id === this.selectedIngredient)["name"];
            const measureName = this.measures.find(item => item.id === this.selectedMeasure)["name"]
            if(measureName !== "to taste" && this.quantity == 0){
                window.alert("Cannot add ingredient with zero quantity unless it's to taste")
                return;
            }
            const ingredient = {
                name: ingredientName,
                measure: measureName,
                quantity: this.quantity
            };
            this.ownedIngredients.push(ingredient);
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
        selectedIngredientChanged() {
            this.getValidMeasures();
        },
        createIngredientText(ingredient){
            let ingredientText = ""
            if(ingredient.measure === "to taste"){
                ingredientText = ingredient.name + " - " + ingredient.measure;
            }else{
                ingredientText = ingredient.name + " - " + ingredient.quantity + " " + ingredient.measure + "(s)"
            }
            return ingredientText;
        }
    },
    mounted() {
        this.getAllIngredient();
        this.getAllMeasures();
        this.ownedIngredients = [];
    }
}
</script>

<style scoped>
.ingredient-box {
    background-color: white;
    border: 1px solid black;
    width: 100%;
    min-height: 400px;
    margin-bottom: 20px;
    font-size: .75rem;
    overflow: auto;
}

.form-control {
    height: 40px;
    border-radius: 0;
}

button {
    height: 100%;
    border-radius: 0;
}

.new-ingredient {
    border-bottom: 1px solid black;
}
</style>
