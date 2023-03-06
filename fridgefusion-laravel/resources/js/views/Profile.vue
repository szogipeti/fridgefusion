<template>
    <div>
        <Form>
            <h1>Profile</h1>
            <p>Username: {{ response.username }}</p>
            <p>Email: {{ response.email }}</p>
            <label for="new_recipe">Make new Recipe</label>
            <Field type="recipe" name="email" class="form-control"/>
        </Form>
    </div>
</template>

<script setup>
import {onMounted, reactive,} from 'vue';
import {useRouter} from 'vue-router';
import {Form, Field} from 'vee-validate';
import {http} from "../utils/http";

const router = useRouter();
const response = reactive({});

async function getUserData() {
    const userdata = await http.get("profile",{headers: {Authorization: `Bearer ${localStorage.getItem('token')}`}})
    for (const key in userdata.data) {
        response[key] = userdata.data[key]
    }
    console.log(userdata.data)
}

onMounted(()=>getUserData())

</script>
