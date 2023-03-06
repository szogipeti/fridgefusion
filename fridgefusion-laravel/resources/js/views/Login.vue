<template>
    <div id="login" class=" m-auto mt-5 w-50 p-3 rounded">
        <Form @submit="login" :validation-schema="Schema">
            <div class="form-group">
                <label for="email">E-mail:</label>
                <Field type="email" name="email" class="form-control"/>
                <error-message name="email"></error-message>
            </div>
            <div class="form-group mt-2">
                <label for="password">Password:</label>
                <Field type="password" name="password" class="form-control"/>
                <error-message name="password"></error-message>
            </div>
            <input type="submit" value="Login" class="btn btn-primary mt-3">
            <label id="label-text">Don't have an account yet?</label>
            <router-link to="/register"> <label id="label-reg">Register here</label></router-link>

        </Form>
    </div>
</template>
<script setup>
import {reactive,ref} from 'vue';
import {http} from '@/utils/http'
import {useRouter} from "vue-router";
import {Form,Field,ErrorMessage} from 'vee-validate';
import * as yup from "yup"

const router = useRouter();

const Schema = yup.object({
    email : yup.string().email().min(6).max(100).required(),
    password : yup.string().min(6).max(100).required(),
});

const error = ref(null);
async function login(userData){
    const response = await http.post('login', userData);
    if(response.status !== 200){
        error.value = response.statusText
    }else{
        localStorage.setItem('token',response.data.token);
        router.push({name: 'home'});
    }
}
</script>
