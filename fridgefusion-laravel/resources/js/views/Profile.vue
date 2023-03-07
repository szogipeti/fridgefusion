<template>
    <div>
        <Form>
            <font-awesome-icon icon="fa-solid fa-circle-user" />
            <h1>Profile</h1>
            <p>Username: {{ response.username }}</p>
            <p>Email: {{ response.email }}</p>
            <router-link to="/newrecipe">
                <button>Make new recipe</button>
            </router-link>
            <button @click="logout">Logout</button>
        </Form>
        <table>
            <th>My recipes</th>
            <tr>
                <td>
                    <!--meg kéne jeleníteni az összes recept nevét amit ez a felhasználó csinált.-->
                </td>
                <td><button></button></td> <!--Törlés és egy módosítás button kéne-->
            </tr>
        </table>
    </div>
</template>

<script setup>
import {onMounted, reactive,} from 'vue';
import {useRouter} from 'vue-router';
import {Form, Field} from 'vee-validate';
import {http} from "../utils/http";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";

const router = useRouter();
const response = reactive({});

const logout = () => {
    localStorage.removeItem('token');
    router.push('/login').then(() => router.go());
}
defineExpose({logout});

async function getUserData() {
    const userdata = await http.get("profile",{headers: {Authorization: `Bearer ${localStorage.getItem('token')}`}})
    for (const key in userdata.data) {
        response[key] = userdata.data[key]
    }
    console.log(userdata.data)
}




onMounted(()=>getUserData())
</script>

<style scoped>
.fa-circle-user{
    width: 100px;
    height: 100px;
}
</style>
