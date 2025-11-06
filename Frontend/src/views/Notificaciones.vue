<template>
  <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Notificaciones</h1>

    <div v-if="notificaciones.length === 0" class="text-gray-500">
      No tienes notificaciones.
    </div>

    <div v-else class="space-y-3">
      <div
        v-for="noti in notificaciones"
        :key="noti.id"
        class="p-4 border rounded-lg shadow-sm bg-white flex justify-between items-center"
        :class="{ 'bg-gray-100': noti.leido }"
      >
        <div>
          <h2 class="font-semibold">{{ noti.titulo }}</h2>
          <p class="text-sm text-gray-600">{{ noti.mensaje }}</p>
          <p class="text-xs text-gray-400 mt-1">{{ new Date(noti.created_at).toLocaleString() }}</p>
        </div>
        <div class="space-x-2">
          <button
            v-if="!noti.leido"
            @click="marcarComoLeido(noti.id)"
            class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600"
          >
            Marcar leído
          </button>
          <button
            @click="eliminarNotificacion(noti.id)"
            class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600"
          >
            Eliminar
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import instanciaAxios from "../api/api";

const notificaciones = ref([]);

const cargarNotificaciones = async () => {
  const res = await instanciaAxios.get("/notificaciones");
  notificaciones.value = res.data;
};

const marcarComoLeido = async (id) => {
  await instanciaAxios.put(`/notificaciones/${id}/leer`);
  await cargarNotificaciones();
};

const eliminarNotificacion = async (id) => {
  await instanciaAxios.delete(`/notificaciones/${id}`);
  notificaciones.value = notificaciones.value.filter(n => n.id !== id);
};

onMounted(cargarNotificaciones);
</script>
