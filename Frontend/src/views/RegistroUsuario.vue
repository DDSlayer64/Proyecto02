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
/*
          if (respuesta.data.estado === 'OK' && respuesta.data.destino) {
            window.location.href = respuesta.data.destino
        }*/
        
    } catch (error) {
        console.error("ERROR:", error)
        mensaje.value = 'Ocurrió un error al registrar el usuario'
    }
}

</script>

<template>
    <div class="base w-[100vw] h-[100vh] bg-red-500">
        <div class="formulario">
            <form action="" id="formulario">
            <h1>Nuevo Usuario:</h1>
            <label for="nombreUsuario">Nombre completo:</label>
            <input type="text" id="nombreUsuario" 
                v-model="newUser.name"> 
            <br>
            <label for="emailUser">Correo electronico:</label>
            <input type="text" id="emailUser" 
            v-model="newUser.email">
            <br>
             <label for="diUser">C.I.:</label>
            <input type="text" id="diUser" 
            v-model="newUser.DocumentoIdentidad">
            <br>
            <label for="Rol">Rol:</label>
            <select name="Rol" id="Rol" v-model="newUser.Rol">
                <option value="Administrador">Administrador</option>
                <option value="Empleado">Empleado</option>
            </select><br>
            <label for="password">Contraseña:</label>
            <input type="password" id="passwordUser" 
            v-model="newUser.password">
            <br>
            <label for="confirmPassword">Confirmar Contraseña:</label>
            <input type="Password" id="confirmPassword" 
            v-model="newUser.confirmPassword">
            <br>
            <p>{{ mensaje }}</p>
         
            <button @click="registrar()" type="button">Registrar Usuario</button>
            </form>
        </div>
    </div>

</template>

<style scoped>
</style>
