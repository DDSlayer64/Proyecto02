<script setup>

import { ref } from 'vue';
import router from '../router';
import instanciaAxios from '../api/api';
import { useAlmacenSesion } from '../store/sesion'; 

const almacenSesion = useAlmacenSesion()

const DocumentoIdentidad = ref('')
const password = ref('')

if (almacenSesion.sesionIniciada) {
    router.push({name:'usuario'})
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
    <div class="base w-screen h-[90vh] flex flex-col justify-center items-center ">
        <div class="h-[70vh] w-[60vw] flex ">

            <div class="InicioS w-[60%] h-[70vh] bg-blue-700 flex flex-col rounded-l-xl justify-center items-center p-10 text-white">
                <h3 class="text-3xl font-semibold mb-4">¿No tienes una cuenta?</h3>
                <router-link to="registro" class="bg-white text-blue-700 px-6 py-2 text-xl rounded-xl hover:bg-gray-200 transition" >
                    Registrate
                </router-link>
            </div>

            <div class="w-[40%] h-full bg-blue-500 flex flex-col p-10 rounded-r-xl justify-center">
            
                <h3 class="titulo text-4xl text-white font-bold">Iniciar Sesión</h3>
                <br>
                <form action="" class="flex flex-col space-y-4">

                    <input type="text" placeholder="C.I." id="DocumentoIdentidad" 
                    class="p-3 rounded-xl bg-white text-lg text-black focus:outline-none focus:ring-2 focus:ring-blue-300"
                    v-model="DocumentoIdentidad">

                    <input type="password" placeholder="Contraseña" id="password" 
                    class="p-3 rounded-xl bg-white text-lg text-black focus:outline-none focus:ring-2 focus:ring-blue-300"
                    v-model="password" required>
                    <p class="h-4"></p>
                    <button @click="enviarDatos()" class="bg-blue-800 text-white py-2 rounded-xl text-xl hover:bg-blue-900 transition">
                    Iniciar Sesión
                    </button>
                </form>
                
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