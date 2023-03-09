<template>
    <div class="clip-container main" v-if="!recipesLoaded">
        <clip-loader :size="'100px'" :color="'#117972'"/>
    </div>
    <div v-else class="container">
        <div class="row">
            <div class="col-4 profdiv">
                <Form class="fromdata">
                    <font-awesome-icon class="profile" icon="fa-solid fa-circle-user" />
                    <h1 class="profile">Profile</h1>
                    <p class="recipe">Username: {{ user.username }}</p>
                    <p class="recipe">Email: {{ user.email }}</p>
                  <p class="recipe"> <router-link to="/newrecipe">
                        <button class="width-100%">Make new recipe</button>
                    </router-link>
                  </p>
                    <p>
                    <button class="recipe" @click="logout">Logout</button>
                    </p>
                </Form>
            </div>
            <div class="col-8">
                <h2 class="my-3">Your recipes</h2>
                <recipe-container :recipes="recipes.sort(sortByName)" :can-be-edited="true" />
            </div>
        </div>
    </div>
</template>

<script setup>
import {onMounted, reactive, ref} from 'vue';
import {useRouter} from 'vue-router';
import {Form, Field} from 'vee-validate';
import {http} from "../utils/http";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import axios from "axios";
import RecipeContainer from "../components/RecipeContainer.vue";
import ClipLoader from 'vue-spinner/src/ClipLoader.vue';
import {useLoggedInStore} from "../store/isLoggedIn.js";

const isLoggedInStore = useLoggedInStore();

const router = useRouter();
const user = reactive({});

const recipes = reactive([])

const recipesLoaded = ref(false);

const logout = () => {
    localStorage.removeItem('token');
    isLoggedInStore.triggerLoggedIn();
    router.push('/login');
}
defineExpose({logout});

async function getUserData() {
    const userdata = await http.get("profile",{headers: {Authorization: `Bearer ${localStorage.getItem('token')}`}})
    for (const key in userdata.data) {
        user[key] = userdata.data[key]
    }
}

const getUserRecipes = async function (){
    const resp = await axios.get('api/recipes');
    for (const recipe of resp.data.data) {
        if(recipe.publisher_id === user["id"] ){
            recipes.push(recipe);
        }
    }
    recipesLoaded.value = true;
}

const sortByName = function (a, b){
    if(a.name < b.name){
        return -1;
    }
    if(a.name > b.name){
        return 1;
    }
    return 0;
}

onMounted(() => {
    getUserData().then(() => getUserRecipes());
})
</script>

<style scoped>
.fa-circle-user{
    width: 100px;
    height: 100px;
}
.fromdata{
}
.recipe{
    width: 100%;
    text-align: center;
    font-size: 200%;
    background-color: white;
    border-radius: 10px;

}
.profile{
    width: 100%;
    text-align: center;
    font-size: 200%;
}
.profdiv{
    background-color: #18afa5;
    border: 3px solid #18afa5;
    border-radius: 10px;
    margin-top: 10px;
}
</style>
