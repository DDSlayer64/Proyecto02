<script setup>
    import { ref,reactive } from 'vue';
    import { useAlmacenCasas } from '../store/casas';
    import Casa from '../components/Casa.vue';

    const almacenCasas = useAlmacenCasas()
    almacenCasas.obtenerCasas()

    

</script>

<template>
    <h1>Lista de Casas</h1>
    <div class="listaCasas">
        <Casa 
            v-for="casa in almacenCasas.casas"
            :casa="casa"
            >

        </Casa>
    </div>
</template>

<style scoped>
</style>