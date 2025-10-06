<script setup>
    import { ref } from 'vue';
    defineProps([
        'bicho'
    ])
</script>

<template>
    <div class="cuerpo">
        <h2>{{ bicho.nombre }}</h2>
        <h3>{{ bicho.especie }}</h3>
        <br>
    </div>
    
</template>

<style scoped>
    .cuerpo{
        border-bottom: solid black 1px;
    }
</style>