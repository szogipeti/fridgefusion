<template>
    <div>
       <Form>
        <h1>Profile</h1>
        <p>Username: {{ userData.username }}</p>
        <p>Email: {{ userData.email }}</p>
        <p>Password: {{ userData.password}}</p>
        <label for="new_recipe">Make new Recipe</label>
        <Field type="recipe" name="email" class="form-control"/>
       </Form>
    </div>
</template>

<script setup>
import { reactive, ref } from 'vue';
import { useRouter } from 'vue-router';
import { Form, Field, ErrorMessage } from 'vee-validate';
import * as yup from 'yup';
import axios, {Axios} from 'axios';

const router = useRouter();
    async function getUserData(){
    const  response = await http.get("users");
    userData.username = response.data.username;
    userData.email = response.data.email;
    userData.password = response.data.password;
}

getUserData();
</script>
