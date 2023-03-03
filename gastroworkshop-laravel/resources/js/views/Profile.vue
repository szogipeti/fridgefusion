<template>
    <div>
       <Form>
        <h1>Profile</h1>
        <p>Username: {{ user.username }}</p>
        <p>Email: {{ user.email }}</p>
        <p>Password: {{user.password}}</p>
        <label for="new_recipe">Make new Recipe</label>
        <Field type="recipe" name="email" class="form-control"/>
       </Form>
    </div>
</template>

<script>
import { reactive, ref } from 'vue';
import { useRouter } from 'vue-router';
import { Form, Field, ErrorMessage } from 'vee-validate';
import * as yup from 'yup';
import axios from 'axios';

function User()
{
    return Auth::user();
}
</script>
