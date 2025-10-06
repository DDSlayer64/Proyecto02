<script setup>
    import { ref } from 'vue';
    defineProps([
        'casa'
    ])
</script>

<template>
    <div class="cuerpo">
        <h2>{{ casa.ubicacion }}</h2>
        <h3>{{ casa.extencion }}</h3>
        <br>
    </div>
    
</template>

<style scoped>
    .cuerpo{
        border-bottom: solid black 1px;
    }
</style>