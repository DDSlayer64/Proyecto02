<template>
  <div class="h-[80vh] w-[95vw] flex flex-col items-end justify-start p-4">

    <!-- Cartel si no hay productos -->
    <div
      v-if="productos.length === 0"
      class="text-center mt-8 bg-yellow-200 border border-yellow-400 text-yellow-800 p-4 rounded-lg w-full"
    >
      Todavía no tienes productos añadidos...
    </div>

    <!-- Lista de productos -->
    <ul v-else class="w-full grid grid-cols-3 gap-4 mt-4">
      <li
        v-for="(producto, index) in productos"
        :key="index"
        class="border rounded-lg p-4 bg-white shadow flex flex-col justify-between"
      >
        <div>
          <p><strong>Nombre:</strong> {{ producto.nombre }}</p>
          <p><strong>Tipo:</strong> {{ producto.tipo }}</p>
          <p><strong>Talle:</strong> {{ producto.talle }}</p>
          <p><strong>Precio inicial:</strong> ${{ producto.precio_inicial }}</p>
          <p><strong>Precio final:</strong> ${{ producto.precio_final }}</p>
          <p v-if="producto.descripcion"><strong>Descripción:</strong> {{ producto.descripcion }}</p>
        </div>

        <button
          @click="registrarVenta(producto)"
          class="bg-blue-600 text-white mt-4 py-2 rounded hover:bg-blue-700 transition"
        >
          Registrar venta
        </button>
      </li>
    </ul>

    <!-- ➕ Botón flotante -->
    <button
      class="bg-blue-800 text-white fixed bottom-6 right-6 w-14 h-14 flex items-center justify-center rounded-full shadow-lg text-2xl hover:bg-blue-900 transition"
      @click="mostrarModal = true"
    >
      +
    </button>

    <!-- 🪟 Modal -->
    <div
      v-if="mostrarModal"
      class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
    >
      <div class="bg-white p-6 rounded-lg w-[400px] shadow-lg">
        <h2 class="text-xl font-bold mb-4">Agregar nuevo producto</h2>

        <input
          v-model="nuevoProducto.nombre"
          placeholder="Nombre del producto"
          class="border p-2 rounded mb-2 w-full"
        />

        <input
          v-model="nuevoProducto.tipo"
          placeholder="Tipo (Ej: Remera, Pantalón)"
          class="border p-2 rounded mb-2 w-full"
        />

        <input
          v-model="nuevoProducto.talle"
          placeholder="Talle (Ej: S, M, L, XL)"
          class="border p-2 rounded mb-2 w-full"
        />
        
        <label class="block text-sm font-medium mb-1">Precio Inicial</label>
        <input
          v-model.number="nuevoProducto.precio_inicial"
          placeholder="Precio inicial"
          type="number"
          class="border p-2 rounded mb-2 w-full"
        />
        
        <label class="block text-sm font-medium mb-1">Precio Final</label>
        <input
          v-model.number="nuevoProducto.precio_final"
          placeholder="Precio final"
          type="number"
          class="border p-2 rounded mb-2 w-full"
        />

        <textarea
          v-model="nuevoProducto.descripcion"
          placeholder="Descripción (opcional)"
          class="border p-2 rounded mb-4 w-full"
          rows="3"
        ></textarea>

        <div class="flex justify-between">
          <button
            @click="registrarProducto"
            class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition"
          >
            Registrar producto
          </button>
          <button
            @click="cerrarModal"
            class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500 transition"
          >
            Cancelar
          </button>
        </div>
      </div>
    </div>

  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import instanciaAxios from '../api/api'

// Estado
const productos = ref([])
const mostrarModal = ref(false)
const nuevoProducto = ref({
  nombre: '',
  tipo: '',
  talle: '',
  precio_inicial: 0,
  precio_final: 0,
  descripcion: ''
})

// Cargar productos
const cargarProductos = async () => {
  try {
    const respuesta = await instanciaAxios.get('/productos')
    productos.value = respuesta.data
  } catch (error) {
    console.error('Error al cargar productos:', error)
  }
}

// Registrar producto
const registrarProducto = async () => {
  if (!nuevoProducto.value.nombre || !nuevoProducto.value.tipo || !nuevoProducto.value.talle ||
      nuevoProducto.value.precio_inicial <= 0 || nuevoProducto.value.precio_final <= 0) {
    alert('Completa todos los campos obligatorios correctamente.')
    return
  }

  try {
    await instanciaAxios.post('/productos', nuevoProducto.value)
    await cargarProductos()
    cerrarModal()
    nuevoProducto.value = {
      nombre: '',
      tipo: '',
      talle: '',
      precio_inicial: 0,
      precio_final: 0,
      descripcion: ''
    }
  } catch (error) {
    console.error('Error al registrar producto:', error)
    alert('Error al registrar producto ❌')
  }
}

// Registrar venta
const registrarVenta = async (producto) => {
  const cantidad = prompt(`¿Cuántas unidades de "${producto.nombre}" vendiste?`)
  const fecha = prompt('¿Fecha de la venta? (YYYY-MM-DD)')

  if (!cantidad || !fecha) return

  try {
    await instanciaAxios.post('/ventas', {
      producto_id: producto.id,
      cantidad: Number(cantidad),
      fecha,
    })
    alert('Venta registrada correctamente ✅')
    await cargarProductos()
  } catch (error) {
    alert('Error al registrar venta ❌')
    console.error(error)
  }
}

// Cerrar modal
const cerrarModal = () => {
  mostrarModal.value = false
}

onMounted(cargarProductos)
</script>
