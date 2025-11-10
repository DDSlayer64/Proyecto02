<script setup>
import { ref, onMounted } from 'vue'
import instanciaAxios from '../api/api'

const ventas = ref([])
const cargando = ref(false)
const mensaje = ref('')

const obtenerVentas = async () => {
  cargando.value = true
  try {
    const res = await instanciaAxios.get('/ventas')
    ventas.value = res.data
  } catch (error) {
    console.error('Error al cargar ventas:', error)
    mensaje.value = 'Error al cargar las ventas.'
  } finally {
    cargando.value = false
  }
}

onMounted(() => {
  obtenerVentas()
})
</script>

<template>
  <div class="w-full min-h-[80vh] flex flex-col items-center justify-start bg-gray-100 p-6">
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Ventas</h1>
    <div v-if="cargando" class="text-gray-600 text-lg">Cargando ventas...</div>

    <div
      v-else-if="ventas.length === 0"
      class="bg-yellow-100 border border-yellow-400 text-yellow-800 px-6 py-4 rounded-lg shadow"
    >
      Todavía no hay productos vendidos...
    </div>

    <div v-else class="w-full max-w-[700px] bg-white shadow-md rounded-lg p-4">
      <h2 class="text-lg font-semibold mb-3 text-gray-700">Productos vendidos</h2>
      <table class="w-full text-left border-collapse">
        <thead>
          <tr class="bg-gray-200">
            <th class="p-2 border-b">Producto</th>
            <th class="p-2 border-b">Cantidad</th>
            <th class="p-2 border-b">Fecha</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="venta in ventas" :key="venta.id" class="hover:bg-gray-50">
            <td class="p-2 border-b">{{ venta.producto?.nombre || 'Desconocido' }}</td>
            <td class="p-2 border-b">{{ venta.cantidad }}</td>
            <td class="p-2 border-b">{{ venta.fecha }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
