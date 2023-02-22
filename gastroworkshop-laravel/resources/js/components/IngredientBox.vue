<template>
    <div class="ingredient-box container">
        <div class="row">
            <div class="input col-4 p-0">
                <v-select placeholder="Ingredient" id="ingredient" v-bind="this.selectedIngredient" label="name" :options="ingredients" />
            </div>
            <div class="input col-2 p-0">
                <input placeholder="Quantity" class="form-control" type="number" name="quantity" id="quantity">
            </div>
            <div class="input col-3 p-0">
                <v-select placeholder="Measure" id="measure" label="name" :options="measures.filter((x) => {return x.name === this.selectedIngredient})" />
            </div>
            <div class="input col-3 p-0">
                <button class="btn btn-success">Add ingredient</button>
            </div>
        </div>
        <ul>
            <li v-for="ingredient in ownedIngredients" :key="ingredient.id">
                {{ingredient.name}} - {{ingredient.quantity===null?ingredient.measure:ingredient.quantity + " " + ingredient.measure + "(s)"}}
            </li>
        </ul>
    </div>
</template>

<script>
import vSelect from 'vue-select';
import 'vue-select/dist/vue-select.css'
export default{
    components:{
        vSelect
    },
    data(){
        return{
            ingredients: [],
            measures: [],
            selectedIngredient: null
        }
    },
    props:{
        ownedIngredients: Array
    },
    methods:{
        async getAllIngredient(){
            this.ingredients = [];
            const resp = await axios.get("api/ingredients");
            this.ingredients = resp.data.data;
        },
        async getAllMeasures(){
            this.measures = [];
            const resp = await axios.get("api/measures");
            this.measures = resp.data.data;
        },
    },
    mounted(){
        this.getAllIngredient();
        this.getAllMeasures();
    }
}
</script>

<style scoped>
.ingredient-box{
    background-color: white;
    border: 1px solid black;
    width: 100%;
    height: 400px;
    margin-bottom: 20px;
    font-size: .75rem;
}
.row input, .v-select, .vs__dropdown-toggle, .vs__selected-options{
    height: 60px;
}
</style>
