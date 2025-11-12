<script setup>
    import { ref, reactive } from 'vue';
    import instanciaAxios from '../api/api';

    // Ref para controlar la visibilidad de las contraseñas
    const showPassword = ref(false);
    const showConfirmPassword = ref(false);

    
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

    // Función para alternar la visibilidad de la contraseña
    const togglePasswordVisibility = () => {
        showPassword.value = !showPassword.value;
    }

    // Función para alternar la visibilidad de la confirmación de contraseña
    const toggleConfirmPasswordVisibility = () => {
        showConfirmPassword.value = !showConfirmPassword.value;
    }
    

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
            <form action="" id="formulario" class="flex flex-col space-y-00.1">

            <input type="text" placeholder="Nombre completo" id="nombreUsuario" 
            class=" w-full p-3 rounded-xl bg-white text-lg text-black focus:outline-none focus:ring-2 focus:ring-blue-300"
                v-model="newUser.name"> 
            <br>

            <input type="text" placeholder="Correo electronico" id="emailUser" 
            class=" w-full p-3 rounded-xl bg-white text-lg text-black focus:outline-none focus:ring-2 focus:ring-blue-300" 
            v-model="newUser.email">
            <br>

            <input type="text" placeholder="C.I." id="diUser" 
            class=" w-full p-3 rounded-xl bg-white text-lg text-black focus:outline-none focus:ring-2 focus:ring-blue-300"
            v-model="newUser.DocumentoIdentidad">
            <br>

            <select name="Rol" placeholder="Rol" id="Rol" v-model="newUser.Rol" 
            class=" w-full p-3 rounded-xl bg-white text-lg text-black focus:outline-none focus:ring-2 focus:ring-blue-300">
                <option value="Administrador">Administrador</option>
                <option value="Empleado">Empleado</option>
            </select><br>

            <div class="relative">
                <input 
                    :type="showPassword ? 'text' : 'password'" 
                    placeholder="Contraseña" 
                    id="passwordUser" 
                    class="p-3 w-full rounded-xl bg-white text-lg text-black focus:outline-none focus:ring-2 focus:ring-blue-300 pr-10"
                    v-model="newUser.password"
                >
                <button 
                    type="button"
                    @click="togglePasswordVisibility"
                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none"
                >
                    <span v-if="showPassword">👁️</span>
                    <span v-else>👁️‍🗨️</span>
                </button>
            </div>
            <br>

            <div class="relative">
                <input 
                    :type="showConfirmPassword ? 'text' : 'password'" 
                    placeholder="Confirmar contraseña" 
                    id="confirmPassword" 
                    class="p-3 w-full rounded-xl bg-white text-lg text-black focus:outline-none focus:ring-2 focus:ring-blue-300 pr-10"
                    v-model="newUser.confirmPassword"
                >
                <button 
                    type="button"
                    @click="toggleConfirmPasswordVisibility"
                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none"
                >
                    <span v-if="showConfirmPassword">👁️</span>
                    <span v-else>👁️‍🗨️</span>
                </button>
            </div>
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
