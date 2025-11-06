import { createRouter, createWebHistory } from "vue-router";
import NuevoBicho from "../views/NuevoBicho.vue";
import VerBichos from "../views/VerBichos.vue";
import NuevaCasa from "../views/NuevaCasa.vue";
import VerCasas from "../views/VerCasas.vue";
import RegistroUsuario from "../views/RegistroUsuario.vue";
import Usuario from "../views/Usuario.vue";
import Notificaciones from "../views/Notificaciones.vue";
import CrearNotificacion from "../views/CrearNotificacion.vue";
import InicioS from "../views/InicioS.vue";

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
            },
            {
                path: '/registro',
                component: RegistroUsuario,
                name: 'Registro'
            },
            {
                path: '/usuario',
                component: Usuario,
                name: 'Usuario'
            },
            {
                path: '/notificaciones',
                component: Notificaciones,
                name: 'Notifiaciones'
            },
            {
                path: '/notificaciones/crear',
                component: CrearNotificacion,
                name: 'crearNotificacion'
            },
            {
                path: '/login',
                component: InicioS,
                name: 'InicioS'
            }
        ]
    }
)


export default router