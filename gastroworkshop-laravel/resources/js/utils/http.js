import axios from 'axios';

export const http = axios.create({
    baseURL: 'http://localhost:8881/api',
    headers:{
        Authorization: localStorage.getItem('token')===null?null:`Bearer ${localStorage.getItem('token')}`
    }
})
