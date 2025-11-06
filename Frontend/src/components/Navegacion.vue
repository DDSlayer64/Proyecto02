<script setup>
    import { RouterLink } from 'vue-router';
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
    import { faBell, faNoteSticky, faUser } from '@fortawesome/free-regular-svg-icons';
    import { faBoxOpen, faChartBar, faChartLine, faNotesMedical, faShoppingCart } from '@fortawesome/free-solid-svg-icons';
</script>

<template>
    <nav class="navegacion w-scrieen h-[10vh] bg-blue-500 flex flex-row">
        <router-link to="notificaciones" class="
                                                flex 
                                                justify-center 
                                                items-center
                                                text-2xl
                                                hover:bg-blue-800
                                                px-2 w-[5%]
                                                bg-blue-700
                                                rounded m-0.5
                                                text-white 
                                                border-2 
                                                border-gray-300
                                                "><FontAwesomeIcon :icon="faBell" />

            
        </router-link>
        <div class="w-[70%] h-screen"></div>
        <router-link to="notas" class="
                                    flex
                                    justify-center
                                    items-center
                                    text-2xl
                                    hover:bg-blue-800
                                    px-2
                                    w-[5%] 
                                    bg-blue-700 
                                    m-0.5 
                                    text-white 
                                    border-2 
                                    border-gray-300
                                    "><FontAwesomeIcon :icon="faNotesMedical" />
            
        </router-link>
        <router-link to="productos" class="
                                        flex
                                        justify-center
                                        items-center
                                        text-2xl
                                        hover:bg-blue-800 
                                        px-2 
                                        w-[5%] 
                                        bg-blue-700 
                                        m-0.5 
                                        text-white 
                                        border-2 
                                        border-gray-300
                                        "><FontAwesomeIcon :icon="faBoxOpen" />

        </router-link>
        <router-link to="ventas" class="
                                        flex
                                        justify-center
                                        items-center
                                        text-2xl
                                        hover:bg-blue-800 
                                        px-2 
                                        w-[5%] 
                                        bg-blue-700 
                                        m-0.5 
                                        text-white 
                                        border-2 
                                        border-gray-300
                                        "><FontAwesomeIcon :icon="faShoppingCart" />

        </router-link>
        <router-link to="ganancias" class="
                                        flex
                                        justify-center
                                        items-center
                                        text-2xl
                                        hover:bg-blue-800 
                                        px-2 
                                        w-[5%] 
                                        bg-blue-700 
                                        m-0.5 
                                        text-white 
                                        border-2 
                                        border-gray-300
                                        "><FontAwesomeIcon :icon="faChartLine" />

        </router-link>
        <router-link to="usuario" class="
                                        flex
                                        justify-center
                                        items-center
                                        text-2xl
                                        hover:bg-blue-800 
                                        px-2 
                                        w-[5%] 
                                        bg-blue-700 
                                        m-0.5 
                                        text-white 
                                        border-2 
                                        border-gray-300
                                        "><FontAwesomeIcon :icon="faUser" />

        </router-link>
        
    </nav>
</template>