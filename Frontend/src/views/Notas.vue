<script setup>
import { RouterLink } from 'vue-router';
import { ref } from "vue";

const notas = ref([]);
const mostrarModal = ref(false);

const nuevaNota = ref({
  titulo: "",
  cuerpo: "",
  fecha: "",
  color: "#000000",
});

function guardarNota() {
  const ahora = new Date();
  const horaFormateada = ahora.toLocaleTimeString([], {
    hour: "2-digit",
    minute: "2-digit",
  });

  notas.value.push({
    ...nuevaNota.value,
    hora: horaFormateada,
  });

  cerrarModal();
}

function cerrarModal() {
  mostrarModal.value = false;
  nuevaNota.value = { titulo: "", cuerpo: "", fecha: "", color: "#000000" };
}
</script>

<template>
    <div>

      <div v-if="notas.length === 0" class="text-gray-600 italic text-center text-2xl mt-6">
        No hay notas.
      </div>

    <button
      @click="mostrarModal = true"
      class=" bg-blue-800
        text-white
        fixed
        bottom-6
        right-6
        w-14
        h-14
        flex
        items-center
        justify-center
        rounded-full 
        shadow-lg
        text-2xl"
    >
      +
    </button>

    <div
      v-if="mostrarModal"
      class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    >
      <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-xl font-bold mb-4">Nueva Nota</h2>

        <form @submit.prevent="guardarNota">
          <div class="mb-3">
            <label class="block text-sm font-medium">Título</label>
            <input
              v-model="nuevaNota.titulo"
              type="text"
              class="border w-full p-2 rounded"
              placeholder="Escribe un título..."
              required
            />
          </div>

          <div class="mb-3">
            <label class="block text-sm font-medium">Cuerpo</label>
            <textarea
              v-model="nuevaNota.cuerpo"
              rows="3"
              class="border w-full p-2 rounded"
              placeholder="Escribe el contenido de la nota"
              required
            ></textarea>
          </div>

          <div class="mb-3">
            <label class="block text-sm font-medium">Fecha</label>
            <input
              v-model="nuevaNota.fecha"
              type="date"
              class="border w-full p-2 rounded"
              required
            />
          </div>

          <div class="mb-3">
            <label class="block text-sm font-medium">Color</label>
            <input
              v-model="nuevaNota.color"
              type="color"
              class="w-16 h-10 p-1 border rounded cursor-pointer"
            />
          </div>

          <div class="flex justify-end space-x-2">
            <button
              type="button"
              @click="cerrarModal"
              class="px-4 py-2 bg-gray-300 rounded"
            >
              Cancelar
            </button>
            <button
              type="submit"
              class="px-4 py-2 bg-blue-800 text-white rounded"
            >
              Guardar
            </button>
          </div>
        </form>
      </div>
    </div>

    <div class="mt-6 space-y-2">
      <div
        v-for="(nota, i) in notas"
        :key="i"
        class="border p-3 rounded shadow-sm"
        :style="{ borderLeft: '6px solid ' + nota.color }"
      >
        <h3 class="font-bold">{{ nota.titulo }}</h3>
        <p>{{ nota.cuerpo }}</p>
        <small class="block text-gray-500">
          {{ nota.fecha }} - {{ nota.hora }}
        </small>
      </div>
    </div>
  </div>
</template>