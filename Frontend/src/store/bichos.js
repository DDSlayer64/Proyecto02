import { defineStore } from "pinia";
import instanciaAxios from "../api/api";

export const useAlmacenBichos = defineStore(
    'bichos',
    {
        state:()=>({
            bichos: [],
            loading: false,
            error: null
        }),
        getters:{},
        actions:{
            async obtenerBichos(){
                this.loading = true
                this.error = null
                try {
                    const respuesta = 
                        await instanciaAxios.get('bichos')
                    this.bichos = respuesta.data.bichos
                } catch (excepcion) {
                    this.error = excepcion
                } finally {
                    this.loading = false
                }
            }
        }
    }
)