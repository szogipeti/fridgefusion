<template>
    <div>
        <Form>
        <h1>Profile</h1>
        <p>Username: {{ user.username }}</p>
        <p>Email: {{ user.email }}</p>
        <p>Password: {{user.password}}</p>
        <label for=""></label>
        </Form>
        <Form @submit="updatePassword">
            <Field type="password" name="password" v-model="password" :rules="passwordRules">
                <span slot="label">New Password</span>
                <ErrorMessage name="password" />
            </Field>
            <button type="submit">Update Password</button>
        </Form>
    </div>
</template>

<script>
import { reactive, ref } from 'vue';
import { useRouter } from 'vue-router';
import { Form, Field, ErrorMessage } from 'vee-validate';
import * as yup from 'yup';
import axios from 'axios';


</script>
