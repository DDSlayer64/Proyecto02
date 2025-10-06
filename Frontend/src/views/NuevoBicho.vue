<script setup>
    import { ref, reactive } from 'vue';
    import instanciaAxios from '../api/api';



    const nuevoBicho = reactive({
        nombre:'',
        especie:''
    })

    const registrar = async () => {
        console.log(nuevoBicho)
        try {
            const respuesta = await 
            instanciaAxios.post('bicho/nuevo',nuevoBicho)
            console.log('RESPUESTA')
            console.log(respuesta.data)
        } catch (error) {
            console.error("ERROR:")
            console.error(error)
        }
    }

</script>

<template>
    <div class="base">
        <div class="formulario">
            <h1>Nuevo Bicho:</h1>
            <label for="nombreBicho">Nombre del Bicho:</label>
            <input type="text" id="nombreBicho" 
                v-model="nuevoBicho.nombre"> 
            <br>
            <label for="especieBicho">Especie del Bicho:</label>
            <input type="text" id="especieBicho" 
            v-model="nuevoBicho.especie">
            <br>
            <button @click="registrar()">Registrar Bicho</button>
        </div>
    </div>

</template>

<style scoped>
</style>
