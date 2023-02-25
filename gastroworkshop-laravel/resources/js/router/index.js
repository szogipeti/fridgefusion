import {createRouter, createWebHashHistory} from 'vue-router'
import HomeView from "../views/HomeView.vue";
const routes = [
    {
        path: '/',
        name: 'home',
        component: HomeView,
        meta: {
            requiresAuth: false
        }
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

export const router = createRouter({
    history: createWebHashHistory(import.meta.env.BASE_URL),
    routes
});
