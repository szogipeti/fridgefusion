<template>
    <div class="bg-info bg-opacity-50 m-auto mt-5 w-50 p-3 rounded">
        <Form @submit.prevent="login" :validation-schema="Schema">
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
            <input type="submit" value="Login" class="btn btn-primary mt-3">
        </Form>
    </div>
</template>
<script setup>
import {reactive,ref} from 'vue';
import {http} from '@/utils/http'
import {useRouter} from "vue-router";
import {Form,Field,ErrorMessage} from 'vee-validate';
import yup from "yup"

const router = useRouter();

const Schema = yup.object({
    email : yup.required().string().email().min(6).max(100),
    password : yup.required().min(6).max(100),
});

const error = ref(null);

async function login(values){
    console.log(values)
    const response = await http.post('login', userData);
    if(response.status !== 200){
        error.value = response.statusText
    }else{
        localStorage.setItem('token',response.data.data.token);
        router.push({name: 'index'});
    }
}
</script>
