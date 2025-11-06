<script setup>
    import { ref } from 'vue';
    defineProps([
        'notificacion'
    ])
</script>

<template>
    <div class="cuerpo">
        <h2>{{ notificaciones.titulo }}</h2>
        <h3>{{ notificaciones.mensaje }}</h3>
        <br>
    </div>
    
</template>
