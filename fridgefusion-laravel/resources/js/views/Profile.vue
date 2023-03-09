<template>
    <div class="clip-container main" v-if="!recipesLoaded">
        <clip-loader :size="'100px'" :color="'#117972'"/>
    </div>
    <div v-else class="container">
        <div class="row">
            <div class="col-4">
                <Form>
                    <font-awesome-icon icon="fa-solid fa-circle-user" />
                    <h1>Profile</h1>
                    <p>Username: {{ user.username }}</p>
                    <p>Email: {{ user.email }}</p>
                    <router-link id="newrecipe" to="/newrecipe">
                        Make new recipe
                    </router-link>
                    <button @click="logout" id="logout">Logout</button>
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

const router = useRouter();
const user = reactive({});

const recipes = reactive([])

const recipesLoaded = ref(false);

const logout = () => {
    localStorage.removeItem('token');
    router.push('/login').then(() => router.go());
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
</style>
