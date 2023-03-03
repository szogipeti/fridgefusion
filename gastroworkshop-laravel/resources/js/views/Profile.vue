<template>
    <div>
        <h1>Profile</h1>
        <p>Username: {{ user.username }}</p>
        <p>Email: {{ user.email }}</p>
        <Form @submit.prevent="updatePassword">
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

export default {
    components: {
        Form,
        Field,
        ErrorMessage,
    },
    setup() {
        const user = reactive({
            username: '',
            email: '',
        });
        const router = useRouter();
        const password = ref('');
        const passwordRules = yup.string().required('Please enter a new password.').min(6, 'Password must be at least 6 characters long.').max(20, 'Password must be at most 20 characters long.');

        const fetchUser = async () => {
            try {
                const response = await axios.get('/api/user');
                user.username = response.data.username;
                user.email = response.data.email;
            } catch (error) {
                console.error(error);
            }
        };

        const updatePassword = async () => {
            try {
                await axios.put('/api/user', { password: password.value });
                router.push('/profile');
            } catch (error) {
                console.error(error);
            }
        };

        return {
            user,
            password,
            passwordRules,
            fetchUser,
            updatePassword,
        };
    },
    created() {
        this.fetchUser();
    },
};
</script>
