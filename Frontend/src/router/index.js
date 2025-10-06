import { createRouter, createWebHistory } from "vue-router";
import NuevoBicho from "../views/NuevoBicho.vue";
import VerBichos from "../views/VerBichos.vue";
import NuevaCasa from "../views/NuevaCasa.vue";
import VerCasas from "../views/VerCasas.vue";

const router = createRouter(
    {
        history: createWebHistory(import.meta.env.BASE_URL),
        routes: [
            {
                path: '/bicho/nuevo',
                component: NuevoBicho,
                name: 'nuevoBicho'
            },
            {
                path: '/bicho/:id'
            },
            {
                path: '/bichos',
                component: VerBichos,
                name: 'VerBichos'
            },
            {
                path: '/casas',
                component: VerCasas,
                name: 'VerCasas'
            },
            {
                path: '/casa/nueva',
                component: NuevaCasa,
                name: 'NuevaCasa'
            },
            {
                path: '/casa/:id'
            }
        ]
    }
)


export default router