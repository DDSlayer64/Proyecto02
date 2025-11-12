<script setup>
import { onMounted } from "vue";
import { useStoreInfoU } from "../store/InfoU";
import User from "../components/User.vue";

const storeInfoU = useStoreInfoU();

onMounted(() => {
    storeInfoU.cargarInfo();
});
</script>

<template>

  <div class="todo w-full h-[90vh] flex items-center justify-center">

    <div class="caja w-[85vw] h-[80vh] flex flex-col items-center rounded-xl bg-blue-500">

      <div class="h-[5vh] w-full flex items-end justify-center">
        <h1 class="text-white text-3xl"><strong>Perfil del usuario</strong></h1>
      </div>

      <div class="w-full h-[75vh] flex ">

        <div class="Foto w-[50%] h-full flex items-center justify-center">
        
          <div class="h-[65%] rounded-full aspect-square bg-white"></div>

        </div>
 
      

        <div v-if="storeInfoU.loading">Cargando...</div>
        <div v-if="storeInfoU.error">Error al cargar los datos</div>

        <div v-if="storeInfoU.usuario" 
        class="datosU w-[50%] h-full space-y-20 flex flex-col justify-center">

          <p class="p-4 rounded-xl text-xl text-blue-700 bg-white mr-20">
            <strong>Nombre:</strong> {{ storeInfoU.usuario.name }}</p>

          <p class="p-4 rounded-xl text-xl text-blue-700 bg-white mr-20">
            <strong>CI:</strong> {{ storeInfoU.usuario.CI }}</p>

          <p class="p-4 rounded-xl text-xl text-blue-700 bg-white mr-20">
            <strong>Rol:</strong> {{ storeInfoU.usuario.Rol }}</p>
          
          <p class="p-4 rounded-xl text-xl text-blue-700 bg-white mr-20">
          <strong>Correo:</strong> {{ storeInfoU.usuario.email }}</p>

         </div>
    
    </div>
  </div>

</div>

</template>
