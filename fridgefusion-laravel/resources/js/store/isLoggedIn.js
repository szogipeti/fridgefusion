import {defineStore} from "pinia";

export const useLoggedInStore = defineStore('isLoggedIn', {
    state(){
        return{
            isLoggedIn: localStorage.getItem('token') !== null
        }
    },
    actions:{
        triggerLoggedIn(){
            this.isLoggedIn = !this.isLoggedIn;
        }
    }
})
