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
                  <p> <router-link to="/newrecipe">
                        <button class="buttons" >Make new recipe</button>
                    </router-link>
                  </p>
                    <p>
                    <button  class="buttons" @click="logout">Logout</button>
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

.buttons{
    display: block;
    width: 100%;
    border: none;
    background-color: #18afa5;
    padding: 14px 28px;
    font-size: 150%;
    text-align: center;
    color: white;
    border-radius: 10px;

}
.recipe{
    width: 100%;
    text-align: center;
    font-size: 150%;
    background-color: white;
    border-radius: 10px;

}
.profile{
    width: 100%;
    text-align: center;
    font-size: 150%;
}
.profdiv{
    background-color: gainsboro;
    border: 2px solid lightgray;
    border-radius: 10px;
    margin-top: 10px;
    box-shadow:10px 10px 10px darkgrey;
    left: 15%;
}
</style>
