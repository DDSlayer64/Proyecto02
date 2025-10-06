<script setup>
    import { ref,reactive } from 'vue';
    import { useAlmacenBichos } from '../store/bichos';
    import Bicho from '../components/Bicho.vue';

    const almacenBichos = useAlmacenBichos()
    almacenBichos.obtenerBichos()

    

</script>

<template>
    <h1>Lista de Bichos</h1>
    <div class="listaBichos">
        <Bicho 
            v-for="bicho in almacenBichos.bichos"
            :bicho="bicho"
            >

        </Bicho>
    </div>
</template>

<style scoped>
</style>