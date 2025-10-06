import { defineStore } from "pinia";
import instanciaAxios from "../api/api";

export const useAlmacenCasas = defineStore(
    'casas',
    {
        state:()=>({
            casas: [],
            loading: false,
            error: null
        }),
        getters:{},
        actions:{
            async obtenerCasas(){
                this.loading = true
                this.error = null
                try {
                    const respuesta = 
                        await instanciaAxios.get('casas')
                    this.casas = respuesta.data.casas
                } catch (excepcion) {
                    this.error = excepcion
                } finally {
                    this.loading = false
                }
            }
        }
    }
)