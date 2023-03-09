<template>
    <div id="regdiv" class="bg-opacity-50 mx-auto p-3">
        <h3>Create your Fridge Fusion account</h3>
        <Form @submit="register" :validation-schema="Schema">
            <div class="form-group">
                <Field type="string" placeholder=" Username" name="username"/>
                <div id="error-username" class="errdiv"><error-message name="username"></error-message></div>
            </div>
            <div class="form-group mt-3">
                <Field type="email" placeholder=" E-mail" name="email"/>
                <div id="error-email" class="errdiv"><error-message name="email"></error-message></div>
            </div>
            <div class="form-group mt-3">
                <Field type="password" placeholder=" Password" name="password"/>
                <div id="error-password" class="errdiv"><error-message name="password"></error-message></div>
            </div>
            <div class="form-group mt-3">
                <Field type="password" placeholder=" Confirm Password" name="password_confirmation"/>
                <div class="errdiv"><error-message name="password"></error-message></div>
            </div>
            <input v-if="!isloading" type="submit" value="Register" class="mt-3">
            <font-awesome-icon v-else class="fa-spin fa-2xl" icon="fa-solid fa-burger" />
        </Form>
        <h5>Already have an account? <router-link to="/login"><label id="labellog">Login here!</label></router-link></h5>
    </div>
</template>
<script setup>
import {reactive,ref} from 'vue';
import {http} from '../utils/http'
import {useRouter} from "vue-router";
import {Form,Field,ErrorMessage} from 'vee-validate';
import * as yup from "yup";

const router = useRouter();

const Schema = yup.object({
    username: yup.string().min(6).max(100).required(),
    email : yup.string().email().min(6).max(100).required(),
    password : yup.string().min(6).max(100).required(),
    password_confirmation : yup.string().min(6).max(100).required()
});

const error = ref(null);

async function register(userData){
    isloading.value = true;
    const response = await http.post('register', userData);
    if(response.status !== 201){
        error.value = response.statusText
    }else{
        router.push({name: 'login'});
    }
    isloading.value = false;
}
const isloading = ref(false);

</script>

<style scoped>
@media screen and (max-width: 719px){
#regdiv{
    width: 280px;
}
input{
    width: 90%;
    margin-left: 5%;
}
}
@media screen and (min-width: 720px){
#regdiv{
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
#regdiv{
    margin-top: 30px;
    margin-bottom: 40px;
    background-color: white;
    border: 2px solid lightgray;
    box-shadow:10px 10px 10px darkgrey;
}
h3{
    text-align: center;
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
input[type=submit]{
    width: 70%;
    margin-left: 15%;
    border: 3px solid #18afa5;
    background-color: #18afa5;
}
input[type=submit]:hover{
    background-color: white;
}
.errdiv {
    margin-left: auto;
    margin-right: auto;
    text-align: center;

}
h5{
    margin-top: 10px
}
#labellog{
    cursor: pointer;
}
.fa-spin{
    margin-left: 50%;
    margin-top: 10px;
}
</style>
