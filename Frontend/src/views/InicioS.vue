<script setup>

import { ref } from 'vue';
import router from '../router';
import instanciaAxios from '../api/api';
import { useAlmacenSesion } from '../store/sesion'; 

const almacenSesion = useAlmacenSesion()

const DocumentoIdentidad = ref('')
const password = ref('')

/**
 * FRONTEND: Chequea si hay una sesión iniciada y si es válida, envía a la página de inicio
 */

if (almacenSesion.sesionIniciada) {
    router.push({name:'casas'})
}



const enviarDatos = async () => {
    const datosUsuario = {
        DocumentoIdentidad: DocumentoIdentidad.value,
        password: password.value,
    }

    almacenSesion.iniciarSesion(datosUsuario)
}
</script>

<template>
    <div class="base 
            w-[100vw] h-[80vh]
            bg-amber-300
            flex justify-center items-center  
        ">
        <div class="contenido
                w-2/5 h-4/5
                bg-green-300
                rounded-3xl
                p-2
                flex flex-col items-center
                text-center
            ">
            <h1 class="titulo
                    text-4xl font-bold
                ">
                Ingresar en el Sistema
            </h1>
            <br>
            <div class="formLogin
                                    relative top-10
                                    w-4/5
                                    grid grid-cols-2 grid-rows-4 gap-1
                                    text-left      
                ">

                <label for="DocumentoIdentidad">Documento de identidad:</label>
                <input type="text" id="DocumentoIdentidad" v-model="DocumentoIdentidad">

                <label for="password">Contraseña:</label>
                <input type="password" id="password" v-model="password" required>
                <p class="h-4"></p>
                <button @click="enviarDatos()" class="btnRegistro
                            col-span-2
                            bg-amber-50
                    ">
                    Iniciar Sesión
                </button>
            </div>
        </div>
    </div>
</template>

<style scoped>
.formLogin input {
    margin-left: 20px;
    background-color: white;
}

.error {
    border: solid red 1px;
    background-color: pink;
}
</style>