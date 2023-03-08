<template>
    <div id="regdiv" class="bg-opacity-50 mx-auto p-3 rounded">
        <h3>Create your Fridge Fusion account</h3>
        <Form @submit="register" :validation-schema="Schema">
            <div class="form-group">
                <Field type="string" placeholder="Username" name="username" class="form-control error-message-email"/>
                <error-message class="error-message mt-3" name="username"></error-message>
            </div>
            <div class="form-group mt-3">
                <Field type="email" placeholder="E-mail" name="email" class="form-control error-message-email"/>
                <error-message class="error-message mt-3" name="email"></error-message>
            </div>
            <div class="form-group mt-3">
                <Field type="password" placeholder="Password" name="password" class="form-control"/>
                <error-message class="error-message mt-3" name="password"></error-message>
            </div>
            <div class="form-group mt-3">
                <Field type="password" placeholder="Confirm Password" name="password_confirmation" class="form-control"/>
                <error-message class="error-message mt-3" name="password"></error-message>
            </div>
            <input type="submit" value="Register" class="btn btn-primary mt-3">
        </Form>
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
    const response = await http.post('register', userData);
    if(response.status !== 201){
        error.value = response.statusText
    }else{
        router.push({name: 'login'});
    }
}
</script>

<style scoped>
@media screen and (max-width: 719px){
#regdiv{
    width: 280px;
}
}
@media screen and (min-width: 720px){
#regdiv{
    width: 700px;
}
}
#regdiv{
    margin-top: 30px;
    margin-bottom: 40px;
    background-color: #18afa5;
    border: 2px solid black;
}
h3{
    text-align: center;
}
.error-message{
    position: absolute;
    top: calc(100% + 5px);
    left: 0;
    width: 100%;
    text-align: center;
    margin-top: 5px;
}
.form-group {
    position: relative;
    margin-bottom: 1.5rem;
}
.error-message-email{
    margin-top: 10px;
}
</style>
