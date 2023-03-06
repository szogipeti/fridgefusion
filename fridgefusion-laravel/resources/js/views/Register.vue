<template>
    <div class="bg-info bg-opacity-50 m-auto mt-5 w-50 p-3 rounded">
        <Form @submit="register" :validation-schema="Schema">
            <div class="form-group">
                <label for="username">username</label>
                <Field type="string" name="username" class="form-control"/>
                <error-message name="username"></error-message>
            </div>
            <div class="form-group">
                <label for="email">e-mail:</label>
                <Field type="email" name="email" class="form-control"/>
                <error-message name="email"></error-message>
            </div>
            <div class="form-group mt-2">
                <label for="password">Password:</label>
                <Field type="password" name="password" class="form-control"/>
                <error-message name="password"></error-message>
            </div>
            <div class="form-group mt-2">
                <label for="password_confirmation">Password Confirmation</label>
                <Field type="password" name="password_confirmation" class="form-control"/>
                <error-message name="password"></error-message>
            </div>
            <input type="submit" value="Regist" class="btn btn-primary mt-3">
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
