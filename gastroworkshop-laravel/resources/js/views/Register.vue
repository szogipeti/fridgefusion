<template>
    <div class="bg-info bg-opacity-50 m-auto mt-5 w-50 p-3 rounded">
        <form @submit.prevent="login">
            <div class="form-group">
                <label for="email">e-mail:</label>
                <input type="email" id="email" class="form-control" v-model="userData.email">
            </div>
            <div class="form-group mt-2">
                <label for="password">Password:</label>
                <input type="password" class="form-control" v-model="userData.password">
            </div>
            <input type="submit" value="Login" class="btn btn-primary mt-3">
        </form>
    </div>
</template>
<script setup>
import {reactive,ref} from 'vue';
import {http} from '../../utils/http'
import {useRouter} from "vue-router";

const router = useRouter();

const userData = reactive({
    email: '',
    password: ''
});

const error = ref(null);

async function register(){
    const response = await http.post('regist', userData);
    if(response.status !== 200){
        error.value = response.statusText
    }else{
        localStorage.setItem('token',response.data.data.token);
        router.push({name: 'index'});
    }
}
</script>
