import axios from "axios";

const instanciaAxios = 
{
    normal: axios.create(
    {
        baseURL: 'http://localhost:8000/api/',
        headers: {Accept:'application/json'},
        withCredentials:true,
        withXSRFToken:true
    }),
    csrf: axios.create(
        {
        baseURL: 'http://localhost:8000/sanctum/csrf-cookie',
        headers: {Accept:'application/json'},
        withCredentials:true,
        withXSRFToken:true
    })
}



/* axios.create(
    {
        baseURL: 'http://127.0.0.1:8000/api/',
    }
) */

export default instanciaAxios
