<script setup>
    import { ref, reactive } from 'vue';
    import instanciaAxios from '../api/api';

    
    function validatePassword(password){
        const longitudMin = /^.{8,}$/
        const tieneMay = /[A-Z]/
        const tieneMin = /[a-z]/
        const tieneNumero = /\d/
        const tieneEspecial = /[!@#$%^&*(),.?":{}|<>]/

        if (!longitudMin.test(password)){
            return 'La contraseña debe tener al menos 8 caracteres'
        }
        if (!tieneMay.test(password)){
            return 'La contraseña debe tener al menos una mayuscula'
        }
        if (!tieneMin.test(password)){
            return 'La contraseña debe tener al menos una minuscula'
        }
        if (!tieneNumero.test(password)){
            return 'La contraseña debe tener al menos un numero'
        }
        if (!tieneEspecial.test(password)){
            return 'La contraseña debe tener al menos un caracter especial'
        }
        
        return 'La contraseña es valida'
    }

    const mensaje = ref('')

    

    const newUser = reactive({
        name:'',
        email:'',
        DocumentoIdentidad:'',
        Rol:'',
        password:'',
        confirmPassword:''
    })

const registrar = async () => {
    // Validar contraseña
    mensaje.value = validatePassword(newUser.password)
    if (mensaje.value !== 'La contraseña es valida') return

    // Validar que coincidan las contraseñas
    if (newUser.password !== newUser.confirmPassword) {
        mensaje.value = 'Las contraseñas no coinciden'
        return
    }

    try {
        instanciaAxios.csrf.get()
        const respuesta = await instanciaAxios.normal.post('registro', newUser)
        console.log('RESPUESTA', respuesta.data)
        mensaje.value = 'Usuario registrado con éxito'

          if (respuesta.data.estado === 'OK' && respuesta.data.destino) {
            window.location.href = respuesta.data.destino
        }
        
    } catch (error) {
        console.error("ERROR:", error)
        mensaje.value = 'Ocurrió un error al registrar el usuario'
    }
}

</script>

<template>
    <div class="base w-screen h-[90vh] flex items-center justify-center">
        <div class="formulario h-[70vh] w-[60vw] shadow-lg flex">

            <div class="w-[60%] h-[70vh] bg-blue-500 p-10 flex flex-col justify-center rounded-l-xl">

            <h3 class="text-4xl rounded-xl text-white font-bold mb-6">Registrarse</h3>
            <form action="" id="formulario" class="flex flex-col">

            <input type="text" placeholder="Nombre completo" id="nombreUsuario" 
            class="p-3 w-full rounded-xl bg-white text-lg text-black focus:outline-none focus:ring-2 focus:ring-blue-300"
                v-model="newUser.name"> 
            <br>

            <input type="text" placeholder="Correo electronico" id="emailUser" 
            class="p-3 w-full rounded-xl bg-white text-lg text-black focus:outline-none focus:ring-2 focus:ring-blue-300" 
            v-model="newUser.email">
            <br>

            <input type="text" placeholder="C.I." id="diUser" 
            class="p-3 w-full rounded-xl bg-white text-lg text-black focus:outline-none focus:ring-2 focus:ring-blue-300"
            v-model="newUser.DocumentoIdentidad">
            <br>

            <select name="Rol" placeholder="Rol" id="Rol" v-model="newUser.Rol" 
            class="p-3 w-full rounded-xl bg-white text-lg text-black focus:outline-none focus:ring-2 focus:ring-blue-300">
                <option value="Administrador">Administrador</option>
                <option value="Empleado">Empleado</option>
            </select><br>

            <input type="password" placeholder="Contraseña" id="passwordUser" 
            class="p-3 w-full rounded-xl bg-white text-lg text-black focus:outline-none focus:ring-2 focus:ring-blue-300"
            v-model="newUser.password">
            <br>

            <input type="Password" placeholder="Confirmar contraseña" id="confirmPassword" 
            class="p-3 w-full rounded-xl bg-white text-lg text-black focus:outline-none focus:ring-2 focus:ring-blue-300"
            v-model="newUser.confirmPassword">
            <br>
            <p>{{ mensaje }}</p>
         
            <button @click="registrar()" type="button" 
            class="bg-blue-700 text-white py-2 rounded-xl text-xl hover:bg-blue-800 transition">Registrar Usuario</button>
            </form>
            </div>

            <div class="w-[40%] h-full bg-blue-700 flex flex-col justify-center items-center p-10 rounded-r-xl text-white">
             <h3 class="text-3xl font-semibold mb-4">¿Ya tienes una cuenta?</h3>

            <router-link to="/login" class="bg-white text-blue-700 px-6 text-xl py-2 rounded-xl hover:bg-gray-200 transition">
          Iniciar sesión
        </router-link>   

            </div>
        </div>
    </div>

</template>

<style scoped>
</style>
