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
  <h1>Perfil del usuario</h1>

  <div v-if="storeInfoU.loading">Cargando...</div>
  <div v-if="storeInfoU.error">Error al cargar los datos</div>

  <div v-if="storeInfoU.usuario">
    <User :user="storeInfoU.usuario" />
  </div>
</template>
