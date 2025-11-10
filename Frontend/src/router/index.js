import { createRouter, createWebHistory } from "vue-router";
import RegistroUsuario from "../views/RegistroUsuario.vue";
import Usuario from "../views/Usuario.vue";
import Notificaciones from "../views/Notificaciones.vue";
import CrearNotificacion from "../views/CrearNotificacion.vue";
import InicioS from "../views/InicioS.vue";
import Stock from "../views/Stock.vue";
import Ventas from "../views/Ventas.vue";
import Ganancias from "../views/Ganancias.vue";
import Notas from "../views/Notas.vue";

const router = createRouter(
    {
        history: createWebHistory(import.meta.env.BASE_URL),
        routes: [

            {
                path: '/stock',
                component: Stock,
                name: 'Stock'
            },

            {
                path: '/ventas',
                component: Ventas,
                name: 'Ventas'
            },

            {
                path: '/ganancias',
                component: Ganancias,
                name: 'Ganancias'
            },

            {
                path: '/notas',
                component: Notas,
                name: 'Notas'
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