import { defineStore } from "pinia";
import instanciaAxios from "../api/api";

export const useStoreUsers = defineStore(
    'users',
    {
        state:()=>({
            users: [],
            loading: false,
            error: null
        }),
        getters:{},
        actions:{
            async getUsers(){
                this.loading = true
                this.error = null
                try {
                    const respuesta = 
                        await instanciaAxios.get('users')
                    this.users = respuesta.data.users
                } catch (excepcion) {
                    this.error = excepcion
                } finally {
                    this.loading = false
                }
            }
        }
    }
)