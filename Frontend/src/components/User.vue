<script setup>
    import { ref } from 'vue';
    defineProps([
        'user'
    ])
</script>

<template>
    <div class="cuerpo">
        <h2>{{user.name}}</h2>
        <h2>{{user.email}}</h2>
        <h2>{{user.DocumentoIdentidad}}</h2>
        <h2>{{user.Rol}}</h2>
        <h2>{{user.password}}</h2>
    </div>
</template>

<style scoped>
    .cuerpo{
        border-bottom: solid black 1px;
    }
</style>