import {createRouter, createWebHashHistory} from 'vue-router'
import HomeView from "../views/HomeView.vue";
import Register from "../views/Register.vue";
import Login from "../views/Login.vue";
import Profile from "../views/Profile.vue";
import RecipeView from "../views/RecipeView.vue";
import NewRecipe from "../views/NewRecipe.vue";
import EditView from "../views/EditView.vue";

import {authGuard} from "./guards/AuthGuard.js";

const routes = [
    {
        path: '/:category?',
        name: 'home',
        component: HomeView,
        meta: {
            requiresAuth: false
        }
    },
    {
        name: 'register',
        path: '/register',
        component: Register,
        meta: {
            requiresAuth: false,
        }
    },
    {
        name: 'login',
        path: '/login',
        component: Login,
        meta: {
            requiresAuth: false,
        }
    },
    {
        name: 'profile',
        path: '/profile',
        component: Profile,
        meta: {
            requiresAuth: true,
        }
    },
    {
        name: 'recipe',
        path: '/recipes/:id',
        component: RecipeView,
        meta: {
            requiresAuth: false
        }
    },
    {
        path: '/newrecipe',
        name: 'newrecipe',
        component: NewRecipe,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/edit/:id',
        name: 'edit',
        component: EditView,
        meta: {
            requiresAuth: true
        }
    }
]

export const router = createRouter({
    history: createWebHashHistory(import.meta.env.BASE_URL),
    routes
});
router.beforeEach(authGuard);
