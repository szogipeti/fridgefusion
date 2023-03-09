<template>
    <div id="login" class=" mx-auto p-3">
        <Form @submit="login" :validation-schema="Schema">
            <div class="form-group">
                <Field type="email" placeholder="E-mail" name="email"/>
                <div class="errdiv"><error-message name="email"></error-message></div>
            </div>
            <div class="form-group mt-2">
                <Field type="password" placeholder="Password" name="password"/>
                <div class="errdiv"><error-message name="password"></error-message></div>
            </div>
            <button v-if="!isloading" type="submit" class="mt-3">Login</button>
            <font-awesome-icon v-else class="fa-spin fa-2xl" icon="fa-solid fa-burger" />
            <div id="error" class="alrert alert-danger" v-if="error"> {{ error }}</div>
        </Form>
            <h5>Don't have an account yet? <router-link to="/register"><label id="label-reg">Register here!</label></router-link></h5>
    </div>
</template>

<script setup>
import {reactive, ref} from 'vue';
import {http} from '@/utils/http'
import {useRouter} from "vue-router";
import {Form, Field, ErrorMessage} from 'vee-validate';
import * as yup from "yup"
import {useLoggedInStore} from "../store/isLoggedIn.js";

const isLoggedInStore = useLoggedInStore();

const router = useRouter();

const Schema = yup.object({
    email: yup.string().email().min(6).max(100).required(),
    password: yup.string().min(6).max(100).required(),
});

const error = ref(null);
async function login(userData) {
    isloading.value = true;
    try {
        const response = await http.post('login', userData);
        if (response.status !== 200) {
            error.value = response.statusText
        } else {
            localStorage.setItem('token', response.data.token);
            router.push({name: 'home'});
        }
        isLoggedInStore.triggerLoggedIn();
    } catch (e) {
        error.value = e.response.data.data.message;
    }
    isloading.value = false;
}
    const isloading = ref(false);
</script>

<style scoped>

@media screen and (max-width: 719px){
#login{
    width: 280px;
}
input{
    width: 90%;
    margin-left: 5%;
}
}

@media screen and (min-width: 720px){
#login{
    width: 700px;
}
input{
    width: 70%;
    margin-top: 5px;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 5px;
    margin-left: 15%;
}
}

#login{
    margin-top: 30px;
    margin-bottom: 30px;
    background-color: white;
    border: 2px solid lightgray;
    box-shadow:10px 10px 10px darkgrey;
}

input{
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 5px;
    border: 2px solid #18afa5;
}
input:focus{
    background-color: #18afa5;
    border: 3px solid #18afa5;
}
.errdiv {
    margin-left: auto;
    margin-right: auto;
    text-align: center;
}
#error{
    margin-left: auto;
    margin-right: auto;
    width: 70%;
    margin-top: 10px;
    text-align: center;
    padding-top: 2px;
}
h5{
    margin-top: 10px;
}
#label-reg{
    cursor: pointer;
}
button{
    width: 70%;
    border: none;
    padding-top: 5px;
    padding-bottom: 5px;
    margin-left: 15%;
    background-color: #18afa5;
    color: black;
    border: 3px solid #18afa5;
}
button:hover{
    background-color: white;
}
.fa-spin{
    margin-left: 50%;
    margin-top: 10px;
}
</style>