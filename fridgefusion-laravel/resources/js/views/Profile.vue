<template>
    <div>
        <Form>
            <font-awesome-icon icon="fa-solid fa-circle-user" />
            <h1>Profile</h1>
            <p>Username: {{ user.username }}</p>
            <p>Email: {{ user.email }}</p>
            <router-link to="/newrecipe">
                <button>Make new recipe</button>
            </router-link>
            <button @click="logout">Logout</button>
        </Form>
        <recipe-container :recipes="recipes" />
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
    console.log(resp)
    for (const recipe of resp.data.data) {
        console.log(recipe.publisher)
        if(recipe.publisher === user["username"] ){
            recipes.push(recipe);
        }
    }
    recipesLoaded.value = true;
}

onMounted(() => {
    getUserData();
    getUserRecipes();
})
</script>

<style scoped>
.fa-circle-user{
    width: 100px;
    height: 100px;
}
</style>
