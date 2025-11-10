<script setup>
import { ref } from 'vue'
import { RouterLink } from 'vue-router'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faBell, faNoteSticky, faUser } from '@fortawesome/free-regular-svg-icons'
import { faBoxOpen, faChartBar, faChartLine, faNotesMedical, faShoppingCart } from '@fortawesome/free-solid-svg-icons'

const mostrarMenu = ref(false)

async function cerrarSesion() {
  await cerrarSesion()
}
</script>

<template>
  <nav class="navegacion w-screen h-[10vh] bg-blue-500 flex flex-row items-center">
    <!-- Notificaciones -->
    <router-link to="notificaciones" class="flex justify-center items-center text-2xl hover:bg-blue-800 px-2 h-[90%] w-[5%] bg-blue-700 rounded m-0.5 text-white border-2 border-gray-300">
      <FontAwesomeIcon :icon="faBell" />
    </router-link>

    <div class="flex-1"></div> <!-- espacio flexible -->

    <!-- Notas -->
    <router-link to="notas" class="flex justify-center items-center text-2xl hover:bg-blue-800 px-2 h-[90%] w-[5%] bg-blue-700 m-0.5 text-white border-2 border-gray-300">
      <FontAwesomeIcon :icon="faNotesMedical" />
    </router-link>

    <!-- Productos -->
    <router-link to="stock" class="flex justify-center items-center text-2xl hover:bg-blue-800 px-2 h-[90%] w-[5%] bg-blue-700 m-0.5 text-white border-2 border-gray-300">
      <FontAwesomeIcon :icon="faBoxOpen" />
    </router-link>

    <!-- Ventas -->
    <router-link to="ventas" class="flex justify-center items-center text-2xl hover:bg-blue-800 px-2 h-[90%] w-[5%] bg-blue-700 m-0.5 text-white border-2 border-gray-300">
      <FontAwesomeIcon :icon="faShoppingCart" />
    </router-link>

    <!-- Ganancias -->
    <router-link to="ganancias" class="flex justify-center items-center text-2xl hover:bg-blue-800 px-2 h-[90%] w-[5%] bg-blue-700 m-0.5 text-white border-2 border-gray-300">
      <FontAwesomeIcon :icon="faChartLine" />
    </router-link>

    <!-- Usuario con menú desplegable -->
    <div 
      class="relative flex justify-center items-center text-2xl hover:bg-blue-800 px-2 h-[90%] w-[5%] bg-blue-700 m-0.5 text-white border-2 border-gray-300 cursor-pointer rounded"
      @mouseenter="mostrarMenu = true"
      @mouseleave="mostrarMenu = false"
    >
      <FontAwesomeIcon :icon="faUser" />

      <!-- Menú -->
      <div 
        v-if="mostrarMenu" 
        class="absolute right-0 top-full mt-1 w-60 bg-white text-gray-700 rounded-lg shadow-lg border border-gray-200 "
      >
        <RouterLink to="/usuario" class="block px-4 py-2 hover:bg-gray-100">Perfil</RouterLink>
        <RouterLink to="/configuraciones" class="block px-4 py-2 hover:bg-gray-100">Configuraciones</RouterLink>
        <button @click="cerrarSesion" class="block w-full text-left px-4 py-2 hover:bg-red-100 text-red-600">
          Cerrar sesión
        </button>
      </div>
    </div>
  </nav>
</template>
