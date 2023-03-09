<template>
    <div class="clip-container main" v-if="!recipesLoaded">
        <clip-loader :size="'100px'" :color="'#117972'"/>
    </div>
    <div v-else class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12" id="profdiv">
                <Form class="fromdata">
                    <font-awesome-icon class="profile" icon="fa-solid fa-circle-user" />
                    <h1 class="profile">{{ user.username }}</h1>
                    <p id="email">Email: {{ user.email }}</p>
                    <router-link class="buttons" to="/newrecipe">
                            Make new recipe
                    </router-link>
                    <button id="btnlogout" class="buttons" @click="logout">Logout</button>
                </Form>
            </div>
            <div class="col-md-8 col-sm-12">
                <h2 class="my-3">Your recipes</h2>
                <recipe-container :recipes="recipes.sort(sortByName)" :can-be-edited="true" />
            </div>
        </div>
    </div>
</template>

<script setup>
import {onMounted, reactive, ref} from 'vue';
import {useRouter} from 'vue-router';
import {Form} from 'vee-validate';
import {http} from "../utils/http";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import axios from "axios";
import RecipeContainer from "../components/RecipeContainer.vue";
import ClipLoader from 'vue-spinner/src/ClipLoader.vue';
import {useLoggedInStore} from "../stores/isLoggedIn.js";

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
    border: 2px solid #18afa5;
    background-color: #18afa5;
    padding: 14px 28px;
    font-size: 150%;
    text-align: center;
    color: black;
    text-decoration: none;
}
#btnlogout{
    width: 70%;
    margin-left: auto;
    margin-right: auto;
    margin-top: 20px;
    padding-top: 5px;
    padding-bottom: 5px;
}
#email{
    width: 100%;
    text-align: center;
    font-size: 150%;
    background-color: white;
    border: 2px solid #18afa5;
    margin-bottom: 20px;

}
.profile{
    width: 100%;
    text-align: center;
    font-size: 150%;
    margin-top: 10px;
}
#profdiv{
    background-color: gainsboro;
    border: 2px solid lightgray;
    margin-top: 20px;
    margin-bottom: 30px;
    box-shadow:10px 10px 10px darkgrey;
    left: 15%;
}
</style>
