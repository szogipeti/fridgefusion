<template>
    <div class="ingredient-box">
        <v-select label="name" :options="ingredients" />
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
            measures: []
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
        getDropdownIngredients(){

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
    max-height: 400px;
}
</style>
