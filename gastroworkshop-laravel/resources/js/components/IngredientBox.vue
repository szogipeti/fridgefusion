<template>
    <div class="ingredient-box container">
        <div class="row new-ingredient">
            <div class="input col-12 col-md-6 p-0">
                <search-select @setSelectedInput="this.setSelectedIngredient" :items="ingredients" :category="'ingredient'" :default-label="'Select Ingredient'" />
                <!--<v-select class="form-control" placeholder="Ingredient" id="ingredient" v-bind="this.selectedIngredient" label="name" :options="ingredients" />-->
            </div>
            <div class="input col-12 col-md-6 p-0">
                <input placeholder="Quantity" class="form-control" type="number" name="quantity" id="quantity">
            </div>
            <div class="input col-12 col-md-6 p-0">
                <select data-live-search="true" class="form-control" name="ingredient" id="ingredient" v-bind:value="this.selectedMeasure">
                    <option value="" disabled selected>Measure</option>
                    <option v-for="measure in measures.filter((x) => {return x.name === this.selectedIngredient.name})" :key="measure.id" value="{{measure.id}}">{{measure.name}}</option>
                </select>
                <!--<v-select class="form-control" placeholder="Measure" id="measure" label="name" :options="measures.filter((x) => {return x.name === this.selectedIngredient})" />-->
            </div>
            <div class="input col-12 col-md-6 p-0">
                <button class="btn btn-secondary w-100">Add ingredient</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <ul>
                    <li v-for="ingredient in ownedIngredients" :key="ingredient.id">
                        {{ingredient.name}} - {{ingredient.quantity===null?ingredient.measure:ingredient.quantity + " " + ingredient.measure + "(s)"}}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import vSelect from 'vue-select';
import SearchSelect from "./SearchSelect.vue";
export default{
    components:{
        SearchSelect,
        vSelect
    },
    data(){
        return{
            ingredients: [],
            measures: [],
            selectedIngredient: null,
            selectedMeasure: null
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
        setSelectedIngredient(selectedId){
            this.selectedIngredient = this.ingredients.find(item => item.id == selectedId);
        },
        setSelectedMeasure(selectedId){
            this.selectedMeasure = this.measures.find(item => item.id == selectedId);
        }
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
.select-box, button{
    height: 40px;
    border-radius: 0;
}
.new-ingredient{
    border-bottom: 1px solid black;
}
</style>
