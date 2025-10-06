<script setup>
    import { ref, reactive } from 'vue';
    import instanciaAxios from '../api/api';



    const nuevaCasa = reactive({
        ubicacion:'',
        extencion:''
    })

    const registrar = async () => {
        console.log(nuevaCasa)
        try {
            const respuesta = await instanciaAxios.post('casa/nueva',nuevaCasa)
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
            <h1>Nueva Casa:</h1>
            <label for="ubicacionCasa">Ubicacion de la Casa:</label>
            <input type="text" id="ubicacionCasa" 
                v-model="nuevaCasa.ubicacion"> 
            <br>
            <label for="extencionCasa">Extencio de la Casa:</label>
            <input type="text" id="extencionCasa" 
            v-model="nuevaCasa.extencion">
            <br>
            <button @click="registrar()">Registrar Casa</button>
        </div>
    </div>

</template>

<style scoped>
</style>
