import { createRouter, createWebHistory } from 'vue-router';
import Welcome from './Pages/Welcome.vue';  // Composant pour la page d'accueil
import Login from './Pages/Auth/Register.vue';     // Composant pour la page de connexion
import Register from './Pages/Auth/Register.vue';  // Composant pour la page d'inscription

const routes = [
    {
        path: '/',
        name: 'welcome',
        component: Welcome,
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
    },
    {
        path: '/register',
        name: 'register',
        component: Register,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;