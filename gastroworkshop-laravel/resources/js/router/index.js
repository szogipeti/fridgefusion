import {createRouter, createWebHistory} from 'vue-router'
import HomeView from "../views/HomeView.vue";
const routes = [
    {
        path: '/',
        name: 'home',
        component: HomeView
    },
    {
        name: 'register',
        path: '/register',
        component: () => import("@/views/Register.vue"),
        meta: {
            requiresAuth: false,
        }
    },
    {
        name: 'Login',
        path: '/login',
        component: () => import("@/views/Login.vue"),
        meta: {
            requiresAuth: false,
        }
    }
]

const router = createRouter({
    history: createWebHasHistory(import.meta.env.BASE_URL),
    routes
});

export default router;
