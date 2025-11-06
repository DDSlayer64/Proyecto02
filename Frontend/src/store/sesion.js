import { defineStore } from "pinia";
import instanciaAxios from "../api/api";
import router from "../router";

export const useAlmacenSesion = defineStore("sesion", {
  state: () => ({
    usuario: null,
    loading: false,
    error: null,
  }),

  getters: {
    sesionIniciada: (state) => !!state.usuario,
    sesionActiva: (state) => state.usuario,
  },

  actions: {
    agregarSesion(usuarioN) {
      this.usuario = usuarioN;
    },

    // 🔐 Iniciar sesión
    async iniciarSesion(datosUsuario) {
      this.usuario = null;
      this.loading = true;
      this.error = null;

      try {
        // 1️⃣ Pedir cookie CSRF a Laravel Sanctum
        await instanciaAxios.csrf.get("");

        // 2️⃣ Enviar datos de login
        const respuesta = await instanciaAxios.normal.post("login", datosUsuario);

        console.log("RESPUESTA -->", respuesta.data.usuario);

        alert("El servidor dice: " + respuesta.data.mensaje);

        this.agregarSesion(respuesta.data.usuario);
        router.push({ name: respuesta.data.destino });
      } catch (error) {
        this.error = error;
        console.error("ERROR --> ", error);

        if (error.response?.data?.mensaje) {
          alert(error.response.data.mensaje);
        } else {
          alert("Error inesperado al iniciar sesión.");
        }
      }

      this.loading = false;
    },

    // 👁️‍🗨️ Chequear si la sesión sigue activa
    async chequearSesion() {
      this.loading = true;
      this.error = null;

      try {
        await instanciaAxios.csrf.get("");
        const respuesta = await instanciaAxios.normal.get("user");
        console.log("Sesión activa:", respuesta.data);

      } catch (error) {
        this.error = error;
        console.error("ERROR --> ", error);

        if (error.response?.status === 401) {
          alert("Debe iniciar sesión nuevamente.");
          // this.cerrarSesion();
        }
      }

      this.loading = false;
    },

    // 🚪 Cerrar sesión
    async cerrarSesion() {
      this.usuario = null;
      this.loading = true;
      this.error = null;

      try {
        await instanciaAxios.csrf.get("");
        const respuesta = await instanciaAxios.normal.post("usuarios/cerrarSesion");
        console.log("Sesión cerrada:", respuesta.data);

        router.push({ name: "inicioSesion" });
      } catch (error) {
        this.error = error;
        console.error("ERROR --> ", error);
      }

      this.loading = false;
    },
  },

  // 💾 Mantiene la sesión al recargar la página
  persist: true,
});
