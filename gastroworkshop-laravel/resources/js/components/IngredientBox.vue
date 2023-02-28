<template>
    <div class="ingredient-box container">
        <div class="row new-ingredient">
            <div class="input col-12 col-md-6 p-0">
                <select class="form-control" name="ingredient" id="ingredient" @change="selectedIngredientChanged" v-model="this.selectedIngredient">
                    <option value="" disabled selected>Ingredient</option>
                    <option v-for="ingredient in ingredients.sort(this.sortByName)" :key="ingredient.id" v-bind:value="ingredient.id">{{ingredient.name}}</option>
                </select>
                <!--<v-select class="form-control" placeholder="Ingredient" id="ingredient" v-bind="this.selectedIngredient" label="name" :options="ingredients" />-->
            </div>
            <div class="input col-12 col-md-6 p-0">
                <input placeholder="Quantity" class="form-control" type="number" name="quantity" id="quantity">
            </div>
            <div class="input col-12 col-md-6 p-0">
                <select class="form-control" name="ingredient" id="ingredient" v-model="selectedMeasure">
                    <option v-for="measure in validMeasures.filter((x) => {return x.id === this.selectedIngredient}).sort(this.sortByName)"
                            :key="measure.id"  v-bind:value="measure.id">{{measure.name}}</option>
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
export default{
    components:{
        vSelect
    },
    data(){
        return{
            ingredients: [],
            measures: [],
            validMeasures: [],
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
        async getValidMeasures(){
            this.validMeasures = [];
            for(const validMeasure of this.ingredients.filter(x=> {return x.id === this.selectedIngredient})["validMeasures"]){
                this.measures.push(this.measures.find(x => x.id==validMeasure));
            }
        },
        async getAllMeasures(){
            this.measures = [];
            const resp = await axios.get("api/measures");
            this.measures = resp;
        },
        sortByName(a, b){
            if(a.name > b.name)
            {
                return 1
            }else if(a.name < b.name)
            {
                return -1
            }else{
                return 0
            }
        },
        selectedIngredientChanged(){
            this.getValidMeasures();
            console.log(this.measures);
            console.log(this.selectedIngredient);
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
.form-control, button{
    height: 40px;
    border-radius: 0;
}
.new-ingredient{
    border-bottom: 1px solid black;
}
</style>
