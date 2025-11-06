<template>
  <div class="p-6 max-w-md mx-auto">
    <h1 class="text-2xl font-bold mb-4">Crear Notificación</h1>

    <form @submit.prevent="crearNotificacion" class="space-y-3">
      <div>
        <label class="block font-semibold mb-1">Título</label>
        <input
          v-model="titulo"
          type="text"
          class="w-full border rounded p-2"
          placeholder="Ejemplo: Aviso de mantenimiento"
        />
      </div>

      <div>
        <label class="block font-semibold mb-1">Mensaje</label>
        <textarea
          v-model="mensaje"
          class="w-full border rounded p-2"
          placeholder="Escribe el mensaje aquí..."
          rows="4"
        ></textarea>
      </div>

      <button
        type="submit"
        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded"
      >
        Enviar notificación
      </button>
    </form>

    <p v-if="mensajeExito" class="mt-4 text-green-600">{{ mensajeExito }}</p>
  </div>
</template>

<script setup>
import { ref } from "vue"
import instanciaAxios from "../api/api"

const titulo = ref("")
const mensaje = ref("")
const mensajeExito = ref("")

const crearNotificacion = async () => {
  if (!titulo.value || !mensaje.value) return alert("Completa todos los campos.")

  await instanciaAxios.normal.post("/notificaciones", {
    titulo: titulo.value,
    mensaje: mensaje.value,
  })

  mensajeExito.value = "Notificación creada con éxito ✅"
  titulo.value = ""
  mensaje.value = ""
}
</script>
