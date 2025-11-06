import { defineStore } from "pinia";
import instanciaAxios from "../api/api"; // import default

export const useStoreInfoU = defineStore('infoU', {
    state: () => ({
        usuario: null,
        loading: false,
        error: null
    }),
    actions: {
        async cargarInfo() {
            this.loading = true;
            this.error = null;
            try {
                instanciaAxios.csrf.get()
                const respuesta = await instanciaAxios.normal.get('usuario');
                this.usuario = respuesta.data.usuario;
            } catch (excepcion) {
                this.error = excepcion;
                console.error("Error al cargar perfil del usuario:", excepcion);
            } finally {
                this.loading = false;
            }
        },
        limpiarInfo() {
            this.usuario = null;
            this.error = null;
        }
    }
});
